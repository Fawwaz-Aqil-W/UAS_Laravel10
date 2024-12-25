<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        
        $products = $query->get();
        return view('index', compact('products'));
    }
}