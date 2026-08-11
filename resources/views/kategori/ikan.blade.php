<x-layout title="Ikan Cupang - Zaydun" theme="ikan">
    
<!-- KATALOG PRODUK SHOP PAGE -->
<section class="max-w-[1400px] mx-auto px-4 mt-8 mb-16">
    <div class="flex flex-col md:flex-row gap-8">
        
        <!-- SIDEBAR KIRI (Filter & Kategori) -->
        <aside class="w-full md:w-64 shrink-0 space-y-10">
            
            <!-- Filter Harga -->
            <div>
                <h3 class="font-bold text-slate-800 mb-6 uppercase text-sm tracking-wider">Filter Harga</h3>
                
                <!-- Visual Slider (Mockup) -->
                <div class="relative w-full h-1 bg-slate-200 rounded-full mb-6 mt-2">
                    <!-- Garis rentang warna -->
                    <div class="absolute left-[0%] right-[30%] h-full bg-slate-800 rounded-full"></div>
                    <!-- Handle Kiri -->
                    <div class="absolute left-[0%] top-1/2 -translate-y-1/2 w-3.5 h-3.5 bg-slate-800 border-2 border-white rounded-full cursor-pointer shadow-sm"></div>
                    <!-- Handle Kanan -->
                    <div class="absolute right-[30%] top-1/2 -translate-y-1/2 w-3.5 h-3.5 bg-slate-800 border-2 border-white rounded-full cursor-pointer shadow-sm"></div>
                </div>
<<<<<<< Updated upstream

                <div class="text-sm text-slate-500 mb-4">
                    Harga: <span class="font-bold text-slate-800">Rp0</span> — <span class="font-bold text-slate-800">Rp3.500.000</span>
                </div>
                
                <button class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs px-5 py-2 rounded transition">
                    SARING
                </button>
            </div>

            <!-- Kategori Produk -->
            <div>
                <h3 class="font-bold text-slate-800 mb-5 uppercase text-sm tracking-wider">Kategori Produk</h3>
                <ul class="space-y-3.5 text-sm font-medium text-slate-500">
                    <li><a href="#" class="hover:text-cyan-600 transition">Palmas</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Arwana</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Channa</a></li>
                    <li><a href="#" class="text-cyan-700 font-bold">Cupang</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Danio</a></li>
                    <li><a href="#" class="hover:text-cyan-600 transition">Discuss</a></li>
                </ul>
            </div>
            
        </aside>

        <!-- KONTEN KANAN (Produk) -->
        <div class="flex-1">
            
            <!-- Top Bar Navigasi & Urutkan -->
            <div class="flex flex-col lg:flex-row lg:items-center justify-between border-b border-slate-200 pb-4 mb-8 gap-4">
                
                <!-- Breadcrumb -->
                <div class="text-sm text-slate-500">
                    <a href="#" class="hover:text-cyan-600">Beranda</a> <span class="mx-1">/</span> <span class="text-slate-800 font-semibold">Produk</span>
                </div>

                <!-- Tools Kanan -->
                <div class="flex items-center gap-5 text-sm text-slate-600">
                    <div class="hidden sm:block">Tampilkan : All</div>
                    
                    <!-- View Icons -->
                    <div class="flex items-center gap-2 border-x border-slate-200 px-5">
                        <button class="text-slate-800" title="Grid View">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        </button>
                        <button class="text-slate-300 hover:text-slate-800 transition" title="List View">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>

                    <!-- Dropdown Urutkan -->
                    <div class="relative" x-data="{ sortOpen: false }">
                        <button @click="sortOpen = !sortOpen" @click.away="sortOpen = false" class="flex items-center gap-1 font-semibold text-slate-700 border-b border-slate-800 pb-0.5 hover:text-cyan-700 transition">
                            Urutkan menurut yang <svg class="w-4 h-4 transition-transform" :class="sortOpen && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <!-- Isi Dropdown -->
                        <div x-show="sortOpen" x-transition class="absolute right-0 mt-2 w-48 bg-white border border-slate-100 rounded-lg shadow-lg z-20 py-1" style="display: none;">
                            <a href="#" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Terbaru</a>
                            <a href="#" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Harga Terendah</a>
                            <a href="#" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Harga Tertinggi</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid Katalog Produk -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Produk 1 -->
                <div class="bg-white rounded-xl p-3 flex flex-col items-center text-center relative group hover:-translate-y-1 transition-transform duration-300">
                    <div class="aspect-square w-full mb-3 flex items-center justify-center p-2">
                        <img src="https://images.unsplash.com/photo-1524704654690-b56c05c78a00?q=80&w=300&auto=format&fit=crop" alt="Promo Ikan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 rounded-lg">
                    </div>
<<<<<<< Updated upstream
                    <h3 class="font-bold text-slate-800 text-sm leading-snug line-clamp-2 mb-1 group-hover:text-cyan-700 transition">Promo Ikan Gratis (Bonus Pembelian Ikan)</h3>
                    <p class="text-xs text-slate-400 mb-2">Cupang</p>
                    <div class="flex gap-0.5 text-yellow-400 mb-3">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    </div>
                    <div class="mt-auto text-slate-800 font-bold">
                        Rp0
