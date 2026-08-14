<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Zaydun Farm Indonesia' }}</title>
    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta property="og:site_name" content="Zaydun">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Zaydun Farm Indonesia' }}">
    <meta property="og:description" content="{{ $description ?? 'Platform inspirasi & panduan hobi terlengkap.' }}">
    
    <!-- CSS & JS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <script defer src="{{ asset('js/animate.js') }}"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>body { font-family: 'Inter', sans-serif; }</style> 
    <style>
        :root {
            --bg-color: #111810;
            --card-bg-color: #1A2318;
            --primary-accent: #F4B41B; /* Kuning-Emas */
            --secondary-accent: #4D6C4B; /* Hijau Zaitun */
            --text-color-dark: #FFFFFF;
            --text-color-light: #E0E0E0;
            --text-color-muted: #888888;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Poppins', sans-serif;
            --border-radius: 16px;
        }

        /* Reset CSS dasar */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color-dark);
            font-family: var(--font-body);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Utilitas */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        button, .btn {
            cursor: pointer;
            border: none;
            border-radius: 50px;
            font-family: var(--font-body);
            font-weight: 500;
            transition: all 0.3s ease;
        }

        /* Elemen Berulang */
        .stars {
            display: flex;
            color: var(--primary-accent);
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .section-title {
            font-family: var(--font-heading);
            font-size: 3rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .section-subtitle {
            text-align: center;
            color: var(--text-color-light);
            max-width: 600px;
            margin: 0 auto 50px;
        }

        /* Styling Kartu-kartu */
        .card {
            background-color: var(--card-bg-color);
            border-radius: var(--border-radius);
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* --- Bagian Header --- */
        header {
            background-color: rgba(17, 24, 16, 0.9);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 15px 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .logo img {
            height: 25px;
            margin-right: 10px;
        }

        .logo svg {
            fill: var(--text-color-dark);
            width: 1.5rem;
            height: 1.5rem;
            margin-right: 10px;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        nav a:hover {
            color: var(--primary-accent);
        }

        .sign-up-btn {
            background-color: var(--primary-accent);
            color: var(--bg-color);
            padding: 10px 25px;
            font-size: 0.9rem;
        }

        .sign-up-btn:hover {
            background-color: #E0A300;
        }

        /* Tombol menu seluler */
        .mobile-menu-toggle {
            display: none;
            background: none;
            color: var(--text-color-dark);
            font-size: 1.5rem;
        }

        /* --- Bagian Hero --- */
        .hero {
            padding-top: 150px;
            padding-bottom: 80px;
            background-image: linear-gradient(rgba(17, 24, 16, 0.8), rgba(17, 24, 16, 0.9)), url('https://images.unsplash.com/photo-1582236940866-9e90089e9d6d?q=80&w=1600'); /* Placeholder foto buram dari pembibitan */
            background-size: cover;
            background-position: center;
            text-align: center;
        }

        .hero h1 {
            font-family: var(--font-heading);
            font-size: 5rem;
            margin-bottom: 30px;
            color: var(--primary-accent);
        }

        .hero p {
            color: var(--text-color-light);
            max-width: 600px;
            margin: 0 auto 40px;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .hero-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
        }

        .about-btn {
            background-color: transparent;
            border: 2px solid var(--text-color-muted);
            color: var(--text-color-muted);
        }

        .about-btn:hover {
            border-color: var(--text-color-dark);
            color: var(--text-color-dark);
        }

        .call-btn {
            color: var(--primary-accent);
        }

        .call-btn:hover {
            color: var(--text-color-dark);
        }

        .call-btn svg {
            width: 20px;
            height: 20px;
            fill: var(--primary-accent);
        }

        /* --- Bagian Testimonial --- */
        .testimonial {
            padding: 80px 0;
        }

        .testimonial-card {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .testimonial-left {
            flex: 1;
        }

        .testimonial-right {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            position: relative;
        }

        .testimonial-right img {
            border-radius: var(--border-radius);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .quote-text {
            color: var(--text-color-light);
            margin-bottom: 25px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-photo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--bg-color); /* Placeholder foto pengguna */
        }

        .user-info h4 {
            font-weight: 600;
        }

        .user-info p {
            color: var(--text-color-muted);
            font-size: 0.8rem;
        }

        .feature-badge-wrap {
            position: absolute;
            bottom: -30px;
            left: -30px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .feature-badge {
            background-color: var(--bg-color);
            border-radius: 50px;
            padding: 5px 15px;
            font-size: 0.7rem;
            color: var(--primary-accent);
            white-space: nowrap;
        }

        /* --- Bagian Story/About Us --- */
        .story {
            padding: 80px 0;
        }

        .story-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .story-img-wrap {
            flex: 1;
            position: relative;
        }

        .story-img-wrap img {
            border-radius: var(--border-radius);
        }

        .story-badge {
            position: absolute;
            top: -30px;
            right: -30px;
            background-color: var(--secondary-accent);
            border-radius: var(--border-radius);
            padding: 10px 15px;
            text-align: center;
        }

        .story-badge span {
            display: block;
            font-size: 0.8rem;
            color: var(--text-color-dark);
        }

        .badge-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-accent);
        }

        .story-text-wrap {
            flex: 1;
        }

        .story-text-wrap h2 {
            font-family: var(--font-heading);
            font-size: 3.5rem;
            margin-bottom: 30px;
        }

        .story-text-wrap p {
            color: var(--text-color-light);
            margin-bottom: 40px;
        }

        .learn-more-btn {
            background-color: var(--primary-accent);
            color: var(--bg-color);
            padding: 15px 35px;
        }

        /* --- Bagian Best Seller --- */
        .best-seller {
            padding: 80px 0;
        }

        .seller-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .seller-card {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .product-img {
            border-radius: var(--border-radius);
            overflow: hidden;
            aspect-ratio: 1/1; /* Memastikan foto persegi */
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .seller-card h4 {
            font-weight: 600;
        }

        .seller-card p {
            color: var(--text-color-muted);
            font-size: 0.9rem;
        }

        .product-badge-olive {
            background-color: var(--secondary-accent);
            border-radius: var(--border-radius);
            padding: 10px 15px;
            display: inline-block;
            margin-top: auto;
        }

        .product-badge-olive span {
            color: var(--primary-accent);
            font-weight: 600;
        }

        /* --- Baris Logo --- */
        .logo-bar {
            background-color: var(--primary-accent);
            padding: 20px 0;
        }

        .logo-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-content span {
            color: rgba(17, 24, 16, 0.6); /* Abu-abu pada kuning-emas */
            font-weight: 600;
            font-size: 1.2rem;
        }

        /* --- Bagian Layanan --- */
        .services {
            padding: 80px 0;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .service-card {
            text-align: center;
            padding: 30px 20px;
        }

        .service-icon {
            margin: 0 auto 20px;
            color: var(--primary-accent);
            font-size: 2.5rem;
        }

        .service-icon svg {
            width: 2.5rem;
            height: 2.5rem;
            fill: var(--primary-accent);
        }

        .service-card h4 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-card p {
            color: var(--text-color-muted);
            font-size: 0.9rem;
        }

        /* --- Bagian Statistik --- */
        .stats {
            padding: 80px 0;
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .stats-left h2 {
            font-family: var(--font-heading);
            font-size: 3rem;
            max-width: 400px;
        }

        .stats-right {
            flex: 1;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-accent);
        }

        .stat-item p {
            color: var(--text-color-light);
            font-size: 0.9rem;
        }

        /* --- Footer --- */
        footer {
            background-color: var(--card-bg-color);
            padding: 40px 0;
            text-align: center;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .footer-logo {
            justify-content: center;
        }

        .footer-text {
            color: var(--text-color-muted);
            font-size: 0.9rem;
        }

        /* --- Responsivitas Seluler --- */
        @media (max-width: 992px) {
            .hero h1 { font-size: 4rem; }
            .section-title, .story-text-wrap h2, .stats-left h2 { font-size: 2.5rem; }
            
            .seller-grid { grid-template-columns: repeat(2, 1fr); }
            .service-grid { grid-template-columns: repeat(2, 1fr); }
            
            .testimonial-card, .story-content { flex-direction: column; }
            .testimonial-right { justify-content: center; }
            
            .feature-badge-wrap { left: -15px; bottom: -15px; }
            .story-badge { right: -15px; top: -15px; }
        }

        @media (max-width: 768px) {
            header { padding: 10px 0; }
            .hero { padding-top: 120px; }
            .hero h1 { font-size: 3rem; }
            .section-title, .story-text-wrap h2, .stats-left h2 { font-size: 2rem; }
            
            nav ul { display: none; } /* Sembunyikan menu */
            .mobile-menu-toggle { display: block; } /* Tampilkan ikon menu */
            .sign-up-btn { display: none; } /* Sembunyikan tombol sign-up di layar kecil */
            
            .seller-grid { grid-template-columns: 1fr; }
            .service-grid { grid-template-columns: 1fr; }
            
            .hero-btns { flex-direction: column; gap: 10px; }
            .testimonial-card, .story-content { text-align: center; }
            
            .stats-right { flex-direction: column; gap: 20px; text-align: center; }
            .stat-item h3 { font-size: 2rem; }
        }
    </style>
</head>
<body class="bg-slate-50 text-gray-800 font-sans flex flex-col min-h-screen justify-between">

    <!-- Memanggil komponen Navbar -->
    <x-navbar theme="{{ $theme ?? 'default' }}" />

    <section 
    x-data="{
        activeSlide: 0,
        timer: null,
        // Daftar gambar yang akan ditampilkan di carousel
        slides: [
            '{{ asset('uploads/pohon-mangga.jpg') }}',
            '{{ asset('uploads/ikan.jpg') }}',
            '{{ asset('uploads/mangga-yuwen.jpg') }}',
        ],
        init() {
            this.startTimer();
        },
        startTimer() {
            this.timer = setInterval(() => { this.next(); }, 5000);
        },
        resetTimer() {
            clearInterval(this.timer);
            this.startTimer();
        },
        next() {
            this.activeSlide = this.activeSlide === this.slides.length - 1 ? 0 : this.activeSlide + 1;
            this.resetTimer(); // Reset waktu saat diklik manual
        },
        prev() {
            this.activeSlide = this.activeSlide === 0 ? this.slides.length - 1 : this.activeSlide - 1;
            this.resetTimer(); // Reset waktu saat diklik manual
        }
    }" 
    class="relative rounded-3xl overflow-hidden shadow-xl group"
        >
            
            <!-- 1. GAMBAR CAROUSEL BACKGROUND -->
            <template x-for="(slide, index) in slides" :key="index">
                <img 
                    x-show="activeSlide === index"
                    x-transition:enter="transition-opacity duration-1000 ease-in-out"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity duration-1000 ease-in-out"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    :src="slide" 
                    alt="Banner Image" 
                    class="absolute inset-0 w-full h-full object-cover"
                >
            </template>
            
            <!-- 2. OVERLAY GELAP -->
            <div class="absolute inset-0 bg-black/40 z-0"></div>

            <!-- 3. KONTEN TEKS -->
            <div class="relative z-10 py-16 px-6 md:px-20 text-center">
                
                <div class="inline-block bg-white/20 backdrop-blur-sm text-white text-xs font-bold px-4 py-1.5 rounded-full mb-5 uppercase tracking-widest">
                    <x-icon name="fish" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> & <x-icon name="sprout" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Hobi Lengkap di Satu Tempat
                </div>
                
                <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight max-w-3xl mx-auto">
                    Zaydun: Ruang Inspirasi & Kebutuhan Para Penghobi
                </h1>
                
                <p class="text-gray-100 text-base md:text-lg mb-8 max-w-2xl mx-auto leading-relaxed">
                    Temukan tips perawatan terbaik untuk ikan cupang dan tumbuhan Anda, lengkapi kebutuhan hobi langsung melalui WhatsApp.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('kategori.ikan') }}" class="bg-white text-teal-700 font-bold text-sm px-7 py-3 rounded-full hover:bg-cyan-50 shadow-lg transition">
                        <x-icon name="fish" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Ikan Cupang
                    </a>
                    <a href="{{ route('kategori.tumbuhan') }}" class="bg-white/15 backdrop-blur-sm text-white font-bold text-sm px-7 py-3 rounded-full border border-white/30 hover:bg-white/25 transition">
                        <x-icon name="sprout" class="w-4 h-4 inline-block -mt-0.5 align-middle" /> Tumbuhan
                    </a>
                </div>
                
            </div>

            <!-- 4. TOMBOL SEBELUMNYA (PREV) -->
            <!-- Tombol ini akan sedikit memudar dan baru jelas saat area banner di-hover (group-hover) -->
            <button 
                @click="prev()" 
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-black/60 text-white p-2 md:p-3 rounded-full backdrop-blur-sm transition opacity-0 group-hover:opacity-100 focus:opacity-100"
                aria-label="Previous Slide"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 md:w-6 md:h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>

            <!-- 5. TOMBOL BERIKUTNYA (NEXT) -->
            <button 
                @click="next()" 
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-black/30 hover:bg-black/60 text-white p-2 md:p-3 rounded-full backdrop-blur-sm transition opacity-0 group-hover:opacity-100 focus:opacity-100"
                aria-label="Next Slide"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 md:w-6 md:h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            <!-- 6. INDIKATOR CAROUSEL (Titik-titik Navigasi di bawah) -->
            <div class="absolute bottom-5 left-0 right-0 z-20 flex justify-center gap-3">
                <template x-for="(slide, index) in slides" :key="index">
                    <button 
                        @click="activeSlide = index; resetTimer();"
                        class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                        :class="activeSlide === index ? 'bg-white w-6' : 'bg-white/40 hover:bg-white/70'"
                        aria-label="Pilih slide"
                    ></button>
                </template>
            </div>
        </section>

    <!-- Area Konten Utama -->
    <main class="flex-1 w-full">
        {{ $slot }}
    </main>

    <!-- Memanggil komponen Footer -->
    <x-footer />

    <!-- BACK TO TOP BUTTON -->
    <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="fixed bottom-6 right-6 bg-slate-800 hover:bg-slate-700 text-white p-3.5 rounded-full shadow-xl flex items-center justify-center transition duration-300 hover:scale-110 z-50" title="Kembali ke atas">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/></svg>
    </button>

</body>
</html>