<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Zaydun</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Admin Zaydun</h2>
        
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
            </div>
            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember" class="mr-2 text-emerald-600 focus:ring-emerald-500 rounded">
                <label for="remember" class="text-sm text-gray-600">Ingat Saya</label>
            </div>
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 rounded-xl transition">
                Masuk Ke Dashboard
            </button>
        </form>
    </div>
</body>
</html>