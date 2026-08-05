@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 max-w-2xl">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Balasan</h1>
            <p class="text-sm text-gray-500">Perbarui balasan untuk ulasan user.</p>
        </div>
        <a href="{{ route('admin.reviews.index', ['kategori' => request('kategori', 'semua')]) }}" class="text-gray-500 hover:text-gray-700 font-semibold text-sm transition">
            ← Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm font-medium">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 mb-5">
        <div class="flex items-center gap-2 mb-2">
            <div class="w-9 h-9 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center font-bold uppercase">
                {{ substr($review->name, 0, 1) }}
            </div>
            <div>
                <div class="font-semibold text-gray-800 text-sm">{{ $review->name }}</div>
                <div class="text-xs text-gray-400">{{ $review->created_at->format('d M Y H:i') }}</div>
            </div>
        </div>
        <div class="text-xs text-gray-500 mb-2">
            Produk: <span class="font-semibold text-gray-800">{{ $review->product->name }}</span>
            · {{ $review->product->category->name }}
        </div>
        <p class="text-sm text-gray-700 bg-white border border-gray-100 rounded-xl p-3">
            {{ $review->review ?: '(tanpa teks ulasan)' }}
        </p>
    </div>

    <form action="{{ route('admin.reviews.updateReply', $review->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="kategori" value="{{ request('kategori', 'semua') }}">

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Balasan</label>
            <textarea name="reply" rows="4" required maxlength="1000" placeholder="Tulis balasan untuk ulasan ini..."
                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('reply', $review->reply) }}</textarea>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition">
                Simpan Balasan
            </button>
            <a href="{{ route('admin.reviews.index', ['kategori' => request('kategori', 'semua')]) }}" class="text-gray-500 hover:text-gray-700 font-semibold text-sm transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
