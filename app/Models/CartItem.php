<?php

namespace App\Models;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_title',
        'product_description',
        'price',
        'quantity'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

