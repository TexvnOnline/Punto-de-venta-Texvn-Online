<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;
    protected $primaryKey = 'iso';
    public $incrementing = false;
    protected $fillable = [
        'iso',
    ];
}
