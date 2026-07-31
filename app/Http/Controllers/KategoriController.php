<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryAdmin;
use App\Models\Product;

class KategoriController extends Controller
{
    public function ikan()
    {
        $tag = request('tag');

        $articles = Article::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->when($tag, function ($q) use ($tag) {
                $q->where('tag', $tag);
            })
            ->latest()
            ->paginate(9);

        $products = Product::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->latest()
            ->paginate(9);

        $totalArticles = Article::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->count();

        $totalProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->count();

        $avgReadingTime = round(Article::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->avg('reading_time') ?? 0);

        $admins = CategoryAdmin::where('category', 'ikan')->latest()->get();

        return view('kategori.ikan', compact(
            'articles', 'products',
            'totalArticles', 'totalProducts', 'avgReadingTime', 'admins', 'tag'
        ));
    }

    public function tumbuhan()
    {
        $tag = request('tag');

        $articles = Article::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->when($tag, function ($q) use ($tag) {
                $q->where('tag', $tag);
            })
            ->latest()
            ->paginate(9);

        $products = Product::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->latest()
            ->paginate(9);

        $totalArticles = Article::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->count();

        $totalProducts = Product::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->count();

        $avgReadingTime = round(Article::whereHas('category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->avg('reading_time') ?? 0);

        $admins = CategoryAdmin::where('category', 'tumbuhan')->latest()->get();

        return view('kategori.tumbuhan', compact(
            'articles', 'products',
            'totalArticles', 'totalProducts', 'avgReadingTime', 'admins', 'tag'
        ));
    }
}
