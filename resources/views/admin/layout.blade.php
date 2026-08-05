<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col h-screen">

    <!-- 1. HEADER (BAGIAN ATAS) -->
    <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 shrink-0">
        <div class="text-xl font-bold tracking-wider text-emerald-600">Zaydun Admin</div>
        <div class="flex items-center space-x-4">
            <span class="text-sm font-medium text-gray-600">Selamat datang, {{ Auth::user()->name }}</span>
            <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center font-bold text-sm text-gray-600">A</div>
        </div>
    </header>

    <!-- CONTAINER UTAMA -->
    <div class="flex flex-1 overflow-hidden">
        
        <!-- 2. SIDEBAR (SEBELAH KIRI) -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0">
            <div class="p-4 space-y-2">
                <a href="{{ url('admin/dashboard') }}" class="block px-4 py-2.5 rounded-xl {{ Request::is('admin/dashboard') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 font-medium' }} text-sm transition">
                    Dashboard
                </a>
                <a href="{{ url('admin/articles') }}" class="block px-4 py-2.5 rounded-xl {{ Request::is('admin/articles*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 font-medium' }} text-sm transition">
                    Mengelola Artikel
                </a>
                <a href="{{ url('admin/products') }}" class="block px-4 py-2.5 rounded-xl {{ Request::is('admin/products*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 font-medium' }} text-sm transition">
                Mengelola Produk
                </a>
                <a href="{{ url('admin/owner-profile') }}" class="block px-4 py-2.5 rounded-xl {{ Request::is('admin/owner-profile*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 font-medium' }} text-sm transition">
                    Profil Pemilik
                </a>
                <a href="{{ url('admin/reviews') }}" class="block px-4 py-2.5 rounded-xl {{ Request::is('admin/reviews*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 font-medium' }} text-sm transition">
                    📝 Ulasan
                </a>
                <a href="{{ url('admin/category-admins') }}" class="block px-4 py-2.5 rounded-xl {{ Request::is('admin/category-admins*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:bg-gray-50 font-medium' }} text-sm transition">
                    🐟 Admin Ikan & 🌱 Tumbuhan
                </a>

            </div>
            
            <div class="p-4 border-t border-gray-100">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2.5 rounded-xl text-red-600 hover:bg-red-50 font-semibold text-sm transition">
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