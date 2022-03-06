<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Image;

class Business extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'logo',
        'email',
        'address',
        'ruc',
        'phone',
        'contact_text',
        'hours_of_operation',
        'latitude',
        'length',
        'google_maps_link',
    ];
    public function social_media(){
        return $this->hasMany(SocialMedia::class);
    }
    public function sliders(){
        return $this->hasMany(Slider::class);
    }
    public function my_update($request){
        $this->update($request->all());
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $ruta = self::upload_image($image);
            $this->update([
                'logo'=>$ruta,
            ]);
        }
    }
    public static function upload_image($image){
        $nombre = time().$image->getClientOriginalName();
        $formatted_image = Image::make($image);
        $formatted_image->fit(43, 33);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }
}
