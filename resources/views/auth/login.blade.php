<x-guest-layout>
    <div class="space-y-1.5 mb-6 text-center lg:text-left">
        <h2 class="text-xl font-extrabold text-[#1E3A5F]">Masuk ke FindShip</h2>
        <p class="text-xs text-slate-400 font-medium leading-relaxed">Akses beasiswa terpersonalisasi dan kelas persiapan Anda.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div class="space-y-1">
            <x-input-label for="email" value="Alamat Email" class="text-xs font-bold text-slate-600 uppercase tracking-wider" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs font-semibold text-rose-500" />
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <div class="flex justify-between items-center">
                <x-input-label for="password" value="Password" class="text-xs font-bold text-slate-600 uppercase tracking-wider" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-[#F5A623] hover:text-[#1E3A5F] transition-colors" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs font-semibold text-rose-500" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-slate-200 text-[#1E3A5F] shadow-sm focus:ring-[#1E3A5F]" name="remember">
                <span class="ms-2 text-xs font-semibold text-slate-500">Ingat saya di perangkat ini</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                Masuk Sekarang
            </x-primary-button>
        </div>

        <!-- Register Link -->
        <div class="text-center pt-2">
            <p class="text-xs font-medium text-slate-400">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors">Daftar Akun Baru</a>
            </p>
        </div>
    </form>
</x-guest-layout>
