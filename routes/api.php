<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::resource('categories', 'CategoryController')->only(['index', 'show']);
Route::resource('categories/{category}/subcategories', 'SubcategoryController')->only(['index', 'show']);
Route::resource('categories/{category}/subcategories/{subcategory}/products', 'ProductController')->only(['index', 'show']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/products/{product}/getCart', 'ProductController@getCart');
    Route::post('/products/{product}/addToCart', 'ProductController@addToCart');

    Route::resource('orders', 'OrderController')->only(['store', 'show']);
});
