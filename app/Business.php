<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'mail',
        'address',
        'ruc',
    ];
   
}
