<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentPlatform extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];
   
}
