<x-guest-layout>
    <div class="space-y-1.5 mb-6 text-center lg:text-left">
        <h2 class="text-xl font-extrabold text-[#1E3A5F]">Daftar Akun FindShip</h2>
        <p class="text-xs text-slate-400 font-medium leading-relaxed">Mulai perjalanan pencarian beasiswa dan kelas persiapan Anda hari ini.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div class="space-y-1">
            <x-input-label for="name" value="Nama Lengkap" class="text-xs font-bold text-slate-600 uppercase tracking-wider" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Contoh: Budi Pratama" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs font-semibold text-rose-500" />
        </div>

        <!-- Email Address -->
        <div class="space-y-1">
            <x-input-label for="email" value="Alamat Email" class="text-xs font-bold text-slate-600 uppercase tracking-wider" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs font-semibold text-rose-500" />
        </div>

        <!-- Password -->
        <div class="space-y-1">
            <x-input-label for="password" value="Password" class="text-xs font-bold text-slate-600 uppercase tracking-wider" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Minimal 8 karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs font-semibold text-rose-500" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-1">
            <x-input-label for="password_confirmation" value="Konfirmasi Password" class="text-xs font-bold text-slate-600 uppercase tracking-wider" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Ulangi password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs font-semibold text-rose-500" />
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                Daftar Akun Baru
            </x-primary-button>
        </div>

        <!-- Login Link -->
        <div class="text-center pt-2">
            <p class="text-xs font-medium text-slate-400">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors">Masuk Sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>
