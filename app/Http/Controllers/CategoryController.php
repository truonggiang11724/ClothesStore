<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('pages.category', compact('products'));
    }
}
