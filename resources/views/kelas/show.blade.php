<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $class->judul }} — FindShip</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .premium-content h1, .premium-content h2, .premium-content h3 {
            color: #1E3A5F;
            font-weight: 700;
            margin-top: 1.25rem;
            margin-bottom: 0.75rem;
        }
        .premium-content h3 {
            font-size: 1.125rem;
        }
        .premium-content p {
            color: #475569;
            font-size: 0.875rem;
            line-height: 1.625;
            margin-bottom: 1rem;
        }
        .premium-content ul, .premium-content ol {
            margin-bottom: 1rem;
            padding-left: 1.25rem;
        }
        .premium-content ul {
            list-style-type: disc;
        }
        .premium-content ol {
            list-style-type: decimal;
        }
        .premium-content li {
            font-size: 0.875rem;
            color: #475569;
            margin-bottom: 0.5rem;
        }
        .premium-content strong {
            color: #0f172a;
            font-weight: 600;
        }
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Main Content Detail -->
    <main x-data class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Success/Alert Banner -->
        <x-success-banner />
        
        @if (session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        <!-- Pending Status Warning Banner -->
        @if($transaction && $transaction->status === 'menunggu')
            <div class="mb-8 p-5 bg-amber-50 border border-amber-200 text-amber-900 rounded-2xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-sm animate-pulse-subtle">
                <div class="flex items-start gap-3">
                    <div class="bg-amber-100 p-2.5 rounded-xl text-amber-700 mt-0.5 sm:mt-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Status Pendaftaran: Menunggu Verifikasi</h4>
                        <p class="text-xs text-amber-700 mt-1 leading-relaxed">
                            @if($transaction->bukti_bayar)
                                Bukti transfer pembayaran Anda telah diunggah. Admin FindShip sedang memverifikasi transaksi Anda dalam waktu maksimal 24 jam.
                            @else
                                Pendaftaran kelas telah dibuat. Silakan selesaikan pembayaran dan unggah bukti transfer agar modul eksklusif terbuka.
                            @endif
                        </p>
                    </div>
                </div>
                @if(!$transaction->bukti_bayar)
                    <a href="{{ route('kelas.upload-bukti', $class->id) }}" class="shrink-0 w-full sm:w-auto text-center bg-amber-600 hover:bg-amber-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                        Unggah Bukti Bayar
                    </a>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Panel: Class Details -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Main Class Info Card -->
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <!-- Image -->
                    <div class="h-80 bg-slate-100 relative">
                        @if($class->thumbnail)
                            <img src="{{ $class->thumbnail }}" alt="{{ $class->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-300">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                            </div>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6 sm:p-8 space-y-6">
                        <div class="space-y-2">
                            <div class="inline-flex items-center gap-1.5 text-xs font-bold text-[#F5A623] uppercase tracking-wider bg-[#F5A623]/10 px-3 py-1 rounded-full">
                                Program Pendampingan Premium
                            </div>
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E3A5F] leading-snug">{{ $class->judul }}</h1>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-base font-bold text-[#1E3A5F] border-b border-slate-100 pb-2.5">Deskripsi Program Bimbingan</h3>
                            <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">
                                {{ $class->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Conditional Rendering: Content Tabs (Subscribed Only) -->
                @if($sudahBerlangganan)
                    <!-- Premium Tabs Container -->
                    <div x-data="{ activeTab: '{{ $class->konten_premium ? 'materi' : ($class->link_rekaman ? 'video' : ($class->file_materi ? 'download' : 'zoom')) }}' }" class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                        <!-- Tab Headers -->
                        <div class="flex border-b border-slate-200 bg-slate-50/50 overflow-x-auto scrollbar-none">
                            @if($class->konten_premium)
                                <button @click="activeTab = 'materi'" :class="activeTab === 'materi' ? 'border-[#1E3A5F] text-[#1E3A5F] font-bold bg-white' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50/85'" class="px-6 py-4 border-b-2 text-sm whitespace-nowrap transition-all flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" :class="activeTab === 'materi' && 'text-[#1E3A5F]'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                    Materi Premium
                                </button>
                            @endif
                            @if($class->link_rekaman)
                                <button @click="activeTab = 'video'" :class="activeTab === 'video' ? 'border-[#1E3A5F] text-[#1E3A5F] font-bold bg-white' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50/85'" class="px-6 py-4 border-b-2 text-sm whitespace-nowrap transition-all flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" :class="activeTab === 'video' && 'text-[#1E3A5F]'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    Rekaman Video
                                </button>
                            @endif
                            @if($class->file_materi)
                                <button @click="activeTab = 'download'" :class="activeTab === 'download' ? 'border-[#1E3A5F] text-[#1E3A5F] font-bold bg-white' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50/85'" class="px-6 py-4 border-b-2 text-sm whitespace-nowrap transition-all flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" :class="activeTab === 'download' && 'text-[#1E3A5F]'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    File Download
                                </button>
                            @endif
                            @if($class->link_zoom)
                                <button @click="activeTab = 'zoom'" :class="activeTab === 'zoom' ? 'border-[#1E3A5F] text-[#1E3A5F] font-bold bg-white' : 'border-transparent text-slate-500 hover:text-slate-700 hover:bg-slate-50/85'" class="px-6 py-4 border-b-2 text-sm whitespace-nowrap transition-all flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" :class="activeTab === 'zoom' && 'text-[#1E3A5F]'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                    Room Zoom
                                </button>
                            @endif
                        </div>

                        <!-- Tab Contents -->
                        <div class="p-6 sm:p-8">
                            @if($class->konten_premium)
                                <div x-show="activeTab === 'materi'" class="premium-content transition-opacity duration-300">
                                    {!! $class->konten_premium !!}
                                </div>
                            @endif

                            @if($class->link_rekaman)
                                <div x-show="activeTab === 'video'" class="space-y-4 transition-opacity duration-300">
                                    <h3 class="text-base font-bold text-[#1E3A5F]">Rekaman Sesi Kelas Premium</h3>
                                    <p class="text-xs text-slate-500 leading-relaxed">Anda dapat menonton kembali rekaman sesi bimbingan premium sebelumnya kapan saja untuk mengulang materi dan persiapan diri.</p>
                                    <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-md bg-black">
                                        <iframe class="w-full h-full" src="{{ $class->link_rekaman }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endif

                            @if($class->file_materi)
                                <div x-show="activeTab === 'download'" class="space-y-4 transition-opacity duration-300">
                                    <h3 class="text-base font-bold text-[#1E3A5F]">Unduh Berkas Pendukung & Materi</h3>
                                    <p class="text-xs text-slate-500 leading-relaxed">Silakan unduh dokumen panduan resmi, e-book pendukung, atau template esai eksklusif di bawah ini.</p>
                                    
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-5 bg-slate-50 border border-slate-200 rounded-2xl gap-4">
                                        <div class="flex items-center gap-3.5">
                                            <div class="bg-rose-50 p-3 rounded-xl text-rose-600 shrink-0">
                                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                            </div>
                                            <div class="min-w-0">
                                                <h4 class="text-sm font-bold text-slate-800 truncate max-w-xs sm:max-w-md">{{ basename($class->file_materi) }}</h4>
                                                <p class="text-xs text-slate-400 mt-1">Dokumen PDF • Hak Akses Terverifikasi</p>
                                            </div>
                                        </div>
                                        <a href="{{ route('kelas.download-materi', $class->id) }}" class="w-full sm:w-auto flex items-center justify-center gap-2 bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                            Unduh Materi
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($class->link_zoom)
                                <div x-show="activeTab === 'zoom'" class="space-y-4 transition-opacity duration-300">
                                    <h3 class="text-base font-bold text-[#1E3A5F]">Ruang Mentorship Langsung (Zoom)</h3>
                                    <p class="text-xs text-slate-500 leading-relaxed">Gunakan tautan di bawah ini untuk langsung bergabung ke sesi bimbingan interaktif dan tanya-jawab langsung bersama mentor.</p>
                                    
                                    <div class="p-6 bg-sky-50 border border-sky-100 rounded-2xl flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                        <div class="space-y-1">
                                            <h4 class="text-sm font-bold text-sky-900">Virtual Room Mentorship</h4>
                                            <p class="text-xs text-sky-700 leading-relaxed">Pastikan Anda telah menginstal aplikasi Zoom client dan siap 10 menit sebelum sesi kelas dimulai.</p>
                                        </div>
                                        <a href="{{ $class->link_zoom }}" target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto shrink-0 flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                                            Gabung Pertemuan Zoom
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <!-- Teaser / Konten Publik (Guest & Pending Only) -->
                    @if($class->konten_publik)
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                            <h3 class="text-base font-bold text-[#1E3A5F] border-b border-slate-100 pb-2.5">Teaser Bimbingan</h3>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                {{ $class->konten_publik }}
                            </p>
                        </div>
                    @endif
                @endif

                <!-- Kurikulum & Modul Belajar -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
                    <h3 class="text-base font-bold text-[#1E3A5F] border-b border-slate-100 pb-2.5">Kurikulum & Silabus Program</h3>
                    
                    @if($sudahBerlangganan)
                        <!-- Accordion Kurikulum (Subscribed / Verified) -->
                        <div x-data="{ activeIndex: null }" class="space-y-3">
                            @if(is_array($class->kurikulum) && count($class->kurikulum) > 0)
                                @foreach($class->kurikulum as $index => $item)
                                    <div class="border border-slate-200 rounded-xl bg-white overflow-hidden shadow-sm transition-all duration-300">
                                        <button @click="activeIndex = (activeIndex === {{ $index }} ? null : {{ $index }})" class="w-full flex items-center justify-between p-4 text-left font-bold text-sm text-[#1E3A5F] hover:bg-slate-50 transition-colors">
                                            <span class="pr-4">{{ $item['judul'] ?? 'Modul ' . ($index + 1) }}</span>
                                            <svg :class="activeIndex === {{ $index }} ? 'rotate-180' : ''" class="w-5 h-5 text-slate-400 transform transition-transform duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div x-show="activeIndex === {{ $index }}" x-transition x-cloak class="p-4 border-t border-slate-100 bg-slate-50 text-xs text-slate-600 leading-relaxed">
                                            {{ $item['materi'] ?? 'Materi belum tersedia.' }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-xs text-slate-500">Belum ada silabus kurikulum yang dikonfigurasi.</p>
                            @endif
                        </div>
                    @else
                        <!-- Blurred & Locked Kurikulum (Guest / Unsubscribed & Pending Verification) -->
                        <div class="relative">
                            <!-- Overlay Gembok -->
                            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[2.5px] rounded-2xl flex flex-col items-center justify-center p-6 text-center z-10 border border-white/10 shadow-inner">
                                <div class="w-14 h-14 bg-white/95 rounded-full flex items-center justify-center shadow-lg text-[#F5A623] mb-4 transform hover:scale-105 transition-transform duration-300">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                </div>
                                <h4 class="text-white text-sm font-bold">Kurikulum Eksklusif Terkunci</h4>
                                <p class="text-slate-200 text-[11px] mt-1.5 max-w-xs leading-normal">Gabung program bimbingan premium untuk membuka akses penuh ke silabus pembelajaran, file materi PDF, video rekaman, dan ruang Zoom.</p>
                                @guest
                                    <a href="{{ route('login') }}" class="mt-4 bg-[#F5A623] hover:bg-[#e0951b] text-[#1E3A5F] px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-md">
                                        Login untuk Membeli
                                    </a>
                                @else
                                    @if(!$transaction)
                                        <a href="{{ route('kelas.checkout', $class->id) }}" class="mt-4 bg-[#F5A623] hover:bg-[#e0951b] text-[#1E3A5F] px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-md">
                                            Beli Kelas Sekarang
                                        </a>
                                    @endif
                                @endguest
                            </div>
                            
                            <!-- Blurred Content Wrapper -->
                            <div class="space-y-3 filter blur-sm select-none pointer-events-none">
                                @if(is_array($class->kurikulum) && count($class->kurikulum) > 0)
                                    @foreach($class->kurikulum as $index => $item)
                                        <div class="border border-slate-200 rounded-xl bg-white p-4 flex items-center justify-between">
                                            <span class="font-bold text-sm text-[#1E3A5F]">{{ $item['judul'] ?? 'Modul ' . ($index + 1) }}</span>
                                            <svg class="w-5 h-5 text-slate-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="border border-slate-200 rounded-xl bg-white p-4 flex items-center justify-between">
                                        <span class="font-bold text-sm text-[#1E3A5F]">Sesi 1: Bedah Logika & Esensi Esai LPDP</span>
                                        <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                    <div class="border border-slate-200 rounded-xl bg-white p-4 flex items-center justify-between">
                                        <span class="font-bold text-sm text-[#1E3A5F]">Sesi 2: Rencana Studi & Menjawab Masalah Riil</span>
                                        <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                    <div class="border border-slate-200 rounded-xl bg-white p-4 flex items-center justify-between">
                                        <span class="font-bold text-sm text-[#1E3A5F]">Sesi 3: Review Esai One-on-One</span>
                                        <svg class="w-5 h-5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <!-- Right Panel: Transaction Actions -->
            <div class="lg:col-span-1 space-y-8">
                
                <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Investasi Kelas</p>
                        <div class="flex items-baseline gap-2 mt-1">
                            @if($class->discount_percentage)
                                @php $coretPrice = $class->harga / (1 - ($class->discount_percentage/100)); @endphp
                                <div class="flex flex-col">
                                    <span class="text-xs text-slate-400 line-through">Rp{{ number_format($coretPrice, 0, ',', '.') }}</span>
                                    <span class="text-[#F5A623] text-2xl font-extrabold">Rp{{ number_format($class->harga, 0, ',', '.') }}</span>
                                </div>
                            @else
                                <p class="text-[#F5A623] text-2xl font-extrabold">Rp{{ number_format($class->harga, 0, ',', '.') }}</p>
                            @endif
                            @if($sudahBerlangganan)
                                <span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md self-center">Terbeli</span>
                            @endif
                        </div>

                        <!-- Discount Countdown Ticker -->
                        @if($class->discount_percentage && $class->discount_expiry && $class->discount_expiry->isFuture())
                            <div class="mt-4 p-3.5 bg-rose-50 border border-rose-100 rounded-2xl text-[10px] font-bold text-rose-700 space-y-1.5"
                                 x-data="{ 
                                     expiry: {{ $class->discount_expiry->timestamp * 1000 }},
                                     now: new Date().getTime(),
                                     get timeLeft() {
                                         let diff = this.expiry - this.now;
                                         if (diff <= 0) return 'Promo Berakhir';
                                         let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                                         let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                         let mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                                         let secs = Math.floor((diff % (1000 * 60)) / 1000);
                                         return (days > 0 ? days + 'h ' : '') + hours + 'j ' + mins + 'm ' + secs + 'd';
                                     },
                                     init() {
                                         setInterval(() => this.now = new Date().getTime(), 1000);
                                     }
                                 }">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-rose-500 animate-pulse shrink-0" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>PENAWARAN TERBATAS!</span>
                                </div>
                                <div class="text-xs font-extrabold text-rose-600">
                                    Berakhir dalam: <span x-text="timeLeft"></span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="border-t border-slate-100 pt-6 space-y-6">
                        @guest
                            <!-- Case: Not logged in -->
                            <div class="space-y-4 text-center">
                                <p class="text-xs text-slate-500 leading-normal">Silakan masuk log atau daftarkan akun baru Anda terlebih dahulu untuk membeli kelas premium ini.</p>
                                <div class="flex flex-col gap-2">
                                    <button @click="window.Alpine && window.Alpine.store('cart').add({
                                        id: '{{ $class->id }}',
                                        judul: '{{ addslashes($class->judul) }}',
                                        harga: 'Rp{{ number_format($class->harga, 0, ',', '.') }}',
                                        thumbnail: '{{ $class->thumbnail ?? '' }}'
                                    })" class="w-full text-center bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] py-3.5 rounded-xl text-sm font-bold shadow-sm transition-colors flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4 shrink-0" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        Tambah ke Keranjang
                                    </button>
                                    <a href="{{ route('login') }}" class="block w-full text-center bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white py-3.5 rounded-xl text-sm font-bold shadow-sm transition-colors">
                                        Login untuk Membeli
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- Case: Logged in -->
                            @if(!$transaction)
                                <!-- Case: No transaction made yet -->
                                <div class="space-y-4 animate-fade-in-down">
                                    <p class="text-xs text-slate-500 leading-normal">Dengan membeli kelas ini, Anda akan mendapatkan hak akses ke seluruh grup diskusi, materi, dan pendampingan esai eksklusif.</p>
                                    
                                    @php
                                        $isWishlisted = Auth::check() && \App\Models\Wishlist::where('user_id', Auth::id())->where('kelas_id', $class->id)->exists();
                                    @endphp
                                    <div class="flex flex-col gap-2" x-data="{ 
                                        wishlisted: {{ $isWishlisted ? 'true' : 'false' }},
                                        async toggleWish() {
                                            try {
                                                const res = await fetch('{{ route('kelas.wishlist', $class->id) }}', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json',
                                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                    }
                                                });
                                                const data = await res.json();
                                                this.wishlisted = (data.status === 'added');
                                                window.dispatchEvent(new CustomEvent('toast', { 
                                                    detail: { message: data.message } 
                                                }));
                                            } catch (e) {
                                                console.error(e);
                                            }
                                        }
                                    }">
                                        <div class="flex gap-2">
                                            <button @click="Alpine.store('cart').add({{ $class->id }}, '{{ addslashes($class->judul) }}', {{ $class->harga }}, '{{ $class->thumbnail }}')"
                                                    class="flex-1 text-center bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] py-3.5 rounded-xl text-xs font-bold shadow-sm transition-colors flex items-center justify-center gap-1.5">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                                + Keranjang
                                            </button>
                                            <button @click="toggleWish()" 
                                                    :class="wishlisted ? 'bg-rose-50 border-rose-200 text-rose-600' : 'bg-slate-100 border-transparent text-slate-400 hover:text-rose-600 hover:bg-rose-50/50'"
                                                    class="px-4 border-2 rounded-xl transition-all flex items-center justify-center"
                                                    title="Tambah ke Wishlist">
                                                <svg class="w-5 h-5 fill-current shrink-0" width="20" height="20" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg>
                                            </button>
                                        </div>
                                        <a href="{{ route('kelas.checkout-multi', ['ids' => $class->id]) }}" class="block w-full text-center bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white py-3.5 rounded-xl text-sm font-bold shadow-md hover:shadow-lg transition-all">
                                            Beli Kelas Sekarang
                                        </a>
                                    </div>
                                </div>
                            @else
                                <!-- Case: Has transaction -->
                                @if($transaction->status === 'menunggu' && !$transaction->bukti_bayar)
                                    <!-- Case: Pending payment slip -->
                                    <div class="space-y-4">
                                        <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl space-y-3">
                                            <p class="text-xs font-bold text-amber-800 uppercase tracking-wider flex items-center gap-1.5">
                                                <svg class="w-5 h-5 text-amber-600 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Pemesanan Berhasil
                                            </p>
                                            <p class="text-xs text-amber-700 leading-relaxed">
                                                Anda telah melakukan pemesanan untuk kelas ini. Selesaikan transfer pembayaran dan unggah bukti transfer.
                                            </p>
                                        </div>
                                        <a href="{{ route('kelas.upload-bukti', $class->id) }}" class="block w-full text-center bg-[#F5A623] hover:bg-[#e0951b] text-white py-3.5 rounded-xl text-sm font-bold shadow-sm transition-all">
                                            Selesaikan Pembayaran
                                        </a>
                                    </div>
                                @elseif($transaction->status === 'menunggu' && $transaction->bukti_bayar)
                                    <!-- Case: Payment slip uploaded, waiting verification -->
                                    <div class="p-4 bg-blue-50 border border-blue-200 text-blue-800 rounded-xl space-y-2.5">
                                        <p class="text-xs font-bold uppercase tracking-wider flex items-center gap-1.5">
                                            <svg class="w-5 h-5 text-blue-600 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Menunggu Verifikasi
                                        </p>
                                        <p class="text-xs text-blue-700 leading-relaxed">
                                            Bukti pembayaran berhasil diunggah! Admin sedang memverifikasi transaksi Anda. Anda akan mendapatkan akses begitu verifikasi disetujui.
                                        </p>
                                    </div>
                                @elseif($transaction->status === 'berhasil')
                                    <!-- Case: Approved / Enrolled -->
                                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl space-y-3.5">
                                        <p class="text-xs font-bold uppercase tracking-wider flex items-center gap-1.5">
                                            <svg class="w-5 h-5 text-emerald-600 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Akses Terbuka
                                        </p>
                                        <p class="text-xs text-emerald-700 leading-relaxed">
                                            Selamat! Pembayaran Anda berhasil diverifikasi. Anda sekarang memiliki akses penuh ke semua materi premium, video rekaman, berkas unduhan, dan room zoom kelas.
                                        </p>
                                        @if($class->link_zoom)
                                            <a href="{{ $class->link_zoom }}" target="_blank" rel="noopener noreferrer" class="block w-full text-center bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                                                Masuk Room Kelas (Zoom)
                                            </a>
                                        @endif
                                    </div>
                                @elseif($transaction->status === 'ditolak')
                                    <!-- Case: Rejection -->
                                    <div class="space-y-4">
                                        <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl space-y-2">
                                            <p class="text-xs font-bold uppercase tracking-wider flex items-center gap-1.5">
                                                <svg class="w-5 h-5 text-rose-600 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Pembayaran Ditolak
                                            </p>
                                            <p class="text-xs text-rose-700 leading-relaxed">
                                                Bukti pembayaran Anda sebelumnya ditolak oleh admin karena tidak sesuai atau nominal salah. Silakan kirim ulang bukti bayar yang benar.
                                            </p>
                                        </div>
                                        <a href="{{ route('kelas.upload-bukti', $class->id) }}" class="block w-full text-center bg-[#F5A623] hover:bg-[#e0951b] text-white py-3.5 rounded-xl text-sm font-bold transition-all shadow-sm">
                                            Kirim Ulang Bukti Bayar
                                        </a>
                                    </div>
                                @endif
                            @endif
                        @endguest
                    </div>
                </div>

                <!-- Kelas Ini Termasuk -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
                    <h4 class="text-sm font-bold text-[#1E3A5F] border-b border-slate-100 pb-3">Kelas Ini Termasuk:</h4>
                    <ul class="space-y-3.5 text-xs font-bold text-slate-600">
                        @if($class->includes['video_hours'] ?? null)
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                <span>{{ $class->includes['video_hours'] }} Jam Video Pembelajaran</span>
                            </li>
                        @endif
                        @if($class->includes['downloadable_materials'] ?? false)
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                <span>Materi & Modul Unduhan (PDF)</span>
                            </li>
                        @endif
                        @if($class->includes['practice_questions'] ?? false)
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                <span>Paket Soal Latihan & Mandiri</span>
                            </li>
                        @endif
                        @if($class->includes['certificate'] ?? false)
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                <span>Sertifikat Kelulusan Resmi</span>
                            </li>
                        @endif
                        @if($class->includes['lifetime_access'] ?? false)
                            <li class="flex items-center gap-2.5">
                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                <span>Akses Materi Selamanya</span>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
