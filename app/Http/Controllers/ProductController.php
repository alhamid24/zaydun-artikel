<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexIkan()
    {
        $products = Product::with(['category', 'reviews'])
            ->whereHas('category', function ($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->latest()
            ->paginate(9);

        $totalProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->count();

        $topIds = Product::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->orderByDesc('views')->take(3)->pluck('id')->all();

        return view('produk.ikan', compact('products', 'totalProducts', 'topIds'));
    }

    public function indexTumbuhan()
    {
        $products = Product::with(['category', 'reviews'])
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->latest()
            ->paginate(9);

        $totalProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->count();

        $topIds = Product::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->orderByDesc('views')->take(3)->pluck('id')->all();

        return view('produk.tumbuhan', compact('products', 'totalProducts', 'topIds'));
    }

    public function show($slug)
    {
        $product = Product::with(['category', 'reviews'])
            ->where('slug', $slug)
            ->firstOrFail();

        $product->increment('views');

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

    public function review(Request $request, $slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|max:1000',
        ]);

        ProductReview::create([
            'product_id' => $product->id,
            'name' => $request->name,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('products.show', $product->slug)
            ->with('success', 'Terima kasih atas rating & ulasan Anda!');
    }
}
