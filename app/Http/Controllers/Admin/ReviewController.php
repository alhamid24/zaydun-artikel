<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->query('kategori', 'semua');

        $reviews = ProductReview::with(['product.category'])
            ->when($kategori === 'ikan', function ($q) {
                $q->whereHas('product.category', function ($query) {
                    $query->where('slug', 'like', '%ikan%');
                });
            })
            ->when($kategori === 'tumbuhan', function ($q) {
                $q->whereHas('product.category', function ($query) {
                    $query->where('slug', 'like', '%tumbuhan%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $countSemua = ProductReview::count();
        $countIkan = ProductReview::whereHas('product.category', function ($q) {
            $q->where('slug', 'like', '%ikan%');
        })->count();
        $countTumbuhan = ProductReview::whereHas('product.category', function ($q) {
            $q->where('slug', 'like', '%tumbuhan%');
        })->count();

        return view('admin.reviews.index', compact('reviews', 'kategori', 'countSemua', 'countIkan', 'countTumbuhan'));
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|max:1000',
        ]);

        $review = ProductReview::findOrFail($id);

        $review->update([
            'reply' => $request->reply,
            'reply_by' => Auth::user()->name,
            'reply_at' => now(),
        ]);

        return redirect()->route('admin.reviews.index', ['kategori' => $request->input('kategori', 'semua')])
            ->with('success', 'Balasan untuk ulasan dari "'.$review->name.'" berhasil disimpan!');
    }

    public function editReply($id)
    {
        $review = ProductReview::with('product.category')->findOrFail($id);
        return view('admin.reviews.editReply', compact('review'));
    }

    public function updateReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|max:1000',
        ]);

        $review = ProductReview::findOrFail($id);

        $review->update([
            'reply' => $request->reply,
            'reply_by' => Auth::user()->name,
            'reply_at' => now(),
        ]);

        return redirect()->route('admin.reviews.index', ['kategori' => $request->input('kategori', 'semua')])
            ->with('success', 'Balasan untuk ulasan dari "'.$review->name.'" berhasil disimpan!');
    }

    public function deleteReply(Request $request, $id)
    {
        $review = ProductReview::findOrFail($id);

        $review->update([
            'reply' => null,
            'reply_by' => null,
            'reply_at' => null,
        ]);

        return redirect()->route('admin.reviews.index', ['kategori' => $request->input('kategori', 'semua')])
            ->with('success', 'Balasan untuk ulasan dari "'.$review->name.'" berhasil dihapus!');
    }
}
