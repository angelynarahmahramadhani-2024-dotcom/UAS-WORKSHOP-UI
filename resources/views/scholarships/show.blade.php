<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $scholarship->judul }} — FindShip</title>
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
<body class="bg-slate-50 text-slate-900 antialiased">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Detail Container -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Success/Alert Banner -->
        <x-success-banner />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Side: Core Info and Description -->
            <div class="lg:col-span-2 space-y-8">
                
                <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
                    <!-- Categories -->
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider bg-slate-100 text-slate-600">
                            {{ $scholarship->jenjang }}
                        </span>
                        <span class="px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider {{ $scholarship->kategori == 'dalam negeri' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' : 'bg-blue-50 text-blue-700 border border-blue-100' }}">
                            {{ $scholarship->kategori }}
                        </span>
                    </div>

                    <!-- Title & Organizer -->
                    <div class="space-y-2">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E3A5F] leading-snug">{{ $scholarship->judul }}</h1>
                        <p class="text-sm text-slate-500 font-semibold flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            Diselenggarakan oleh: <strong class="text-slate-700 font-bold">{{ $scholarship->penyelenggara }}</strong>
                        </p>
                    </div>

                    <!-- Detail Info Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 bg-slate-50 p-5 rounded-2xl border border-slate-100">
                        <div>
                            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Min. IPK</p>
                            <p class="text-base font-extrabold text-[#1E3A5F] mt-1">{{ $scholarship->min_ipk ? number_format($scholarship->min_ipk, 2) : 'Tanpa Minimum' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Jurusan Target</p>
                            <p class="text-base font-extrabold text-[#1E3A5F] mt-1 line-clamp-1" title="{{ $scholarship->jurusan }}">{{ $scholarship->jurusan }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Tenggat</p>
                            <p class="text-base font-extrabold text-rose-600 mt-1">{{ $scholarship->deadline->format('d M Y') }}</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-[#1E3A5F] border-b border-slate-100 pb-2.5">Deskripsi Beasiswa</h3>
                        <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">
                            {{ $scholarship->deskripsi }}
                        </p>
                    </div>
                </div>

            </div>

            <!-- Right Side: Sidebar Actions / Countdown -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Countdown & Action Box -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
                    
                    <!-- Countdown Display -->
                    <div class="text-center p-6 rounded-xl border border-slate-100 bg-slate-50/50">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Countdown Pendaftaran</p>
                        @if ($daysLeft > 0)
                            <div class="space-y-1">
                                <p class="text-3xl font-extrabold text-[#F5A623]">{{ $daysLeft }} Hari</p>
                                <p class="text-xs text-slate-500 font-medium">Tersisa sebelum penutupan</p>
                            </div>
                        @elseif ($daysLeft == 0)
                            <span class="inline-block bg-[#F5A623] text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider animate-pulse">Hari Ini Deadline!</span>
                        @else
                            <span class="inline-block bg-rose-100 text-rose-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Pendaftaran Ditutup</span>
                        @endif
                    </div>

                    <!-- Action buttons -->
                    <div class="space-y-3">
                        @if($scholarship->link_resmi)
                            <a href="{{ $scholarship->link_resmi }}" target="_blank" rel="noopener noreferrer" class="block w-full text-center bg-[#1E3A5F] hover:bg-[#152841] text-white py-3.5 rounded-xl text-sm font-bold shadow-md shadow-[#1E3A5F]/15 hover:shadow-lg transition-all flex items-center justify-center gap-1.5">
                                Kunjungi Website Resmi
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @endif

                        <!-- Favorite Toggle Form -->
                        <form action="{{ route('scholarships.favorite', $scholarship->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-center border {{ $isFavorited ? 'border-amber-200 bg-amber-50 text-[#F5A623]' : 'border-slate-200 bg-white hover:bg-slate-50 text-slate-600' }} py-3.5 rounded-xl text-sm font-bold transition-all flex items-center justify-center gap-1.5">
                                @if($isFavorited)
                                    <svg class="w-5 h-5 text-[#F5A623]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    Tersimpan di Favorit
                                @else
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                    Simpan ke Favorit
                                @endif
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Tips / CTA -->
                <div class="bg-gradient-to-br from-[#1E3A5F] to-[#14263f] text-white border border-slate-800 rounded-2xl p-6 shadow-sm space-y-4">
                    <div class="bg-[#F5A623] w-10 h-10 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 01-2 2h0a2 2 0 01-2-2v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    </div>
                    <h4 class="font-bold text-sm">Butuh Mentor Pendampingan?</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">Bergabunglah di program Kelas Premium FindShip untuk dibimbing langsung oleh awardee dalam mereview esai dan simulasi wawancara.</p>
                    <a href="{{ route('kelas.index') }}" class="inline-block bg-[#F5A623] hover:bg-[#e0951b] text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-sm transition-colors mt-2">Daftar Kelas Premium</a>
                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
