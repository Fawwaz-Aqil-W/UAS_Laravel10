<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'nullable|image',
            'image_url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        Product::create($validated);
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lt:price',
            'category' => 'required',
            'image' => 'nullable|image',
            'image_url' => 'nullable|url',
        ]);
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }
    
        $product->update($validated);
        return redirect()->route('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}