<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Article;
use App\Models\CategoryAdmin;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function ikan(Request $request)
    {
        $tag = request('tag');
        $sort = $request->get('sort', 'terbaru');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $selectedSubcategories = (array) $request->input('subcategory', []);

        $articles = Article::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'ikan-cupang');
            })
            ->where('is_published', true)
            ->when($tag, function ($q) use ($tag) {
                $q->where('tag', $tag);
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $productsQuery = Product::with(['category', 'subcategory', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'ikan-cupang');
            });

        if ($request->filled('min_price')) {
            $min = (int) str_replace(['.', ','], '', $request->min_price);
            $productsQuery->where('price', '>=', $min);
        }

        if ($request->filled('max_price')) {
            $max = (int) str_replace(['.', ','], '', $request->max_price);
            $productsQuery->where('price', '<=', $max);
        }

        if (!empty($selectedSubcategories)) {
            $productsQuery->whereHas('subcategory', function ($q) use ($selectedSubcategories) {
                $q->whereIn('slug', $selectedSubcategories);
            });
        }

        switch ($sort) {
            case 'termurah':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'termahal':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'best-seller':
                $productsQuery->orderByDesc('reviews_avg_rating');
                break;
            default:
                $productsQuery->latest();
                break;
        }

        $products = $productsQuery->paginate(9)->withQueryString();
        $totalProducts = $products->total();

        $subcategories = Subcategory::whereHas('category', function ($q) {
            $q->where('slug', 'ikan-cupang');
        })->withCount('products')->get();

        $admins = CategoryAdmin::where('category', 'ikan')->latest()->get();

        return view('kategori.ikan', compact(
            'products', 'totalProducts', 'subcategories', 'admins', 'articles', 'tag',
            'minPrice', 'maxPrice', 'selectedSubcategories', 'sort'
        ));
    }

    public function tumbuhan(Request $request)
    {
        $tag = request('tag');
        $sort = $request->get('sort', 'terbaru');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $selectedSubcategories = (array) $request->input('subcategory', []);

        $articles = Article::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->where('is_published', true)
            ->when($tag, function ($q) use ($tag) {
                $q->where('tag', $tag);
            })
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $productsQuery = Product::with(['category', 'subcategory', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            });

        if ($request->filled('min_price')) {
            $min = (int) str_replace(['.', ','], '', $request->min_price);
            $productsQuery->where('price', '>=', $min);
        }

        if ($request->filled('max_price')) {
            $max = (int) str_replace(['.', ','], '', $request->max_price);
            $productsQuery->where('price', '<=', $max);
        }

        if (!empty($selectedSubcategories)) {
            $productsQuery->whereHas('subcategory', function ($q) use ($selectedSubcategories) {
                $q->whereIn('slug', $selectedSubcategories);
            });
        }

        switch ($sort) {
            case 'termurah':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'termahal':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'best-seller':
                $productsQuery->orderByDesc('reviews_avg_rating');
                break;
            default:
                $productsQuery->latest();
                break;
        }

        $products = $productsQuery->paginate(9)->withQueryString();
        $totalProducts = $products->total();

        $admins = CategoryAdmin::where('category', 'tumbuhan')->latest()->get();

        $subcategories = Subcategory::whereHas('category', function ($q) {
            $q->where('slug', 'tumbuh-tumbuhan');
        })->withCount('products')->get();

        return view('kategori.tumbuhan', compact(
            'articles', 'products', 'totalProducts', 'admins', 'tag', 'sort',
            'minPrice', 'maxPrice', 'selectedSubcategories', 'subcategories'
        ));
    }
}
