<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Mahasiswa — FindShip</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        [x-cloak] { display: none !important; }
        @media (min-width: 1024px) {
            .home-grid {
                display: grid !important;
                grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
                gap: 2rem !important;
            }
            .col-left {
                grid-column: span 4 / span 4 !important;
            }
            .col-right {
                grid-column: span 8 / span 8 !important;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-[#F5A623] selection:text-white">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Welcome Greeting Banner -->
        <div class="bg-gradient-to-r from-[#1E3A5F] to-[#14263f] text-white p-8 sm:p-10 rounded-3xl shadow-sm relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <!-- Decorative circle -->
            <div class="absolute inset-0 z-0 opacity-15 pointer-events-none">
                <div class="absolute top-0 right-0 w-96 h-96 bg-[#F5A623] rounded-full blur-[100px]"></div>
            </div>
            
            <div class="relative z-10 space-y-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-bold bg-[#F5A623]/25 text-[#F5A623] uppercase tracking-wider">
                    Portal Mahasiswa
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold leading-tight tracking-tight">Selamat Datang Kembali, {{ $user->name }}! 👋</h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-xl leading-relaxed">
                    Senang melihat Anda lagi. Berikut adalah informasi beasiswa terkurasi dan materi kelas persiapan khusus untuk menunjang studi Anda.
                </p>
            </div>
            
            <div class="relative z-10 shrink-0 w-full sm:w-auto">
                <form action="{{ route('scholarships.index') }}" method="GET" class="flex gap-2">
                    <input type="text" 
                           name="search" 
                           placeholder="Cari beasiswa impian..." 
                           class="w-full sm:w-64 bg-white/10 hover:bg-white/15 focus:bg-white text-white placeholder-slate-400 focus:text-slate-900 rounded-xl px-4 py-3 text-xs font-bold border-0 focus:ring-2 focus:ring-[#F5A623] transition-all">
                    <button type="submit" class="bg-[#F5A623] hover:bg-[#e0951b] text-white px-5 py-3 rounded-xl text-xs font-bold transition-all shrink-0">
                        Cari
                    </button>
                </form>
            </div>
        </div>

        <div class="home-grid grid grid-cols-1 gap-8 items-start">
            
            <!-- LEFT PANEL: Academic Profile & Deadlines (lg:col-span-4) -->
            <div class="col-left space-y-8">
                <!-- Academic Profile -->
                <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-[#1E3A5F] flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profil Akademik
                        </h3>
                        <span class="text-[9px] font-extrabold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase tracking-wider">Aktif</span>
                    </div>
                    
                    <div class="space-y-4 text-xs sm:text-sm font-semibold">
                        <div class="flex justify-between border-b border-slate-50 pb-2.5">
                            <span class="text-slate-400 font-bold">Jurusan</span>
                            <span class="text-[#1E3A5F] font-extrabold">{{ $user->jurusan ?? 'Belum diisi' }}</span>
                        </div>
                        <div class="flex justify-between border-b border-slate-50 pb-2.5">
                            <span class="text-slate-400 font-bold">IPK Terakhir</span>
                            <span class="text-[#1E3A5F] font-extrabold">{{ $user->ipk ? number_format($user->ipk, 2) : 'Belum diisi' }}</span>
                        </div>
                        <div class="flex justify-between pb-1">
                            <span class="text-slate-400 font-bold">Asal Kampus</span>
                            <span class="text-[#1E3A5F] font-extrabold">{{ $user->asal_kampus ?? 'Belum diisi' }}</span>
                        </div>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="w-full text-center border border-slate-200 bg-slate-50 hover:bg-slate-100 text-[#1E3A5F] py-3 rounded-xl text-xs font-bold transition-all block">
                        Perbarui Informasi Profil
                    </a>
                </div>

                <!-- Closest Deadlines -->
                <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                        <h3 class="text-base font-bold text-[#1E3A5F] flex items-center gap-2">
                            <svg class="w-5 h-5 text-rose-500 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Tenggat Terdekat
                        </h3>
                        <span class="text-[9px] font-extrabold text-slate-400 uppercase tracking-wider">Penting</span>
                    </div>

                    <div class="space-y-4">
                        @forelse($deadlineScholarships as $beasiswa)
                            <div class="flex gap-3.5 items-start p-3 bg-rose-50/50 border border-rose-100/60 rounded-2xl">
                                <div class="bg-rose-500 text-white rounded-xl p-2.5 shrink-0 text-center font-bold min-w-[50px]">
                                    <span class="block text-lg leading-none tracking-tight">{{ $beasiswa->deadline->format('d') }}</span>
                                    <span class="block text-[8px] uppercase mt-0.5 tracking-wider font-extrabold">{{ $beasiswa->deadline->format('M') }}</span>
                                </div>
                                <div class="min-w-0 space-y-1">
                                    <h5 class="text-xs font-extrabold text-[#1E3A5F] truncate hover:text-[#F5A623] transition-colors">
                                        <a href="{{ route('scholarships.show', $beasiswa->id) }}">{{ $beasiswa->judul }}</a>
                                    </h5>
                                    <p class="text-[10px] text-rose-600 font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $beasiswa->deadline->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center p-6 text-slate-400 text-xs font-semibold">
                                Tidak ada tenggat beasiswa aktif saat ini.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- RIGHT PANEL: Personalized Recommendations & Enrolled Classes (col-right) -->
            <div class="col-right space-y-8">
                
                <!-- Enrolled Classes -->
                <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-[#1E3A5F] border-b border-slate-100 pb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-emerald-500 shrink-0" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                        Bimbingan Kelas Premium Saya
                    </h3>

                    <div class="grid sm:grid-cols-2 gap-4">
                        @forelse($enrolledClasses as $class)
                            <div class="border border-slate-200 rounded-2xl overflow-hidden flex flex-col justify-between hover:shadow-md transition-all">
                                <div class="relative h-32 bg-slate-100">
                                    @if($class->thumbnail)
                                        <img src="{{ $class->thumbnail }}" alt="{{ $class->judul }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#1E3A5F]/20">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                        </div>
                                    @endif
                                    <span class="absolute top-3 left-3 bg-emerald-500 text-white text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-full tracking-wider shadow-sm">Aktif</span>
                                </div>
                                <div class="p-5 space-y-3">
                                    <h4 class="font-extrabold text-[#1E3A5F] text-sm leading-snug line-clamp-1">{{ $class->judul }}</h4>
                                    <a href="{{ route('kelas.show', $class->id) }}" class="w-full text-center bg-[#1E3A5F] hover:bg-[#152a45] text-white py-2.5 rounded-xl text-xs font-bold transition-all block">
                                        Masuk Kelas Persiapan
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="sm:col-span-2 text-center p-12 text-slate-400 space-y-3 flex flex-col items-center justify-center">
                                <svg class="w-14 h-14 text-slate-300 shrink-0" width="56" height="56" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                <p class="text-xs font-semibold">Anda belum bergabung ke kelas persiapan premium.</p>
                                <a href="{{ route('kelas.index') }}" class="text-xs font-bold text-[#F5A623] hover:underline">Lihat Katalog Kelas Premium</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Profile Matched Scholarships -->
                <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-[#1E3A5F] border-b border-slate-100 pb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-[#F5A623] shrink-0" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        Rekomendasi Beasiswa Sesuai Profil Anda
                    </h3>

                    <div class="space-y-4">
                        @forelse($recommendedScholarships as $beasiswa)
                            <div class="p-5 bg-slate-50 hover:bg-slate-100/50 border border-slate-100 hover:border-slate-200 transition-all rounded-2xl flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="space-y-2 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="px-2 py-0.5 rounded text-[9px] font-extrabold uppercase bg-[#1E3A5F]/10 text-[#1E3A5F] tracking-wide">{{ $beasiswa->kategori }}</span>
                                        <span class="px-2 py-0.5 rounded text-[9px] font-extrabold uppercase bg-amber-50 text-amber-700 border border-amber-100 tracking-wide">IPK Min: {{ number_format($beasiswa->min_ipk, 2) }}</span>
                                    </div>
                                    <h4 class="font-extrabold text-[#1E3A5F] text-sm leading-snug hover:text-[#F5A623] transition-colors truncate">
                                        <a href="{{ route('scholarships.show', $beasiswa->id) }}">{{ $beasiswa->judul }}</a>
                                    </h4>
                                    <p class="text-[10px] text-slate-400 font-bold">Penyelenggara: {{ $beasiswa->penyelenggara }}</p>
                                </div>
                                <a href="{{ route('scholarships.show', $beasiswa->id) }}" class="inline-flex items-center gap-1 bg-[#1E3A5F]/5 hover:bg-[#1E3A5F] text-[#1E3A5F] hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition-all w-max shrink-0">
                                    Cek Syarat
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        @empty
                            <div class="text-center p-6 text-slate-400 text-xs font-semibold">
                                Lengkapi profil akademik Anda untuk mendapatkan rekomendasi beasiswa yang cocok.
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Recommended Premium Classes (Not Enrolled Yet) -->
                <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-[#1E3A5F] border-b border-slate-100 pb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-[#F5A623] shrink-0" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Rekomendasi Kelas Persiapan Premium
                    </h3>

                    <div class="grid sm:grid-cols-3 gap-4">
                        @foreach($recommendedClasses as $class)
                            <div class="border border-slate-200 rounded-2xl overflow-hidden flex flex-col justify-between hover:shadow-md transition-all bg-white relative">
                                <!-- Price Badge / Crossed -->
                                <div class="relative h-28 bg-slate-100">
                                    @if($class->thumbnail)
                                        <img src="{{ $class->thumbnail }}" alt="{{ $class->judul }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[#1E3A5F]/20">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                        </div>
                                    @endif
                                    <span class="absolute top-2 left-2 bg-[#F5A623] text-white text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-full tracking-wider shadow-sm">{{ $class->kategori }}</span>
                                </div>
                                <div class="p-4 space-y-2.5 flex-1 flex flex-col justify-between">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-1 text-[10px] font-bold text-amber-500">
                                            <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            {{ number_format($class->rating, 1) }}
                                        </div>
                                        <h4 class="font-extrabold text-[#1E3A5F] text-xs leading-snug line-clamp-2 hover:text-[#F5A623] transition-colors">
                                            <a href="{{ route('kelas.show', $class->id) }}">{{ $class->judul }}</a>
                                        </h4>
                                    </div>
                                    <div class="space-y-2 pt-1 border-t border-slate-100">
                                        <div class="text-[11px] font-bold">
                                            @if($class->discount_percentage)
                                                @php $coretPrice = $class->harga / (1 - ($class->discount_percentage/100)); @endphp
                                                <span class="text-slate-400 line-through mr-1 block">Rp{{ number_format($coretPrice, 0, ',', '.') }}</span>
                                            @endif
                                            <span class="text-[#F5A623]">Rp{{ number_format($class->harga, 0, ',', '.') }}</span>
                                        </div>
                                        
                                        <button @click="Alpine.store('cart').add({{ $class->id }}, '{{ $class->judul }}', {{ $class->harga }}, '{{ $class->thumbnail }}')"
                                                class="w-full text-center bg-[#F5A623]/10 hover:bg-[#F5A623] hover:text-white text-[#F5A623] py-2 rounded-xl text-[10px] font-bold transition-all flex items-center justify-center gap-1">
                                            <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                            Tambah Keranjang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />

</body>
</html>
