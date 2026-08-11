@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Ulasan & Balasan</h1>
            <p class="text-sm text-gray-500">Balas ulasan user tentang produk Anda.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl mb-4 text-sm font-medium">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="flex items-center gap-2.5 bg-red-50 border border-red-200 text-red-700 p-3.5 rounded-xl mb-4 text-sm font-medium">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Tab Kategori: Semua / Ikan / Tumbuhan -->
    <div class="flex items-center gap-2 mb-6 flex-wrap">
        @php
            $tabs = [
                'semua' => 'Semua ('. $countSemua .')',
                'ikan' => 'Ikan ('. $countIkan .')',
                'tumbuhan' => 'Tumbuhan ('. $countTumbuhan .')',
            ];
        @endphp
        @foreach($tabs as $key => $label)
            <a href="{{ route('admin.reviews.index', ['kategori' => $key]) }}"
               class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ $kategori === $key ? 'bg-emerald-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    @if($reviews->count() > 0)
        <div class="space-y-6">
            @foreach($reviews as $review)
                @php
                    $isIkan = $review->product->category->slug === 'ikan-cupang';
                @endphp
                <div class="border border-gray-200 rounded-2xl p-5">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 {{ $isIkan ? 'bg-cyan-100 text-cyan-700' : 'bg-emerald-100 text-emerald-700' }} rounded-full flex items-center justify-center font-bold uppercase">
                                {{ substr($review->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800 text-sm">{{ $review->name }}</div>
                                <div class="text-xs text-gray-400">{{ $review->created_at->format('d M Y H:i') }}</div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="flex items-center gap-0.5 text-amber-400 text-sm">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $review->rating ? '' : 'opacity-25' }}">★</span>
                                @endfor
                            </span>
                            @if($review->reply)
                                <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700">Sudah dibalas</span>
                            @else
                                <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-amber-100 text-amber-700">Belum dibalas</span>
                            @endif
                        </div>
                    </div>

                    <div class="text-xs text-gray-500 mb-2">
                        Produk: <a href="{{ route('products.show', $review->product->slug) }}" target="_blank" class="font-semibold text-emerald-600 hover:underline">{{ $review->product->name }}</a>
                        · {{ $review->product->category->name }}
                    </div>

                    <p class="text-sm text-gray-700 bg-gray-50 border border-gray-100 rounded-xl p-3 mb-4">
                        {{ $review->review ?: '(tanpa teks ulasan)' }}
                    </p>

                    @if($review->reply)
                        <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-3 mb-4">
                            <div class="text-xs font-bold text-emerald-700 mb-1">Balasan admin · {{ $review->reply_by }} · {{ $review->reply_at->format('d M Y H:i') }}</div>
                            <p class="text-sm text-gray-700">{{ $review->reply }}</p>
                        </div>
                        <div class="flex items-center gap-5">
                            <a href="{{ route('admin.reviews.editReply', $review->id) }}?kategori={{ $kategori }}" class="text-cyan-600 hover:text-cyan-800 font-semibold text-sm hover:underline transition">
                                Edit Balasan
                            </a>
                            <form action="{{ route('admin.reviews.deleteReply', $review->id) }}?kategori={{ $kategori }}" method="POST" onsubmit="return confirm('Hapus balasan untuk ulasan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-amber-600 hover:text-amber-800 font-semibold text-sm hover:underline transition">
                                    Hapus Balasan
                                </button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('admin.reviews.reply', $review->id) }}?kategori={{ $kategori }}" method="POST" class="space-y-2">
                            @csrf
                            <textarea name="reply" rows="2" required placeholder="Tulis balasan untuk ulasan ini..."
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('reply') }}</textarea>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition">
                                    Kirim Balasan
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    @else
        <div class="flex flex-col items-center gap-3 p-12 text-center border-2 border-dashed border-gray-200 rounded-2xl">
            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <p class="text-sm text-gray-400 font-medium">Belum ada ulasan pada kategori ini.</p>
        </div>
    @endif
</div>
@endsection
