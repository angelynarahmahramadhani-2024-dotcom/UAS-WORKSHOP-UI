<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-[#1E3A5F] leading-tight">
            Dashboard Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Banner / Welcome Card -->
            <div class="bg-gradient-to-r from-[#1E3A5F] to-[#14263f] text-white p-8 rounded-3xl shadow-sm relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
                <!-- Abstract blobs -->
                <div class="absolute inset-0 z-0 opacity-15 pointer-events-none">
                    <div class="absolute top-0 right-0 w-80 h-80 bg-[#F5A623] rounded-full blur-[80px]"></div>
                </div>
                
                <div class="relative z-10 space-y-2">
                    <h3 class="text-xl sm:text-2xl font-extrabold">Selamat Datang Kembali, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-xs sm:text-sm text-slate-300 max-w-xl leading-relaxed">Senang melihatmu kembali. Pantau terus beasiswa favorit dan status bimbingan kelas premium kamu di sini.</p>
                </div>
                
                <a href="{{ route('scholarships.index') }}" class="relative z-10 bg-[#F5A623] hover:bg-[#e0951b] text-white px-6 py-3.5 rounded-xl text-xs font-bold transition-all shadow-md w-max shrink-0">
                    Cari Beasiswa Baru
                </a>
            </div>

            <!-- Profile and Stats Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Academic Profile Card -->
                <div class="lg:col-span-1 bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-6 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#1E3A5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Profil Akademik
                            </h4>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase">Mahasiswa</span>
                        </div>
                        
                        <div class="space-y-4 text-sm font-medium">
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 font-semibold">Jurusan:</span>
                                <span class="text-[#1E3A5F] font-bold">{{ Auth::user()->jurusan ?? 'Belum diisi' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 font-semibold">IPK Terakhir:</span>
                                <span class="text-[#1E3A5F] font-bold">{{ Auth::user()->ipk ? number_format(Auth::user()->ipk, 2) : 'Belum diisi' }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-50 pb-2">
                                <span class="text-slate-400 font-semibold">Asal Kampus:</span>
                                <span class="text-[#1E3A5F] font-bold">{{ Auth::user()->asal_kampus ?? 'Belum diisi' }}</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="w-full text-center border border-slate-200 bg-slate-50 hover:bg-slate-100 text-[#1E3A5F] py-3 rounded-xl text-xs font-bold transition-all mt-6 block">
                        Ubah Informasi Profil
                    </a>
                </div>

                <!-- Favorited Scholarships & Class Overview Panel -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Bookmarked/Favorited Scholarships -->
                    <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-[#F5A623]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                Beasiswa Favorit Tersimpan
                            </h4>
                            <span class="text-xs font-bold text-slate-400">{{ $favorites->count() }} Tersimpan</span>
                        </div>
                        
                        <div class="space-y-3">
                            @forelse($favorites as $fav)
                                @if($fav->beasiswa)
                                    <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-between hover:border-slate-200 transition-all gap-4">
                                        <div class="space-y-1 truncate">
                                            <h5 class="font-bold text-slate-800 text-sm hover:text-[#F5A623] transition-colors truncate">
                                                <a href="{{ route('scholarships.show', $fav->beasiswa->id) }}">{{ $fav->beasiswa->judul }}</a>
                                            </h5>
                                            <p class="text-xs text-slate-400 font-medium truncate">Penyelenggara: {{ $fav->beasiswa->penyelenggara }}</p>
                                        </div>
                                        <div class="flex items-center gap-3 shrink-0">
                                            <span class="text-xs font-bold text-rose-600 block">Tenggat: {{ $fav->beasiswa->deadline->format('d M Y') }}</span>
                                            <!-- Simple Toggle Action Form -->
                                            <form action="{{ route('scholarships.favorite', $fav->beasiswa->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-rose-400 hover:text-rose-600 p-1.5 rounded-lg transition-colors" title="Hapus Favorit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="text-center p-6 text-slate-400 space-y-2">
                                    <p class="text-xs font-semibold">Belum ada beasiswa yang Anda simpan ke favorit.</p>
                                    <a href="{{ route('scholarships.index') }}" class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] underline transition-colors">Eksplorasi Beasiswa Sekarang</a>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Enrolled Premium Classes -->
                    <div class="bg-white border border-slate-200 p-6 sm:p-8 rounded-3xl shadow-sm space-y-4">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                            <h4 class="text-base font-bold text-slate-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                Kelas Premium Saya
                            </h4>
                            <a href="{{ route('kelas.index') }}" class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors">Daftar Kelas Baru</a>
                        </div>
                        
                        <div class="space-y-3">
                            @forelse($transactions as $tx)
                                @if($tx->kelas)
                                    <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-between hover:border-slate-200 transition-all gap-4">
                                        <div class="space-y-1 truncate">
                                            <h5 class="font-bold text-slate-800 text-sm hover:text-[#F5A623] transition-colors truncate">
                                                <a href="{{ route('kelas.show', $tx->kelas->id) }}">{{ $tx->kelas->judul }}</a>
                                            </h5>
                                            <p class="text-xs text-slate-400 font-medium">Harga: Rp{{ number_format($tx->kelas->harga, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="flex items-center gap-3 shrink-0">
                                            @if($tx->status === 'berhasil')
                                                <span class="px-2.5 py-1 text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full uppercase">Aktif</span>
                                            @elseif($tx->status === 'ditolak')
                                                <span class="px-2.5 py-1 text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-100 rounded-full uppercase">Ditolak</span>
                                            @else
                                                <span class="px-2.5 py-1 text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100 rounded-full uppercase">Menunggu</span>
                                            @endif
                                            
                                            <a href="{{ route('kelas.show', $tx->kelas->id) }}" class="bg-white hover:bg-slate-100 border border-slate-200 text-[#1E3A5F] px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="text-center p-6 text-slate-400 space-y-2">
                                    <p class="text-xs font-semibold">Anda belum bergabung di program bimbingan premium manapun.</p>
                                    <a href="{{ route('kelas.index') }}" class="text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] underline transition-colors">Eksplorasi Program Kelas Premium</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