=======
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- PRODUK IKAN CUPANG -->
        <section class="max-w-6xl mx-auto px-4 mt-14">
            <div class="flex items-center gap-3 mb-8 reveal">
                <div class="w-10 h-10 bg-cyan-100 rounded-xl flex items-center justify-center"><x-icon name="shopping-cart" class="w-5 h-5 text-cyan-600" /></div>
                <div>
                    <h2 class="text-lg font-extrabold text-slate-800">Produk Ikan Cupang</h2>
                    <p class="text-xs text-slate-500">Kebutuhan lengkap untuk cupang kesayangan</p>
                </div>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 reveal">
                    @foreach($products as $product)
                        <div class="z-card bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-cyan-400 hover:shadow-lg transition-all duration-300 group">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                    <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            </a>
                            <div class="p-4 space-y-3">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <h3 class="font-bold text-slate-800 text-sm line-clamp-2 hover:text-cyan-600 transition">{{ $product->name }}</h3>
                                </a>
                                <p class="text-cyan-600 font-black text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.order', $product->slug) }}" class="z-btn block w-full text-center bg-cyan-50 text-cyan-700 text-xs font-bold px-4 py-2.5 rounded-xl border border-cyan-200 hover:bg-cyan-600 hover:text-white hover:border-cyan-600 transition">
                                    <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Beli via WhatsApp
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">{{ $products->links() }}</div>
            @else
                <div class="p-12 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                    Belum ada produk Ikan Cupang.
                </div>
            @endif
        </section>

        <!-- ARTIKEL IKAN CUPANG -->
        <section class="max-w-6xl mx-auto px-4 mt-14">
            <div class="flex items-center gap-3 mb-8 reveal">
                <div class="w-10 h-10 bg-cyan-100 rounded-xl flex items-center justify-center"><x-icon name="document-text" class="w-5 h-5 text-cyan-600" /></div>
                <div class="flex-1">
                    <h2 class="text-lg font-extrabold text-slate-800">
                        @if($tag == 'pembenihan-ikan') Artikel Pembenihan Ikan
                        @elseif($tag == 'pembersihan-ikan') Artikel Pembersihan Ikan
                        @elseif($tag == 'penyakit-ikan') Artikel Penyakit Ikan
                        @else Artikel Ikan Cupang
                        @endif
                    </h2>
                    <p class="text-xs text-slate-500">
                        @if($tag) Tips & panduan terkait topik yang dipilih
                        @else Tips & panduan perawatan ikan cupang
                        @endif
                    </p>
                </div>
                @if($tag)
                    <a href="{{ route('kategori.ikan') }}" class="text-xs font-semibold text-cyan-600 hover:text-cyan-700 hover:underline whitespace-nowrap">
                        &larr; Semua Artikel
                    </a>
                @endif
            </div>

            @if($articles->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 reveal">
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', $article->slug) }}" class="z-card bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-cyan-400 hover:shadow-lg transition-all duration-300 group">
                            <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                <img loading="lazy" decoding="async" src="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-4 space-y-2">
                                <span class="inline-block text-xs text-cyan-600 font-semibold bg-cyan-50 px-2.5 py-1 rounded-full">Ikan Cupang</span>
                                <h3 class="font-bold text-slate-800 group-hover:text-cyan-600 transition line-clamp-2">{{ $article->title }}</h3>
                                <div class="flex items-center gap-3 text-xs text-slate-400">
                                    <span class="inline-flex items-center gap-1"><x-icon name="clock" class="w-4 h-4" /> {{ $article->reading_time }} menit baca</span>
                                    <span class="inline-flex items-center gap-1"><x-icon name="eye" class="w-4 h-4" /> {{ $article->views ?? 0 }} dilihat</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="mt-8">{{ $articles->links() }}</div>
            @else
                <div class="p-12 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                    Belum ada artikel Ikan Cupang.
                </div>
            @endif
        </section>

        <!-- CTA WHATSAPP -->
        <section class="max-w-6xl mx-auto px-4 mt-16 mb-8 reveal">
            <div class="relative rounded-3xl overflow-hidden shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-br from-cyan-600 to-cyan-800"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.06%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-40"></div>
                <div class="relative z-10 py-12 px-6 text-center">
                    <div class="mb-4"><x-icon name="wa" class="w-10 h-10 mx-auto text-white" /></div>
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-3">Ada pertanyaan seputar Ikan Cupang?</h2>
                    <p class="text-cyan-100 text-sm md:text-base mb-6 max-w-xl mx-auto">
                        Tim Zaydun siap membantu Anda memilih produk atau memberikan tips perawatan terbaik.
                    </p>
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20Ikan%20Cupang" target="_blank" class="z-btn inline-flex items-center gap-2 bg-white text-cyan-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-cyan-50 shadow-lg transition active:scale-95">
                        <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Chat Admin via WhatsApp →
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 mt-10 pt-14 pb-8 text-sm text-slate-400">
        <div class="h-1 bg-gradient-to-r from-cyan-600 via-teal-500 to-cyan-400"></div>
        <div class="max-w-6xl mx-auto px-4 pt-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-10 border-b border-slate-800">
                <div class="space-y-3">
                    <span class="font-extrabold text-2xl text-cyan-400 tracking-wider">Zaydun</span>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Platform inspirasi & panduan hobi terlengkap. Menyediakan artikel perawatan hobi dan produk kebutuhan berkualitas tinggi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ url('/') }}" class="hover:text-cyan-400 transition">Beranda</a></li>
                        <li><a href="{{ route('kategori.ikan') }}" class="hover:text-cyan-400 transition">Ikan</a></li>
                        <li><a href="{{ route('kategori.tumbuhan') }}" class="hover:text-cyan-400 transition">Tumbuhan</a></li>
                        <li><a href="{{ route('artikel.index') }}" class="hover:text-cyan-400 transition">Artikel</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-cyan-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-cyan-400 transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">Hubungi Kami</h4>
                    <p class="text-xs text-slate-500 mb-4">Punya pertanyaan seputar hobi? Chat admin kami langsung via WhatsApp.</p>
                    <div class="flex gap-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                        <a href="#" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="TikTok">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        <a href="#" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
