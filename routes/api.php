<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Use App\Models\Product;
use App\Http\Resources\ListProductsResource;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Get Items
Route::get('products/{id}', function(Request $request, $id){   
    $products = Product::all()
    ->where('user_id', '=', $id);

    return ListProductsResource::collection($products);
});

//Create Items
Route::post('products/new', function(Request $request){
    $product = new Product;

    //$product->id = $request->input('id');
    $product->user_id = $request->input('user_id');
    $product->name = $request->input('name');
    $product->category = $request->input('category');
    $product->date = $request->input('date');
    $product->description = $request->input('description');

    if ($product->save()) {
        return new ListProductsResource($product);
    }

    return null;
});

//Update Items
Route::put('products/edit', function(Request $request){

    $product = Product::findOrFail($request->id);

    $product->id = $request->input('id');
    $product->user_id = $request->input('user_id');
    $product->name = $request->input('name');
    $product->category = $request->input('category');
    $product->date = $request->input('date');
    $product->description = $request->input('description');

    if ($product->save()) {
        return new ListProductsResource($product);
    }

    return null;
});

Route::delete('products/delete/{id}', function($id){
    $product = Product::findOrFail($id);

    if ($product->delete()) {
        return new ListProductsResource($product);
    }

    return null;
});