@extends('admin.layout')

@section('content')
<div class="max-w-3xl bg-white p-8 rounded-2xl shadow-sm border border-gray-200">
    <div class="mb-6 flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Artikel Baru</h1>
            <p class="text-sm text-gray-500">Tulis informasi atau tips hobi menarik untuk pengunjung Zaydun.</p>
        </div>
        
        <!-- FITUR BARU: Input Ekstrak File Word -->
        <div class="bg-emerald-50 p-3 rounded-xl border border-emerald-200 text-right">
            <label class="block text-xs font-bold text-emerald-800 mb-1">⚡ PILIHAN PRAKTIS:</label>
            <input type="file" id="word_file" accept=".docx" class="hidden" onchange="uploadWordFile()">
            <button type="button" onclick="document.getElementById('word_file').click()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                📂 Import dari Word (.docx)
            </button>
            <span id="word_status" class="block text-[10px] text-gray-500 mt-1"></span>
        </div>
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

    <form action="{{ url('admin/articles') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Input Judul -->
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Judul Artikel</label>
            <input type="text" name="title" id="article_title" value="{{ old('title') }}" placeholder="Contoh: Tips Merawat Tanaman Hias untuk Pemula" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
        </div>

        <!-- Pilihan Kategori -->
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Kategori Hobi</label>
            <select name="category_id" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tag Artikel -->
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Tag Artikel <span class="text-gray-400 font-normal">(opsional)</span></label>
            <select name="tag" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="">-- Tanpa Tag --</option>
                <optgroup label="🐟 Ikan">
                    <option value="pembenihan-ikan" {{ old('tag') == 'pembenihan-ikan' ? 'selected' : '' }}>Pembenihan Ikan</option>
                    <option value="pembersihan-ikan" {{ old('tag') == 'pembersihan-ikan' ? 'selected' : '' }}>Pembersihan Ikan</option>
                    <option value="penyakit-ikan" {{ old('tag') == 'penyakit-ikan' ? 'selected' : '' }}>Penyakit Ikan</option>
                </optgroup>
                <optgroup label="🌱 Tumbuhan">
                    <option value="penanaman" {{ old('tag') == 'penanaman' ? 'selected' : '' }}>Penanaman</option>
                    <option value="perawatan-tanaman" {{ old('tag') == 'perawatan-tanaman' ? 'selected' : '' }}>Perawatan Tanaman</option>
                    <option value="hama-penyakit" {{ old('tag') == 'hama-penyakit' ? 'selected' : '' }}>Hama & Penyakit</option>
                </optgroup>
            </select>
        </div>

        <!-- Upload Gambar Thumbnail -->
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Gambar Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100" required>
            <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
        </div>

        <!-- Isi Konten Artikel -->
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-2">Isi Artikel</label>
            <textarea name="content" id="article_content" rows="8" placeholder="Tulis artikel lengkap di sini..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>{{ old('content') }}</textarea>
        </div>

        <!-- Checkbox Status Terbit -->
        <div class="flex items-center">
            <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
            <label for="is_published" class="ml-2 text-sm font-medium text-gray-700">Terbitkan artikel ini sekarang (Published)</label>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
            <a href="{{ url('admin/articles') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-5 py-2.5 rounded-xl text-sm transition">
                Batal
            </a>
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-2.5 rounded-xl text-sm transition shadow-sm">
                Simpan Artikel
            </button>
        </div>
    </form>
</div>

<!-- JAVASCRIPT AJAX UNTUK EKSTRAK WORD TANPA RELOAD -->
<script>
function uploadWordFile() {
    const fileInput = document.getElementById('word_file');
    const statusSpan = document.getElementById('word_status');
    
    if (fileInput.files.length === 0) return;

    const formData = new FormData();
    formData.append('word_file', fileInput.files[0]);
    formData.append('_token', '{{ csrf_token() }}');

    statusSpan.innerText = "⏳ Sedang membaca file...";
    statusSpan.className = "block text-[10px] text-amber-600 mt-1";

    fetch("{{ url('admin/articles/import-word') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.text) {
            // Masukkan hasil ekstraksi teks ke dalam Textarea isi artikel
            document.getElementById('article_content').value = data.text;
            
            statusSpan.innerText = "✓ Berhasil disalin ke kolom isi artikel!";
            statusSpan.className = "block text-[10px] text-emerald-600 mt-1";
        } else {
            statusSpan.innerText = "❌ Gagal membaca file.";
            statusSpan.className = "block text-[10px] text-red-600 mt-1";
        }
    })
    .catch(error => {
        console.error(error);
        statusSpan.innerText = "❌ Terjadi kesalahan server.";
        statusSpan.className = "block text-[10px] text-red-600 mt-1";
    });
}
</script>
@endsection