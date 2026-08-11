<x-layout title="search" theme="search">
    <main class="max-w-6xl mx-auto px-4 py-10 flex-1 w-full">
        <div class="mb-8 reveal">
            <h1 class="text-2xl font-extrabold text-slate-800">Hasil Pencarian</h1>
            <p class="text-sm text-slate-500 mt-1">
                Menampilkan hasil untuk: <strong class="text-teal-600">"{{ $query }}"</strong>
            </p>
        </div>

        {{-- Hasil Artikel --}}
        @if($articles->count() > 0)
            <div class="mb-10 reveal">
                <h2 class="font-bold text-teal-700 text-sm uppercase tracking-wide flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 bg-teal-500 rounded-full"></span> Artikel ({{ $articles->total() }})
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', $article->slug) }}" class="z-card bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md hover:border-teal-300 transition-all duration-200 group">
                            <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                <img loading="lazy" decoding="async" src="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-4">
                                <span class="text-xs font-bold text-teal-600 uppercase">{{ $article->category->name }}</span>
                                <h3 class="font-bold text-slate-800 text-sm mt-1.5 line-clamp-2 group-hover:text-teal-600 transition">{{ $article->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-6">{{ $articles->links() }}</div>
            </div>
        @endif

        {{-- Hasil Produk --}}
        @if($products->count() > 0)
            <div class="mb-10 reveal">
                <h2 class="font-bold text-teal-700 text-sm uppercase tracking-wide flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 bg-teal-500 rounded-full"></span> Produk ({{ $products->total() }})
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <a href="{{ route('products.show', $product->slug) }}" class="z-card bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-teal-400 hover:shadow-lg transition-all duration-300 group">
                            <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-4 space-y-2">
                                <h4 class="font-bold text-slate-800 text-sm line-clamp-2 group-hover:text-teal-600 transition">{{ $product->name }}</h4>
                                <p class="text-teal-600 font-black text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-6">{{ $products->links() }}</div>
            </div>
        @endif

        @if($articles->count() === 0 && $products->count() === 0)
            <div class="p-12 text-center text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200 reveal">
                <div class="mb-3"><x-icon name="search" class="w-12 h-12 mx-auto text-slate-300" /></div>
                <p class="font-semibold text-slate-600 mb-1">Tidak ada hasil ditemukan</p>
                <p class="text-sm">Coba kata kunci lain atau kunjungi <a href="{{ route('home') }}" class="text-teal-600 hover:underline">beranda</a>.</p>
            </div>
        @endif
    </main>
</x-layout>
