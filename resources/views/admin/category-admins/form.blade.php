@extends('admin.layout')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ $admin->exists ? 'Edit Admin' : 'Tambah Admin Baru' }}</h1>
        <p class="text-sm text-gray-500">Data admin akan tampil di halaman kategori masing-masing.</p>
    </div>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6 text-sm">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ $admin->exists ? url('admin/category-admins/'.$admin->id) : url('admin/category-admins') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if($admin->exists)
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $admin->name) }}" placeholder="Nama admin" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Jabatan</label>
                <input type="text" name="title" value="{{ old('title', $admin->title) }}" placeholder="Contoh: Admin Ikan Cupang" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Kategori <span class="text-red-500">*</span></label>
            <select name="category" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                <option value="" disabled {{ !$admin->exists ? 'selected' : '' }}>-- Pilih kategori --</option>
                <option value="ikan" {{ old('category', $admin->category) == 'ikan' ? 'selected' : '' }}>Ikan Cupang</option>
                <option value="tumbuhan" {{ old('category', $admin->category) == 'tumbuhan' ? 'selected' : '' }}>Tumbuhan</option>
            </select>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">No. WhatsApp</label>
            <input type="text" name="phone" value="{{ old('phone', $admin->phone) }}" placeholder="Contoh: 6281234567890" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <p class="text-xs text-gray-400 mt-1">Gunakan format internasional (62xxx).</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Foto Admin</label>
            @if($admin->photo)
                <div class="mb-3">
                    <img decoding="async" src="{{ asset('uploads/admins/'.$admin->photo) }}" alt="{{ $admin->name }}" class="w-28 h-28 object-cover rounded-2xl border border-gray-200">
                    <p class="text-xs text-gray-400 mt-1">Foto saat ini. Upload foto baru untuk mengganti.</p>
                </div>
            @endif
            <input type="file" name="photo" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Bio / Cerita Singkat</label>
            <textarea name="bio" rows="4" placeholder="Tulis cerita singkat tentang admin ini..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('bio', $admin->bio) }}</textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ url('admin/category-admins') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                Batal
            </a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition shadow-sm">
                {{ $admin->exists ? 'Simpan Perubahan' : 'Tambah Admin' }}
            </button>
        </div>
    </form>
</div>
@endsection
