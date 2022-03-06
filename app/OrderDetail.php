<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'quantity',
        'price',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class)->withTrashed();
    }
    public function total(){
        return $this->quantity * $this->price;
    }
}
