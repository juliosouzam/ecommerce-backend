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

    public function getCart(Request $request, Product $product)
    {
        return response()->json(session('cart', ['items' => []]));
    }

    public function addToCart(Request $request, Product $product)
    {
        $oldCart = session('cart', []);
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        session(['cart' => $cart]);

        return response()->json(session('cart'));
    }
}
