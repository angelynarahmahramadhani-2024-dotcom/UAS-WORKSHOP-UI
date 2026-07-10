<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Autentikasi — FindShip</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
            }
        </style>
    </head>
    <body class="text-slate-900 antialiased min-h-screen bg-slate-50 flex">

        <div class="w-full min-h-screen flex">
            <!-- Left Pane: Visual Info (Hidden on mobile) -->
            <div class="hidden lg:flex lg:w-1/2 bg-[#1E3A5F] text-white p-16 flex-col justify-between relative overflow-hidden shrink-0 border-r border-slate-800">
                <!-- Decorative background elements -->
                <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
                    <div class="absolute top-10 left-10 w-96 h-96 bg-[#F5A623] rounded-full blur-[120px]"></div>
                    <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#1e88e5] rounded-full blur-[120px]"></div>
                </div>

                <!-- Logo -->
                <div class="relative z-10 flex items-center gap-2.5">
                    <a href="/" class="flex items-center gap-2">
                        <img src="{{ asset('images/logo.png') }}" alt="FindShip Logo" class="h-16 w-auto object-contain bg-white px-2 py-1 rounded-lg">
                    </a>
                </div>

                <!-- Middle Info -->
                <div class="relative z-10 my-auto space-y-6 max-w-md">
                    <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight">Mulai Langkah Prestigius Pendidikanmu Bersama Kami</h1>
                    <p class="text-slate-300 text-sm leading-relaxed">FindShip memandu ribuan mahasiswa Indonesia meraih beasiswa idaman di dalam dan luar negeri dengan sistem pintar dan program bimbingan premium.</p>
                    
                    <div class="space-y-3 pt-4">
                        <div class="flex items-center gap-3 text-xs font-semibold text-slate-200">
                            <span class="w-5 h-5 rounded-full bg-[#F5A623]/20 text-[#F5A623] flex items-center justify-center font-bold">✓</span>
                            Rekomendasi Berdasarkan IPK & Jurusan
                        </div>
                        <div class="flex items-center gap-3 text-xs font-semibold text-slate-200">
                            <span class="w-5 h-5 rounded-full bg-[#F5A623]/20 text-[#F5A623] flex items-center justify-center font-bold">✓</span>
                            Pengingat Deadline Otomatis
                        </div>
                        <div class="flex items-center gap-3 text-xs font-semibold text-slate-200">
                            <span class="w-5 h-5 rounded-full bg-[#F5A623]/20 text-[#F5A623] flex items-center justify-center font-bold">✓</span>
                            Bimbingan Menulis Esai & Wawancara
                        </div>
                    </div>
                </div>

                <!-- Footer Copyright -->
                <div class="relative z-10 text-xs text-slate-400 font-semibold">
                    &copy; 2026 FindShip. Hak Cipta Dilindungi.
                </div>
            </div>

            <!-- Right Pane: Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-slate-50 relative overflow-y-auto">
                <div class="w-full max-w-md space-y-6 py-8">
                    <!-- Mobile Logo -->
                    <div class="flex lg:hidden flex-col items-center space-y-2 mb-6">
                        <a href="/" class="flex items-center gap-2">
                            <img src="{{ asset('images/logo.png') }}" alt="FindShip Logo" class="h-16 w-auto object-contain bg-white px-2 py-1 rounded-lg shadow-sm">
                        </a>
                    </div>

                    <!-- Card Body containing the actual form -->
                    <div class="bg-white border border-slate-200 p-8 sm:p-10 rounded-3xl shadow-sm space-y-6">
                        {{ $slot }}
                    </div>

                    <div class="text-center">
                        <a href="/" class="text-xs font-bold text-slate-400 hover:text-[#1E3A5F] transition-colors inline-flex items-center gap-1">
                            <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
