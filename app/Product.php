<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use willvincent\Rateable\Rateable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Rateable;
    protected $fillable = [
        'code',
        'name',
        'slug',
        'stock',
        'sell_price',
        'short_description',
        'long_description',
        'status',
        'category_id',
        'brand_id',
        'views',
        'provider_id',
    ];

    public function add_stock($quantity){
        $this->increment('stock', $quantity);
    }
    public function subtract_stock($quantity){
        $this->decrement('stock', $quantity);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    //==================
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    //==================
    public function promotions(){
        return $this->belongsToMany(Promotion::class);
    }

    public function similar(){
        return $this->store_products()->where([
            ['category_id', $this->category_id],
            ['id', '!=', $this->id]
        ]) ->inRandomOrder()->take(6)->get();
    }
    public function getRouteKeyName(){
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function images(){
        return $this->morphMany('App\Image', 'imageable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function my_store($request){
        $product = self::create($request->all()+[
            'slug' => Str::slug($request->name, '_'),
        ]);
        $product->tags()->attach($request->get('tags'));
        $this->generate_code($product);
        $this->upload_files($request, $product);
        return $product;
    }
    public function my_update($request){
        $this->update($request->all()+[
            'slug' => Str::slug($request->name, '_'),
        ]);
        $this->tags()->sync($request->get('tags'));
        $this->generate_code($this);
    }
    public function generate_code($product){
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code'=>$numeroConCeros]);
    }
    public function upload_files($request, $product){
        $urlimages = [];
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $image) {
                $nombre = time().$image->getClientOriginalName();
                $ruta = public_path().'/image';
                $image->move($ruta,$nombre);
                $urlimages[]['url']='/image/'.$nombre;
            }
        }
        $product->images()->createMany($urlimages);
    }
    // public function status(){
    //     switch ($this->status) {
    //         case 'ACTIVE':
    //             return 'Activo';
    //         case 'DEACTIVATED':
    //             return 'Desactivado';
    //         default:
    //             # code...
    //             break;
    //     }
    // }
   
    static function store_products(){
        return self::where('status', 'SHOP')
                    ->orWhere('status', 'BOTH');
    }

    static function pos_products(){
        return self::where('status', 'POS')
                    ->orWhere('status', 'BOTH');
    }

    public function getTotalDiscountPercentageAttribute(){
        $total_amount = 0;
        $total_percentage = 0;
        foreach ($this->promotions as $key => $promotion) {
            if ($promotion->promotion_type == 'percent') {
                $total_percentage += $promotion->discount_rate;
            }elseif ($promotion->promotion_type == 'fixed_amount') {
                $total_amount += $promotion->fixed_amount_discount;
            }
        }
        if ($total_amount == 0) {
            return round(($total_percentage), 2);
        }else{
            return round(($total_percentage) + (100/($this->sell_price / $total_amount)), 2);
        }
    }
    public function getDiscountedPriceAttribute(){
        $total_percentage = 0;
        $total_amount = 0;
        foreach ($this->promotions as $key => $promotion) {
            if ($promotion->promotion_type == 'percent') {
                $total_percentage += $promotion->discount_rate;
            }elseif ($promotion->promotion_type == 'fixed_amount'){
                $total_amount += $promotion->fixed_amount_discount;
            }
        }
        $total = ($this->sell_price-($this->sell_price * ($total_percentage / 100))) - $total_amount;

        return round(($total), 2);
        
    }
    public function has_promotions(){
        $this->promotions;
        if ($this->promotions->count() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function product_status(){
        switch ($this->status) {
            case 'DRAFT':
                return 'BORRADOR';
            case 'SHOP':
                return 'TIENDA';
            case 'POS':
                return 'PUNTO DE VENTA';
            case 'BOTH':
                return 'AMBOS';
            case 'DISABLED':
                return 'DESACTIVADO';
            default:
                # code...
                break;
        }
    }
}
