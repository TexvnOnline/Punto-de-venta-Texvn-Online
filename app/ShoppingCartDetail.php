<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCartDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'shopping_cart_id',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function total(){
        // return $this->quantity * $this->product->sell_price;
        return round(($this->quantity * $this->product->discountedPrice), 2);
        
    }
}