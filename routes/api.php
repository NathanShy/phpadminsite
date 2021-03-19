<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Use App\Models\Product;
use App\Http\Resources\ListProductsResource;
//use App\Http\Controllers\Api\ListProductsController;

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

Route::get('products', function(Request $request){
            //  $products = Product::where('user_id', Auth::user()->id)
            //  ->get();
             
            $products = ListProductsResource::collection(Product::all());
            //$products = Product::all();


        return $products;
});
