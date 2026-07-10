<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $post['title']['rendered'] !!} — FindShip</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Custom typography styling for WP content */
        .wp-content h2, .wp-content h3 {
            font-weight: 800;
            color: #1E3A5F;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .wp-content h2 { font-size: 1.5rem; }
        .wp-content h3 { font-size: 1.25rem; }
        .wp-content p {
            margin-bottom: 1.25rem;
            line-height: 1.75;
            color: #475569;
        }
        .wp-content ul, .wp-content ol {
            margin-bottom: 1.25rem;
            padding-left: 1.5rem;
            list-style-type: decimal;
        }
        .wp-content ul { list-style-type: disc; }
        .wp-content li { margin-bottom: 0.5rem; color: #475569; }
        .wp-content strong { color: #1e293b; font-weight: 700; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Main Content Detail -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Side: Article Content -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Back Link -->
                <a href="{{ route('artikel.index') }}" class="inline-flex items-center text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors group">
                    <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                    Kembali ke Daftar Artikel
                </a>

                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                    <!-- Featured Image -->
                    <div class="h-80 bg-slate-100 relative">
                        @if(isset($post['_embedded']['wp:featuredmedia'][0]['source_url']))
                            <img src="{{ $post['_embedded']['wp:featuredmedia'][0]['source_url'] }}" alt="{{ $post['title']['rendered'] }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&auto=format&fit=crop';">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-[#1E3A5F]/5 text-[#1E3A5F]/30">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 00-2-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                    </div>

                    <!-- Article Body -->
                    <div class="p-6 sm:p-8 space-y-6">
                        <div class="space-y-3">
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E3A5F] leading-snug">{!! $post['title']['rendered'] !!}</h1>
                            
                            <!-- Metadata -->
                            <div class="flex items-center gap-4 text-xs text-slate-400 font-semibold border-b border-slate-100 pb-4">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Oleh: <strong class="text-slate-600">{{ $post['_embedded']['author'][0]['name'] ?? 'Penulis FindShip' }}</strong>
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ isset($post['date']) ? date('d M Y, H:i', strtotime($post['date'])) : '' }} WIB
                                </span>
                            </div>
                        </div>

                        <!-- Render HTML Body -->
                        <div class="wp-content text-sm sm:text-base leading-relaxed">
                            {!! $post['content']['rendered'] !!}
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side: CTA Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Promo Kelas Premium -->
                <div class="bg-gradient-to-br from-[#1E3A5F] to-[#14263f] text-white border border-slate-800 rounded-2xl p-6 shadow-sm space-y-4">
                    <div class="bg-[#F5A623] w-10 h-10 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                    </div>
                    <h4 class="font-bold text-sm">Ingin Lolos Beasiswa?</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">Persiapkan IELTS, esai kontribusi, dan simulasi interview bersama awardee beasiswa di kelas bimbingan premium kami.</p>
                    <a href="{{ route('kelas.index') }}" class="block w-full text-center bg-[#F5A623] hover:bg-[#e0951b] text-white py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                        Lihat Program Kelas
                    </a>
                </div>

                <!-- Cari Beasiswa CTA -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                    <h4 class="font-bold text-sm text-slate-800">Cari Peluang Beasiswa</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Gunakan Filter pintar kami untuk menemukan beasiswa S1, S2, atau S3 dengan persyaratan IPK yang sesuai bagi Anda.</p>
                    <a href="{{ route('scholarships.index') }}" class="block w-full text-center bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
                        Mulai Cari Beasiswa
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
