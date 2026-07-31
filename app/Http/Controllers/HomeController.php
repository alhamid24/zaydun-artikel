<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Artikel & Produk khusus IKAN CUPANG
        $articlesFish = Article::with('category')
            ->whereHas('category', function($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->latest()
            ->take(3)
            ->get();

        $productsFish = Product::with('category')
            ->whereHas('category', function($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->latest()
            ->take(3)
            ->get();

        // 2. Artikel & Produk khusus TUMBUH-TUMBUHAN (Mencakup 'tumbuhan' atau 'tumbuh-tumbuhan')
        $articlesPlant = Article::with('category')
            ->whereHas('category', function($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->latest()
            ->take(3)
            ->get();

        $productsPlant = Product::with('category')
            ->whereHas('category', function($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact(
            'articlesFish', 'productsFish',
            'articlesPlant', 'productsPlant'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        $articles = Article::with('category')
            ->where('is_published', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(9)
            ->appends(['q' => $query]);

        $products = Product::with('category')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(9)
            ->appends(['q' => $query]);

        return view('search', compact('articles', 'products', 'query'));
    }
}