<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Image;

class Slider extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'body',
        'business_id',
    ];
    public function image(){
        return $this->morphOne('App\Image', 'imageable');
    }
    public function my_store($request){
        $slider = self::create($request->all());

        $image = $request->file('file');
        $ruta = self::upload_image($image);
        $slider->image()->create([
            'url' => $ruta
        ]);
    }
    public function my_update($request){
        $this->update($request->all());

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
        $formatted_image->fit(1350, 392);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }
}
