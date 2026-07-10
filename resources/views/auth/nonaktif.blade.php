<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akun Dinonaktifkan — FindShip</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white border border-slate-200 rounded-3xl p-8 sm:p-10 shadow-xl text-center space-y-6 relative overflow-hidden">
        <!-- Accent Top Bar -->
        <div class="absolute top-0 inset-x-0 h-1.5 bg-rose-500"></div>

        <!-- Lock Icon Box -->
        <div class="mx-auto w-20 h-20 bg-rose-50 rounded-full flex items-center justify-center text-rose-500 shadow-md transform hover:scale-105 transition-transform duration-300">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>

        <!-- Text Details -->
        <div class="space-y-2.5">
            <h1 class="text-xl sm:text-2xl font-extrabold text-[#1E3A5F]">Akun Kamu Dinonaktifkan</h1>
            <p class="text-sm text-slate-500 leading-relaxed">
                Akun kamu telah dinonaktifkan oleh admin. Jika kamu merasa ini adalah kesalahan atau memerlukan informasi lebih lanjut, silakan hubungi tim dukungan FindShip.
            </p>
        </div>

        <!-- Buttons -->
        <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center gap-3">
            <a href="{{ route('home') }}" class="w-full bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white py-3 px-6 rounded-xl text-xs font-bold uppercase tracking-wider shadow-sm transition-all duration-300 text-center">
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>
