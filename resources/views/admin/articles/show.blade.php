<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Zaydun</title>

    <!-- SEO & Share Preview Meta Tags -->
    <meta name="description" content="{{ Str::limit(strip_tags($article->content), 150) }}">
    <meta property="og:title" content="{{ $article->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($article->content), 150) }}">
    <meta property="og:image" content="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-gray-800 font-sans">

    <!-- NAVBAR -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 h-16 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-2xl font-extrabold tracking-wider text-teal-600">ZAYDUN</a>
            <a href="{{ url('/') }}#artikel" class="text-sm font-semibold text-slate-600 hover:text-teal-600 transition flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
        </div>
    </nav>

    <!-- ARTICLE CONTENT -->
    <article class="max-w-3xl mx-auto px-4 py-10">
        <div class="flex items-center gap-3 mb-5">
            <span class="bg-cyan-50 text-cyan-700 text-xs font-bold px-3 py-1 rounded-full uppercase border border-cyan-200">
                {{ $article->category->name }}
            </span>
            <span class="text-xs text-slate-400 font-medium">⏱️ {{ $article->reading_time }} Menit Baca</span>
            <span class="text-xs text-slate-400">•</span>
            <span class="text-xs text-slate-400">{{ $article->created_at->format('d M Y') }}</span>
        </div>

        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
            {{ $article->title }}
        </h1>

        <div class="mb-8 rounded-2xl overflow-hidden border border-slate-200 shadow-sm">
            <img src="{{ asset('uploads/thumbnails/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full max-h-[450px] object-cover">
        </div>

        <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-4 text-base md:text-lg whitespace-pre-line">
            {!! nl2br(e($article->content)) !!}
        </div>
    </article>

    <!-- ARTIKEL TERKAIT -->
    @if($relatedArticles->count() > 0)
    <section class="bg-white border-t border-slate-200 py-12 mt-12">
        <div class="max-w-6xl mx-auto px-4">
            <h3 class="text-xl font-bold text-slate-800 mb-6">Artikel Terkait Lainnya</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                    <a href="{{ route('articles.show', $related->slug) }}" class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md hover:border-teal-300 transition-all duration-200 block group">
                        <img src="{{ asset('uploads/thumbnails/'.$related->thumbnail) }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <span class="text-xs font-bold text-teal-600 uppercase">{{ $related->category->name }}</span>
                            <h4 class="font-bold text-slate-800 text-base mt-1.5 line-clamp-2 group-hover:text-teal-600 transition">{{ $related->title }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- FOOTER -->
    <footer class="bg-slate-900 py-6 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} Zaydun. All rights reserved.
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6281234567890?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20produk/artikel" target="_blank" class="fixed bottom-6 right-6 bg-emerald-500 hover:bg-emerald-600 text-white p-4 rounded-full shadow-xl flex items-center justify-center transition duration-300 hover:scale-110 z-50 group">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        <span class="max-w-0 overflow-hidden group-hover:max-w-xs transition-all duration-500 ease-in-out whitespace-nowrap text-xs font-bold pl-0 group-hover:pl-2">
            Hubungi Kami
        </span>
    </a>

</body>
</html>
