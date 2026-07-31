<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Tumbuhan - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta property="og:site_name" content="Zaydun">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Produk Tumbuhan - Zaydun">
    <meta property="og:description" content="Koleksi produk tumbuhan berkualitas. Pesan langsung via WhatsApp.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script defer src="{{ asset('js/animate.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-gray-800 font-sans flex flex-col min-h-screen justify-between">

    <x-navbar theme="tumbuhan" />

    <main class="flex-1 w-full">

        <!-- BREADCRUMB -->
        <div class="max-w-6xl mx-auto px-4 pt-6">
            <nav class="text-xs text-slate-500 flex items-center gap-1.5">
                <a href="{{ url('/') }}" class="hover:text-emerald-600 transition font-medium">Beranda</a>
                <span class="text-slate-300">›</span>
                <span class="text-emerald-700 font-semibold">🛒 Produk Tumbuhan</span>
            </nav>
        </div>

        <!-- HERO BANNER -->
        <section class="relative rounded-3xl overflow-hidden shadow-xl max-w-6xl mx-auto px-4 mt-4">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 via-emerald-700 to-green-900"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.06%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-40"></div>
            <div class="relative z-10 py-12 px-6 text-center">
                <div class="inline-block bg-white/20 backdrop-blur-sm text-white text-xs font-bold px-4 py-1.5 rounded-full mb-4 uppercase tracking-widest">
                    🌱 Produk Tumbuhan
                </div>
                <h1 class="text-3xl md:text-4xl font-black text-white mb-3 leading-tight">
                    Perlengkapan & Kebutuhan untuk Tumbuhan Anda
                </h1>
                <p class="text-emerald-100 text-sm md:text-base mb-6 max-w-2xl mx-auto leading-relaxed">
                    Media tanam, pupuk, pot, dan aksesori tumbuhan berkualitas. Pesan langsung melalui WhatsApp.
                </p>
                <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20produk%20Tumbuhan" target="_blank" class="z-btn inline-flex items-center gap-2 bg-white text-emerald-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-emerald-50 shadow-lg transition">
                    💬 Tanya Produk via WhatsApp
                </a>
            </div>
        </section>

        <!-- DAFTAR PRODUK -->
        <section class="max-w-6xl mx-auto px-4 mt-12">
            <div class="flex items-center gap-3 mb-8 reveal">
                <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center text-lg">🛒</div>
                <div>
                    <h2 class="text-lg font-extrabold text-slate-800">Produk Tumbuhan</h2>
                    <p class="text-xs text-slate-500">{{ $totalProducts }} produk tersedia untuk tumbuhan kesayangan Anda</p>
                </div>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 reveal">
                    @foreach($products as $product)
                        <div class="z-card relative bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 hover:shadow-lg transition-all duration-300 group">
                            @if(in_array($product->id, $topIds))
                                <span class="absolute top-3 left-3 z-10 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow">⭐ Best Seller</span>
                            @endif
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
                                    <span class="whitespace-nowrap">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="{{ $i <= round($product->averageRating()) ? 'text-amber-400' : 'text-slate-300' }}">★</span>
                                        @endfor
                                    </span>
                                    <span class="font-bold text-slate-700">{{ number_format($product->averageRating(), 1, ',', '.') }}</span>
                                    <span>({{ $product->reviewsCount() }} ulasan)</span>
                                    <span class="text-slate-400">• 👁 {{ $product->views }}</span>
                                </div>
                                <p class="text-emerald-600 font-black text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <a href="{{ route('products.order', $product->slug) }}" class="z-btn block w-full text-center bg-emerald-50 text-emerald-700 text-xs font-bold px-4 py-2.5 rounded-xl border border-emerald-200 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition">
                                    💬 Beli via WhatsApp
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">{{ $products->links() }}</div>
            @else
                <div class="p-12 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                    Belum ada produk Tumbuhan.
                </div>
            @endif
        </section>

        <!-- CTA WHATSAPP -->
        <section class="max-w-6xl mx-auto px-4 mt-16 mb-8 reveal">
            <div class="relative rounded-3xl overflow-hidden shadow-xl">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 to-emerald-800"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.06%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-40"></div>
                <div class="relative z-10 py-12 px-6 text-center">
                    <div class="text-4xl mb-4">💬</div>
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-3">Bingung pilih produk Tumbuhan?</h2>
                    <p class="text-emerald-100 text-sm md:text-base mb-6 max-w-xl mx-auto">
                        Tim Zaydun siap membantu Anda memilih produk yang paling cocok untuk tumbuhan Anda.
                    </p>
                    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20produk%20Tumbuhan" target="_blank" class="z-btn inline-flex items-center gap-2 bg-white text-emerald-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-emerald-50 shadow-lg transition">
                        💬 Chat Admin via WhatsApp →
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 mt-10 pt-14 pb-8 text-sm text-slate-400">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-10 border-b border-slate-800">
                <div class="space-y-3">
                    <span class="font-extrabold text-2xl text-emerald-400 tracking-wider">Zaydun</span>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Platform inspirasi & panduan hobi terlengkap. Menyediakan artikel perawatan hobi dan produk kebutuhan berkualitas tinggi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ url('/') }}" class="hover:text-emerald-400 transition">Beranda</a></li>
                        <li><a href="{{ route('products.ikan') }}" class="hover:text-emerald-400 transition">Produk Ikan</a></li>
                        <li><a href="{{ route('products.tumbuhan') }}" class="hover:text-emerald-400 transition">Produk Tumbuhan</a></li>
                        <li><a href="{{ route('artikel.index') }}" class="hover:text-emerald-400 transition">Artikel</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-emerald-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-emerald-400 transition">Kontak</a></li>
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
                    </div>
                </div>
            </div>
            <div class="pt-6 flex flex-col md:flex-row justify-between items-center text-xs text-slate-600 gap-2">
                <p>&copy; {{ date('Y') }} Zaydun. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- BACK TO TOP -->
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="fixed bottom-6 right-6 bg-slate-800 hover:bg-slate-700 text-white p-3.5 rounded-full shadow-xl flex items-center justify-center transition duration-300 hover:scale-110 z-50" title="Kembali ke atas">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/></svg>
    </button>

</body>

</html>
