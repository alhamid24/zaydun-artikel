<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $product->name }} - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta property="og:site_name" content="Zaydun">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Pesan {{ $product->name }} - Zaydun">
    <meta property="og:description" content="Pesan {{ $product->name }} via WhatsApp. Isi data diri dan alamat untuk proses pemesanan cepat.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script defer src="{{ asset('js/animate.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 text-gray-800 font-sans flex flex-col min-h-screen">

    <x-navbar theme="{{ $product->category->slug === 'ikan-cupang' ? 'ikan' : 'tumbuhan' }}" />

    <main class="flex-1 w-full">

        <!-- BREADCRUMB -->
        <div class="max-w-3xl mx-auto px-4 pt-6">
            <nav class="text-xs text-slate-500 flex items-center gap-1.5 flex-wrap">
                <a href="{{ url('/') }}" class="hover:text-cyan-600 transition font-medium">Beranda</a>
                <span class="text-slate-300">›</span>
                <a href="{{ $product->category->slug === 'ikan-cupang' ? route('kategori.ikan') : route('kategori.tumbuhan') }}" class="hover:text-cyan-600 transition font-medium">
                    {{ $product->category->name }}
                </a>
                <span class="text-slate-300">›</span>
                <a href="{{ route('products.show', $product->slug) }}" class="hover:text-cyan-600 transition font-medium">{{ $product->name }}</a>
                <span class="text-slate-300">›</span>
                <span class="text-slate-800 font-semibold">Pesan</span>
            </nav>
        </div>

        @php $isIkan = $product->category->slug === 'ikan-cupang'; @endphp
        @php $themeColor = $isIkan ? 'cyan' : 'emerald'; @endphp
        @php $waNumber = $product->whatsapp_number ?? '6281234567890'; @endphp

        <!-- FORM PEMESANAN -->
        <section class="max-w-3xl mx-auto px-4 mt-6 mb-12 reveal">
            <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm">

                <!-- Ringkasan Produk -->
                <div class="flex gap-4 p-6 border-b border-slate-100 bg-slate-50">
                    <img loading="lazy" decoding="async" src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-xl shrink-0">
                    <div class="flex-1 min-w-0">
                        <h1 class="font-bold text-slate-800">Pesan: {{ $product->name }}</h1>
                        <p class="text-lg font-black {{ $isIkan ? 'text-cyan-600' : 'text-emerald-600' }}">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="p-6 md:p-8 space-y-6">

                    <!-- Jumlah -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Jumlah</label>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="ubahJumlah(-1)" class="w-10 h-10 rounded-xl border border-gray-300 flex items-center justify-center font-bold text-lg hover:bg-gray-100 transition">−</button>
                            <input type="number" id="jumlah" value="1" min="1" max="99" class="w-20 text-center px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-{{ $themeColor }}-500 font-bold text-lg">
                            <button type="button" onclick="ubahJumlah(1)" class="w-10 h-10 rounded-xl border border-gray-300 flex items-center justify-center font-bold text-lg hover:bg-gray-100 transition">+</button>
                            <span class="text-xs text-slate-400 ml-2">Maks. 99</span>
                        </div>
                    </div>

                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" id="nama" placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-{{ $themeColor }}-500" required>
                    </div>

                    <!-- No. WhatsApp -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">No. WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" id="nowa" placeholder="Contoh: 08123456789" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-{{ $themeColor }}-500" required>
                        <p class="text-xs text-gray-400 mt-1">Nomor yang bisa dihubungi untuk konfirmasi pesanan</p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea id="alamat" rows="3" placeholder="Jalan, kelurahan, kecamatan, kota, kode pos" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-{{ $themeColor }}-500" required></textarea>
                    </div>

                    <!-- Jasa Kirim -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Jasa Pengiriman <span class="text-red-500">*</span></label>
                        <select id="jasakirim" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-{{ $themeColor }}-500" required>
                            <option value="">-- Pilih jasa pengiriman --</option>
                            <option value="JNE">JNE</option>
                            <option value="J&T">J&T</option>
                        </select>
                    </div>

                    <!-- Catatan -->
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Catatan <span class="text-gray-400 font-normal">(opsional)</span></label>
                        <textarea id="catatan" rows="2" placeholder="Contoh: Tolong dibungkus rapi" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-{{ $themeColor }}-500"></textarea>
                    </div>

                    <!-- Tombol Kirim -->
                    <div class="pt-4">
                        <button onclick="kirimPesan()" class="z-btn w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm px-8 py-4 rounded-xl transition shadow-sm flex items-center justify-center gap-2">
                            <x-icon name="wa" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Kirim Pesan ke WhatsApp
                        </button>
                        <p class="text-xs text-slate-400 text-center mt-2">Data tidak disimpan, langsung dikirim via WhatsApp</p>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 mt-10 pt-14 pb-8 text-sm text-slate-400">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-10 border-b border-slate-800">
                <div class="space-y-3">
                    <span class="font-extrabold text-2xl text-cyan-400 tracking-wider">Zaydun</span>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Platform inspirasi & panduan hobi terlengkap. Menyediakan artikel perawatan hobi dan produk kebutuhan berkualitas tinggi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ url('/') }}" class="hover:text-cyan-400 transition">Beranda</a></li>
                        <li><a href="{{ route('kategori.ikan') }}" class="hover:text-cyan-400 transition">Ikan</a></li>
                        <li><a href="{{ route('kategori.tumbuhan') }}" class="hover:text-cyan-400 transition">Tumbuhan</a></li>
                        <li><a href="{{ route('artikel.index') }}" class="hover:text-cyan-400 transition">Artikel</a></li>
                        <li><a href="{{ route('tentang') }}" class="hover:text-cyan-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}" class="hover:text-cyan-400 transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-white mb-3 text-sm uppercase tracking-wider">Hubungi Kami</h4>
                    <p class="text-xs text-slate-500 mb-4">Punya pertanyaan seputar hobi? Chat admin kami langsung via WhatsApp.</p>
                    <div class="flex gap-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                        <a href="#" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="Instagram">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="TikTok">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        <a href="#" target="_blank" class="z-social text-slate-500 hover:text-white transition" title="Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pt-6 flex flex-col md:flex-row justify-between items-center text-xs text-slate-600 gap-2">
                <p>&copy; {{ date('Y') }} Zaydun. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        const jumlahInput = document.getElementById('jumlah');
        function ubahJumlah(delta) {
            let val = parseInt(jumlahInput.value) || 1;
            val = Math.max(1, Math.min(99, val + delta));
            jumlahInput.value = val;
        }

        function kirimPesan() {
            const nama = document.getElementById('nama').value.trim();
            const nowa = document.getElementById('nowa').value.trim();
            const alamat = document.getElementById('alamat').value.trim();
            const jasakirim = document.getElementById('jasakirim').value;
            const catatan = document.getElementById('catatan').value.trim();
            const jumlah = document.getElementById('jumlah').value;

            if (!nama) return alert('Silakan isi nama lengkap');
            if (!nowa) return alert('Silakan isi nomor WhatsApp');
            if (!alamat) return alert('Silakan isi alamat lengkap');
            if (!jasakirim) return alert('Silakan pilih jasa pengiriman');

            const harga = {{ $product->price }};
            const total = harga * jumlah;
            const formatRupiah = (num) => 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

            let pesan = `Halo Admin Zaydun, saya ingin memesan:\n\n`;
            pesan += `PESANAN:\n`;
            pesan += `Produk: {{ $product->name }}\n`;
            pesan += `Harga: ${formatRupiah(harga)}\n`;
            pesan += `Jumlah: ${jumlah}\n`;
            pesan += `Total: ${formatRupiah(total)}\n\n`;
            pesan += `DATA PEMESAN:\n`;
            pesan += `Nama: ${nama}\n`;
            pesan += `No. WA: ${nowa}\n`;
            pesan += `Alamat: ${alamat}\n`;
            pesan += `Jasa Kirim: ${jasakirim}\n`;
            if (catatan) {
                pesan += `\nCatatan:\n${catatan}\n`;
            }
            pesan += `\nMohon info total + ongkir. Terima kasih.`;

            const url = `https://wa.me/{{ $waNumber }}?text=${encodeURIComponent(pesan)}`;
            window.open(url, '_blank');
        }
    </script>

</body>
</html>
