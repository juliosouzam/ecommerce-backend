<?php

namespace App\Models;

use App\User;
use Illuminate\Http\Request;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'total_qty',
        'total_price'
    ];

    protected $with = ['items'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }

    public function new(Product $product)
    {
        $cart = [
            'user_id' => auth()->id(),
            'total_qty' => request()->total_qty,
            'total_price' => request()->total_qty * $product->price
        ];

        $this->fill($cart)->save();

        return $this;
    }

    public function addItem(Product $product)
    {
        if ($item = $this->items()->where('product_id', $product->id)->first()) {
            $item->quantity += 1;
            $item->save();

            return $this;
        }

        $this->items()->create([
            'product_id' => $product->id,
            'product_title' => $product->title,
            'product_description' => $product->description,
            'price' => $product->price,
            'quantity' => request()->total_qty
        ]);

        return $this;
    }

    public function count()
    {
        return $this->items->sum('quantity');
    }

    public function total()
    {
        return $this->items->sum('price') * $this->items->sum('quantity');
    }
}
