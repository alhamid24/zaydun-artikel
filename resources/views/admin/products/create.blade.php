@extends('admin.layout')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <!-- Judul Dinamis -->
        <h1 class="text-2xl font-bold text-gray-900">Tambah Produk {{ ucfirst($category_slug) }} Baru</h1>
        <p class="text-sm text-gray-500">Masukkan info produk yang akan dijual via WhatsApp.</p>
    </div>

    @if($errors->any())
        <div class="flex items-start gap-2.5 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm">
            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Action Diperbarui -->
    <form action="{{ url('admin/products/'.$category_slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Pelet Cupang Premium Zaydun" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Kategori Produk</label>
                <!-- Menampilkan Kategori Saat Ini -->
                <input type="text" value="{{ $category->name }}" class="w-full px-4 py-2.5 border border-gray-200 bg-gray-50 text-gray-500 rounded-xl cursor-not-allowed" readonly>
                <input type="hidden" name="category_id" value="{{ $category->id }}">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="Contoh: 35000" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" placeholder="Contoh: 10" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                <p class="text-xs text-gray-400 mt-1">Jumlah sisa stok produk.</p>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Nomor WhatsApp Admin (Format: 628xxx)</label>
            <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', '6281234567890') }}" placeholder="62812xxxxxxx" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            <p class="text-xs text-gray-400 mt-1">Gunakan format internasional tanpa tanda + atau 0 di depan (contoh: 6281234567890).</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Foto Produk</label>
            <input type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100" required>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi Produk</label>
            <textarea name="description" rows="4" placeholder="Tuliskan keunggulan dan spesifikasi produk..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>{{ old('description') }}</textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <!-- URL Batal Diperbarui -->
            <a href="{{ url('admin/products/'.$category_slug) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                Batal
            </a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition shadow-sm">
                Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection