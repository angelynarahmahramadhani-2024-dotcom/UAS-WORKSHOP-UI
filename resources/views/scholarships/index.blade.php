<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cari Beasiswa — FindShip</title>
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

    <!-- Page Title / Search Header -->
    <section class="bg-[#1E3A5F] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Eksplorasi Informasi Beasiswa</h1>
            <p class="text-slate-300 max-w-xl mx-auto text-sm sm:text-base">Gunakan fitur pencarian dan filter untuk menyaring beasiswa sesuai dengan jurusan, IPK, dan target studimu.</p>
        </div>
    </section>

    <!-- Main Layout Grid -->
    <main x-data="{ showMobileFilter: false }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Left Side: FilterSidebar -->
            <aside class="lg:col-span-1 lg:block" :class="{'hidden': !showMobileFilter, 'block': showMobileFilter}">
                <form action="{{ route('scholarships.index') }}" method="GET" class="bg-white border border-slate-200 rounded-2xl p-6 space-y-6 shadow-sm sticky top-24">
                    
                    <!-- Search Input -->
                    <div class="space-y-2">
                        <label for="q" class="text-xs font-bold text-slate-700 uppercase tracking-wider">Pencarian Kata Kunci</label>
                        <div class="relative">
                            <input type="text" name="q" id="q" value="{{ request('q') }}" placeholder="Cari judul / instansi..." class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 text-sm focus:border-[#1E3A5F] focus:ring-[#1E3A5F] placeholder-slate-400">
                        </div>
                    </div>

                    <!-- Kategori (Dalam / Luar Negeri) -->
                    <div class="space-y-2.5">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider block">Kategori Lokasi</label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
                                <input type="radio" name="kategori" value="" {{ !request('kategori') ? 'checked' : '' }} class="text-[#1E3A5F] focus:ring-[#1E3A5F] border-slate-300">
                                <span>Semua Lokasi</span>
                            </label>
                            <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
                                <input type="radio" name="kategori" value="dalam negeri" {{ request('kategori') == 'dalam negeri' ? 'checked' : '' }} class="text-[#1E3A5F] focus:ring-[#1E3A5F] border-slate-300">
                                <span>Dalam Negeri</span>
                            </label>
                            <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
                                <input type="radio" name="kategori" value="luar negeri" {{ request('kategori') == 'luar negeri' ? 'checked' : '' }} class="text-[#1E3A5F] focus:ring-[#1E3A5F] border-slate-300">
                                <span>Luar Negeri</span>
                            </label>
                        </div>
                    </div>

                    <!-- Jenjang Pendidikan -->
                    <div class="space-y-2.5">
                        <label for="jenjang" class="text-xs font-bold text-slate-700 uppercase tracking-wider block">Jenjang Pendidikan</label>
                        <select name="jenjang" id="jenjang" class="w-full bg-slate-50 border-slate-200 rounded-xl px-3 py-2.5 text-sm focus:border-[#1E3A5F] focus:ring-[#1E3A5F]">
                            <option value="">Semua Jenjang</option>
                            <option value="S1" {{ request('jenjang') == 'S1' ? 'selected' : '' }}>S1 (Sarjana)</option>
                            <option value="S2" {{ request('jenjang') == 'S2' ? 'selected' : '' }}>S2 (Magister)</option>
                            <option value="S3" {{ request('jenjang') == 'S3' ? 'selected' : '' }}>S3 (Doktor)</option>
                            <option value="D3" {{ request('jenjang') == 'D3' ? 'selected' : '' }}>D3 (Diploma)</option>
                        </select>
                    </div>

                    <!-- Minimum IPK Input -->
                    <div class="space-y-2.5">
                        <label for="min_ipk" class="text-xs font-bold text-slate-700 uppercase tracking-wider block">IPK Saya saat ini</label>
                        <input type="number" step="0.01" min="0.00" max="4.00" name="min_ipk" id="min_ipk" value="{{ request('min_ipk') }}" placeholder="Contoh: 3.25" class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:border-[#1E3A5F] focus:ring-[#1E3A5F] placeholder-slate-400">
                        <p class="text-[10px] text-slate-400 leading-normal">Menyaring beasiswa yang persyaratan IPK-nya di bawah atau sama dengan IPK Anda.</p>
                    </div>

                    <!-- Jurusan Input -->
                    <div class="space-y-2.5">
                        <label for="jurusan" class="text-xs font-bold text-slate-700 uppercase tracking-wider block">Jurusan / Fakultas</label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ request('jurusan') }}" placeholder="Contoh: Teknik" class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:border-[#1E3A5F] focus:ring-[#1E3A5F] placeholder-slate-400">
                    </div>

                    <!-- Action buttons -->
                    <div class="pt-4 flex flex-col gap-2">
                        <button type="submit" class="w-full bg-[#1E3A5F] hover:bg-[#F5A623] text-white py-3 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-colors shadow-sm">
                            Terapkan Filter
                        </button>
                        <a href="{{ route('scholarships.index') }}" class="w-full text-center bg-slate-100 hover:bg-slate-200 text-slate-600 py-3 rounded-xl text-xs font-extrabold uppercase tracking-wider transition-colors">
                            Reset Filter
                        </a>
                    </div>
                </form>
            </aside>

            <!-- Right Side: Scholarship Cards Grid -->
            <section class="lg:col-span-3 space-y-8">
                <div class="flex items-center justify-between gap-4">
                    <p class="text-sm text-slate-500 font-semibold">
                        Menampilkan <strong class="text-slate-800">{{ $scholarships->firstItem() ?? 0 }} - {{ $scholarships->lastItem() ?? 0 }}</strong> dari <strong class="text-slate-800">{{ $scholarships->total() }}</strong> beasiswa aktif.
                    </p>
                    <!-- Mobile Filter Toggle Button -->
                    <button @click="showMobileFilter = !showMobileFilter" class="lg:hidden bg-[#1E3A5F] hover:bg-[#F5A623] text-white px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 shadow-md shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        <span x-text="showMobileFilter ? 'Tutup Filter' : 'Buka Filter'">Buka Filter</span>
                    </button>
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    @forelse($scholarships as $scholarship)
                        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between">
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

                                <!-- Excerpt -->
                                <p class="text-sm text-slate-500 line-clamp-3 mb-6">
                                    {{ $scholarship->deskripsi }}
                                </p>
                            </div>

                            <!-- Bottom Details -->
                            <div class="border-t border-slate-100 pt-4 space-y-4">
                                <div class="flex items-center justify-between text-xs font-semibold">
                                    <span class="text-slate-400">Jurusan Target:</span>
                                    <span class="text-[#1E3A5F] font-bold">{{ $scholarship->jurusan }}</span>
                                </div>
                                <div class="flex items-center justify-between text-xs font-semibold">
                                    <span class="text-slate-400">Min. IPK:</span>
                                    <span class="text-[#1E3A5F]">{{ $scholarship->min_ipk ? number_format($scholarship->min_ipk, 2) : 'Tanpa Minimum' }}</span>
                                </div>
                                <div class="flex items-center justify-between text-xs font-semibold">
                                    <span class="text-slate-400">Tenggat Pendaftaran:</span>
                                    <span class="text-rose-600 font-bold flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $scholarship->deadline->format('d M Y') }}
                                    </span>
                                </div>
                                <a href="{{ route('scholarships.show', $scholarship->id) }}" class="block w-full text-center bg-[#1E3A5F] hover:bg-[#F5A623] text-white py-2.5 rounded-xl text-sm font-bold transition-all">
                                    Detail Selengkapnya
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20 bg-white border border-slate-200 rounded-2xl shadow-sm space-y-4">
                            <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mx-auto">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800">Beasiswa Tidak Ditemukan</h3>
                            <p class="text-sm text-slate-500 max-w-sm mx-auto leading-relaxed">Coba ganti filter atau cari kata kunci yang lain untuk menemukan beasiswa yang sesuai.</p>
                            <a href="{{ route('scholarships.index') }}" class="inline-block bg-[#1E3A5F] hover:bg-[#F5A623] text-white px-6 py-2.5 rounded-xl text-xs font-bold transition-all">Lihat Semua Beasiswa</a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination Links -->
                <div class="pt-6 border-t border-slate-100">
                    {{ $scholarships->links() }}
                </div>
            </section>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
