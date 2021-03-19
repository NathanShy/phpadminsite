<?php

//namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Product;


class ListProductsController extends Controller
{
    public function index() {
        return ListProductsResource::collection(Product::all());
    }
}
