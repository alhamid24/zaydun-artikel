<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta property="og:site_name" content="Zaydun">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $product->name }} - Zaydun">
    <meta property="og:description" content="{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}. Pesan via WhatsApp di Zaydun.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script defer src="{{ asset('js/animate.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-gray-800 font-sans flex flex-col min-h-screen justify-between">

    <x-navbar theme="{{ $product->category->slug === 'ikan-cupang' ? 'ikan' : 'tumbuhan' }}" />

    <main class="flex-1 w-full">

        <!-- BREADCRUMB -->
        <div class="max-w-6xl mx-auto px-4 pt-6">
            <nav class="text-xs text-slate-500 flex items-center gap-1.5 flex-wrap">
                <a href="{{ url('/') }}" class="hover:text-cyan-600 transition font-medium">Beranda</a>
                <span class="text-slate-300">›</span>
                <a href="{{ $product->category->slug === 'ikan-cupang' ? route('kategori.ikan') : route('kategori.tumbuhan') }}" class="hover:text-cyan-600 transition font-medium">
                    {{ $product->category->name }}
                </a>
                <span class="text-slate-300">›</span>
                <span class="text-slate-800 font-semibold">{{ $product->name }}</span>
            </nav>
        </div>

        <!-- DETAIL PRODUK -->
        <section class="max-w-6xl mx-auto px-4 mt-6">
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                    <!-- Gambar Produk -->
                    <div class="bg-slate-100 flex items-center justify-center p-8">
                        <img decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full max-w-md object-cover rounded-2xl">
                    </div>

                    <!-- Info Produk -->
                    <div class="p-6 md:p-10 flex flex-col justify-center space-y-5">
                        <div>
                            <span class="inline-block text-xs font-bold px-3 py-1 rounded-full mb-3 {{ $product->category->slug === 'ikan-cupang' ? 'bg-cyan-50 text-cyan-700' : 'bg-emerald-50 text-emerald-700' }}">
                                {{ $product->category->name }}
                            </span>
                            <h1 class="text-2xl md:text-3xl font-black text-slate-800">{{ $product->name }}</h1>
                        </div>

                        <div class="text-3xl md:text-4xl font-black {{ $product->category->slug === 'ikan-cupang' ? 'text-cyan-600' : 'text-emerald-600' }}">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>

                        <div class="flex items-center gap-2 text-sm text-slate-500 flex-wrap">
                            <span class="flex items-center gap-0.5 text-lg">
                                @for($i = 1; $i <= 5; $i++)
                                    <x-icon :name="$i <= round($product->averageRating()) ? 'star' : 'star-outline'" :class="$i <= round($product->averageRating()) ? 'w-4 h-4 text-amber-400' : 'w-4 h-4 text-slate-300'" />
                                @endfor
                            </span>
                            <span class="font-bold text-slate-800">{{ number_format($product->averageRating(), 1, ',', '.') }}</span>
                            <span>({{ $product->reviewsCount() }} ulasan)</span>
                            <span class="text-slate-400">•</span>
                            <span class="inline-flex items-center gap-1"><x-icon name="eye" class="w-4 h-4" /> {{ $product->views }} dilihat</span>
                        </div>

                        @if($product->description)
                            <div class="text-slate-600 leading-relaxed text-sm whitespace-pre-line">
                                {{ $product->description }}
                            </div>
                        @endif

                        <div class="pt-4 space-y-3">
                            <a href="{{ route('products.order', $product->slug) }}" class="z-btn inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm px-8 py-3.5 rounded-xl transition shadow-sm w-full justify-center">
                                <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Beli via WhatsApp Sekarang
                            </a>
                            <p class="text-xs text-slate-400 text-center">Klik untuk mengisi data pemesanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RATING & ULASAN -->
        <section class="max-w-6xl mx-auto px-4 mt-14 reveal">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 {{ $product->category->slug === 'ikan-cupang' ? 'bg-cyan-100' : 'bg-emerald-100' }} rounded-xl flex items-center justify-center"><x-icon name="star" class="w-5 h-5 text-amber-500" /></div>
                <div>
                    <h2 class="text-lg font-extrabold text-slate-800">Rating & Ulasan</h2>
                    <p class="text-xs text-slate-500">Pengalaman pembeli lain menjadi pertimbangan Anda</p>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-2xl text-sm font-medium mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-2xl text-sm font-medium mb-6">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Form Ulasan -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6">
                    <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide mb-4">Beri Rating & Ulasan</h3>
                    <form action="{{ route('products.review', $product->slug) }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Nama Anda</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Budi" class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:bg-white focus:border-teal-400 focus:ring-teal-100 focus:ring-2 transition" required>
                        </div>

                        <div x-data="{ rating: {{ old('rating', 5) }} }">
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Rating</label>
                            <div class="flex items-center gap-1 text-3xl">
                                <template x-for="i in 5" :key="i">
                                    <button type="button" @click="rating = i" class="transition hover:scale-110 focus:outline-none">
                                        <svg class="w-7 h-7" :class="i <= rating ? 'text-amber-400' : 'text-slate-300'" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"/></svg>
                                    </button>
                                </template>
                                <span class="ml-2 text-sm font-bold text-slate-700" x-text="rating + '/5'"></span>
                            </div>
                            <input type="hidden" name="rating" :value="rating" required>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Ulasan (opsional)</label>
                            <textarea name="review" rows="3" placeholder="Tuliskan pengalaman Anda menggunakan produk ini..." class="w-full px-4 py-2.5 text-sm bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:bg-white focus:border-teal-400 focus:ring-teal-100 focus:ring-2 transition">{{ old('review') }}</textarea>
                        </div>

                        <button type="submit" class="z-btn w-full bg-teal-600 hover:bg-teal-700 text-white font-bold text-sm px-6 py-3 rounded-xl transition shadow-sm">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>

                <!-- Daftar Ulasan -->
                <div class="space-y-4">
                    @forelse($product->reviews as $review)
                        <div class="bg-white rounded-2xl border border-slate-200 p-5">
                            <div class="flex items-center justify-between gap-3 flex-wrap">
                                <div class="flex items-center gap-2">
                                    <div class="w-9 h-9 {{ $product->category->slug === 'ikan-cupang' ? 'bg-cyan-100 text-cyan-700' : 'bg-emerald-100 text-emerald-700' }} rounded-full flex items-center justify-center text-sm font-black uppercase">
                                        {{ substr($review->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-slate-800">{{ $review->name }}</div>
                                        <div class="text-xs text-slate-400">{{ $review->created_at->format('d M Y') }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-0.5 text-lg">
                                    @for($i = 1; $i <= 5; $i++)
                                        <x-icon name="star" :class="$i <= $review->rating ? 'w-4 h-4 text-amber-400' : 'w-4 h-4 text-slate-300'" />
                                    @endfor
                                </div>
                            </div>
                            @if($review->review)
                                <p class="mt-3 text-sm text-slate-600 leading-relaxed">{{ $review->review }}</p>
                            @endif

                            @if($review->reply)
                                <div class="mt-4 bg-emerald-50 border border-emerald-100 rounded-2xl p-4">
                                    <div class="flex items-center gap-2 mb-1">
                                        <div class="w-7 h-7 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center"><x-icon name="shield-check" class="w-4 h-4" /></div>
                                        <span class="text-xs font-bold text-emerald-700 uppercase tracking-wide">Zaydun</span>
                                    </div>
                                    <p class="text-sm text-slate-700 leading-relaxed">{{ $review->reply }}</p>
                                    <div class="mt-1 text-xs text-slate-400">
                                        {{ $review->reply_by }} · {{ $review->reply_at->format('d M Y') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                            Belum ada ulasan. Jadilah yang pertama memberi rating!
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- PRODUK TERKAIT -->
        @if($relatedProducts->count() > 0)
        <section class="max-w-6xl mx-auto px-4 mt-14 mb-10 reveal">
            <div class="flex items-center gap-3 mb-8">
                <div class="w-10 h-10 {{ $product->category->slug === 'ikan-cupang' ? 'bg-cyan-100' : 'bg-emerald-100' }} rounded-xl flex items-center justify-center"><x-icon name="shopping-cart" class="w-5 h-5 {{ $product->category->slug === 'ikan-cupang' ? 'text-cyan-600' : 'text-emerald-600' }}" /></div>
                <div>
                    <h2 class="text-lg font-extrabold text-slate-800">Produk Terkait</h2>
                    <p class="text-xs text-slate-500">Lihat juga produk lainnya dari kategori {{ $product->category->name }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($relatedProducts as $related)
                    <a href="{{ route('products.show', $related->slug) }}" class="z-card bg-white rounded-2xl border border-slate-200 overflow-hidden hover:shadow-lg transition-all duration-300 group">
                        <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-4 space-y-2">
                            <h3 class="font-bold text-slate-800 text-sm line-clamp-2">{{ $related->name }}</h3>
                            <p class="{{ $product->category->slug === 'ikan-cupang' ? 'text-cyan-600' : 'text-emerald-600' }} font-black text-lg">
                                Rp {{ number_format($related->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        @endif

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 mt-10 pt-14 pb-8 text-sm text-slate-400">
        <div class="max-w-6xl mx-auto px-4">
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
                    </div>
                </div>
            </div>
            <div class="pt-6 flex flex-col md:flex-row justify-between items-center text-xs text-slate-600 gap-2">
                <p>&copy; {{ date('Y') }} Zaydun. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
