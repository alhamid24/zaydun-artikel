<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PublicArtikelController extends Controller
{
    public function index()
    {
        $articlesFish = Article::with('category')
            ->whereHas('category', fn($q) => $q->where('slug', 'ikan-cupang'))
            ->where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        $articlesPlant = Article::with('category')
            ->whereHas('category', fn($q) => $q->where('slug', 'like', '%tumbuhan%'))
            ->where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        return view('artikel.index', compact('articlesFish', 'articlesPlant'));
    }
}
