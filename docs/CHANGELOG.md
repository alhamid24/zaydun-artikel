# CHANGELOG

Daftar perbaikan dan pembaruan situs Zaydun.

- Tanggal dibuat: 15 Agustus 2026
- Proyek: Zaydun Farm Indonesia (Laravel)

## 15 Agustus 2026

### Perbaikan & Pembaruan

### 1. Halaman /kategori/tumbuhan
- Dirombak mengikuti gaya `/kategori/ikan`: katalog produk, section admin, navigasi artikel (dropdown tag), daftar artikel, CTA ke halaman ikan.
- Tema warna: emerald.
- Bagian artikel & admin dipertahankan.

### 2. Halaman /kategori/ikan
- Ditambah section admin (tema cyan), navigasi info artikel per tag (Perawatan Ikan → `pembenihan-ikan`, `pembersihan-ikan`, `penyakit-ikan`), daftar artikel, CTA ke halaman tumbuhan.

### 3. Heading beranda
- Heading kedua section beranda ("IKAN CUPANG" & tumbuhan) dibuat rata tengah.

### 4. Filter kategori produk (#1)
- **Sebelum**: halaman kategori ikan menampilkan semua produk.
- **Sekarang**: hanya produk kategori `ikan-cupang` untuk halaman ikan; hanya `tumbuh-tumbuhan` untuk halaman tumbuhan (via `whereHas` di `KategoriController`).

### 5. Filter artikel draft (#2)
- Artikel berstatus draft (`is_published = false`) kini tidak tampil di publik.
- Diterapkan di `HomeController` (articlesFish/articlesPlant) dan `KategoriController` (ikan/tumbuhan).

### 6. Redirect URL & penghapusan template lama (#3)
- `/ikan-cupang` & `/tumbuhan` kini redirect ke `/kategori/ikan` & `/kategori/tumbuhan` (sebelumnya merender template lorem ipsum).
- Tombol carousel di layout diarahkan ke route kategori.
- Template lama `resources/views/ikan-cupang.blade.php` dan `resources/views/tumbuhan.blade.php` dihapus.

### 7. Stok produk tampil di publik (#4)
- Komponen baru `resources/views/components/stock-badge.blade.php`:
  - stok 0 → badge merah **"Habis"**
  - stok 1–5 → badge amber **"Sisa X"**
  - stok > 5 → tidak ada badge.
- Badge dipasang di 6 lokasi kartu produk: beranda (best seller), `kategori/ikan`, `kategori/tumbuhan`, `produk/ikan`, `produk/tumbuhan`, dan produk terkait di halaman detail.
- Halaman detail produk: status stok dekat harga ("Stok tersedia" / "Sisa X unit" / "Stok habis"); saat stok 0 tombol beli diganti tombol nonaktif "Stok Habis".
- Halaman pesan (`produk/{slug}/pesan`): jumlah dibatasi `min(stok, 99)`, menampilkan "Stok tersedia: X"; saat stok 0 → banner merah + tombol kirim dinonaktifkan + guard JS (`STOK_MAX`).

### 8. Nomor WhatsApp terpusat (#5)
- Migration baru `2026_08_15_000000_add_whatsapp_to_owner_profile_table`: kolom `whatsapp` di tabel `owner_profile` (sudah dijalankan).
- Dapat diubah dari admin → **Profil Pemilik** (field baru "No. WhatsApp", validasi + normalisasi digit).
- Helper `default_wa_number()` di `app/helpers.php` (terdaftar di composer autoload, fallback `6281234567890`).
- Semua nomor WhatsApp hardcoded (±14 tempat) di view publik/admin diganti ke helper.
- Prioritas nomor per-produk (`$product->whatsapp_number`) di halaman pesan tetap berlaku.
- Form produk baru otomatis default ke nomor pemilik.

### Teknis
- File baru: `app/helpers.php`, `resources/views/components/stock-badge.blade.php`, migration `2026_08_15_000000_add_whatsapp_to_owner_profile_table.php`.
- File diubah:
  - `app/Http/Controllers/HomeController.php`
  - `app/Http/Controllers/KategoriController.php`
  - `app/Http/Controllers/Admin/OwnerProfileController.php`
  - `app/Models/OwnerProfile.php`
  - `composer.json`
  - `routes/web.php`
  - `resources/views/` (home, kategori/ikan, kategori/tumbuhan, produk/ikan, produk/tumbuhan, produk/show, produk/order, kontak, tentang, artikel/index, components/footer, components/layout, admin/owner-profile/edit, admin/articles/show, admin/products/create, admin/products/edit)
- Verifikasi: `php -l`, `composer dump-autoload`, `php artisan migrate`, `php artisan view:clear`, render 10 halaman publik (HTTP 200), pengujian varian stok (tersedia / sisa / habis).

### Catatan / Blocker

- `app/Http/Controllers/Admin/ProductController.php` masih berstatus konflik merge (`UU`) — belum diselesaikan.
