<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Product;


class ListProductsController extends Controller
{
    public function __construct() {
    $this->middleware('auth:api');
    }


    public function index() {
        return Product::all();
    }
}