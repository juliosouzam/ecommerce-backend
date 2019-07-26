<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, Subcategory $subcategory)
    {
        return response()->json(['products' => $subcategory->products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Subcategory $subcategory, Product $product)
    {
        return response()->json(['product' => $product]);
    }

    public function getCart()
    {
        return response()->json(['cart' => auth()->user()->cart]);
    }

    public function addToCart(Request $request, Product $product)
    {
        if ($cart = auth()->user()->cart) {
            $cart->addItem($product);

            return response()->json(['cart' => $cart]);
        }

        ($cart = new Cart)->new($product)->addItem($product);

        return response()->json(['cart' => $cart]);
    }
}
