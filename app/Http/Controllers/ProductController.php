<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(3)
            ->get();

        return view('produk.show', compact('product', 'relatedProducts'));
    }

    public function order($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        return view('produk.order', compact('product'));
    }
}
