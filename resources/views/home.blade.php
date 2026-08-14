<x-layout title="Ikan Cupang - Zaydun" theme="ikan">
    
<!-- ALERT PENCARIAN -->
@if(request('q'))
        <div class="max-w-6xl mx-auto px-4 mt-6">
            <div class="bg-cyan-50 border border-cyan-200 text-cyan-800 px-4 py-3 rounded-2xl flex justify-between items-center text-sm">
                <span>Hasil pencarian untuk: <strong>"{{ request('q') }}"</strong></span>
                <a href="{{ url('/') }}" class="text-xs text-cyan-600 hover:underline font-semibold">Hapus Pencarian</a>
            </div>
        </div>
    @endif

    <!-- MAIN CONTENT -->
    <main class="max-w-6xl mx-auto px-4 py-8 space-y-16 flex-1 w-full">

    

        <!-- GATEWAY CATEGORIES -->
        <section class="reveal">
            <h2 class="text-center font-extrabold text-lg text-slate-800 mb-8 uppercase tracking-wider">Pilih Hobi Anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-3xl mx-auto">

                <!-- Card Ikan Cupang -->
                <a href="{{ route('kategori.ikan') }}" class="z-card group bg-gradient-to-br from-cyan-50 to-white border-2 border-cyan-200 rounded-3xl p-8 text-center flex flex-col items-center justify-between hover:border-cyan-500 hover:shadow-lg transition-all duration-300">
                    <div class="w-20 h-20 bg-cyan-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-icon name="fish" class="w-10 h-10 text-cyan-500" />
                    </div>
                    <h3 class="font-extrabold text-slate-800 text-lg mb-2">IKAN CUPANG</h3>
                    <p class="text-xs text-slate-500 mb-4">Tips perawatan & produk unggulan</p>
                    <span class="bg-cyan-600 text-white text-xs font-bold px-6 py-2.5 rounded-full group-hover:bg-cyan-700 transition shadow-sm">
                        Jelajahi →
                    </span>
                </a>

                <!-- Card Tumbuhan -->
                <a href="{{ route('kategori.tumbuhan') }}" class="z-card group bg-gradient-to-br from-emerald-50 to-white border-2 border-emerald-200 rounded-3xl p-8 text-center flex flex-col items-center justify-between hover:border-emerald-500 hover:shadow-lg transition-all duration-300">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <x-icon name="sprout" class="w-10 h-10 text-emerald-500" />
                    </div>
                    <h3 class="font-extrabold text-slate-800 text-lg mb-2">TUMBUH-TUMBUHAN</h3>
                    <p class="text-xs text-slate-500 mb-4">Panduan tanam & produk berkualitas</p>
                    <span class="bg-emerald-600 text-white text-xs font-bold px-6 py-2.5 rounded-full group-hover:bg-emerald-700 transition shadow-sm">
                        Jelajahi →
                    </span>
                </a>

            </div>
        </section>

        <!-- ================= SEKSI 1: IKAN CUPANG ================= -->
        <section id="ikan-cupang" class="pt-8">
            <div class="flex flex-col items-center text-center gap-3 mb-8 reveal">
                <div class="w-12 h-12 bg-cyan-100 rounded-2xl flex items-center justify-center">
                    <x-icon name="fish" class="w-6 h-6 text-cyan-500" />
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800 uppercase tracking-wider">IKAN CUPANG</h2>
                    <p class="text-xs text-slate-500">Artikel & produk seputar ikan cupang</p>
                </div>
            </div>

            <!-- Produk Best Seller Ikan -->
            <div class="mb-8 reveal">
                <div class="flex items-center justify-between gap-3 mb-4 flex-wrap">
                    <h3 class="font-bold text-cyan-700 text-sm uppercase tracking-wide flex items-center gap-2">
                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                        Produk Best Seller
                    </h3>
                    <span class="text-[10px] font-black uppercase tracking-wider bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full inline-flex items-center gap-1"><x-icon name="star" class="w-3 h-3" /> Paling Laris</span>
                </div>
                @if($bestSellerFish->count() > 0)
                    <div class="flex gap-5 overflow-x-auto scrollbar-thin scrollbar-thumb-cyan-300 scrollbar-track-cyan-100">
                        @foreach($bestSellerFish as $product)
                            <div class="min-w-[250px] z-card relative bg-white rounded-2xl border border-amber-200 overflow-hidden hover:border-amber-400 hover:shadow-lg transition-all duration-300 group">
                                <span class="absolute top-3 left-3 z-10 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow inline-flex items-center gap-1"><x-icon name="star" class="w-3 h-3" /> Best Seller</span>
                                <x-stock-badge :product="$product" />
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                        <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                </a>
                                <div class="p-4 space-y-3">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <h3 class="font-bold text-slate-800 text-sm line-clamp-2 hover:text-cyan-600 transition">{{ $product->name }}</h3>
                                    </a>
                                    <div class="flex items-center gap-1.5 text-xs text-slate-500 flex-wrap">
                                        <span class="whitespace-nowrap inline-flex items-center gap-0.5">
                                            @for($i = 1; $i <= 5; $i++)
                                                <x-icon :name="$i <= round($product->averageRating()) ? 'star' : 'star-outline'" :class="$i <= round($product->averageRating()) ? 'w-3.5 h-3.5 text-amber-400' : 'w-3.5 h-3.5 text-slate-300'" />
                                            @endfor
                                        </span>
                                        <span class="font-bold text-slate-700">{{ number_format($product->averageRating(), 1, ',', '.') }}</span>
                                        <span>({{ $product->reviewsCount() }} ulasan)</span>
                                        <span class="text-slate-400 inline-flex items-center gap-1"><x-icon name="eye" class="w-4 h-4" /> {{ $product->views }}</span>
                                    </div>
                                    <p class="text-cyan-600 font-black text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('products.order', $product->slug) }}" class="z-btn block w-full text-center bg-cyan-50 text-cyan-700 text-xs font-bold px-4 py-2.5 rounded-xl border border-cyan-200 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition">
                                        <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Beli via WhatsApp
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="min-w-[250px] z-card relative bg-white rounded-2xl border border-amber-200 overflow-hidden hover:border-amber-400 hover:shadow-lg transition-all duration-300 group">
                            <a href="{{ route('products.ikan') }}" class="flex flex-col items-center justify-center h-full p-4">
                                <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center mb-3">
                                    <x-icon name="arrow-right" class="w-6 h-6 text-cyan-500" />
                                </div>
                                <span class="text-sm font-bold text-cyan-600">Lihat Semua Produk</span>
                            </div>
                        </div>
                @else
                    <div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">Belum ada produk Best Seller Ikan Cupang.</div>
                @endif
            </div>

            <!-- Artikel Ikan Cupang -->
            <div class="reveal">
                <h3 class="font-bold text-cyan-700 text-sm uppercase tracking-wide flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 bg-cyan-500 rounded-full"></span>
                    Artikel Terbaru
                </h3>
                @if($articlesFish->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach($articlesFish as $article)
                            <a href="{{ route('articles.show', $article->slug) }}" class="z-card bg-white rounded-2xl border border-cyan-200 overflow-hidden hover:border-cyan-400 hover:shadow-lg transition-all duration-300 group">
                                <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                    <img loading="lazy" decoding="async" src="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 space-y-3">
                                    <span class="inline-block text-xs text-cyan-600 font-semibold bg-cyan-50 px-2.5 py-1 rounded-full">Ikan Cupang</span>
                                    <h4 class="font-bold text-slate-800 text-sm line-clamp-2 group-hover:text-cyan-600 transition">{{ $article->title }}</h4>
                                    <div class="flex items-center gap-3 text-xs text-slate-400">
                                        <span class="inline-flex items-center gap-1"><x-icon name="clock" class="w-4 h-4" /> {{ $article->reading_time }} mnt baca</span>
                                        <span>•</span>
                                        <span class="inline-flex items-center gap-1"><x-icon name="eye" class="w-4 h-4" /> {{ $article->views ?? 0 }} dilihat</span>
                                    </div>
                                    <span class="z-btn block w-full text-center bg-cyan-50 text-cyan-700 text-xs font-bold px-4 py-2.5 rounded-xl border border-cyan-200 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition">
                                        <x-icon name="book-open" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Baca Selengkapnya
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">Belum ada artikel Ikan Cupang.</div>
                @endif
            </div>
        </section>

        <!-- ================= SEKSI 2: TUMBUH-TUMBUHAN ================= -->
        <section id="tumbuhan" class="pt-8 border-t border-slate-200">
            <div class="flex flex-col items-center text-center gap-3 mb-8 reveal">
                <div class="w-12 h-12 bg-emerald-100 rounded-2xl flex items-center justify-center">
                    <x-icon name="sprout" class="w-6 h-6 text-emerald-500" />
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-slate-800 uppercase tracking-wider">TUMBUH-TUMBUHAN</h2>
                    <p class="text-xs text-slate-500">Artikel & produk seputar tumbuhan</p>
                </div>
            </div>

            <!-- Produk Best Seller Tumbuhan -->
            <div class="mb-8 reveal">
                <div class="flex items-center justify-between gap-3 mb-4 flex-wrap">
                    <h3 class="font-bold text-emerald-700 text-sm uppercase tracking-wide flex items-center gap-2">
                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                        Produk Best Seller
                    </h3>
                    <span class="text-[10px] font-black uppercase tracking-wider bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full inline-flex items-center gap-1"><x-icon name="star" class="w-3 h-3" /> Paling Laris</span>
                </div>
                @if($bestSellerPlant->count() > 0)
                    <div class="flex gap-5 overflow-x-auto scrollbar-thin scrollbar-thumb-cyan-300 scrollbar-track-cyan-100">
                        @foreach($bestSellerPlant as $product)
                            <div class="min-w-[250px] z-card relative bg-white rounded-2xl border border-amber-200 overflow-hidden hover:border-amber-400 hover:shadow-lg transition-all duration-300 group">
                                <span class="absolute top-3 left-3 z-10 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow inline-flex items-center gap-1"><x-icon name="star" class="w-3 h-3" /> Best Seller</span>
                                <x-stock-badge :product="$product" />
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                        <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    </div>
                                </a>
                                <div class="p-4 space-y-3">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <h3 class="font-bold text-slate-800 text-sm line-clamp-2 hover:text-emerald-600 transition">{{ $product->name }}</h3>
                                    </a>
                                    <div class="flex items-center gap-1.5 text-xs text-slate-500 flex-wrap">
                                        <span class="whitespace-nowrap inline-flex items-center gap-0.5">
                                            @for($i = 1; $i <= 5; $i++)
                                                <x-icon :name="$i <= round($product->averageRating()) ? 'star' : 'star-outline'" :class="$i <= round($product->averageRating()) ? 'w-3.5 h-3.5 text-amber-400' : 'w-3.5 h-3.5 text-slate-300'" />
                                            @endfor
                                        </span>
                                        <span class="font-bold text-slate-700">{{ number_format($product->averageRating(), 1, ',', '.') }}</span>
                                        <span>({{ $product->reviewsCount() }} ulasan)</span>
                                        <span class="text-slate-400 inline-flex items-center gap-1"><x-icon name="eye" class="w-4 h-4" /> {{ $product->views }}</span>
                                    </div>
                                    <p class="text-emerald-600 font-black text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('products.order', $product->slug) }}" class="z-btn block w-full text-center bg-emerald-50 text-emerald-700 text-xs font-bold px-4 py-2.5 rounded-xl border border-emerald-200 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition">
                                        <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Beli via WhatsApp
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="min-w-[250px] z-card relative bg-white rounded-2xl border border-amber-200 overflow-hidden hover:border-amber-400 hover:shadow-lg transition-all duration-300 group">
                            <a href="{{ route('products.tumbuhan') }}" class="flex flex-col items-center justify-center h-full p-4">
                                <div class="w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center mb-3">
                                    <x-icon name="arrow-right" class="w-6 h-6 text-cyan-500" />
                                </div>
                                <span class="text-sm font-bold text-cyan-600">Lihat Semua Produk</span>
                            </div>
                        </div>

                    </div>
                @else
                    <div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">Belum ada produk Best Seller Tumbuhan.</div>
                @endif
            </div>

            <!-- Artikel Tumbuhan -->
            <div class="reveal">
                <h3 class="font-bold text-emerald-700 text-sm uppercase tracking-wide flex items-center gap-2 mb-4">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                    Artikel Terbaru
                </h3>
                @if($articlesPlant->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        @foreach($articlesPlant as $article)
                            <a href="{{ route('articles.show', $article->slug) }}" class="z-card bg-white rounded-2xl border border-emerald-200 overflow-hidden hover:border-emerald-400 hover:shadow-lg transition-all duration-300 group">
                                <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                    <img loading="lazy" decoding="async" src="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="p-4 space-y-3">
                                    <span class="inline-block text-xs text-emerald-600 font-semibold bg-emerald-50 px-2.5 py-1 rounded-full">Tumbuhan</span>
                                    <h4 class="font-bold text-slate-800 text-sm line-clamp-2 group-hover:text-emerald-600 transition">{{ $article->title }}</h4>
                                    <div class="flex items-center gap-3 text-xs text-slate-400">
                                        <span class="inline-flex items-center gap-1"><x-icon name="clock" class="w-4 h-4" /> {{ $article->reading_time }} mnt baca</span>
                                        <span>•</span>
                                        <span class="inline-flex items-center gap-1"><x-icon name="eye" class="w-4 h-4" /> {{ $article->views ?? 0 }} dilihat</span>
                                    </div>
                                    <span class="z-btn block w-full text-center bg-emerald-50 text-emerald-700 text-xs font-bold px-4 py-2.5 rounded-xl border border-emerald-200 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition">
                                        <x-icon name="book-open" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Baca Selengkapnya
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">Belum ada artikel Tumbuhan.</div>
                @endif
            </div>
        </section>

        <!-- CTA WHATSAPP -->
        <section class="max-w-6xl mx-auto px-4 mt-16 mb-8 reveal">
            <div class="relative rounded-3xl overflow-hidden shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-br from-teal-500 to-emerald-700"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.06%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-40"></div>
                <div class="relative z-10 py-12 px-6 text-center">
                    <div class="mb-4"><x-icon name="wa" class="w-10 h-10 mx-auto text-white" /></div>
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-3">Siap memulai hobi Anda?</h2>
                    <p class="text-emerald-100 text-sm md:text-base mb-6 max-w-xl mx-auto">
                        Tim Zaydun siap membantu Anda memilih produk atau memberikan tips perawatan terbaik.
                    </p>
                    <a href="https://wa.me/{{ default_wa_number() }}" target="_blank" rel="noopener noreferrer" class="z-btn inline-flex items-center gap-2 bg-white text-emerald-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-emerald-50 shadow-lg transition active:scale-95">
                        <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Pesan via WhatsApp →
                    </a>
                </div>
            </div>
        </section>
</x-layout>