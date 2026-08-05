<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexIkan(Request $request)
    {
        $sort = $request->query('sort', 'terbaru');
        if (!in_array($sort, ['terbaru', 'termurah', 'termahal', 'best-seller'])) {
            $sort = 'terbaru';
        }

        $products = Product::with(['category', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->when($sort === 'termurah', fn ($q) => $q->orderBy('price', 'asc'))
            ->when($sort === 'termahal', fn ($q) => $q->orderBy('price', 'desc'))
            ->when($sort === 'best-seller', fn ($q) => $q->orderByDesc('reviews_avg_rating'))
            ->when($sort === 'terbaru', fn ($q) => $q->latest())
            ->paginate(9)
            ->withQueryString();

        $totalProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->count();

        $topIds = Product::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(3)
            ->pluck('id')
            ->all();

        return view('produk.ikan', compact('products', 'totalProducts', 'topIds', 'sort'));
    }

    public function indexTumbuhan(Request $request)
    {
        $sort = $request->query('sort', 'terbaru');
        if (!in_array($sort, ['terbaru', 'termurah', 'termahal', 'best-seller'])) {
            $sort = 'terbaru';
        }

        $products = Product::with(['category', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->when($sort === 'termurah', fn ($q) => $q->orderBy('price', 'asc'))
            ->when($sort === 'termahal', fn ($q) => $q->orderBy('price', 'desc'))
            ->when($sort === 'best-seller', fn ($q) => $q->orderByDesc('reviews_avg_rating'))
            ->when($sort === 'terbaru', fn ($q) => $q->latest())
            ->paginate(9)
            ->withQueryString();

        $totalProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->count();

        $topIds = Product::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->take(3)
            ->pluck('id')
            ->all();

        return view('produk.tumbuhan', compact('products', 'totalProducts', 'topIds', 'sort'));
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
