<x-layout title="Ikan Cupang - Zaydun" theme="ikan">

<!-- KATALOG PRODUK SHOP PAGE -->
<section class="max-w-[1400px] mx-auto px-4 mt-8 mb-16">
    <div class="flex flex-col md:flex-row gap-8">

        <!-- SIDEBAR KIRI (Filter Harga & Subkategori) -->
        <aside class="w-full md:w-64 shrink-0 space-y-10">
            <form action="{{ route('kategori.ikan') }}" method="GET">
                @if(request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif

                <!-- Filter Harga -->
                <div class="space-y-3">
                    <h3 class="text-sm font-extrabold text-slate-800 uppercase tracking-wide">Filter Harga</h3>
                    <div>
                        <label class="text-xs text-slate-500 font-semibold mb-1 block">Harga Min (Rp)</label>
                        <input type="number" name="min_price" value="{{ request('min_price') }}" min="0" placeholder="0" class="w-full text-xs px-3 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="text-xs text-slate-500 font-semibold mb-1 block">Harga Max (Rp)</label>
                        <input type="number" name="max_price" value="{{ request('max_price') }}" min="0" placeholder="Tanpa Batas" class="w-full text-xs px-3 py-2 border rounded-lg">
                    </div>
                </div>

                <!-- Filter Subkategori -->
                @if($subcategories->count() > 0)
                <div>
                    <h3 class="text-sm font-extrabold text-slate-800 uppercase tracking-wide mb-3">Subkategori</h3>
                    <div class="space-y-2.5">
                        @foreach($subcategories as $subcategory)
                            <label class="flex items-start gap-2.5 cursor-pointer text-xs text-slate-600 hover:text-cyan-700 transition group">
                                <input type="checkbox" name="subcategory[]" value="{{ $subcategory->slug }}"
                                       {{ in_array($subcategory->slug, (array) request('subcategory', [])) ? 'checked' : '' }}
                                       class="mt-0.5 w-4 h-4 rounded accent-cyan-600">
                                <span class="flex-1">
                                    <span class="font-semibold">{{ $subcategory->name }}</span>
                                    <span class="text-slate-400"> ({{ $subcategory->products_count }})</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="space-y-2">
                    <button type="submit" class="w-full bg-slate-800 text-white font-bold text-xs py-2.5 rounded-xl hover:bg-slate-700 transition">
                        TERAPKAN FILTER
                    </button>
                    @if(request('min_price') || request('max_price') || request('subcategory'))
                        <a href="{{ route('kategori.ikan', ['sort' => request('sort')]) }}"
                           class="block w-full text-center border border-slate-200 text-slate-500 hover:text-slate-700 font-bold text-xs py-2.5 rounded-xl transition">
                            Reset Filter
                        </a>
                    @endif
                </div>
            </form>
        </aside>

        <!-- DAFTAR PRODUK -->
        <section class="flex-1 min-w-0">
            <div class="flex items-center justify-between flex-wrap gap-3 mb-8 reveal">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-cyan-100 rounded-xl flex items-center justify-center"><x-icon name="shopping-cart" class="w-5 h-5 text-cyan-600" /></div>
                    <div>
                        <h2 class="text-lg font-extrabold text-slate-800">Produk Ikan</h2>
                        <p class="text-xs text-slate-500">{{ $totalProducts }} produk tersedia untuk cupang kesayangan Anda</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 flex-wrap">
                    @foreach(['terbaru' => 'Terbaru', 'termurah' => 'Termurah', 'termahal' => 'Termahal', 'best-seller' => 'Best Seller'] as $key => $label)
                        <a href="{{ request()->fullUrlWithQuery(['sort' => $key]) }}"
                           class="px-3.5 py-1.5 rounded-full text-xs font-bold border transition {{ ($sort ?? 'terbaru') === $key ? 'bg-cyan-600 text-white border-cyan-600 shadow' : 'bg-white text-slate-600 border-slate-200 hover:border-cyan-400 hover:text-cyan-700' }}">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 reveal">
                    @foreach($products as $product)
                        <div class="z-card relative bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-cyan-400 hover:shadow-lg transition-all duration-300 group">
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
                </div>
                <div class="mt-8">{{ $products->links() }}</div>
            @else
                <div class="p-12 text-center text-sm text-slate-400 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                    Belum ada produk yang cocok dengan filter ini.
                </div>
            @endif
        </section>
    </div>
</section>

<main class="flex-1 w-full">

    <!-- ADMIN IKAN -->
    @if($admins->count() > 0)
    <section class="max-w-6xl mx-auto px-4 mt-8 mb-8 reveal">
        <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm p-8 md:p-10">
            <h2 class="text-2xl font-extrabold text-slate-800 mb-6 text-center"><x-icon name="fish" class="w-6 h-6 inline-block -mt-1 align-middle text-cyan-500" /> Tentang Ikan Cupang di Zaydun</h2>
            <p class="text-slate-600 leading-relaxed text-sm text-center max-w-3xl mx-auto mb-8">
                Zaydun menjadi tempat berkumpulnya para penghobi ikan cupang di Indonesia. Kami menghadirkan artikel-artikel bermanfaat seputar pembenihan, perawatan, hingga mengatasi penyakit ikan cupang. Tidak hanya itu, Anda juga bisa mendapatkan berbagai produk kebutuhan cupang — mulai dari makanan, obat & vitamin, aksesoris, hingga aquarium — yang bisa dipesan dengan mudah via WhatsApp. Tim kami siap membantu Anda memilih produk yang tepat untuk cupang kesayangan Anda.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-{{ $admins->count() > 1 ? '2' : '1' }} gap-6 max-w-3xl mx-auto">
                @foreach($admins as $admin)
                <div class="flex flex-col md:flex-row items-center md:items-start gap-5 p-5 bg-cyan-50/50 rounded-2xl">
                    <div class="shrink-0">
                        @if($admin->photo)
                            <img loading="lazy" decoding="async" src="{{ asset('uploads/admins/'.$admin->photo) }}" alt="{{ $admin->name }}" class="w-20 h-20 md:w-24 md:h-24 object-cover rounded-2xl shadow-sm">
                        @else
                            <div class="w-20 h-20 md:w-24 md:h-24 bg-gradient-to-br from-cyan-500 to-cyan-700 rounded-2xl flex items-center justify-center text-2xl text-white font-black shadow-sm">
                                {{ substr($admin->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 text-center md:text-left space-y-2">
                        <div>
                            <h3 class="font-bold text-slate-800">{{ $admin->name }}</h3>
                            @if($admin->title)
                                <p class="text-xs text-cyan-600 font-semibold">{{ $admin->title }}</p>
                            @endif
                        </div>
                        @if($admin->bio)
                            <p class="text-xs text-slate-500 leading-relaxed">{{ $admin->bio }}</p>
                        @endif
                        <div class="pt-1">
                            <a href="https://wa.me/{{ $admin->phone ?? default_wa_number() }}?text=Halo%20{{ urlencode($admin->name) }},%20saya%20ingin%20bertanya%20seputar%20Ikan%20Cupang" target="_blank" class="z-btn inline-flex items-center gap-1.5 bg-cyan-500 hover:bg-cyan-600 text-white font-bold text-xs px-4 py-2 rounded-xl transition shadow-sm">
                                <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Chat {{ $admin->name }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- NAVIGASI INFORMASI -->
    <section class="max-w-6xl mx-auto px-4 mt-10">
        <div class="bg-white rounded-2xl border border-slate-200 p-1.5 flex items-center gap-1 shadow-sm flex-wrap">
            <a href="{{ route('kategori.ikan') }}" class="px-4 py-2 text-sm font-semibold rounded-xl transition {{ !$tag ? 'bg-cyan-100 text-cyan-700' : 'text-slate-600 hover:bg-slate-100' }}">
                Semua
            </a>
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" @click.away="open = false" class="px-4 py-2 text-sm font-semibold rounded-xl transition flex items-center gap-1 {{ $tag ? 'bg-cyan-100 text-cyan-700' : 'text-slate-600 hover:bg-slate-100' }}">
                    <span>Informasi</span>
                    <svg class="w-4 h-4 transition-transform" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 mt-2 w-56 bg-white border border-slate-200 rounded-2xl shadow-xl z-50 p-2 space-y-1" style="display: none;">
                    <div x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen" class="flex items-center justify-between w-full px-3 py-2.5 text-xs font-semibold text-slate-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-xl transition">
                            <span class="inline-flex items-center gap-1.5"><x-icon name="fish" class="w-4 h-4 text-cyan-500" /> Perawatan Ikan</span>
                            <svg class="w-3 h-3 transition-transform" :class="subOpen && 'rotate-90'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                        <div x-show="subOpen" class="pl-3 space-y-0.5 mt-0.5">
                            <a href="{{ route('kategori.ikan', ['tag' => 'pembenihan-ikan']) }}" class="block px-3 py-2 text-xs font-semibold rounded-xl {{ $tag == 'pembenihan-ikan' ? 'bg-cyan-100 text-cyan-700' : 'text-slate-600 hover:bg-cyan-50 hover:text-cyan-600' }} transition">
                                Pembenihan Ikan
                            </a>
                            <a href="{{ route('kategori.ikan', ['tag' => 'pembersihan-ikan']) }}" class="block px-3 py-2 text-xs font-semibold rounded-xl {{ $tag == 'pembersihan-ikan' ? 'bg-cyan-100 text-cyan-700' : 'text-slate-600 hover:bg-cyan-50 hover:text-cyan-600' }} transition">
                                Pembersihan Ikan
                            </a>
                            <a href="{{ route('kategori.ikan', ['tag' => 'penyakit-ikan']) }}" class="block px-3 py-2 text-xs font-semibold rounded-xl {{ $tag == 'penyakit-ikan' ? 'bg-cyan-100 text-cyan-700' : 'text-slate-600 hover:bg-cyan-50 hover:text-cyan-600' }} transition">
                                Penyakit Ikan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ARTIKEL IKAN -->
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
                <a href="https://wa.me/{{ default_wa_number() }}?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20Ikan%20Cupang" target="_blank" class="z-btn inline-flex items-center gap-2 bg-white text-cyan-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-cyan-50 shadow-lg transition active:scale-95">
                    <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Chat Admin via WhatsApp →
                </a>
            </div>
        </div>
    </section>

</main>
</x-layout>
