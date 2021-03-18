<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// //List Products
// Route::get('articles', 'ArticleController@index');

// //List single product
// Route::get('articles/{id}', 'ArticleController@store');

// //Create new product
// Route::post('articles', 'ArticleController@store');

// //Update product
// Route::put('articles', 'ArticleController@store');

// //Delete product
// Route::delete('articles', 'ArticleController@destroy');