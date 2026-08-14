@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <div>
            <!-- Judul Dinamis -->
            <h1 class="text-2xl font-bold text-gray-900">Mengelola Produk {{ ucfirst($category_slug) }}</h1>
            <p class="text-sm text-gray-500">Daftar barang yang dijual dan dihubungkan ke WhatsApp.</p>
        </div>
        <!-- Link Tambah Diperbarui -->
        <a href="{{ url('admin/products/'.$category_slug.'/create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-xl text-sm transition">
            + Tambah Produk Baru
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl mb-4 text-sm font-medium">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50 text-gray-600 text-xs font-bold uppercase tracking-wider">
                    <th class="p-4">Foto</th>
                    <th class="p-4">Nama Produk</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Stok</th>
                    <th class="p-4">No. WhatsApp</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-b border-gray-100 hover:bg-gray-50 text-sm transition">
                    <td class="p-4">
                        <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" class="w-12 h-12 object-cover rounded-lg ring-1 ring-gray-200">
                    </td>
                    <td class="p-4 font-semibold text-gray-800">{{ $product->name }}</td>
                    <td class="p-4">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $product->category->name == 'Ikan' ? 'bg-cyan-100 text-cyan-700' : 'bg-emerald-100 text-emerald-700' }}">
                            {{ $product->category->name }}
                        </span>
                    </td>
                    <td class="p-4 font-bold text-emerald-600">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="p-4">
                        @php
                            $stockBadge = $product->stock <= 0 ? 'bg-red-100 text-red-700' : ($product->stock <= 10 ? 'bg-amber-100 text-amber-700' : 'bg-emerald-100 text-emerald-700');
                        @endphp
                        <span class="inline-block text-xs font-bold px-2.5 py-1 rounded-full {{ $stockBadge }}">
                            {{ $product->stock <= 0 ? 'Habis' : $product->stock . ' pcs' }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-600">{{ $product->whatsapp_number }}</td>
                    <td class="p-4">
                        <div class="flex flex-col items-end gap-2">
                            <!-- Form Stok Diperbarui -->
                            <form action="{{ url('admin/products/'.$category_slug.'/'.$product->id.'/stock') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="stock" min="0" value="{{ $product->stock }}"
                                    class="w-20 px-2 py-1.5 border border-gray-300 rounded-lg text-center text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                <button class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-600 hover:text-white transition whitespace-nowrap">Simpan Stok</button>
                            </form>
                            <div class="flex items-center gap-2">
                                <!-- URL Edit Diperbarui -->
                                <a href="{{ url('admin/products/'.$category_slug.'/'.$product->id.'/edit') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-cyan-50 text-cyan-700 border border-cyan-200 hover:bg-cyan-600 hover:text-white transition">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                                <!-- Form Hapus Diperbarui -->
                                <form action="{{ url('admin/products/'.$category_slug.'/'.$product->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-10 text-center">
                        <div class="flex flex-col items-center gap-2">
                            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            </div>
                            <p class="text-gray-400 text-sm font-medium">Belum ada produk.</p>
                            <!-- URL Tambah Empty State Diperbarui -->
                            <a href="{{ url('admin/products/'.$category_slug.'/create') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-semibold mt-1">+ Tambah Produk Baru</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection