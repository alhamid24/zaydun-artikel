<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botanic - Keindahan Daun untuk Setiap Ruang</title>
    <!-- Ganti dengan font yang lebih dekat jika perlu, misal: Playfair Display untuk serif dan Poppins untuk sans-serif -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500;1,700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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
<body>

    <!-- --- Header --- -->
    <header>
        <div class="container header-content">
            <div class="logo">
                <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6V8A4,4 0 0,0 8,12V14A4,4 0 0,0 12,18H14A4,4 0 0,0 18,14V12A4,4 0 0,0 14,8V6H12M14,10A2,2 0 0,1 16,12V14A2,2 0 0,1 14,16H12A2,2 0 0,1 10,14V12A2,2 0 0,1 12,10H14Z" /></svg>
                Botanic
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Plants</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <a href="#" class="btn sign-up-btn">Sign Up Now</a>
            <button class="mobile-menu-toggle">&#9776;</button> <!-- Hamburger Icon -->
        </div>
    </header>

    <!-- --- Bagian Hero --- -->
    <section class="hero">
        <div class="container">
            <h1>Keindahan Daun untuk Setiap Ruang.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            <div class="hero-btns">
                <a href="#" class="btn hero-btn about-btn">Tentang Kami &#8594;</a>
                <a href="#" class="btn hero-btn call-btn">
                    <svg viewBox="0 0 24 24"><path d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>
                    Telepon Kami
                </a>
            </div>
        </div>
    </section>

    <!-- --- Bagian Testimonial --- -->
    <section class="testimonial container">
        <div class="card testimonial-card">
            <div class="testimonial-left">
                <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <p class="quote-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud."</p>
                <div class="user-profile">
                    <div class="user-photo"></div>
                    <div class="user-info">
                        <h4>Jane Doe</h4>
                        <p>Pembeli Tanaman Bersemangat</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-right">
                <img src="https://images.unsplash.com/photo-1596547609652-9cf5d8d76921?q=80&w=400" alt="Calathea Plant"> <!-- Placeholder Calathea -->
                <div class="feature-badge-wrap">
                    <div class="feature-badge">Calathea</div>
                    <div class="feature-badge">Lokal</div>
                    <div class="feature-badge">Kualitas</div>
                </div>
            </div>
        </div>
    </section>

    <!-- --- Bagian Story/About Us --- -->
    <section class="story container">
        <div class="story-content">
            <div class="story-img-wrap">
                <img src="https://images.unsplash.com/photo-1596547609652-9cf5d8d76921?q=80&w=600" alt="Botanic Nursery">
                <div class="story-badge">
                    <span class="badge-number">25+</span>
                    <span>Tahun Pengalaman</span>
                </div>
            </div>
            <div class="story-text-wrap">
                <h1 class="section-title">Tempat Tanaman Menemukan Orang-orangnya.</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                <a href="#" class="btn learn-more-btn">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- --- Bagian Best Seller --- -->
    <section class="best-seller container">
        <h1 class="section-title">Tanaman Terlaris Kami</h1>
        <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <div class="seller-grid">
            <div class="card seller-card">
                <div class="product-img"><img src="https://images.unsplash.com/photo-1596547609652-9cf5d8d76921?q=80&w=300" alt="Plant 1"></div>
                <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</div>
                <h4>Tanaman Calathea</h4>
                <p>Kategori Tanaman Hias</p>
                <div class="product-badge-olive">
                    <span>Calathea Lokal</span>
                </div>
            </div>
            <div class="card seller-card">
                <div class="product-img"><img src="https://images.unsplash.com/photo-1596547609652-9cf5d8d76921?q=80&w=300" alt="Plant 2"></div>
                <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                <h4>Tanaman Calathea</h4>
                <p>Kategori Tanaman Hias</p>
                <div class="product-badge-olive">
                    <span>Calathea Lokal</span>
                </div>
            </div>
            <div class="card seller-card">
                <div class="product-img"><img src="https://images.unsplash.com/photo-1596547609652-9cf5d8d76921?q=80&w=300" alt="Plant 3"></div>
                <div class="stars">&#9733;&#9733;&#9733;&#9734;&#9734;</div>
                <h4>Tanaman Calathea</h4>
                <p>Kategori Tanaman Hias</p>
                <div class="product-badge-olive">
                    <span>Calathea Lokal</span>
                </div>
            </div>
        </div>
    </section>

    <!-- --- Baris Logo --- -->
    <section class="logo-bar">
        <div class="container logo-content">
            <span>logoisum</span>
            <span>logoisum</span>
            <span>logoisum</span>
            <span>logoisum</span>
            <span>logoisum</span>
        </div>
    </section>

    <!-- --- Bagian Layanan --- -->
    <section class="services container">
        <h1 class="section-title">Layanan yang Kami Berikan</h1>
        <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        <div class="service-grid">
            <div class="card service-card">
                <div class="service-icon">&#127806;</div>
                <h4>Garden Care</h4>
                <p>Layanan perawatan taman terpadu.</p>
            </div>
            <div class="card service-card">
                <div class="service-icon">&#127808;</div>
                <h4>Lawn Care</h4>
                <p>Perawatan rumput agar tetap hijau.</p>
            </div>
            <div class="card service-card">
                <div class="service-icon">&#127810;</div>
                <h4>Plant Store</h4>
                <p>Koleksi tanaman hias terlengkap.</p>
            </div>
            <div class="card service-card">
                <div class="service-icon">&#127812;</div>
                <h4>Garden Design</h4>
                <p>Desain taman impian Anda.</p>
            </div>
        </div>
    </section>

    <!-- --- Bagian Statistik --- -->
    <section class="stats container">
        <div class="stats-left">
            <h1 class="section-title">Pencapaian Terbaik Kami Dari Gardening</h1>
        </div>
        <div class="stats-right">
            <div class="stat-item">
                <h3>256k+</h3>
                <p>Pelanggan Bahagia</p>
            </div>
            <div class="stat-item">
                <h3>98%</h3>
                <p>Ulasan Positif</p>
            </div>
            <div class="stat-item">
                <h3>308+</h3>
                <p>Jenis Tanaman</p>
            </div>
            <div class="stat-item">
                <h3>20+</h3>
                <p>Penghargaan</p>
            </div>
        </div>
    </section>

    <!-- --- Footer --- -->
    <footer>
        <div class="container footer-content">
            <div class="logo footer-logo">
                <svg viewBox="0 0 24 24"><path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6V8A4,4 0 0,0 8,12V14A4,4 0 0,0 12,18H14A4,4 0 0,0 18,14V12A4,4 0 0,0 14,8V6H12M14,10A2,2 0 0,1 16,12V14A2,2 0 0,1 14,16H12A2,2 0 0,1 10,14V12A2,2 0 0,1 12,10H14Z" /></svg>
                Botanic
            </div>
            <p class="footer-text">© 2024 Botanic. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

</body>
</html>