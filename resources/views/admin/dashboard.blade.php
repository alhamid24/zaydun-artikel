@extends('admin.layout')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Ringkasan Performa Toko Hari Ini</h1>
        <p class="text-sm text-gray-500">Kelola konten informasi hobi dan produk Zaydun dari panel ini.</p>
    </div>

    <!-- KARTU RINGKASAN DATA -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Artikel</h3>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalArtikel }} <span class="text-sm font-normal text-gray-500">konten</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Produk</h3>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalProduk }} <span class="text-sm font-normal text-gray-500">produk</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Pembaca</h3>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalViews) }} <span class="text-sm font-normal text-gray-500">kali dibaca</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Total Category Admin</h3>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $totalCategoryAdmins }} <span class="text-sm font-normal text-gray-500">admin</span></p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Status Website</h3>
            <p class="text-xl font-bold text-emerald-600 mt-3 flex items-center">
                <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full inline-block mr-2 animate-pulse"></span>
                Online / Aktif
            </p>
        </div>
    </div>

    <!-- STATISTIK PEMBACA ARTIKEL -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-200">
            <h2 class="font-bold text-gray-900">Peringkat Pembaca Artikel</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 border-b border-gray-200">
                        <th class="p-4">No</th>
                        <th class="p-4">Judul Artikel</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4 text-center">Jumlah Pembaca</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($allArticles as $index => $article)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-bold text-gray-400">{{ $index + 1 }}</td>
                            <td class="p-4 font-medium text-gray-900">{{ $article->title }}</td>
                            <td class="p-4">
                                <span class="bg-emerald-100 text-emerald-800 text-xs px-2.5 py-1 rounded-full font-semibold">
                                    {{ $article->category->name }}
                                </span>
                            </td>
                            <td class="p-4 text-center font-bold text-emerald-600">
                                {{ number_format($article->views) }}x dibaca
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-400">Belum ada data artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- STATISTIK PRODUK -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-200">
            <h2 class="font-bold text-gray-900">Statistik Produk</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 border-b border-gray-200">
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4 text-center">Harga</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($allProducts as $index => $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-bold text-gray-400">{{ $index + 1 }}</td>
                            <td class="p-4 font-medium text-gray-900">{{ $product->name }}</td>
                            <td class="p-4">
                                <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-1 rounded-full font-semibold">
                                    {{ $product->category->name }}
                                </span>
                            </td>
                            <td class="p-4 text-center font-bold text-blue-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-400">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