>>>>>>> Stashed changes
                    </div>
                </div>

                <!-- Produk 2 (Dengan Diskon & Harga Coret) -->
                <div class="bg-white rounded-xl p-3 flex flex-col items-center text-center relative group hover:-translate-y-1 transition-transform duration-300">
                    <!-- Badge Diskon -->
                    <div class="absolute top-2 right-2 bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 z-10 rounded-sm tracking-wider">DISC 70%</div>
                    
                    <div class="aspect-square w-full mb-3 flex items-center justify-center p-2">
                        <img src="https://images.unsplash.com/photo-1522069169874-c58ec4b76be1?q=80&w=300&auto=format&fit=crop" alt="Cupang Halfmoon" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 rounded-lg">
                    </div>
                    <h3 class="font-bold text-slate-800 text-sm leading-snug line-clamp-2 mb-1 group-hover:text-cyan-700 transition">Cupang Halfmoon Cooper Mix Rosetail</h3>
                    <p class="text-xs text-slate-400 mb-2">Cupang</p>
                    <div class="flex gap-0.5 text-yellow-400 mb-3">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 text-slate-200 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    </div>
                    <div class="mt-auto flex items-center gap-1.5 flex-wrap justify-center">
                        <span class="text-xs text-slate-400">Mulai</span>
                        <span class="text-xs text-slate-400 line-through">Rp20.000</span>
                        <span class="text-sm font-bold text-slate-800">Rp6.000</span>
                    </div>
                </div>

                <!-- Produk 3 -->
                <div class="bg-white rounded-xl p-3 flex flex-col items-center text-center relative group hover:-translate-y-1 transition-transform duration-300">
                    <div class="aspect-square w-full mb-3 flex items-center justify-center p-2">
                        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=300&auto=format&fit=crop" alt="Katalog" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 rounded-lg">
                    </div>
                    <h3 class="font-bold text-slate-800 text-sm leading-snug line-clamp-2 mb-1 group-hover:text-cyan-700 transition">Katalog Live TikTok</h3>
                    <p class="text-xs text-slate-400 mb-2">Cupang</p>
                    <div class="flex gap-0.5 text-yellow-400 mb-3">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    </div>
                    <div class="mt-auto flex items-center gap-1.5 flex-wrap justify-center">
                        <span class="text-xs text-slate-400">Mulai</span>
                        <span class="text-sm font-bold text-slate-800">Rp0</span>
                    </div>
                </div>

                <!-- Produk 4 -->
                <div class="bg-white rounded-xl p-3 flex flex-col items-center text-center relative group hover:-translate-y-1 transition-transform duration-300">
                    <div class="absolute top-2 right-2 bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 z-10 rounded-sm tracking-wider">DISC 75%</div>
                    <div class="aspect-square w-full mb-3 flex items-center justify-center p-2">
                        <img src="https://images.unsplash.com/photo-1582967788606-a171c1080cb0?q=80&w=300&auto=format&fit=crop" alt="Molly Gold" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 rounded-lg">
                    </div>
                    <h3 class="font-bold text-slate-800 text-sm leading-snug line-clamp-2 mb-1 group-hover:text-cyan-700 transition">Molly Gold Long Lyretail (Ekor cawang)</h3>
                    <p class="text-xs text-slate-400 mb-2">Molly</p>
                    <div class="flex gap-0.5 text-slate-200 mb-3">
                        <!-- Bintang Kosong -->
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                    </div>
                    <div class="mt-auto flex items-center gap-1.5 flex-wrap justify-center">
                        <span class="text-xs text-slate-400">Mulai</span>
                        <span class="text-xs text-slate-400 line-through">Rp12.000</span>
                        <span class="text-sm font-bold text-slate-800">Rp3.000</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
</x-layout>