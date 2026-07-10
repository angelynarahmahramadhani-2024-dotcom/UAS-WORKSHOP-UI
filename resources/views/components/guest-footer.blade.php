<footer class="bg-[#1E3A5F] text-slate-300 pt-16 pb-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
        <!-- Brand Info -->
        <div class="md:col-span-2 space-y-6">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('images/logo.png') }}" alt="FindShip Logo" class="h-16 w-auto object-contain bg-white px-2 py-1 rounded-lg">
            </a>
            <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                FindShip membantu mahasiswa Indonesia menemukan serta mempersiapkan diri meraih beasiswa impian di dalam dan luar negeri dengan rekomendasi berbasis kecocokan IPK dan bimbingan esai premium.
            </p>
            <div class="flex gap-4">
                <!-- Social media icons -->
                <a href="#" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-[#F5A623] text-white flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-[#F5A623] text-white flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.01 3.71.054 1.955.088 2.862.99 2.95 2.95.043.927.054 1.282.054 3.71 0 2.43-.01 2.784-.054 3.71-.088 1.954-.99 2.862-2.95 2.95-.927.043-1.283.054-3.71.054-2.43 0-2.784-.01-3.71-.054-1.955-.088-2.862-.99-2.95-2.95-.043-.927-.054-1.282-.054-3.71 0-2.43.01-2.784.054-3.71.088-1.955.99-2.862 2.95-2.95C9.53 2.01 9.885 2 12.315 2zm0-2C9.76 0 9.442.01 8.44.056 5.82.176 4.384 1.6 4.264 4.22c-.047 1.002-.058 1.32-.058 3.874 0 2.554.01 2.873.058 3.874.12 2.617 1.55 4.045 4.17 4.167 1.002.047 1.32.058 3.874.058 2.554 0 2.873-.01 3.874-.058 2.617-.12 4.045-1.55 4.167-4.17.047-1.002.058-1.32.058-3.874 0-2.554-.01-2.873-.058-3.874-.12-2.617-1.55-4.045-4.17-4.167C15.228.01 14.91 0 12.315 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" class="w-10 h-10 rounded-xl bg-white/5 hover:bg-[#F5A623] text-white flex items-center justify-center transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
            </div>
        </div>

        <!-- Links: Quick Links -->
        <div class="space-y-6">
            <h4 class="text-white text-base font-bold">Pintasan Fitur</h4>
            <ul class="space-y-3.5 text-sm font-semibold">
                <li><a href="{{ route('home') }}" class="hover:text-[#F5A623] transition-colors">Beranda</a></li>
                <li><a href="{{ route('scholarships.index') }}" class="hover:text-[#F5A623] transition-colors">Pencarian Beasiswa</a></li>
                <li><a href="{{ route('kelas.index') }}" class="hover:text-[#F5A623] transition-colors">Kelas Premium</a></li>
                <li><a href="{{ route('artikel.index') }}" class="hover:text-[#F5A623] transition-colors">Artikel & Tips</a></li>
            </ul>
        </div>

        <!-- Links: Programs -->
        <div class="space-y-6">
            <h4 class="text-white text-base font-bold">Persiapan Beasiswa</h4>
            <ul class="space-y-3.5 text-sm font-semibold text-slate-400">
                <li><a href="#" class="hover:text-[#F5A623] transition-colors">Bimbingan Esai LPDP</a></li>
                <li><a href="#" class="hover:text-[#F5A623] transition-colors">IELTS Preparation</a></li>
                <li><a href="#" class="hover:text-[#F5A623] transition-colors">Simulasi Wawancara</a></li>
                <li><a href="#" class="hover:text-[#F5A623] transition-colors">Mentorship MEXT Jepang</a></li>
            </ul>
        </div>

        <!-- Contact / Info -->
        <div class="space-y-6">
            <h4 class="text-white text-base font-bold">Hubungi Kami</h4>
            <ul class="space-y-3.5 text-sm font-semibold">
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#F5A623]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L22 8m-2 11a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2h12a2 2 0 012 2v11z"/></svg>
                    <a href="mailto:info@findship.com" class="hover:text-[#F5A623] transition-colors">[Findship@gmail.com]</a>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#F5A623]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span class="text-slate-300">+62 812-3456-7890</span>
                </li>
                <li class="text-xs text-slate-400 font-medium leading-relaxed">
                    Gedung FindShip Mojokerto, Jawa Timur.
                </li>
            </ul>
        </div>
    </div>

    <!-- Copyright -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs font-semibold text-slate-400">
        <p>&copy; {{ date('Y') }} FindShip. Hak Cipta Dilindungi.</p>
        <div class="flex gap-6">
            <a href="#" class="hover:text-[#F5A623] transition-colors">Kebijakan Privasi</a>
            <a href="#" class="hover:text-[#F5A623] transition-colors">Syarat & Ketentuan</a>
        </div>
    </div>
</footer>
