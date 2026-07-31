<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\CategoryAdmin;

class DashboardController extends Controller
{
    public function index()
    {
        $totalArtikel = Article::count();
        $totalProduk = Product::count();
        $totalViews = Article::sum('views');

        $allArticles = Article::with('category')
            ->orderBy('views', 'desc')
            ->get();

        $allProducts = Product::with('category')
            ->orderBy('price', 'desc')
            ->get();

        $totalCategoryAdmins = CategoryAdmin::count();

        // Data stok untuk pie chart (hanya produk yang masih punya stok)
        $stockFish = Product::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%ikan%');
            })
            ->where('stock', '>', 0)
            ->orderBy('stock', 'desc')
            ->get(['name', 'stock']);

        $stockPlant = Product::with('category')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'like', '%tumbuhan%');
            })
            ->where('stock', '>', 0)
            ->orderBy('stock', 'desc')
            ->get(['name', 'stock']);

        return view('admin.dashboard', compact('totalArtikel', 'totalProduk', 'totalViews', 'totalCategoryAdmins', 'allArticles', 'allProducts', 'stockFish', 'stockPlant'));
    }
}