<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;

class ArticleController extends Controller
{
    // 1. Tampilkan Daftar Artikel
    public function index()
    {
        $articles = Article::with('category')->latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    // 2. Tampilkan Form Tambah Artikel
    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    // 3. Simpan Artikel Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle Upload Gambar Thumbnail
        $imageName = time().'.'.$request->thumbnail->extension();  
        $request->thumbnail->move(public_path('uploads/thumbnails'), $imageName);

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'tag' => $request->tag,
            'content' => $request->content,
            'reading_time' => $this->calculateReadingTime($request->content),
            'thumbnail' => $imageName,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect('admin/articles')->with('success', 'Artikel berhasil ditambahkan!');
    }

    private function calculateReadingTime($content)
    {
        $text = strip_tags($content);
        $words = count(preg_split('/\s+/', trim($text)));
        return max(1, ceil($words / 200));
    }

    // 4. Tampilkan Form Edit Artikel
    public function edit($id)
    {
        $article = Article::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    // 5. Simpan Perubahan Artikel
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $article = Article::findOrFail($id);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'tag' => $request->tag,
            'content' => $request->content,
            'reading_time' => $this->calculateReadingTime($request->content),
            'is_published' => $request->has('is_published'),
        ];

        // Jika thumbnail diganti, upload yang baru lalu hapus yang lama
        if ($request->hasFile('thumbnail')) {
            if (file_exists(public_path('uploads/thumbnails/'.$article->thumbnail))) {
                unlink(public_path('uploads/thumbnails/'.$article->thumbnail));
            }
            $imageName = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('uploads/thumbnails'), $imageName);
            $data['thumbnail'] = $imageName;
        }

        $article->update($data);

        return redirect('admin/articles')->with('success', 'Artikel "'.$article->title.'" berhasil diperbarui!');
    }

    // 6. Hapus Artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        // Hapus file fisik gambar jika ada
        if(file_exists(public_path('uploads/thumbnails/'.$article->thumbnail))){
            unlink(public_path('uploads/thumbnails/'.$article->thumbnail));
        }
        $article->delete();

        return redirect('admin/articles')->with('success', 'Artikel berhasil dihapus!');
    }
    public function importWord(Request $request)
    {
        $request->validate([
            'word_file' => 'required|mimes:docx|max:5120', // Maksimal 5MB
        ]);

        $file = $request->file('word_file');
    
        // Membaca file Word
        $phpWord = IOFactory::load($file->getRealPath());
        $text = '';

        // Mengambil semua teks dari setiap paragraf di dalam file Word
        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getText')) {
                    $text .= $element->getText() . "\n";
                } elseif (method_exists($element, 'getElements')) {
                    // Untuk menangani teks di dalam tabel atau wadah lain jika ada
                    foreach ($element->getElements() as $childElement) {
                        if (method_exists($childElement, 'getText')) {
                        $text .= $childElement->getText() . "\n";
                        }
                    }
                }
            }
    }

    // Mengembalikan teks berupa response JSON agar bisa ditangkap oleh JavaScript
    return response()->json(['text' => trim($text)]);
    }
}