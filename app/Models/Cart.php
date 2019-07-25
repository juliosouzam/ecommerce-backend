<?php

namespace App\Models;

class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrce = 0;

    public function __construct($oldCart = [])
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrce = $oldCart->totalPrce;
        }
    }

    public function add(Product $item, string $productId)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if (array_key_exists($productId, $this->items)) {
            $storedItem = $this->items[$productId];
        }
        $storedItem['quantity'] += 1;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$productId] = $storedItem;
        $this->totalQty += 1;
        $this->totalPrce += $item->price;

        return $this;
    }
}
