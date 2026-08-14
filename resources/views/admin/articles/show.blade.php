<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->meta_title ?: $article->title }} - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- SEO & Share Preview Meta Tags -->
    <meta name="description" content="{{ $article->meta_description ?: Str::limit(strip_tags($article->content), 150) }}">
    @if($article->meta_keywords)
        <meta name="keywords" content="{{ $article->meta_keywords }}">
    @endif
    <meta property="og:site_name" content="Zaydun">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $article->meta_title ?: $article->title }}">
    <meta property="og:description" content="{{ $article->meta_description ?: Str::limit(strip_tags($article->content), 150) }}">
    <meta property="og:image" content="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}">

    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script defer src="{{ asset('js/animate.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Article",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url()->current() }}"
        },
        "headline": "{{ $article->meta_title ?: $article->title }}",
        "description": "{{ $article->meta_description ?: Str::limit(strip_tags($article->content), 150) }}",
        "image": "{{ asset('uploads/thumbnails/'.$article->thumbnail) }}",  
        "author": {
            "@type": "Organization",
            "name": "Zaydun Store",
            "url": "{{ url('/') }}"
        },  
        "publisher": {
            "@type": "Organization",
            "name": "Zaydun",
            "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('logo.png') }}" 
            }
        },
        "datePublished": "{{ $article->created_at->toIso8601String() }}",
        "dateModified": "{{ $article->updated_at->toIso8601String() }}"
        }
    </script>
</head>
<body class="bg-slate-50 text-gray-800 font-sans flex flex-col min-h-screen justify-between">

    @php
        $categorySlug = $article->category->slug ?? '';
        $navTheme = str_contains($categorySlug, 'ikan') ? 'ikan' : (str_contains($categorySlug, 'tumbuhan') ? 'tumbuhan' : 'netral');
    @endphp
    <x-navbar :theme="$navTheme" />

    <main class="flex-1 w-full">

        <!-- BREADCRUMB -->
        <div class="max-w-3xl mx-auto px-4 pt-6">
            <nav class="text-xs text-slate-500 flex items-center gap-1.5">
                <a href="{{ url('/') }}" class="hover:text-teal-600 transition font-medium">Beranda</a>
                <span class="text-slate-300">›</span>
                <a href="{{ route('artikel.index') }}" class="hover:text-teal-600 transition font-medium">Artikel</a>
                <span class="text-slate-300">›</span>
                <span class="text-slate-700 font-semibold truncate max-w-[240px]">{{ $article->title }}</span>
            </nav>
        </div>

        <!-- ARTICLE CONTENT -->
        <article class="max-w-3xl mx-auto px-4 py-8 reveal">
            <div class="flex items-center gap-3 mb-5 flex-wrap">
                <span class="bg-{{ $navTheme === 'tumbuhan' ? 'emerald' : 'cyan' }}-50 text-{{ $navTheme === 'tumbuhan' ? 'emerald' : 'cyan' }}-700 text-xs font-bold px-3 py-1 rounded-full uppercase border border-{{ $navTheme === 'tumbuhan' ? 'emerald' : 'cyan' }}-200">
                    {{ $article->category->name }}
                </span>
                <span class="text-xs text-slate-400 font-medium">Menit Baca: {{ $article->reading_time }}</span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-400">{{ $article->created_at->format('d M Y') }}</span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-400">{{ number_format($article->views) }} dilihat</span>
                @if($article->tag)
                    <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 border border-slate-200">{{ str_replace('-', ' ', $article->tag) }}</span>
                @endif
            </div>

            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                {{ $article->title }}
            </h1>

            <div class="mb-8 rounded-2xl overflow-hidden border border-slate-200 shadow-sm">
                <img decoding="async" src="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full max-h-[450px] object-cover">
            </div>

            <div class="prose prose-slate prose-lg max-w-none prose-headings:font-bold prose-a:text-teal-600 prose-img:rounded-xl">
                {!! $article->content !!}
            </div>

            <div class="mt-10 pt-6 border-t border-slate-200">
                <a href="{{ route('artikel.index') }}" class="z-btn inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-teal-300 text-slate-700 hover:text-teal-600 text-sm font-semibold px-5 py-2.5 rounded-xl transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Semua Artikel
                </a>
            </div>
        </article>

        <!-- ARTIKEL TERKAIT -->
        @if($relatedArticles->count() > 0)
        <section class="bg-white border-t border-slate-200 py-12 mt-4 reveal">
            <div class="max-w-6xl mx-auto px-4">
                <h3 class="text-xl font-bold text-slate-800 mb-6">Artikel Terkait Lainnya</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedArticles as $related)
                        <a href="{{ route('articles.show', $related->slug) }}" class="z-card bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden hover:shadow-md hover:border-teal-300 transition-all duration-200 block group">
                            <div class="aspect-[4/3] bg-slate-100 overflow-hidden">
                                <img loading="lazy" decoding="async" src="{{ asset('uploads/thumbnails/'.$related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-4">
                                <span class="text-xs font-bold text-teal-600 uppercase">{{ $related->category->name }}</span>
                                <h4 class="font-bold text-slate-800 text-base mt-1.5 line-clamp-2 group-hover:text-teal-600 transition">{{ $related->title }}</h4>
                                <div class="flex items-center gap-3 mt-3 text-xs text-slate-400">
                                    <span>{{ $related->reading_time }} mnt</span>
                                    <span>•</span>
                                    <span>{{ number_format($related->views) }} dilihat</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

    </main>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-slate-900 mt-20 pt-14 pb-8 text-sm text-slate-400">
        <div class="max-w-6xl mx-auto px-4">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-10 border-b border-slate-800">

                <!-- Branding -->
                <div class="space-y-3">
                    <span class="font-extrabold text-2xl text-cyan-400 tracking-wider">Zaydun</span>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Platform inspirasi & panduan hobi terlengkap. Menyediakan artikel perawatan hobi dan produk kebutuhan berkualitas tinggi.
                    </p>
                </div>

                <!-- Navigasi -->
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ url('/') }}" class="hover:text-cyan-400 transition">Beranda</a></li>
                        <li><a href="{{ route('kategori.ikan') }}" class="hover:text-cyan-400 transition">Ikan</a></li>
                        <li><a href="{{ route('kategori.tumbuhan') }}" class="hover:text-emerald-400 transition">Tumbuhan</a></li>
                        <li><a href="{{ route('artikel.index') }}" class="hover:text-cyan-400 transition">Artikel</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-cyan-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-cyan-400 transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kontak -->
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

            <!-- Copyright -->
            <div class="pt-6 flex flex-col md:flex-row justify-between items-center text-xs text-slate-600 gap-2">
                <p>&copy; {{ date('Y') }} Zaydun. All rights reserved.</p>
            </div>

        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20produk/artikel" target="_blank" class="z-float-wa fixed bottom-6 right-6 bg-emerald-500 hover:bg-emerald-600 text-white p-4 rounded-full shadow-xl flex items-center justify-center transition duration-300 hover:scale-110 z-50 group">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="max-w-0 overflow-hidden group-hover:max-w-xs transition-all duration-500 ease-in-out whitespace-nowrap text-xs font-bold pl-0 group-hover:pl-2">
            Hubungi Kami
        </span>
    </a>

</body>
</html>
