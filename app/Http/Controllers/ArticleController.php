<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($slug)
    {
        // 1. Cari artikel berdasarkan slug yang dipublikasikan
        $article = Article::with('category')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        // otomatis tambah 1 view setiap kali di buka
        $article->increment('views');
        // 2. Ambil artikel terkait untuk rekomendasi
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        // 3. Kirim data ke tampilan detail artikel
        return view('admin.articles.show', compact('article', 'relatedArticles'));
    }
}