@extends('admin.layout')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit Anggota Tim</h1>
        <p class="text-sm text-gray-500">Informasi ini akan tampil di halaman Tentang Kami.</p>
    </div>

    <!-- Tampilkan Error Validasi jika ada -->
    @if($errors->any())
        <div class="flex items-start gap-2.5 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT') <!-- Wajib ada untuk proses Update di Laravel -->

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap</label>
                <!-- Menambahkan $team->name ke dalam value -->
                <input type="text" name="name" value="{{ old('name', $team->name) }}" placeholder="Contoh: Patih Wijaya" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Jabatan</label>
                <!-- Menambahkan $team->position ke dalam value -->
                <input type="text" name="position" value="{{ old('position', $team->position) }}" placeholder="Contoh: Bosss / CEO" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Foto Anggota</label>
            
            <!-- Menampilkan foto lama jika ada -->
            @if($team->image)
                <div class="mb-3">
                    <img src="{{ asset('uploads/teams/'.$team->image) }}" alt="Foto {{ $team->name }}" class="w-32 h-32 object-cover rounded-xl border border-gray-200 shadow-sm">
                    <p class="text-xs text-gray-400 mt-2">Foto saat ini. Upload foto baru di bawah jika ingin mengganti.</p>
                </div>
            @endif

            <!-- Atribut required dihapus agar admin tidak wajib upload foto baru jika hanya ingin mengubah nama/bio -->
            <input type="file" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
            <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengganti foto.</p>
        </div>

        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Cerita Singkat (Bio)</label>
            <!-- Menambahkan $team->bio di antara tag textarea -->
            <textarea name="bio" rows="4" placeholder="Tuliskan bio singkat..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>{{ old('bio', $team->bio) }}</textarea>
        </div>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ route('teams.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition">Batal</a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition shadow-sm">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection