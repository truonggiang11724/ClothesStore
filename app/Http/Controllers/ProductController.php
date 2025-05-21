<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('pages.product', compact('products'));
        
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.detailproduct', compact('product'));
    }
}
