@props(['variant' => 'light'])

<nav x-data="{ open: false, profileOpen: false }" class="sticky top-0 z-50 border-b backdrop-blur-md shadow-xs transition-all duration-300 {{ $variant === 'dark' ? 'bg-[#0B1528]/95 border-[#1E293B] text-white' : 'bg-white/95 border-slate-100 text-slate-900' }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Left Logo & Navigation Links -->
            <div class="flex items-center gap-10">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <!-- If dark, wrap logo in a neat small background or just use it, white bg footer had it inside box. Navbar can just display the logo as is since it contains text. -->
                        <img src="{{ asset('images/logo.png') }}" alt="FindShip Logo" class="h-20 w-auto object-contain {{ $variant === 'dark' ? 'brightness-110' : '' }}">
                    </a>
                </div>

                <!-- Desktop Menu Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-bold relative py-2 transition-colors {{ request()->routeIs('home') ? 'text-[#F5A623]' : ($variant === 'dark' ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-[#1E3A5F]') }}">
                        Beranda
                        @if(request()->routeIs('home'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#F5A623] rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('scholarships.index') }}" class="text-sm font-bold relative py-2 transition-colors {{ request()->routeIs('scholarships.*') ? 'text-[#F5A623]' : ($variant === 'dark' ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-[#1E3A5F]') }}">
                        Cari Beasiswa
                        @if(request()->routeIs('scholarships.*'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#F5A623] rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('kelas.index') }}" class="text-sm font-bold relative py-2 transition-colors {{ request()->routeIs('kelas.*') ? 'text-[#F5A623]' : ($variant === 'dark' ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-[#1E3A5F]') }}">
                        Kelas Premium
                        @if(request()->routeIs('kelas.*'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#F5A623] rounded-full"></span>
                        @endif
                    </a>
                    <a href="{{ route('artikel.index') }}" class="text-sm font-bold relative py-2 transition-colors {{ request()->routeIs('artikel.*') ? 'text-[#F5A623]' : ($variant === 'dark' ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-[#1E3A5F]') }}">
                        Artikel Tips
                        @if(request()->routeIs('artikel.*'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#F5A623] rounded-full"></span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Right Actions: Auth buttons / Profile -->
            <div class="hidden md:flex items-center gap-4">
                @auth
                    <!-- Cart Icon Button -->
                    <a href="{{ route('kelas.cart') }}" class="relative p-2.5 rounded-xl transition-all {{ $variant === 'dark' ? 'text-slate-300 hover:text-white hover:bg-slate-800' : 'text-slate-500 hover:text-[#1E3A5F] hover:bg-slate-50' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <template x-if="$store.cart && $store.cart.items.length > 0">
                            <span class="absolute top-1 right-1 bg-[#F5A623] text-white text-[8px] font-extrabold w-4 h-4 rounded-full flex items-center justify-center border border-white" x-text="$store.cart.items.length"></span>
                        </template>
                    </a>

                    <!-- Bell Notification Dropdown -->
                    <div x-data="{ 
                        notifOpen: false,
                        unreadCount: {{ Auth::user()->unreadNotifikasi()->count() }},
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
                        <button @click="notifOpen = !notifOpen" @click.away="notifOpen = false" class="relative p-2.5 rounded-xl transition-all {{ $variant === 'dark' ? 'text-slate-300 hover:text-white hover:bg-slate-800' : 'text-slate-500 hover:text-[#1E3A5F] hover:bg-slate-50' }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
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
                             class="absolute right-0 mt-2 w-80 border rounded-2xl shadow-xl py-2 z-50 overflow-hidden {{ $variant === 'dark' ? 'bg-[#0F1E36] border-[#1E293B]' : 'bg-white border-slate-100' }}"
                             style="display: none;">
                            
                            <div class="px-4 py-2.5 border-b flex items-center justify-between {{ $variant === 'dark' ? 'border-[#1E293B] bg-[#1E293B]/30 text-white' : 'border-slate-100 bg-slate-50/50 text-slate-700' }}">
                                <span class="text-xs font-extrabold">Notifikasi</span>
                                <template x-if="unreadCount > 0">
                                    <form action="{{ route('notifikasi.baca-semua') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="text-[10px] font-bold text-[#F5A623] hover:underline">
                                            Tandai semua dibaca
                                        </button>
                                    </form>
                                </template>
                            </div>

                            <div class="divide-y max-h-80 overflow-y-auto {{ $variant === 'dark' ? 'divide-[#1E293B]' : 'divide-slate-50' }}">
                                <template x-for="notif in notifications" :key="notif.id">
                                    <a :href="notif.url" :class="notif.is_read ? ({{ $variant === 'dark' ? 'true' : 'false' }} ? 'bg-[#0F1E36] hover:bg-slate-800' : 'bg-white hover:bg-slate-50/80') : ({{ $variant === 'dark' ? 'true' : 'false' }} ? 'bg-[#1E3A5F]/20 hover:bg-[#1E3A5F]/30' : 'bg-[#EBF4FF] hover:bg-blue-50/70')" class="flex items-start gap-3 px-4 py-3 transition-colors">
                                        <div :class="notif.tipe === 'deadline' ? 'bg-amber-100 text-amber-700' : (notif.tipe === 'transaksi' ? 'bg-emerald-100 text-emerald-700' : (notif.tipe === 'beasiswa_baru' ? 'bg-sky-100 text-sky-700' : (notif.tipe === 'akun' ? 'bg-rose-100 text-rose-700' : 'bg-blue-100 text-blue-700')))" class="p-2 rounded-xl shrink-0 mt-0.5">
                                            <template x-if="notif.tipe === 'deadline'">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </template>
                                            <template x-if="notif.tipe === 'transaksi'">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </template>
                                            <template x-if="notif.tipe === 'beasiswa_baru'">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.907c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.906a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                                            </template>
                                            <template x-if="notif.tipe === 'akun'">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                            </template>
                                            <template x-if="notif.tipe !== 'deadline' && notif.tipe !== 'transaksi' && notif.tipe !== 'beasiswa_baru' && notif.tipe !== 'akun'">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            </template>
                                        </div>
                                        <div class="min-w-0 flex-1 relative pr-4">
                                            <div class="flex items-center gap-1.5">
                                                <p class="text-xs font-bold leading-normal truncate {{ $variant === 'dark' ? 'text-slate-100' : 'text-slate-800' }}" x-text="notif.judul"></p>
                                                <template x-if="!notif.is_read">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 shrink-0"></span>
                                                </template>
                                            </div>
                                            <p class="text-[10px] leading-relaxed mt-0.5 line-clamp-2 {{ $variant === 'dark' ? 'text-slate-400' : 'text-slate-500' }}" x-text="notif.pesan"></p>
                                            <span class="text-[9px] text-slate-400 font-semibold mt-1 block" x-text="notif.time_ago"></span>
                                        </div>
                                    </a>
                                </template>

                                <div x-show="notifications.length === 0" class="p-8 text-center space-y-2 {{ $variant === 'dark' ? 'bg-[#0F1E36]' : 'bg-white' }}">
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center mx-auto border {{ $variant === 'dark' ? 'bg-[#1E293B] text-slate-500 border-slate-700' : 'bg-slate-50 text-slate-400 border-slate-100' }}">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                    </div>
                                    <p class="text-xs font-bold text-slate-400">Belum ada notifikasi</p>
                                </div>
                            </div>

                            <a href="{{ route('notifikasi.index') }}" class="block text-center py-2.5 transition-colors border-t text-[10px] font-bold {{ $variant === 'dark' ? 'bg-[#1E293B]/40 hover:bg-[#1E293B] text-slate-300 border-[#1E293B]' : 'bg-slate-50/80 hover:bg-slate-100 text-slate-600 border-slate-100 hover:text-[#1E3A5F]' }}">
                                Lihat semua notifikasi
                            </a>
                        </div>
                    </div>

                    <!-- Authenticated Dropdown -->
                    <div class="relative">
                        <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex items-center gap-3 border rounded-xl px-4 py-2 transition-all {{ $variant === 'dark' ? 'bg-slate-800 hover:bg-slate-700 border-slate-700 text-white' : 'bg-slate-50 hover:bg-slate-100 border-slate-200/60 text-slate-700' }}">
                            <div class="w-8 h-8 rounded-full bg-[#1E3A5F] flex items-center justify-center font-bold text-white text-xs">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-bold max-w-[120px] truncate {{ $variant === 'dark' ? 'text-slate-200' : 'text-slate-700' }}">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="profileOpen" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-56 border rounded-2xl shadow-xl py-2 z-50 {{ $variant === 'dark' ? 'bg-[#0F1E36] border-[#1E293B]' : 'bg-white border-slate-100' }}"
                             style="display: none;">
                            
                            <div class="px-4 py-2.5 border-b {{ $variant === 'dark' ? 'border-[#1E293B]' : 'border-slate-100' }}">
                                <p class="text-[10px] text-slate-400 font-extrabold uppercase tracking-wider">Role Pengguna</p>
                                <p class="text-xs font-black mt-0.5 capitalize {{ $variant === 'dark' ? 'text-[#F5A623]' : 'text-[#1E3A5F]' }}">{{ Auth::user()->role }}</p>
                            </div>

                            <div class="py-1">
                                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-extrabold transition-all {{ $variant === 'dark' ? 'text-slate-200 hover:bg-slate-800' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]' }}">
                                    <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    Dashboard Saya
                                </a>
                                <a href="{{ route('transaksi.riwayat') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-extrabold transition-all {{ $variant === 'dark' ? 'text-slate-200 hover:bg-slate-800' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]' }}">
                                    <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    Riwayat Transaksi
                                </a>
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-extrabold transition-all {{ $variant === 'dark' ? 'text-slate-200 hover:bg-slate-800' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]' }}">
                                    <svg class="w-5 h-5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Pengaturan Profil
                                </a>
                            </div>
                            
                            <hr class="my-1 {{ $variant === 'dark' ? 'border-[#1E293B]' : 'border-slate-100' }}">
                            
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-xs font-extrabold text-rose-500 hover:bg-rose-50 hover:text-rose-600 transition-all">
                                    <svg class="w-5 h-5 text-rose-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Keluar (Logout)
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Guest Actions -->
                    <a href="{{ route('login') }}" class="text-sm font-bold px-4 py-2.5 transition-colors {{ $variant === 'dark' ? 'text-slate-300 hover:text-white' : 'text-slate-600 hover:text-[#1E3A5F]' }}">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="bg-[#F5A623] hover:bg-[#e0951b] text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-md shadow-[#F5A623]/20 hover:shadow-lg hover:-translate-y-0.5 transition-all">
                        Daftar Akun
                    </a>
                @endauth
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex items-center gap-2 md:hidden">
                @auth
                    <!-- Cart Icon Button Mobile -->
                    <a href="{{ route('kelas.cart') }}" class="relative p-2 rounded-xl transition-colors {{ $variant === 'dark' ? 'text-slate-300 hover:text-white hover:bg-slate-800' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <template x-if="$store.cart && $store.cart.items.length > 0">
                            <span class="absolute top-1 right-1 bg-[#F5A623] text-white text-[8px] font-extrabold w-4 h-4 rounded-full flex items-center justify-center border border-white" x-text="$store.cart.items.length"></span>
                        </template>
                    </a>
                @endauth

                <button @click="open = !open" class="p-2 rounded-xl transition-colors {{ $variant === 'dark' ? 'text-slate-300 hover:text-white hover:bg-slate-800' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-100' }}">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="open ? 'hidden' : 'inline-flex'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="open ? 'inline-flex' : 'hidden'" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden border-t px-4 pt-2 pb-6 space-y-2 shadow-lg"
         :class="variant === 'dark' ? 'bg-[#0B1528] border-[#1E293B]' : 'bg-white border-slate-100'"
         style="display: none;">
        
        <a href="{{ route('home') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('home') ? ($variant === 'dark' ? 'bg-white/10 text-white' : 'bg-[#1E3A5F]/5 text-[#1E3A5F]') : ($variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]') }}">
            Beranda
        </a>
        <a href="{{ route('scholarships.index') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('scholarships.*') ? ($variant === 'dark' ? 'bg-white/10 text-white' : 'bg-[#1E3A5F]/5 text-[#1E3A5F]') : ($variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]') }}">
            Cari Beasiswa
        </a>
        <a href="{{ route('kelas.index') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('kelas.*') ? ($variant === 'dark' ? 'bg-white/10 text-white' : 'bg-[#1E3A5F]/5 text-[#1E3A5F]') : ($variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]') }}">
            Kelas Premium
        </a>
        <a href="{{ route('artikel.index') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all {{ request()->routeIs('artikel.*') ? ($variant === 'dark' ? 'bg-white/10 text-white' : 'bg-[#1E3A5F]/5 text-[#1E3A5F]') : ($variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]') }}">
            Artikel Tips
        </a>

        <hr class="my-4 {{ $variant === 'dark' ? 'border-[#1E293B]' : 'border-slate-100' }}">

        @auth
            <div class="px-3 py-2">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Masuk Sebagai:</p>
                <p class="text-sm font-extrabold mt-0.5 {{ $variant === 'dark' ? 'text-white' : 'text-[#1E3A5F]' }}">{{ Auth::user()->name }} ({{ Auth::user()->role }})</p>
            </div>
            
            <a href="{{ route('dashboard') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all {{ $variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]' }}">
                Dashboard
            </a>
            <a href="{{ route('notifikasi.index') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all flex items-center justify-between {{ $variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]' }}">
                <span>Notifikasi</span>
                @php
                    $mobileUnread = Auth::user()->unreadNotifikasi()->count();
                @endphp
                @if($mobileUnread > 0)
                    <span class="bg-rose-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                        {{ $mobileUnread > 99 ? '99+' : $mobileUnread }} Baru
                    </span>
                @endif
            </a>
            <a href="{{ route('profile.edit') }}" class="block px-3 py-3 rounded-xl text-sm font-bold transition-all {{ $variant === 'dark' ? 'text-slate-300 hover:bg-white/5 hover:text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-[#1E3A5F]' }}">
                Pengaturan Profil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="pt-2">
                @csrf
                <button type="submit" class="w-full text-left block px-3 py-3 rounded-xl text-sm font-bold text-rose-500 hover:bg-rose-50 transition-all">
                    Keluar (Logout)
                </button>
            </form>
        @else
            <div class="grid grid-cols-2 gap-3 pt-2">
                <a href="{{ route('login') }}" class="text-center block border py-3 rounded-xl text-sm font-bold transition-all {{ $variant === 'dark' ? 'border-slate-700 text-slate-300 hover:bg-white/5' : 'border-slate-200 hover:bg-slate-50 text-slate-700' }}">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="text-center block bg-[#F5A623] hover:bg-[#e0951b] text-white py-3 rounded-xl text-sm font-bold transition-all">
                    Daftar
                </a>
            </div>
        @endauth
    </div>
</nav>

<!-- Toast Container -->
<div x-data="{ toasts: [] }" 
     @show-toast.window="
        const id = Date.now();
        toasts.push({ id: id, message: $event.detail.message, type: $event.detail.type || 'success' });
        setTimeout(() => { toasts = toasts.filter(t => t.id !== id) }, 3000);
     "
     @toast.window="
        const id = Date.now();
        toasts.push({ id: id, message: $event.detail.message, type: $event.detail.type || 'success' });
        setTimeout(() => { toasts = toasts.filter(t => t.id !== id) }, 3000);
     "
     class="fixed bottom-5 right-5 z-[9999] space-y-3 pointer-events-none">
    
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="true" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="transform translate-y-2 opacity-0"
             x-transition:enter-end="transform translate-y-0 opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="transform translate-y-0 opacity-100"
             x-transition:leave-end="transform translate-y-2 opacity-0"
             :class="toast.type === 'success' ? 'bg-[#1E3A5F]' : (toast.type === 'info' ? 'bg-[#F5A623]' : 'bg-rose-600')"
             class="text-white px-5 py-3.5 rounded-xl shadow-xl flex items-center gap-2 text-xs font-bold pointer-events-auto border border-white/10">
            
            <template x-if="toast.type === 'success'">
                <svg class="w-4 h-4 shrink-0 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </template>
            <template x-if="toast.type === 'info'">
                <svg class="w-4 h-4 shrink-0 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </template>
            <span x-text="toast.message"></span>
        </div>
    </template>
</div>

<script>
    function initFindShipCartStore() {
        if (window.Alpine && window.Alpine.store('cart')) return;
        
        const registerStore = (AlpineInstance) => {
            AlpineInstance.store('cart', {
                items: JSON.parse(localStorage.getItem('findship_cart') || '[]'),
                init() {
                    AlpineInstance.effect(() => {
                        localStorage.setItem('findship_cart', JSON.stringify(this.items));
                    });
                },
                add(id, judul, harga, thumbnail) {
                    let itemObj = {};
                    if (typeof id === 'object' && id !== null) {
                        itemObj = id;
                    } else {
                        itemObj = {
                            id: Number(id),
                            judul: judul,
                            harga: harga,
                            thumbnail: thumbnail || ''
                        };
                    }
                    const exists = this.items.find(i => Number(i.id) === Number(itemObj.id));
                    if (exists) {
                        window.dispatchEvent(new CustomEvent('show-toast', {
                            detail: { message: 'Kelas ini sudah ada di keranjang', type: 'info' }
                        }));
                        return;
                    }
                    this.items.push(itemObj);
                    
                    // Post to backend to trigger notification
                    fetch('/api/notifikasi/tambah-keranjang', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify({ judul: itemObj.judul })
                    }).then(res => {
                        if (res.ok) {
                            window.dispatchEvent(new CustomEvent('update-notifications'));
                        }
                    }).catch(err => console.error('Gagal membuat notifikasi keranjang:', err));

                    window.dispatchEvent(new CustomEvent('show-banner', {
                        detail: { message: 'Kelas berhasil ditambahkan ke keranjang.' }
                    }));
                },
                remove(id) {
                    this.items = this.items.filter(i => Number(i.id) !== Number(id));
                    window.dispatchEvent(new CustomEvent('show-toast', {
                        detail: { message: 'Kelas dihapus dari keranjang', type: 'success' }
                    }));
                },
                clear(idsArray) {
                    this.items = this.items.filter(i => !idsArray.includes(Number(i.id)));
                }
            });
        };

        if (window.Alpine) {
            registerStore(window.Alpine);
        } else {
            document.addEventListener('alpine:init', () => {
                registerStore(window.Alpine);
            });
        }
    }
    initFindShipCartStore();
</script>
