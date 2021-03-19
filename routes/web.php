<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ProductController;

Route::get('/', function() {
    return redirect('dashboard');
})
    ->name('home');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

//Login
Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::post('/login', [LoginController::class, 'store']);

//Logout
Route::get('/logout', [LogoutController::class, 'clear'])
    ->name('logout');
// Route::post('/login', [LoginController::class, 'store']);   

//Registration
Route::get('/register', [RegisterController::class, 'index'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Create Products
Route::get('/products/create', [ProductController::class, 'createForm'])
    ->name('createProducts');
Route::post('/products/create', [ProductController::class, 'store']);

//Show Products
Route::get('/products', [ProductController::class, 'showAllProducts'])
    ->name('showProducts');

//Show Single Product
Route::get('/products/{id}', [ProductController::class, 'index'])
    ->name('showSingleProduct');