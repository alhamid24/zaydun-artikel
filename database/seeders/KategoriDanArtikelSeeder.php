<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Str;

class KategoriDanArtikelSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori
        $cupang = Category::create([
            'name' => 'Ikan Cupang',
            'slug' => Str::slug('Ikan Cupang'),
            'icon' => 'fish-icon.png'
        ]);

        $tanaman = Category::create([
            'name' => 'Tumbuh-tumbuhan',
            'slug' => Str::slug('Tumbuh-tumbuhan'),
            'icon' => 'leaf-icon.png'
        ]);

        $pancing = Category::create([
            'name' => 'Alat Pancing',
            'slug' => Str::slug('Alat Pancing'),
            'icon' => 'rod-icon.png'
        ]);

        // 2. Buat Artikel - Ikan Cupang
        Article::create([
            'category_id' => $cupang->id,
            'title' => 'Cara Merawat Ikan Cupang Halfmoon untuk Pemula',
            'slug' => Str::slug('Cara Merawat Ikan Cupang Halfmoon untuk Pemula'),
            'thumbnail' => '1784575598.jpg',
            'content' => '<p>Ikan cupang halfmoon adalah salah satu jenis cupang yang paling diminati oleh para hobiis karena keindahan ekornya yang lebar menyerupai setengah lingkaran. Untuk merawat cupang halfmoon dengan baik, ada beberapa hal penting yang perlu diperhatikan.</p><p><strong>1. Ukuran Akuarium</strong><br>Cupang halfmoon membutuhkan akuarium minimal 10 liter. Ukuran yang terlalu kecil akan membuat ikan stres dan pertumbuhannya terganggu.</p><p><strong>2. Kualitas Air</strong><br>Gunakan air yang sudah diendapkan selama 24 jam agar klorin menguap. Suhu air ideal untuk cupang adalah 24-28 derajat Celsius. Ganti air setiap 3-4 hari sekali.</p><p><strong>3. Pakan</strong><br>Berikan pakan berupa pelet khusus cupang, jangkrik kecil, atau kutu air. Beri pakan 2-3 kali sehari dalam porsi kecil agar air tidak cepat keruh.</p><p><strong>4. Suhu dan Pencahayaan</strong><br>Hindari paparan sinar matahari langsung karena dapat memanaskan air secara berlebihan. Cukup beri pencahayaan tidak langsung selama 8-12 jam sehari.</p>',
            'reading_time' => 5,
            'is_published' => true
        ]);

        Article::create([
            'category_id' => $cupang->id,
            'title' => 'Mengenal Jenis-Jenis Ikan Cupang yang Populer',
            'slug' => Str::slug('Mengenal Jenis-Jenis Ikan Cupang yang Populer'),
            'thumbnail' => '1784575767.jpg',
            'content' => '<p>Ikan cupang atau Betta splendens memiliki banyak varian yang mempesona. Berikut beberapa jenis cupang yang paling populer di kalangan hobiis Indonesia.</p><p><strong>1. Cupang Halfmoon</strong><br>Dikenal dengan ekornya yang membuka lebar hingga 180 derajat. Bentuk ekor ini menjadi daya tarik utama bagi para kolektor.</p><p><strong>2. Cupang Plakat</strong><br>Cupang plakat memiliki ekor yang lebih pendek dibandingkan halfmoon. Jenis ini sering diikutsertakan dalam kontes adu cupang karena lincah dan agresif.</p><p><strong>3. Cupang Crowntail</strong><br>Ciri khasnya adalah sirip yang menjulur seperti mahkota. Crowntail memiliki penampilan yang sangat unik dan gagah.</p><p><strong>4. Cupang Koi</strong><br>Cupang koi memiliki pola warna yang bervariasi menyerupai ikan koi. Setiap cupang koi memiliki pola yang unik dan tidak ada yang sama.</p><p><strong>5. Cupang Giant</strong><br>Sesuai namanya, cupang giant memiliki ukuran tubuh yang lebih besar dari cupang pada umumnya, bisa mencapai 7-8 cm.</p>',
            'reading_time' => 6,
            'is_published' => true
        ]);

        // 3. Buat Artikel - Tumbuh-tumbuhan
        Article::create([
            'category_id' => $tanaman->id,
            'title' => 'Tips Menyiram Tanaman Hias Monsteria Agar Tidak Busuk',
            'slug' => Str::slug('Tips Menyiram Tanaman Hias Monsteria Agar Tidak Busuk'),
            'thumbnail' => '1784575770.jpg',
            'content' => '<p>Monstera adalah salah satu tanaman hias yang sedang tren. Namun, banyak pemula yang gagal merawatnya karena salah dalam menyiram. Berikut tips yang benar.</p><p><strong>1. Frekuensi Penyiraman</strong><br>Siram monstera setiap 7-10 hari sekali, atau saat media tanam bagian atas sudah terasa kering. Jangan terlalu sering menyiram karena akar monstera mudah busuk.</p><p><strong>2. Jumlah Air</strong><br>Cukup siram hingga air keluar dari lubang pot bawah. Pastikan pot memiliki drainage hole yang baik agar air tidak menggenang.</p><p><strong>3. Jenis Air</strong><br>Gunakan air yang sudah diendapkan atau air hujan. Monstera cukup sensitif terhadap kandungan klorin dalam air keran.</p><p><strong>4. Waktu Penyiraman</strong><br>Waktu terbaik untuk menyiram adalah pagi hari atau sore hari. Hindari menyiram di siang hari saat matahari terik karena bisa membuat daun terbakar.</p>',
            'reading_time' => 4,
            'is_published' => true
        ]);

        Article::create([
            'category_id' => $tanaman->id,
            'title' => '5 Tanaman Hias yang Cocok untuk Ruangan Minim Cahaya',
            'slug' => Str::slug('5 Tanaman Hias yang Cocok untuk Ruangan Minim Cahaya'),
            'thumbnail' => '1784575872.jpg',
            'content' => '<p>Tidak semua ruangan di rumah memiliki pencahayaan yang cukup untuk tanaman. Namun, beberapa tanaman hias berikut tetap bisa tumbuh subur meski di ruangan yang minim cahaya.</p><p><strong>1. Pothos (Sirih Gading)</strong><br>Pothos adalah tanaman yang sangat tangguh dan bisa tumbuh di tempat yang hampir tidak ada cahaya. Daunnya yang menjuntai cocok untuk diletakkan di rak tinggi.</p><p><strong>2. ZZ Plant (Zamioculcas)</strong><br>ZZ Plant dikenal sebagai tanaman yang hampir mustahil untuk mati. Tanaman ini bisa bertahan dalam kondisi gelap dan jarang disiram.</p><p><strong>3. Snake Plant (Lidah Mertua)</strong><br>Selain bisa bertahan di ruangan minim cahaya, snake plant juga terkenal sebagai tanaman penyerap racun udara alami.</p><p><strong>4. Peace Lily</strong><br>Peace Lily memiliki bunga putih yang anggun. Tanaman ini justru lebih suka teduh dan akan memberikan tanda layu jika terlalu banyak cahaya.</p><p><strong>5. Fern (Pakis)</strong><br>Berbagai jenis pakis cocok ditanam di tempat teduh. Tanaman ini menyukai kelembaban tinggi dan cahaya tidak langsung.</p>',
            'reading_time' => 5,
            'is_published' => true
        ]);

        // 4. Buat Artikel - Alat Pancing
        Article::create([
            'category_id' => $pancing->id,
            'title' => 'Panduan Memilih Joran Pancing untuk Pemula',
            'slug' => Str::slug('Panduan Memilih Joran Pancing untuk Pemula'),
            'thumbnail' => '1784648012.jpg',
            'content' => '<p>Memilih joran pancing yang tepat sangat penting, terutama bagi pemula. Joran yang sesuai akan membuat pengalaman memancing menjadi lebih menyenangkan dan efektif.</p><p><strong>1. Panjang Joran</strong><br>Untuk pemancing pemula di danau atau waduk, joran dengan panjang 180-240 cm sudah cukup. Untuk pancingan laut, gunakan joran yang lebih panjang yaitu 270-360 cm.</p><p><strong>2. Material</strong><br>Joran dari material fiberglass lebih kuat dan tahan lama, namun berat. Joran carbon lebih ringan dan sensitif, cocok untuk mancing ikan kecil hingga sedang.</p><p><strong>3. Test Weight</strong><br>Test weight menunjukkan berat maksimal ikan yang bisa ditarik joran. Untuk pemula, pilih joran dengan test weight 5-15 lb yang serbaguna.</p><p><strong>4. Handle</strong><br>Pilih handle yang nyaman digenggam. Foam handle memberikan kenyamanan ekstra saat memancing dalam waktu lama.</p>',
            'reading_time' => 4,
            'is_published' => true
        ]);

        Article::create([
            'category_id' => $pancing->id,
            'title' => 'Tips Mancing Ikan Nila di Kolam dan Danau',
            'slug' => Str::slug('Tips Mancing Ikan Nila di Kolam dan Danau'),
            'thumbnail' => '1784575598.jpg',
            'content' => '<p>Ikan nila adalah salah satu target mancing yang populer karena mudah ditemukan dan cukup agresif memakan umpan. Berikut tips untuk mendapatkan hasil yang maksimal.</p><p><strong>1. Waktu Terbaik Mancing</strong><br>Ikan nila paling aktif makan pada pagi hari (05.00-08.00) dan sore hari (15.00-17.00). Di siang hari, nila cenderung bersembunyi di dasar air.</p><p><strong>2. Pilihan Umpan</strong><br>Nila adalah ikan omnivora, sehingga mau memakan berbagai jenis umpan. Pelet, lumut, cacing, dan jagung manis adalah umpan yang paling efektif.</p><p><strong>3. Ukuran Kail</strong><br>Gunakan kail berukuran kecil (no. 6-8) karena mulut nila relatif kecil. Kail yang terlalu besar akan membuat nila sulit menelan umpan.</p><p><strong>4. Teknik Mancing</strong><br>Gunakan teknik dasar dengan pemberat kecil dan pelampung kecil. Perhatikan pergerakan pelampung karena nila biasanya hanya menggigit pelan sebelum menelan umpan sepenuhnya.</p>',
            'reading_time' => 4,
            'is_published' => true
        ]);

        // 5. Buat Produk
        Product::create([
            'category_id' => $cupang->id,
            'name' => 'Pelet Premium Cupang Zaydun',
            'slug' => Str::slug('Pelet Premium Cupang Zaydun'),
            'description' => 'Pelet premium khusus ikan cupang dengan kandungan protein tinggi. Membantu mempercepat pertumbuhan dan memperindah warna ikan cupang kesayangan Anda. Cocok untuk semua jenis cupang.',
            'image' => 'pelet.jpg',
            'price' => 35000,
            'whatsapp_number' => '628123456789'
        ]);

        Product::create([
            'category_id' => $tanaman->id,
            'name' => 'Pupuk Organik Tanaman Hias Zaydun',
            'slug' => Str::slug('Pupuk Organik Tanaman Hias Zaydun'),
            'description' => 'Pupuk organik cair khusus tanaman hias. Kaya nutrisi dan aman untuk semua jenis tanaman hias dalam pot. Cukup seminggu sekali untuk hasil optimal.',
            'image' => 'pupuk.jpg',
            'price' => 45000,
            'whatsapp_number' => '628123456789'
        ]);

        Product::create([
            'category_id' => $pancing->id,
            'name' => 'Joran Pancing Ringan Carbon Zaydun',
            'slug' => Str::slug('Joran Pancing Ringan Carbon Zaydun'),
            'description' => 'Joran pancing ringan dari material carbon high quality. Panjang 180-240cm, cocok untuk mancing ikan nila, mujair, dan ikan air tawar lainnya. Ringan dan nyaman digenggam.',
            'image' => 'joran.jpg',
            'price' => 125000,
            'whatsapp_number' => '628123456789'
        ]);
    }
}
