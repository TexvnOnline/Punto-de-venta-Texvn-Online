<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    public function getRouteKeyName(){
        return 'slug';
    }
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function my_store($request){
        $brand = self::create($request->all()+[
            'slug' => Str::slug($request->name, '_'),
        ]);
        $image = $request->file('file');
        $ruta = self::upload_image($image);
        $brand->image()->create([
            'url' => $ruta
        ]);
    }
    public function my_update($request){
        $this->update($request->all()+[
            'slug' => Str::slug($request->name, '_'),
        ]);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $ruta = self::upload_image($image);
            $this->image()->update([
                'url' => $ruta
            ]);
        }
    }
    public static function upload_image($image){
        $nombre = time().$image->getClientOriginalName();
        $formatted_image = Image::make($image);
        $formatted_image->fit(160, 65);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }
}
