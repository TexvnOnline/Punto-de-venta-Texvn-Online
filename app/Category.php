<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Str;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'parent_id',
        'category_id',
    ];


    public function getRouteKeyName(){
        return 'slug';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    // =============> SUBCATEGORIA
    // public function categories()
    // {
    //     return $this->hasMany(Category::class);
    // }

    // public function childrenCategories()
    // {
    //     return $this->hasMany(Category::class)->with('categories');
    // }
    // =============> FIN DE SUBCATEGORIA

    public function has_subcategory(){
        if ($this->subcategories()->count() > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    public function my_store($request, $type){
        if ($type == 'PRODUCT') {
            self::create($request->all()+[
                'slug' => Str::slug($request->name, '_'),
                'category_type' => 'PRODUCT'
            ]);
        } else {
            self::create([
                'name'=> $request->name,
                'description'=> $request->description,
                'slug' => Str::slug($request->name, '_'),
                'category_type' => 'POST'
            ]);
        }
    }
    public function my_update($request){
        $this->update($request->all()+[
            'slug' => Str::slug($request->name, '_')
        ]);
    }
    public function category_type(){
        switch ($this->category_type) {
            case 'PRODUCT':
                return 'Tienda';
            case 'POST':
                return 'Blog';
            default:
                # code...
                break;
        }
    }

    public function products_count(){
        $total = self::descendantsAndSelf($this->id)->count();
        return $total;
    }

    public function item_numbers(){
        $total = 0;
        if ($this->category_type() == 'Tienda') {
            $total = $this->products_count();
        } else {
            $total = $this->posts->count();
        }
        return $total;
    }

    public function counter_text(){
        if ($this->category_type() == 'Tienda') {
           if ($this->item_numbers() == 1) {
               return 'Producto';
           }else {
                return 'Productos';
           }
        } else {
            if ($this->item_numbers() == 1) {
                return 'Publicación';
            }else {
                 return 'Publicaciones';
            }
        }
    }

    
}
