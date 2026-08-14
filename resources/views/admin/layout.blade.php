<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex flex-col h-screen">

    <!-- 1. HEADER (BAGIAN ATAS) -->
    <header class="bg-white border-b border-gray-200 shadow-sm h-16 flex items-center justify-between px-6 shrink-0 z-20">
        <div class="flex items-center gap-2.5">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white font-black text-lg shadow-sm">Z</div>
            <div>
                <div class="text-lg font-bold leading-tight tracking-wide text-gray-800">Zaydun <span class="text-emerald-600">Admin</span></div>
                <div class="text-[10px] font-medium text-gray-400 uppercase tracking-widest leading-tight">Panel Manajemen Konten</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden sm:block text-right leading-tight">
                <div class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</div>
                <div class="text-[11px] text-gray-400">Administrator</div>
            </div>
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center font-bold text-sm text-white uppercase shadow-sm">{{ substr(Auth::user()->name, 0, 1) }}</div>
        </div>
    </header>

    <!-- CONTAINER UTAMA -->
    <div class="flex flex-1 overflow-hidden">

        <!-- 2. SIDEBAR (SEBELAH KIRI) -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0">
            <div class="p-4 space-y-1">
                <p class="px-4 pt-2 pb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400">Menu Utama</p>
                <a href="{{ url('admin/dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ Request::is('admin/dashboard') ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 font-medium border border-transparent' }} text-sm transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10"/></svg>
                    Dashboard
                </a>
                <a href="{{ url('admin/articles') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ Request::is('admin/articles*') ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 font-medium border border-transparent' }} text-sm transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Mengelola Artikel
                </a>
                <div x-data="{ open: {{ Request::is('admin/products*') ? 'true' : 'false' }} }" class="space-y-1">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl {{ Request::is('admin/products*') ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 font-medium border border-transparent' }} text-sm transition focus:outline-none">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <span>Mengelola Produk</span>
                        </div>
                        <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <!-- Submenu Ikan & Tumbuhan -->
                    <div x-show="open" 
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        style="display: none;" 
                        class="pl-11 pr-2 space-y-1 mt-1">
                        
                        <a href="{{ url('admin/products/ikan') }}" class="block px-3 py-2 text-sm rounded-lg transition-colors {{ Request::is('admin/products/ikan*') ? 'text-emerald-700 bg-emerald-50 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                            Ikan Cupang
                        </a>
                        
                        <a href="{{ url('admin/products/tumbuhan') }}" class="block px-3 py-2 text-sm rounded-lg transition-colors {{ Request::is('admin/products/tumbuhan*') ? 'text-emerald-700 bg-emerald-50 font-semibold' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50 font-medium' }}">
                            Tumbuhan
                        </a>
                    </div>
                </div>
                <a href="{{ route('teams.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ Request::is('admin/teams*') ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 font-medium border border-transparent' }} text-sm transition">
                    <!-- Ikon User Group -->
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Kelola Tim
                </a>
                <a href="{{ url('admin/reviews') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ Request::is('admin/reviews*') ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 font-medium border border-transparent' }} text-sm transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Ulasan
                </a>
                <a href="{{ url('admin/category-admins') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-xl {{ Request::is('admin/category-admins*') ? 'bg-emerald-50 text-emerald-700 font-semibold border border-emerald-100' : 'text-gray-600 hover:bg-gray-50 font-medium border border-transparent' }} text-sm transition">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Admin Ikan & Tumbuhan
                </a>

            </div>

            <div class="p-4 border-t border-gray-200">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full text-left px-4 py-2.5 rounded-xl text-red-600 hover:bg-red-50 font-semibold text-sm transition">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- 3. MAIN CONTENT (AREA KANAN YANG AKAN BERGANTI-GANTI) -->
        <main class="flex-1 p-8 overflow-y-auto">
            @yield('content') <!-- Bagian ini yang akan diisi secara dinamis -->
        </main>

    </div>

</body>
</html>