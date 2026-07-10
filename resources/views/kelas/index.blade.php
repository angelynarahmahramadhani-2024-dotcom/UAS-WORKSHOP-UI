<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelas Premium Persiapan Beasiswa — FindShip</title>
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
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-[#F5A623] selection:text-white">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Page Title Header -->
    <section class="bg-gradient-to-br from-[#1E3A5F] via-[#162a45] to-[#0f1d30] text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-15 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#F5A623] rounded-full blur-[100px]"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative z-10">
            <span class="text-xs font-bold text-[#F5A623] uppercase tracking-widest bg-white/10 px-4 py-2 rounded-full border border-white/5">Kelas Premium</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Katalog Kelas Bimbingan Persiapan Beasiswa</h1>
            <p class="text-slate-300 max-w-xl mx-auto text-xs sm:text-sm leading-relaxed">
                Pilih topik bimbingan terkurasi untuk memperbesar peluang Anda memenangkan seleksi beasiswa dalam dan luar negeri.
            </p>
        </div>
    </section>

    <!-- Main catalog grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" x-data>
        
        <!-- Reusable Page Success Banner -->
        <x-success-banner />
        
        <!-- Filter and Sorting Section -->
        <div class="bg-white border border-slate-200 rounded-3xl p-6 mb-10 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <!-- Category Tabs -->
            <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0 scrollbar-none">
                @php
                    $categories = ['Semua', 'Bahasa & Tes', 'Esai & Motivation Letter', 'Interview', 'Dokumen Pendaftaran'];
                @endphp
                @foreach($categories as $cat)
                    <a href="{{ route('kelas.index', ['kategori' => $cat, 'sort' => $sort]) }}"
                       class="px-4 py-2.5 rounded-2xl text-xs font-bold whitespace-nowrap transition-all {{ $kategori === $cat ? 'bg-[#1E3A5F] text-white shadow-md shadow-[#1E3A5F]/15' : 'bg-slate-50 hover:bg-slate-100 text-slate-600' }}">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>

            <!-- Sort dropdown -->
            <div class="flex items-center gap-3 shrink-0">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Urutkan</span>
                <select onchange="location = this.value;" class="bg-slate-50 border border-slate-200 rounded-2xl px-4 py-2.5 text-xs font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#1E3A5F] cursor-pointer">
                    <option value="{{ route('kelas.index', ['kategori' => $kategori, 'sort' => 'terpopuler']) }}" {{ $sort === 'terpopuler' ? 'selected' : '' }}>Terpopuler</option>
                    <option value="{{ route('kelas.index', ['kategori' => $kategori, 'sort' => 'termurah']) }}" {{ $sort === 'termurah' ? 'selected' : '' }}>Harga Termurah</option>
                    <option value="{{ route('kelas.index', ['kategori' => $kategori, 'sort' => 'terbaru']) }}" {{ $sort === 'terbaru' ? 'selected' : '' }}>Kelas Terbaru</option>
                </select>
            </div>
        </div>

        <!-- Class Cards Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($classes as $class)
                <div class="bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Thumbnail and discount tag -->
                        <div class="h-52 bg-slate-100 relative overflow-hidden">
                            @if($class->thumbnail)
                                <img src="{{ $class->thumbnail }}" alt="{{ $class->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-300">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                </div>
                            @endif

                            <!-- Badges -->
                            <div class="absolute top-4 left-4 flex flex-col gap-2">
                                <span class="bg-[#1E3A5F] text-white text-[9px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-sm border border-white/10">
                                    {{ $class->kategori }}
                                </span>
                                @if($class->discount_percentage)
                                    <span class="bg-rose-500 text-white text-[9px] font-extrabold uppercase px-3 py-1 rounded-full tracking-wider shadow-sm">
                                        Diskon {{ $class->discount_percentage }}%
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Class Details -->
                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between text-[11px] font-bold text-slate-400">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                    {{ $class->lessons_count }} Pelajaran ({{ $class->duration }})
                                </div>
                                <div class="flex items-center gap-1 text-amber-500">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    {{ number_format($class->rating, 1) }}
                                </div>
                            </div>

                            <h3 class="text-base font-extrabold text-[#1E3A5F] hover:text-[#F5A623] transition-colors leading-snug line-clamp-2">
                                <a href="{{ route('kelas.show', $class->id) }}">{{ $class->judul }}</a>
                            </h3>
                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                {{ $class->deskripsi }}
                            </p>
                        </div>
                    </div>

                    <!-- Price and Button Section -->
                    <div class="p-6 border-t border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider">Investasi Kelas</p>
                            <div class="flex flex-col mt-0.5">
                                @if($class->discount_percentage)
                                    @php $coretPrice = $class->harga / (1 - ($class->discount_percentage/100)); @endphp
                                    <span class="text-[10px] text-slate-400 line-through">Rp{{ number_format($coretPrice, 0, ',', '.') }}</span>
                                @endif
                                <span class="text-[#F5A623] text-base font-extrabold">Rp{{ number_format($class->harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <!-- Direct cart add action -->
                            <button @click="Alpine.store('cart').add({{ $class->id }}, '{{ addslashes($class->judul) }}', {{ $class->harga }}, '{{ $class->thumbnail }}')"
                                    class="bg-amber-50 hover:bg-[#F5A623] hover:text-white text-[#F5A623] p-3 rounded-2xl text-xs font-bold transition-all border border-amber-100 hover:border-transparent flex items-center justify-center shadow-xs" 
                                    title="Tambah ke Keranjang">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </button>
                            <a href="{{ route('kelas.show', $class->id) }}" class="bg-[#1E3A5F] hover:bg-[#F5A623] text-white px-5 py-3 rounded-2xl text-xs font-bold transition-all shadow-sm whitespace-nowrap">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white border border-slate-200 rounded-3xl shadow-sm">
                    <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-sm font-bold text-slate-500">Belum ada kelas premium aktif untuk kriteria ini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
