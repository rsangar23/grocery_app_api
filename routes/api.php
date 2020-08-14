<?php

namespace App\Http\Controllers\Product\ProductController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Product;

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

Route::post('addProduct', 'Product\ProductController@addProduct');
Route::get('getOneProduct/{id}', 'Product\ProductController@getOneProduct');
Route::get('getAllProducts', 'Product\ProductController@getAllProducts');
Route::put('product/{id}', 'Product\ProductController@updateProduct');
Route::delete('product/{id}', 'Product\ProductController@deleteProduct');

//Route::apiResource('product', 'Product\ProductProduct');