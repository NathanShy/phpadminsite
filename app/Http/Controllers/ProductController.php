<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function showAllProducts(){
        //$products = Product::get();
         $products = Product::where('user_id', Auth::user()->id)
             ->get(); 

        return view('products.show', [
            'products' => $products
        ]);
    }

    // public function singleProduct(){
    //     $products = Product::findOrFail($id);

    //     return view('products.showOne'), [
    //     ]
    // }

    public function createForm(){
        return view('products.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        
        $request->user()->products()->create([
            'name'  => $request->name,
            'category'  => $request->category,
            'date'  => $request->date,
            'description'  => $request->description,
        ]);

        return back();
        
    }

}
