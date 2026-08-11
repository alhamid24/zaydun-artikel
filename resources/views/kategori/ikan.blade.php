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