@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Mengelola Produk</h1>
            <p class="text-sm text-gray-500">Daftar barang yang dijual dan dihubungkan ke WhatsApp.</p>
        </div>
        <a href="{{ url('admin/products/create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-xl text-sm transition">
            + Tambah Produk Baru
        </a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-100 text-emerald-700 p-3 rounded-lg mb-4 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-200 bg-gray-50 text-gray-600 text-sm font-semibold">
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
                        <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" class="w-12 h-12 object-cover rounded-lg">
                    </td>
                    <td class="p-4 font-semibold text-gray-800">{{ $product->name }}</td>
                    <td class="p-4 text-gray-500">{{ $product->category->name }}</td>
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
                            <form action="{{ route('products.updateStock', $product->id) }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="stock" min="0" value="{{ $product->stock }}"
                                    class="w-20 px-2 py-1.5 border border-gray-300 rounded-lg text-center text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                <button class="text-emerald-600 hover:text-emerald-800 font-semibold text-sm hover:underline whitespace-nowrap">Simpan</button>
                            </form>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 font-semibold text-xs hover:underline">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-8 text-center text-gray-400 italic">Belum ada produk. Yuk tambah baru!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection