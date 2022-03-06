<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email','ruc_number', 'address','phone',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
