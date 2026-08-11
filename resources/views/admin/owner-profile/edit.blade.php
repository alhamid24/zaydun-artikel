@extends('admin.layout')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Profil Pemilik Usaha</h1>
        <p class="text-sm text-gray-500">Informasi ini akan tampil di halaman Tentang Kami untuk membangun kepercayaan pengunjung.</p>
    </div>

    @if(session('success'))
        <div class="flex items-center gap-2.5 bg-emerald-50 border border-emerald-200 text-emerald-700 p-3.5 rounded-xl mb-6 text-sm font-medium">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

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

    <form action="{{ url('admin/owner-profile') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}" placeholder="Nama pemilik usaha" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Jabatan</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" placeholder="Contoh: Founder Zaydun" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Foto Pemilik</label>
            @if($profile->photo)
                <div class="mb-3">
                    <img decoding="async" src="{{ asset('uploads/owner/'.$profile->photo) }}" alt="{{ $profile->name }}" class="w-28 h-28 object-cover rounded-2xl border border-gray-200">
                    <p class="text-xs text-gray-400 mt-1">Foto saat ini. Upload foto baru untuk mengganti.</p>
                </div>
            @endif
            <input type="file" name="photo" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Cerita Singkat (Bio)</label>
            <textarea name="bio" rows="5" placeholder="Tulis cerita singkat tentang latar belakang, mengapa memulai bisnis ini, dll." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('bio', $profile->bio) }}</textarea>
        </div>

        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
            <div>
                @if($profile->exists)
                <form action="{{ url('admin/owner-profile') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus profil pemilik? Data akan hilang permanen.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-600 font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                        Hapus Profil
                    </button>
                </form>
                @endif
            </div>
            <div class="flex space-x-3">
                <a href="{{ url('admin/dashboard') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                    Batal
                </a>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition shadow-sm">
                    Simpan Profil
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
