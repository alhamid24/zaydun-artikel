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
</x-layout>
