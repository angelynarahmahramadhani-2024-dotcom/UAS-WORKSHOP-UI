<nav x-data="{ open: false }" class="bg-[#1E3A5F] border-b border-[#1E3A5F]/20 text-white shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center gap-2">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <div class="bg-[#F5A623] p-1.5 rounded-lg text-white shadow-md transition-transform group-hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-white to-[#F5A623] bg-clip-text text-transparent">FindShip</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex text-sm font-semibold">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-[#F5A623] text-[#F5A623]' : 'border-transparent text-slate-300 hover:text-[#F5A623]' }} transition-colors">
                        Dashboard
                    </a>
                    <a href="{{ route('scholarships.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('scholarships.*') ? 'border-[#F5A623] text-[#F5A623]' : 'border-transparent text-slate-300 hover:text-[#F5A623]' }} transition-colors">
                        Cari Beasiswa
                    </a>
                    <a href="{{ route('kelas.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('kelas.*') ? 'border-[#F5A623] text-[#F5A623]' : 'border-transparent text-slate-300 hover:text-[#F5A623]' }} transition-colors">
                        Kelas Premium
                    </a>
                    <a href="{{ route('artikel.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('artikel.*') ? 'border-[#F5A623] text-[#F5A623]' : 'border-transparent text-slate-300 hover:text-[#F5A623]' }} transition-colors">
                        Tips Artikel
                    </a>
                    <a href="{{ route('transaksi.riwayat') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('transaksi.riwayat') ? 'border-[#F5A623] text-[#F5A623]' : 'border-transparent text-slate-300 hover:text-[#F5A623]' }} transition-colors">
                        Riwayat Transaksi
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-white/5 border border-white/10 text-sm font-semibold rounded-xl text-slate-200 hover:text-[#F5A623] hover:bg-white/10 transition-all focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1.5 text-slate-400">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="font-bold text-slate-700">
                            Pengaturan Profil
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="font-bold text-rose-600">
                                Keluar Akun
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-300 hover:text-white hover:bg-white/5 focus:outline-none transition-colors">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#1E3A5F] border-t border-[#1E3A5F]/20">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('scholarships.index')" :active="request()->routeIs('scholarships.*')">
                Cari Beasiswa
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')">
                Kelas Premium
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('artikel.index')" :active="request()->routeIs('artikel.*')">
                Tips Artikel
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('transaksi.riwayat')" :active="request()->routeIs('transaksi.riwayat')">
                Riwayat Transaksi
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-slate-800">
            <div class="px-4">
                <div class="font-bold text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-slate-400 mt-0.5">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Pengaturan Profil
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-rose-400">
                        Keluar Akun
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
