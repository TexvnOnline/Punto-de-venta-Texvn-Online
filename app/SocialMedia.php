<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'name',
        'icon',
        'business_id',
    ];
    public function my_store($request){
        $this->create($request->all());
    }
    public function my_update($request){
        $this->update($request->all());
    }
}
