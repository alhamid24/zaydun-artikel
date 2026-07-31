@props(['theme' => 'netral'])

@php
    $themes = [
        'netral' => [
            'logo'      => 'text-teal-600',
            'accent'    => 'text-teal-600',
            'hover'     => 'hover:text-teal-600',
            'bgHover'   => 'hover:bg-teal-50',
            'active'    => 'text-teal-600 font-bold',
            'border'    => 'focus:border-teal-400 focus:ring-teal-100',
            'btnHover'  => 'hover:text-teal-600',
        ],
        'ikan' => [
            'logo'      => 'text-cyan-600',
            'accent'    => 'text-cyan-600',
            'hover'     => 'hover:text-cyan-600',
            'bgHover'   => 'hover:bg-cyan-50',
            'active'    => 'text-cyan-600 font-bold',
            'border'    => 'focus:border-cyan-400 focus:ring-cyan-100',
            'btnHover'  => 'hover:text-cyan-600',
        ],
        'tumbuhan' => [
            'logo'      => 'text-emerald-600',
            'accent'    => 'text-emerald-600',
            'hover'     => 'hover:text-emerald-600',
            'bgHover'   => 'hover:bg-emerald-50',
            'active'    => 'text-emerald-600 font-bold',
            'border'    => 'focus:border-emerald-400 focus:ring-emerald-100',
            'btnHover'  => 'hover:text-emerald-600',
        ],
    ];

    $t = $themes[$theme] ?? $themes['netral'];
@endphp

<header class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50" x-data="{ mobileOpen: false, dropdownOpen: false }">
    <div class="max-w-6xl mx-auto px-4 h-16 flex justify-between items-center gap-4">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-wider {{ $t['logo'] }} shrink-0">
            Zaydun
        </a>

        {{-- SEARCH BAR (Desktop) --}}
        <form action="{{ route('search') }}" method="GET" class="hidden md:flex flex-1 max-w-md">
            <div class="relative w-full">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari artikel atau panduan..."
                    class="w-full pl-4 pr-10 py-2 text-sm bg-slate-100 border border-slate-200 rounded-full focus:outline-none focus:bg-white {{ $t['border'] }} focus:ring-2 transition"
                >
                <button type="submit" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 {{ $t['btnHover'] }} transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>

        {{-- NAV DESKTOP --}}
        <nav class="hidden md:flex items-center space-x-6 text-sm font-semibold text-slate-600">

            {{-- Beranda --}}
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? $t['active'] : $t['hover'] }} transition">
                Beranda
            </a>

            {{-- Kategori Dropdown --}}
            <div class="relative" @click.away="dropdownOpen = false">
                <button
                    @click="dropdownOpen = !dropdownOpen"
                    class="flex items-center gap-1 {{ $t['hover'] }} transition focus:outline-none"
                >
                    Kategori
                    <svg class="w-4 h-4 transition-transform" :class="dropdownOpen && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div
                    x-show="dropdownOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute left-0 mt-2 w-52 bg-white border border-slate-200 rounded-2xl shadow-xl z-50 p-2 space-y-1"
                    style="display: none;"
                >
                    <a href="{{ route('kategori.ikan') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-xs font-semibold text-slate-700 hover:bg-cyan-50 hover:text-cyan-600 rounded-xl transition">
                        <span class="text-base">🐟</span> Ikan
                    </a>
                    <a href="{{ route('kategori.tumbuhan') }}" class="flex items-center gap-2.5 px-3 py-2.5 text-xs font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl transition">
                        <span class="text-base">🌱</span> Tumbuhan
                    </a>
                </div>
            </div>

            {{-- Artikel Terbaru --}}
            <a href="{{ route('artikel.index') }}" class="{{ request()->routeIs('artikel.index') ? $t['active'] : $t['hover'] }} transition">
                Artikel
            </a>

            {{-- Tentang Kami --}}
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? $t['active'] : $t['hover'] }} transition">
                Tentang Kami
            </a>

            {{-- Kontak --}}
            <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? $t['active'] : $t['hover'] }} transition">
                Kontak
            </a>
        </nav>

        {{-- HAMBURGER BUTTON (Mobile) --}}
        <button
            @click="mobileOpen = !mobileOpen"
            class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition focus:outline-none"
        >
            <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden border-t border-slate-200 bg-white px-4 pb-4 pt-2 space-y-1"
        style="display: none;"
    >
        {{-- Search Mobile --}}
        <form action="{{ route('search') }}" method="GET" class="mb-3">
            <div class="relative">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari artikel atau panduan..."
                    class="w-full pl-4 pr-10 py-2.5 text-sm bg-slate-100 border border-slate-200 rounded-full focus:outline-none focus:bg-white {{ $t['border'] }} transition"
                >
                <button type="submit" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 {{ $t['btnHover'] }} transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>

        {{-- Nav Links Mobile --}}
        <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? $t['active'] . ' bg-slate-50' : 'text-slate-600 hover:bg-slate-50' }} transition">
            Beranda
        </a>

        <a href="{{ route('kategori.ikan') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('kategori.ikan') ? 'text-cyan-600 font-bold bg-cyan-50' : 'text-slate-600 hover:bg-slate-50' }} transition">
            🐟 Ikan
        </a>

        <a href="{{ route('kategori.tumbuhan') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('kategori.tumbuhan') ? 'text-emerald-600 font-bold bg-emerald-50' : 'text-slate-600 hover:bg-slate-50' }} transition">
            🌱 Tumbuhan
        </a>

        <a href="{{ route('artikel.index') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('artikel.index') ? $t['active'] . ' bg-slate-50' : 'text-slate-600 hover:bg-slate-50' }} transition">
            Artikel
        </a>

        <a href="{{ route('tentang') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('tentang') ? $t['active'] . ' bg-slate-50' : 'text-slate-600 hover:bg-slate-50' }} transition">
            Tentang Kami
        </a>

        <a href="{{ route('kontak') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('kontak') ? $t['active'] . ' bg-slate-50' : 'text-slate-600 hover:bg-slate-50' }} transition">
            Kontak
        </a>
    </div>
</header>
