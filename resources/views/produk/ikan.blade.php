<x-layout title="ikan" theme="ikan">
    <main class="flex-1 w-full">

        <!-- BREADCRUMB -->
        <div class="max-w-6xl mx-auto px-4 pt-6">
            <nav class="text-xs text-slate-500 flex items-center gap-1.5">
                <a href="{{ url('/') }}" class="hover:text-cyan-600 transition font-medium">Beranda</a>
                <span class="text-slate-300">›</span>
                <span class="text-cyan-700 font-semibold inline-flex items-center gap-1.5"><x-icon name="shopping-cart" class="w-4 h-4 text-cyan-500" /> Produk Ikan</span>
            </nav>
        </div>

        <!-- DAFTAR PRODUK -->
        <section class="max-w-6xl mx-auto px-4 mt-12">
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
                        <a href="{{ route('products.ikan', ['sort' => $key]) }}"
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
                            @if(in_array($product->id, $topIds))
                                <span class="absolute top-3 left-3 z-10 bg-amber-500 text-white text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-full shadow inline-flex items-center gap-1"><x-icon name="star" class="w-3 h-3" /> Best Seller</span>
                            @endif
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
                    Belum ada produk Ikan.
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
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-3">Bingung pilih produk Ikan?</h2>
                    <p class="text-cyan-100 text-sm md:text-base mb-6 max-w-xl mx-auto">
                        Tim Zaydun siap membantu Anda memilih produk yang paling cocok untuk cupang Anda.
                    </p>
                    <a href="https://wa.me/{{ default_wa_number() }}?text=Halo%20Admin%20Zaydun,%20saya%20ingin%20bertanya%20seputar%20produk%20Ikan" target="_blank" class="z-btn inline-flex items-center gap-2 bg-white text-cyan-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-cyan-50 shadow-lg transition active:scale-95">
                        <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Chat Admin via WhatsApp →
                    </a>
                </div>
            </div>
        </section>

    </main>
</x-layout>