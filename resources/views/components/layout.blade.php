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
</head>
<body class="bg-slate-50 text-gray-800 font-sans flex flex-col min-h-screen justify-between">

    <!-- Memanggil komponen Navbar -->
    <x-navbar theme="{{ $theme ?? 'default' }}" />

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