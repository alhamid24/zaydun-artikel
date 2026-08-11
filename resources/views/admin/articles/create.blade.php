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
            <label class="block text-xs font-bold text-emerald-800 mb-1"><x-icon name="bolt" class="w-3 h-3 inline-block -mt-0.5 align-middle" /> PILIHAN PRAKTIS:</label>
            <input type="file" id="word_file" accept=".docx" class="hidden" onchange="uploadWordFile()">
            <button type="button" onclick="document.getElementById('word_file').click()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                <x-icon name="folder-open" class="w-3.5 h-3.5 inline-block -mt-0.5 align-middle" /> Import dari Word (.docx)
            </button>
            <span id="word_status" class="inline-flex items-center gap-1.5 text-[10px] text-gray-500 mt-1">
                <span id="word_spinner" class="hidden"><svg class="w-3 h-3 animate-spin text-amber-600" fill="none" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2a10 10 0 0 1 10 10h-2a8 8 0 0 0-8-8V2z"/></svg></span>
                <span id="word_check" class="hidden"><svg class="w-3 h-3 text-emerald-600" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg></span>
                <span id="word_text"></span>
            </span>
        </div>
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
                <optgroup label="Ikan">
                    <option value="pembenihan-ikan" {{ old('tag') == 'pembenihan-ikan' ? 'selected' : '' }}>Pembenihan Ikan</option>
                    <option value="pembersihan-ikan" {{ old('tag') == 'pembersihan-ikan' ? 'selected' : '' }}>Pembersihan Ikan</option>
                    <option value="penyakit-ikan" {{ old('tag') == 'penyakit-ikan' ? 'selected' : '' }}>Penyakit Ikan</option>
                </optgroup>
                <optgroup label="Tumbuhan">
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

        <!-- SEO (Meta Tags) -->
        <div class="bg-slate-50 border border-gray-200 rounded-2xl p-6 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-gray-800"><x-icon name="search" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> SEO (Meta Tags)</h3>
                    <p class="text-xs text-gray-500">Atur judul & deskripsi yang tampil di Google dan saat artikel dibagikan. Kosongkan untuk memakai otomatis dari judul & isi artikel.</p>
                </div>
                <button type="button" onclick="resetSeoDefaults()" class="text-xs font-semibold text-cyan-600 hover:text-cyan-800 hover:underline inline-flex items-center gap-1"><x-icon name="arrow-path" class="w-3.5 h-3.5" /> Reset ke default</button>
            </div>

            <!-- Preview Google / SERP -->
            <div class="bg-white border border-gray-200 rounded-xl p-4 space-y-1">
                <p id="serp_url" class="text-sm text-emerald-700 font-medium">zaydun.com/artikel/...</p>
                <p id="serp_title" class="text-xl text-blue-600 font-medium leading-snug">Judul artikel Anda</p>
                <p id="serp_desc" class="text-sm text-gray-600 leading-snug">Deskripsi singkat artikel yang tampil di hasil pencarian...</p>
            </div>

            <!-- Meta Title -->
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Meta Title <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" maxlength="70" placeholder="Otomatis dari judul artikel..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500" oninput="updateSeoPreview()">
                <div class="flex justify-between mt-1">
                    <p class="text-xs text-gray-400">Disarankan maksimal 60 karakter.</p>
                    <p class="text-xs font-semibold text-gray-400"><span id="meta_title_count">0</span>/70</p>
                </div>
            </div>

            <!-- Meta Description -->
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Meta Description <span class="text-gray-400 font-normal">(opsional)</span></label>
                <textarea name="meta_description" id="meta_description" rows="3" maxlength="160" placeholder="Otomatis dari isi artikel..." class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500" oninput="updateSeoPreview()">{{ old('meta_description') }}</textarea>
                <div class="flex justify-between mt-1">
                    <p class="text-xs text-gray-400">Disarankan maksimal 160 karakter.</p>
                    <p class="text-xs font-semibold text-gray-400"><span id="meta_desc_count">0</span>/160</p>
                </div>
            </div>

            <!-- Meta Keywords -->
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Meta Keywords <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="ikan hias, aquascape, merawat tanaman" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-500">
                <p class="text-xs text-gray-400 mt-1">Pisahkan dengan koma, maksimal 5–10 kata kunci.</p>
            </div>
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
    
    if (fileInput.files.length === 0) return;

    const formData = new FormData();
    formData.append('word_file', fileInput.files[0]);
    formData.append('_token', '{{ csrf_token() }}');

    setWordStatus("Sedang membaca file...", "loading");
    fetch("{{ url('admin/articles/import-word') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.text) {
            // Masukkan hasil ekstraksi teks ke dalam Textarea isi artikel
            document.getElementById('article_content').value = data.text;
            autoFillSeo();

            setWordStatus("Berhasil disalin ke kolom isi artikel!", "success");
        } else {
            setWordStatus("Gagal membaca file.", "error");
        }
    })
    .catch(error => {
        console.error(error);
        setWordStatus("Terjadi kesalahan server.", "error");
    });
}

function setWordStatus(message, type) {
    document.getElementById('word_spinner').classList.toggle('hidden', type !== 'loading');
    document.getElementById('word_check').classList.toggle('hidden', type !== 'success');
    const text = document.getElementById('word_text');
    text.innerText = message;
    text.className = type === 'loading' ? 'text-amber-600' : (type === 'success' ? 'text-emerald-600' : 'text-red-600');
}

// ===== SEO PREVIEW =====
function getPlainContent() {
    const raw = document.getElementById('article_content').value;
    return raw.replace(/<[^>]*>/g, ' ').replace(/\s+/g, ' ').trim();
}

function getFallbackTitle() {
    return document.getElementById('article_title').value.trim() || 'Judul artikel Anda';
}

function getFallbackDesc() {
    const plain = getPlainContent();
    return plain ? plain.substring(0, 150) : 'Deskripsi singkat artikel yang tampil di hasil pencarian...';
}

function updateSeoPreview() {
    const titleInput = document.getElementById('meta_title');
    const descInput = document.getElementById('meta_description');
    const title = titleInput.value.trim() || getFallbackTitle();
    const desc = descInput.value.trim() || getFallbackDesc();
    const slug = document.getElementById('article_title').value.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '') || 'artikel';

    document.getElementById('serp_title').textContent = title;
    document.getElementById('serp_desc').textContent = desc.length > 160 ? desc.substring(0, 157) + '...' : desc;
    document.getElementById('serp_url').textContent = 'zaydun.com/artikel/' + slug;
    document.getElementById('meta_title_count').textContent = titleInput.value.length;
    document.getElementById('meta_desc_count').textContent = descInput.value.length;
}

function autoFillSeo() {
    const titleInput = document.getElementById('meta_title');
    const descInput = document.getElementById('meta_description');
    if (!titleInput.value.trim() && document.getElementById('article_title').value.trim()) {
        titleInput.value = getFallbackTitle();
    }
    if (!descInput.value.trim() && getPlainContent()) {
        descInput.value = getFallbackDesc();
    }
    updateSeoPreview();
}

function resetSeoDefaults() {
    document.getElementById('meta_title').value = getFallbackTitle();
    document.getElementById('meta_description').value = getFallbackDesc();
    updateSeoPreview();
}

document.getElementById('article_title').addEventListener('input', autoFillSeo);
document.getElementById('article_content').addEventListener('input', autoFillSeo);

autoFillSeo();
</script>
@endsection