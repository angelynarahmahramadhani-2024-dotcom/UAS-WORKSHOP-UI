<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin Panel' }} — FindShip</title>
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
<body x-data="{ showAdminSidebar: false }" class="bg-slate-50 text-slate-900 antialiased flex min-h-screen relative overflow-x-hidden">

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div x-show="showAdminSidebar" 
         @click="showAdminSidebar = false" 
         class="fixed inset-0 bg-[#0f1d30]/60 backdrop-blur-xs z-40 lg:hidden"
         style="display: none;"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>

    <!-- Sidebar -->
    <aside :class="showAdminSidebar ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
           class="fixed inset-y-0 left-0 w-64 bg-[#1E3A5F] text-slate-100 flex flex-col justify-between shrink-0 shadow-lg border-r border-slate-800 z-50 lg:static lg:translate-x-0 transition-transform duration-300">
        <div>
            <!-- Logo Section -->
            <div class="h-20 flex items-center px-5 border-b border-slate-800 justify-between">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 min-w-0">
                    <div class="bg-white p-1 rounded-lg shrink-0 flex items-center justify-center shadow-sm">
                        <img src="{{ asset('images/logo.png') }}" alt="FindShip Logo" class="h-10 w-auto object-contain">
                    </div>
                    <span class="text-lg font-extrabold tracking-tight bg-gradient-to-r from-white to-[#F5A623] bg-clip-text text-transparent truncate">FindShip</span>
                </a>
                <span class="text-[9px] font-bold bg-[#F5A623]/20 text-[#F5A623] px-2 py-0.5 rounded border border-[#F5A623]/30 uppercase tracking-wider shrink-0 ml-2">Admin</span>
            </div>

            <!-- Navigation Menu -->
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white border-l-4 border-[#F5A623]' : 'text-slate-300 hover:bg-white/5 hover:text-white border-l-4 border-transparent' }} transition-all">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-[#F5A623]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                    Dashboard Utama
                </a>
                <a href="{{ route('admin.beasiswa.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('admin.beasiswa.*') ? 'bg-white/10 text-white border-l-4 border-[#F5A623]' : 'text-slate-300 hover:bg-white/5 hover:text-white border-l-4 border-transparent' }} transition-all">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.beasiswa.*') ? 'text-[#F5A623]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-4-9 4 9 5zm0 0l9-5-9-4-9 4 9 5zm0 0v6m0-6L3 9m9 5l9-5"></path></svg>
                    Manajemen Beasiswa
                </a>
                <a href="{{ route('admin.kelas.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('admin.kelas.*') ? 'bg-white/10 text-white border-l-4 border-[#F5A623]' : 'text-slate-300 hover:bg-white/5 hover:text-white border-l-4 border-transparent' }} transition-all">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.kelas.*') ? 'text-[#F5A623]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Manajemen Kelas
                </a>
                <a href="{{ route('admin.artikel.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('admin.artikel.*') ? 'bg-white/10 text-white border-l-4 border-[#F5A623]' : 'text-slate-300 hover:bg-white/5 hover:text-white border-l-4 border-transparent' }} transition-all">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.artikel.*') ? 'text-[#F5A623]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 012 2v6a2 2 0 01-2 2h-2m-4-6h.01M5 8h2m-2 4h2m-2 4h2m4-8h2m-2 4h2m-2 4h2"></path></svg>
                    Manajemen Artikel
                </a>
                <a href="{{ route('admin.verifikasi.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('admin.verifikasi.*') ? 'bg-white/10 text-white border-l-4 border-[#F5A623]' : 'text-slate-300 hover:bg-white/5 hover:text-white border-l-4 border-transparent' }} transition-all">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.verifikasi.*') ? 'text-[#F5A623]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Verifikasi Pembayaran
                </a>
                <a href="{{ route('admin.pengguna.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold {{ request()->routeIs('admin.pengguna.*') ? 'bg-white/10 text-white border-l-4 border-[#F5A623]' : 'text-slate-300 hover:bg-white/5 hover:text-white border-l-4 border-transparent' }} transition-all">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.pengguna.*') ? 'text-[#F5A623]' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Manajemen Pengguna
                </a>
            </nav>
        </div>

        <!-- Bottom Part: Profile & Logout -->
        <div class="p-4 border-t border-slate-800 space-y-3">
            <div class="flex items-center gap-3 px-2">
                <div class="w-9 h-9 rounded-full bg-[#F5A623] flex items-center justify-center font-bold text-white text-sm shadow-md">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="truncate">
                    <p class="text-xs font-bold text-white leading-none truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p class="text-[10px] text-slate-400 font-semibold mt-1 truncate">{{ Auth::user()->email ?? 'admin@findship.com' }}</p>
                </div>
            </div>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2.5 rounded-xl text-xs font-bold text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition-colors">
                    <svg class="w-5 h-5 shrink-0" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Log Out Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Panel -->
    <main class="flex-1 flex flex-col overflow-y-auto">
        <!-- Top Navbar -->
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 sm:px-8 shrink-0">
            <div class="flex items-center gap-4">
                <!-- Mobile Sidebar Toggle Button -->
                <button @click="showAdminSidebar = !showAdminSidebar" class="lg:hidden p-2 -ml-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h2 class="text-base sm:text-lg font-bold text-slate-800">{{ $header ?? 'Dashboard' }}</h2>
            </div>
            
            <div class="flex items-center gap-4 sm:gap-6">
                <!-- Date -->
                <div class="hidden sm:block text-slate-500 text-xs font-medium">
                    Hari ini: {{ date('d M Y') }}
                </div>

                <!-- Bell Notification Dropdown -->
                <div x-data="{ 
                    notifOpen: false,
                    unreadCount: 0,
                    notifications: [],
                    init() {
                        this.fetchNotifs();
                        // Poll every 10 seconds
                        setInterval(() => this.fetchNotifs(), 10000);
                    },
                    async fetchNotifs() {
                        try {
                            const res = await fetch('{{ route('notifikasi.unread-json') }}');
                            const data = await res.json();
                            this.unreadCount = data.unread_count;
                            this.notifications = data.notifications;
                        } catch (e) {
                            console.error('Gagal memuat notifikasi:', e);
                        }
                    }
                }" 
                @update-notifications.window="fetchNotifs()"
                class="relative">
                    <button @click="notifOpen = !notifOpen" @click.away="notifOpen = false" class="relative p-2 rounded-xl text-slate-500 hover:text-[#1E3A5F] hover:bg-slate-50 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        <template x-if="unreadCount > 0">
                            <span class="absolute top-1 right-1 bg-rose-500 text-white text-[8px] font-bold w-4 h-4 rounded-full flex items-center justify-center border border-white" x-text="unreadCount > 99 ? '99+' : unreadCount"></span>
                        </template>
                    </button>
                    
                    <!-- Notifications Dropdown Menu -->
                    <div x-show="notifOpen" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-80 border rounded-2xl shadow-xl py-2 z-50 overflow-hidden bg-white border-slate-100"
                         style="display: none;">
                        
                        <div class="px-4 py-2.5 border-b border-slate-100 bg-slate-50/50 text-slate-700 flex items-center justify-between">
                            <span class="text-xs font-extrabold">Notifikasi Admin</span>
                            <template x-if="unreadCount > 0">
                                <form action="{{ route('notifikasi.baca-semua') }}" method="POST" class="m-0" @submit.prevent="fetch('{{ route('notifikasi.baca-semua') }}', {method:'POST', headers:{'X-CSRF-TOKEN':'{{ csrf_token() }}'}}).then(() => fetchNotifs())">
                                    @csrf
                                    <button type="submit" class="text-[10px] font-bold text-[#F5A623] hover:underline">
                                        Tandai semua dibaca
                                    </button>
                                </form>
                            </template>
                        </div>
                        
                        <div class="max-h-64 overflow-y-auto divide-y divide-slate-100">
                            <!-- Empty State -->
                            <template x-if="notifications.length === 0">
                                <div class="px-4 py-8 text-center text-slate-400">
                                    <svg class="w-8 h-8 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                    <p class="text-xs font-semibold">Belum ada notifikasi</p>
                                </div>
                            </template>
                            
                            <!-- List -->
                            <template x-for="notif in notifications" :key="notif.id">
                                <a :href="notif.url" :class="notif.is_read ? 'bg-white hover:bg-slate-50/80' : 'bg-[#EBF4FF] hover:bg-blue-50/70'" class="flex items-start gap-3 px-4 py-3 transition-colors relative">
                                    <div :class="notif.tipe === 'deadline' ? 'bg-amber-100 text-amber-700' : (notif.tipe === 'transaksi' ? 'bg-emerald-100 text-emerald-700' : (notif.tipe === 'beasiswa_baru' ? 'bg-sky-100 text-sky-700' : (notif.tipe === 'akun' ? 'bg-rose-100 text-rose-700' : 'bg-blue-100 text-blue-700')))" class="p-2 rounded-xl shrink-0 mt-0.5">
                                        <template x-if="notif.tipe === 'deadline'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </template>
                                        <template x-if="notif.tipe === 'transaksi'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </template>
                                        <template x-if="notif.tipe === 'beasiswa_baru'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.906a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                                        </template>
                                        <template x-if="notif.tipe === 'akun' || notif.tipe === 'sistem'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </template>
                                        <template x-if="notif.tipe !== 'deadline' && notif.tipe !== 'transaksi' && notif.tipe !== 'beasiswa_baru' && notif.tipe !== 'akun' && notif.tipe !== 'sistem'">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </template>
                                    </div>
                                    
                                    <div class="min-w-0 flex-1 relative pr-4">
                                        <div class="flex items-center gap-1.5">
                                            <p class="text-xs font-bold leading-normal truncate text-slate-800" x-text="notif.judul"></p>
                                            <template x-if="!notif.is_read">
                                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 shrink-0"></span>
                                            </template>
                                        </div>
                                        <p class="text-[10px] leading-relaxed mt-0.5 line-clamp-2 text-slate-500" x-text="notif.pesan"></p>
                                        <span class="text-[9px] text-slate-400 font-semibold mt-1 block" x-text="notif.time_ago"></span>
                                    </div>
                                </a>
                            </template>
                        </div>
                        
                        <div class="px-4 py-2 border-t border-slate-100 text-center bg-slate-50/20">
                            <a href="{{ route('notifikasi.index') }}" class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors">Lihat Semua Notifikasi</a>
                        </div>
                    </div>
                </div>

                <!-- Admin Profile Dropdown -->
                <div x-data="{ profileOpen: false }" class="relative">
                    <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-2 px-2.5 py-1.5 rounded-xl hover:bg-slate-50 transition-all text-slate-700">
                        <div class="w-8 h-8 rounded-full bg-[#F5A623] flex items-center justify-center font-extrabold text-white text-xs shadow-sm shrink-0">
                            {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="hidden md:block text-left shrink-0 max-w-[120px]">
                            <p class="text-xs font-bold text-[#1E3A5F] truncate leading-none">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-[9px] text-slate-400 font-semibold mt-0.5 truncate leading-none">Administrator</p>
                        </div>
                        <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="profileOpen && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <!-- Profile Menu Dropdown -->
                    <div x-show="profileOpen" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 border rounded-2xl shadow-xl py-2 z-50 overflow-hidden bg-white border-slate-100"
                         style="display: none;">
                        
                        <div class="px-4 py-2 border-b border-slate-100 bg-slate-50/30">
                            <p class="text-xs font-bold text-slate-800 truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                            <p class="text-[10px] text-slate-400 font-medium truncate mt-0.5">{{ Auth::user()->email ?? 'admin@findship.com' }}</p>
                        </div>
                        
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F] transition-colors">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Pengaturan Akun
                        </a>
                        
                        <div class="border-t border-slate-100 my-1"></div>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50 hover:text-rose-700 transition-colors">
                                <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log Out Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="p-4 sm:p-8 space-y-6 sm:space-y-8 flex-1">
            <!-- Flash Message Alerts -->
            @if (session('status'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-xs font-bold flex items-center gap-2 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl text-xs font-bold flex items-center gap-2 shadow-sm">
                    <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

</body>
</html>
