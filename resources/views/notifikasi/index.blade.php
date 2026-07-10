<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifikasi Saya — FindShip</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Main Container -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="space-y-8">
            
            <!-- Title & Hapus Semua -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E3A5F] tracking-tight">Notifikasi Saya</h1>
                    <p class="text-sm text-slate-500 mt-1">Dapatkan informasi deadline beasiswa, aktivitas transaksi, dan info akun terupdate.</p>
                </div>
                @if($notifikasi->count() > 0)
                    <form action="{{ route('notifikasi.hapus-semua') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua notifikasi?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-rose-50 hover:bg-rose-100 text-rose-700 px-5 py-3 rounded-xl text-xs font-bold transition-all shadow-xs border border-rose-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Hapus Semua Notifikasi
                        </button>
                    </form>
                @endif
            </div>

            <!-- Filter Tabs -->
            <div class="flex border-b border-slate-200 overflow-x-auto scrollbar-none gap-2">
                <a href="{{ route('notifikasi.index', ['filter' => 'semua']) }}" class="px-5 py-3 border-b-2 text-xs sm:text-sm font-bold whitespace-nowrap transition-colors {{ $filter === 'semua' ? 'border-[#1E3A5F] text-[#1E3A5F]' : 'border-transparent text-slate-500 hover:text-slate-700' }}">
                    Semua
                </a>
                <a href="{{ route('notifikasi.index', ['filter' => 'belum_dibaca']) }}" class="px-5 py-3 border-b-2 text-xs sm:text-sm font-bold whitespace-nowrap transition-colors {{ $filter === 'belum_dibaca' ? 'border-[#1E3A5F] text-[#1E3A5F]' : 'border-transparent text-slate-500 hover:text-slate-700' }}">
                    Belum Dibaca
                </a>
                <a href="{{ route('notifikasi.index', ['filter' => 'deadline']) }}" class="px-5 py-3 border-b-2 text-xs sm:text-sm font-bold whitespace-nowrap transition-colors {{ $filter === 'deadline' ? 'border-[#1E3A5F] text-[#1E3A5F]' : 'border-transparent text-slate-500 hover:text-slate-700' }}">
                    Deadline
                </a>
                <a href="{{ route('notifikasi.index', ['filter' => 'transaksi']) }}" class="px-5 py-3 border-b-2 text-xs sm:text-sm font-bold whitespace-nowrap transition-colors {{ $filter === 'transaksi' ? 'border-[#1E3A5F] text-[#1E3A5F]' : 'border-transparent text-slate-500 hover:text-slate-700' }}">
                    Transaksi
                </a>
            </div>

            <!-- Notifications List -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm divide-y divide-slate-100">
                @forelse($notifikasi as $notif)
                    <a href="{{ route('notifikasi.go', $notif->id) }}" class="flex items-start gap-4 p-5 sm:p-6 transition-all duration-300 {{ $notif->is_read ? 'bg-white hover:bg-slate-50/40' : 'bg-[#EBF4FF]/60 hover:bg-blue-50/70' }}">
                        
                        <!-- Notification Icon -->
                        @if($notif->tipe === 'deadline')
                            <div class="bg-amber-100 text-amber-700 p-3 rounded-2xl shrink-0 mt-0.5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        @elseif($notif->tipe === 'transaksi')
                            <div class="bg-emerald-100 text-emerald-700 p-3 rounded-2xl shrink-0 mt-0.5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        @elseif($notif->tipe === 'beasiswa_baru')
                            <div class="bg-sky-100 text-sky-700 p-3 rounded-2xl shrink-0 mt-0.5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.906a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                            </div>
                        @elseif($notif->tipe === 'akun')
                            <div class="bg-rose-100 text-rose-700 p-3 rounded-2xl shrink-0 mt-0.5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                        @else
                            <div class="bg-blue-100 text-blue-700 p-3 rounded-2xl shrink-0 mt-0.5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        @endif

                        <!-- Notification Content -->
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                                <h4 class="text-sm sm:text-base font-bold text-slate-800 leading-snug">{{ $notif->judul }}</h4>
                                <span class="text-[10px] text-slate-400 font-semibold shrink-0">{{ $notif->created_at->format('d M Y, H:i') }} WIB</span>
                            </div>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mt-1.5">{{ $notif->pesan }}</p>
                            <div class="mt-3.5 flex items-center justify-between">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ $notif->created_at->diffForHumans() }}</span>
                                @if($notif->url)
                                    <span class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] inline-flex items-center gap-1 transition-colors">
                                        Buka Link Tujuan
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </a>
                @empty
                    <div class="p-16 text-center space-y-3 bg-white">
                        <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mx-auto border border-slate-100 shadow-inner">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                        <h3 class="text-base font-bold text-slate-600">Tidak ada notifikasi</h3>
                        <p class="text-xs text-slate-400 max-w-xs mx-auto">Tidak ada notifikasi yang sesuai dengan kriteria penyaringan Anda.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="pt-4">
                {{ $notifikasi->links() }}
            </div>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />

</body>
</html>
