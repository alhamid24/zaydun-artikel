@extends('admin.layout')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Produk</h1>
        <p class="text-sm text-gray-500">Perbarui info produk yang dijual via WhatsApp.</p>
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

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Contoh: Pelet Cupang Premium Zaydun" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Kategori Produk</label>
                <select name="category_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Subkategori</label>
                <select name="subcategory_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">-- Tidak Ada / Lainnya --</option>
                    @foreach($subcategories->groupBy(fn($s) => $s->category->name) as $groupName => $group)
                        <optgroup label="{{ $groupName }}">
                            @foreach($group as $subcategory)
                                <option value="{{ $subcategory->id }}" {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="Contoh: 35000" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" min="0" placeholder="Contoh: 10" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                <p class="text-xs text-gray-400 mt-1">Jumlah sisa stok produk.</p>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Nomor WhatsApp Admin (Format: 628xxx)</label>
            <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $product->whatsapp_number) }}" placeholder="62812xxxxxxx" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            <p class="text-xs text-gray-400 mt-1">Gunakan format internasional tanpa tanda + atau 0 di depan (contoh: 6281234567890).</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Foto Produk</label>
            @if($product->image)
                <div class="mb-3">
                    <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="Foto produk saat ini" class="w-40 h-40 object-cover rounded-xl border border-gray-200">
                    <p class="text-xs text-gray-400 mt-1">Foto saat ini. Upload foto baru di bawah jika ingin mengganti.</p>
                </div>
            @endif
            <input type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengganti.</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Deskripsi Produk</label>
            <textarea name="description" rows="4" placeholder="Tuliskan keunggulan dan spesifikasi produk..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ url('admin/products') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                Batal
            </a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition shadow-sm">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
