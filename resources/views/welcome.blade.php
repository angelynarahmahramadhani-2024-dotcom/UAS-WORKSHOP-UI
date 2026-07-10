<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FindShip — Informasi & Rekomendasi Beasiswa Mahasiswa Indonesia</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Vite Assets) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-[#F5A623] selection:text-white">

    <!-- Onboarding Tour -->
    <x-onboarding-tour />    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-[#1E3A5F] via-[#162a45] to-[#0f1d30] text-white overflow-hidden py-24 md:py-32">
        <!-- Background decorative blobs -->
        <div class="absolute inset-0 z-0 opacity-20 pointer-events-none">
            <div class="absolute top-10 left-10 w-96 h-96 bg-[#F5A623] rounded-full blur-[120px]"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#1e88e5] rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Info -->
            <div class="space-y-8 text-center md:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/10 text-[#F5A623] text-xs font-bold tracking-wider uppercase">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#F5A623] opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-[#F5A623]"></span>
                    </span>
                    Update Beasiswa Terbaru 2026
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight">
                    Temukan Jalan Pintas Menuju <span class="bg-gradient-to-r from-[#F5A623] to-[#ffc562] bg-clip-text text-transparent">Beasiswa Impianmu</span>
                </h1>
                <p class="text-lg text-slate-300 max-w-xl mx-auto md:mx-0">
                    FindShip memetakan ribuan informasi beasiswa dalam & luar negeri secara presisi serta terpersonalisasi khusus untuk mahasiswa Indonesia.
                </p>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <a href="{{ route('scholarships.index') }}" class="w-full sm:w-auto text-center bg-[#F5A623] hover:bg-[#e0951b] text-white px-8 py-4 rounded-xl text-base font-bold shadow-xl shadow-[#F5A623]/25 hover:shadow-2xl hover:-translate-y-0.5 transition-all">
                        Mulai Cari Beasiswa
                    </a>
                    <a href="#premium" class="w-full sm:w-auto text-center bg-white/10 hover:bg-white/20 border border-white/20 text-white px-6 py-4 rounded-xl text-base font-bold transition-all">
                        Kelas Premium
                    </a>
                    <button onclick="window.startOnboardingTour()" class="w-full sm:w-auto text-center bg-[#F5A623]/20 hover:bg-[#F5A623]/30 text-[#F5A623] px-6 py-4 rounded-xl text-base font-bold transition-all flex items-center justify-center gap-1.5 border border-[#F5A623]/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h0a2 2 0 01-2 2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        Lihat Panduan
                    </button>
                </div>
            </div>

            <!-- Right Visual representation / Premium illustration -->
            <div class="relative flex justify-center items-center">
                <div class="w-full max-w-md bg-white/5 border border-white/10 p-6 rounded-3xl shadow-2xl backdrop-blur-lg relative overflow-hidden">
                    <!-- Dashboard Card Preview -->
                    <div class="flex justify-between items-center mb-6 pb-4 border-b border-white/10">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-[#F5A623]/20 flex items-center justify-center text-[#F5A623]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 14l9-5-9-4-9 4 9 5z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold">Rekomendasi Teratas</h4>
                                <p class="text-xs text-slate-400">Berdasarkan profil IPK: 3.45</p>
                            </div>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded bg-[#F5A623] text-white">98% Match</span>
                    </div>

                    <div class="space-y-4">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition-all cursor-pointer">
                            <h5 class="text-sm font-semibold text-white">Beasiswa LPDP Tahap II</h5>
                            <div class="flex justify-between text-xs text-slate-400 mt-2">
                                <span>Pemerintah RI</span>
                                <span class="text-rose-400 font-bold">Sisa 14 Hari</span>
                            </div>
                        </div>
                        <div class="p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition-all cursor-pointer">
                            <h5 class="text-sm font-semibold text-white">MEXT Scholarship Japan</h5>
                            <div class="flex justify-between text-xs text-slate-400 mt-2">
                                <span>Kedutaan Jepang</span>
                                <span class="text-[#F5A623]">Sisa 3 Bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- Stats Section -->
    <section class="bg-white border-y border-slate-100 py-12 relative z-20 -mt-8 shadow-sm max-w-5xl mx-auto rounded-2xl">
        <div class="grid grid-cols-3 divide-x divide-slate-100 text-center">
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-[#1E3A5F]">{{ $stats['beasiswa_count'] ?? 0 }}</p>
                <p class="text-xs sm:text-sm text-slate-500 font-semibold mt-1">Beasiswa Aktif</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-[#1E3A5F]">{{ $stats['user_count'] ?? 5 }}</p>
                <p class="text-xs sm:text-sm text-slate-500 font-semibold mt-1">Mahasiswa Bergabung</p>
            </div>
            <div>
                <p class="text-3xl sm:text-4xl font-extrabold text-[#1E3A5F]">{{ $stats['kelas_count'] ?? 0 }}</p>
                <p class="text-xs sm:text-sm text-slate-500 font-semibold mt-1">Kelas Premium</p>
            </div>
        </div>
    </section>

    <!-- Featured Scholarships -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-[#1E3A5F] tracking-tight">Beasiswa Unggulan Terpopuler</h2>
                <p class="text-slate-500 mt-2">Daftar rekomendasi beasiswa terpopuler dengan tenggat terdekat yang dapat kamu lamar.</p>
            </div>
            <a href="{{ route('scholarships.index') }}" class="inline-flex items-center text-sm font-bold text-[#1E3A5F] hover:text-[#F5A623] mt-4 md:mt-0 transition-colors group">
                Lihat Semua Beasiswa
                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <!-- Cards Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($featuredScholarships as $scholarship)
                <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Category Badges -->
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider bg-slate-100 text-slate-600">
                                {{ $scholarship->jenjang }}
                            </span>
                            <span class="px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider {{ $scholarship->kategori == 'dalam negeri' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'bg-blue-50 text-blue-700 border border-blue-100' }}">
                                {{ $scholarship->kategori }}
                            </span>
                        </div>

                        <!-- Title & Organizer -->
                        <h3 class="text-lg font-bold text-[#1E3A5F] leading-snug hover:text-[#F5A623] transition-colors mb-2">
                            <a href="{{ route('scholarships.show', $scholarship->id) }}">{{ $scholarship->judul }}</a>
                        </h3>
                        <p class="text-xs text-slate-400 font-medium mb-4 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            {{ $scholarship->penyelenggara }}
                        </p>

                        <!-- Excerpt / Requirements -->
                        <p class="text-sm text-slate-500 line-clamp-3 mb-6">
                            {{ $scholarship->deskripsi }}
                        </p>
                    </div>

                    <!-- Bottom Details -->
                    <div class="border-t border-slate-50 pt-4 space-y-4">
                        <div class="flex items-center justify-between text-xs font-semibold">
                            <span class="text-slate-400">Min. IPK:</span>
                            <span class="text-[#1E3A5F]">{{ $scholarship->min_ipk ? number_format($scholarship->min_ipk, 2) : 'Tanpa Minimum' }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs font-semibold">
                            <span class="text-slate-400">Deadline:</span>
                            <span class="text-rose-600 font-bold flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $scholarship->deadline->format('d M Y') }}
                            </span>
                        </div>
                        <a href="{{ route('scholarships.show', $scholarship->id) }}" class="block w-full text-center bg-[#1E3A5F] hover:bg-[#F5A623] text-white py-2.5 rounded-xl text-sm font-bold shadow-sm transition-all">
                            Detail Selengkapnya
                        </a>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-slate-400 py-12">Belum ada beasiswa unggulan terdaftar.</p>
            @endforelse
    </section>

    <!-- Premium Classes Preview -->
    <section id="premium" class="bg-slate-100 py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-[#F5A623] uppercase tracking-widest bg-[#F5A623]/10 px-3.5 py-1.5 rounded-full">Kelas Premium</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#1E3A5F] tracking-tight mt-4">Program Persiapan Beasiswa Terbaik</h2>
                <p class="text-slate-500 mt-3">Persiapkan berkas esai, nilai tes bahasa Inggris, dan kemampuan interview Anda dengan bimbingan mentor handal.</p>
            </div>

            <!-- Program grid mockup (dynamically seeded data can go here too) -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $classesMock = [
                        ['id' => 1, 'judul' => 'Mastering LPDP Essay Writing', 'harga' => 'Rp150.000', 'desc' => 'Kelas intensif menyusun esai LPDP kontribusi dan rencana studi.', 'img' => 'https://picsum.photos/id/24/600/400'],
                        ['id' => 2, 'judul' => 'IELTS Preparation Bootcamp (7.0+)', 'harga' => 'Rp299.000', 'desc' => 'Pembahasan lengkap 4 skill IELTS dan bimbingan mentor.', 'img' => 'https://picsum.photos/id/180/600/400'],
                        ['id' => 3, 'judul' => 'Scholarship Interview Sim', 'harga' => 'Rp125.000', 'desc' => 'Latihan simulasi wawancara dengan STAR Method teruji.', 'img' => 'https://picsum.photos/id/357/600/400'],
                        ['id' => 4, 'judul' => 'Mentorship Beasiswa MEXT Jepang', 'harga' => 'Rp199.000', 'desc' => 'Bimbingan administrasi dan pembahasan soal ujian tulis.', 'img' => 'https://picsum.photos/id/1062/600/400']
                    ];
                @endphp
                @foreach($classesMock as $cls)
                    <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all flex flex-col justify-between">
                        <a href="{{ route('kelas.show', $cls['id']) }}" class="block h-40 overflow-hidden">
                            <img src="{{ $cls['img'] }}" alt="{{ $cls['judul'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </a>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                            <div>
                                <h4 class="font-bold text-slate-800 text-sm leading-snug line-clamp-1 hover:text-[#F5A623]">
                                    <a href="{{ route('kelas.show', $cls['id']) }}">
                                        {{ $cls['judul'] }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-400 mt-2 line-clamp-2">{{ $cls['desc'] }}</p>
                            </div>
                            <div class="border-t border-slate-50 pt-3 flex items-center justify-between mt-auto">
                                <span class="text-[#F5A623] text-sm font-extrabold">{{ $cls['harga'] }}</span>
                                <div class="flex items-center gap-1.5" x-data>
                                    <button @click="window.Alpine && window.Alpine.store('cart').add({
                                        id: '{{ $cls['id'] }}',
                                        judul: '{{ addslashes($cls['judul']) }}',
                                        harga: '{{ $cls['harga'] }}',
                                        thumbnail: '{{ $cls['img'] }}'
                                    })" class="bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] p-2 rounded-lg transition-all" title="Tambah ke Keranjang">
                                        <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </button>
                                    <a href="{{ route('kelas.show', $cls['id']) }}" class="bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] p-2 rounded-lg transition-colors text-xs font-bold">
                                        Beli Kelas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Blog / WordPress Articles -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold text-[#F5A623] uppercase tracking-widest bg-[#F5A623]/10 px-3.5 py-1.5 rounded-full">Tips & Trik Beasiswa</span>
            <h2 class="text-3xl font-extrabold text-[#1E3A5F] tracking-tight mt-4">Artikel Pilihan Seputar Beasiswa</h2>
            <p class="text-slate-500 mt-3">Pelajari berbagai info penting dan pengalaman alumni untuk mempermudah pendaftaran beasiswamu.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($recentArticles as $article)
                <article class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Thumbnail -->
                        <div class="relative h-48 bg-slate-200">
                            @if(isset($article['_embedded']['wp:featuredmedia'][0]['source_url']))
                                <img src="{{ $article['_embedded']['wp:featuredmedia'][0]['source_url'] }}" alt="{{ $article['title']['rendered'] }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://picsum.photos/id/24/600/400';">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-[#1E3A5F]/5 text-[#1E3A5F]/30">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <p class="text-xs text-slate-400 font-semibold mb-2">
                                {{ isset($article['date']) ? date('d M Y', strtotime($article['date'])) : '' }}
                            </p>
                            <h3 class="text-base font-bold text-[#1E3A5F] leading-snug line-clamp-2 hover:text-[#F5A623] transition-colors mb-3">
                                <a href="{{ route('artikel.show', $article['id']) }}">{!! $article['title']['rendered'] !!}</a>
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-3">
                                {!! strip_tags($article['excerpt']['rendered'] ?? '') !!}
                            </p>
                        </div>
                    </div>

                    <!-- Footer / Author info -->
                    <div class="p-6 border-t border-slate-50 flex items-center justify-between bg-slate-50/50">
                        <span class="text-xs text-slate-400 font-medium">
                            Oleh: <strong class="text-slate-600 font-bold">{{ $article['_embedded']['author'][0]['name'] ?? 'Penulis FindShip' }}</strong>
                        </span>
                        <a href="{{ route('artikel.show', $article['id']) }}" class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors flex items-center gap-1">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </article>
            @empty
                <p class="col-span-full text-center text-slate-400 py-12">Belum ada artikel seputar beasiswa.</p>
            @endforelse
        </div>
    </section>



    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
