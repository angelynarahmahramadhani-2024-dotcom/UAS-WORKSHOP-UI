<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tips & Trik Beasiswa — FindShip</title>
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

    <!-- Page Title Header -->
    <section class="bg-[#1E3A5F] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="text-xs font-bold text-[#F5A623] uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full">Tips & Artikel</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Blog Panduan Sukses Beasiswa</h1>
            <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base">Temukan kumpulan tips menulis esai, panduan seleksi wawancara, dan berita terbaru seputar pendaftaran beasiswa.</p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 -mb-8">
        <form action="{{ route('artikel.index') }}" method="GET" class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari artikel tips beasiswa..." class="w-full pl-12 pr-4 py-3 rounded-2xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#1E3A5F] focus:border-[#1E3A5F] transition-all bg-white text-sm shadow-sm" />
                <div class="absolute left-4 top-3.5 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                @if(request('search'))
                    <a href="{{ route('artikel.index') }}" class="absolute right-4 top-3 text-xs font-bold text-slate-400 hover:text-slate-600 mt-0.5">Clear</a>
                @endif
            </div>
        </form>
    </section>

    <!-- Blog Articles Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <article class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Thumbnail Cover -->
                        <div class="relative h-48 bg-slate-100">
                            @if($post->thumbnail)
                                <img src="{{ str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset($post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='https://picsum.photos/id/24/600/400';">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-[#1E3A5F]/5 text-[#1E3A5F]/30">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                        </div>

                        <!-- Content Info -->
                        <div class="p-6">
                            <p class="text-xs text-slate-400 font-semibold mb-2">
                                {{ $post->created_at ? $post->created_at->format('d M Y') : '' }}
                            </p>
                            <h3 class="text-lg font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors leading-snug line-clamp-2 mb-3">
                                <a href="{{ route('artikel.show', $post->slug) }}">{!! $post->title !!}</a>
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-500 line-clamp-3 leading-relaxed">
                                {!! strip_tags($post->excerpt ?? '') !!}
                            </p>
                        </div>
                    </div>

                    <!-- Footer Author & Link -->
                    <div class="p-6 border-t border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <span class="text-xs text-slate-400 font-medium flex items-center gap-1.5">
                            <span class="inline-flex items-center gap-1 bg-[#1E3A5F]/10 text-[#1E3A5F] px-1.5 py-0.5 rounded font-bold text-[10px] uppercase tracking-wide">
                                FindShip
                            </span>
                            {{ $post->author ?? 'Penulis FindShip' }}
                        </span>
                        <a href="{{ route('artikel.show', $post->slug) }}" class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors flex items-center gap-1 group">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform shrink-0" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </article>
            @empty
                <p class="col-span-full text-center text-slate-400 py-12">Belum ada artikel tips beasiswa saat ini.</p>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </main>

    <x-guest-footer />
</body>
</html>
