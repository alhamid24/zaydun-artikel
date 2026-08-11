<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 via-teal-500 to-cyan-700 opacity-100"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,rgba(255,255,255,0.15),transparent_50%),radial-gradient(ellipse_at_bottom_right,rgba(0,0,0,0.2),transparent_50%)]"></div>

    <div class="relative bg-white p-8 rounded-3xl shadow-2xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <div class="w-14 h-14 mx-auto rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white text-2xl font-black shadow-lg mb-4">Z</div>
            <h2 class="text-2xl font-bold text-gray-800">Zaydun Admin</h2>
            <p class="text-sm text-gray-500 mt-1">Masuk untuk mengelola konten website</p>
        </div>

        @if($errors->any())
            <div class="flex items-center gap-2 bg-red-50 border border-red-200 text-red-700 p-3.5 rounded-xl mb-6 text-sm">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <div class="relative">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@zaydun.com" class="w-full pl-11 pr-4 py-2.5 border border-gray-300 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required autofocus>
                </div>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <div class="relative">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <input type="password" name="password" placeholder="••••••••" class="w-full pl-11 pr-4 py-2.5 border border-gray-300 rounded-xl bg-gray-50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 mr-2 text-emerald-600 focus:ring-emerald-500 rounded border-gray-300">
                    <span class="text-sm text-gray-600">Ingat Saya</span>
                </label>
            </div>
            <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold py-3 rounded-xl transition shadow-md hover:shadow-lg">
                Masuk Ke Dashboard
            </button>
        </form>

        <div class="text-center mt-6 pt-6 border-t border-gray-100">
            <a href="{{ url('/') }}" class="text-sm text-gray-500 hover:text-emerald-600 inline-flex items-center gap-1.5 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Website
            </a>
        </div>
    </div>
</body>
</html>
