<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Transaksi Saya — FindShip</title>
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

    <!-- Main Container -->
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="space-y-8">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E3A5F] tracking-tight">Riwayat Pembelian Kelas</h1>
                <p class="text-sm text-slate-500 mt-1.5">Berikut adalah seluruh riwayat transaksi pendaftaran kelas premium Anda di FindShip.</p>
            </div>

            <!-- Transactions Table -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs sm:text-sm">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 uppercase tracking-wider font-bold border-b border-slate-100">
                                <th class="p-4 font-bold">Tanggal Pemesanan</th>
                                <th class="p-4 font-bold">Program Kelas Premium</th>
                                <th class="p-4 font-bold">Investasi</th>
                                <th class="p-4 font-bold">Bukti Pembayaran</th>
                                <th class="p-4 font-bold">Status</th>
                                <th class="p-4 font-bold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($transactions as $tx)
                                <tr class="hover:bg-slate-50/40 transition-colors">
                                    <td class="p-4 font-medium text-slate-500">{{ $tx->created_at->format('d M Y, H:i') }} WIB</td>
                                    <td class="p-4">
                                        <a href="{{ route('kelas.show', $tx->kelas->id) }}" class="font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors leading-snug">
                                            {{ $tx->kelas->judul }}
                                        </a>
                                    </td>
                                    <td class="p-4 font-extrabold text-slate-700">Rp{{ number_format($tx->kelas->harga, 0, ',', '.') }}</td>
                                    <td class="p-4">
                                        @if($tx->bukti_bayar)
                                            <a href="{{ asset($tx->bukti_bayar) }}" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:text-[#F5A623] hover:underline font-bold flex items-center gap-1">
                                                Lihat Berkas
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                            </a>
                                        @else
                                            <span class="text-rose-500 font-bold bg-rose-50 px-2 py-1 rounded border border-rose-100 flex items-center gap-1 w-max">
                                                Belum Diunggah
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($tx->status === 'berhasil')
                                            <span class="px-3 py-1 text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full uppercase tracking-wider">Terverifikasi</span>
                                        @elseif($tx->status === 'ditolak')
                                            <span class="px-3 py-1 text-xs font-bold bg-rose-50 text-rose-700 border border-rose-100 rounded-full uppercase tracking-wider">Ditolak</span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100 rounded-full uppercase tracking-wider">Menunggu</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center">
                                        <a href="{{ route('kelas.show', $tx->kelas->id) }}" class="inline-block bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] px-4 py-2 rounded-xl text-xs font-bold transition-all">
                                            @if($tx->status === 'menunggu' && !$tx->bukti_bayar)
                                                Upload Bukti
                                            @else
                                                Detail Akses
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-12 text-center text-slate-400 font-semibold">
                                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                        Belum ada riwayat pendaftaran kelas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#1E3A5F] border-t border-[#1E3A5F]/20 text-white py-16 mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="bg-[#F5A623] p-1.5 rounded-lg text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-white to-[#F5A623] bg-clip-text text-transparent">FindShip</span>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed">
                    FindShip adalah platform informasi, rekomendasi, dan persiapan beasiswa nomor 1 di Indonesia. Membantu Anda meraih masa depan cerah.
                </p>
            </div>
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#F5A623] pl-2.5">Menu Utama</h4>
                <ul class="space-y-2.5 text-xs text-slate-300 font-medium">
                    <li><a href="{{ route('home') }}" class="hover:text-[#F5A623] transition-colors">Beranda</a></li>
                    <li><a href="{{ route('scholarships.index') }}" class="hover:text-[#F5A623] transition-colors">Cari Beasiswa</a></li>
                    <li><a href="{{ route('kelas.index') }}" class="hover:text-[#F5A623] transition-colors">Kelas Premium</a></li>
                    <li><a href="{{ route('artikel.index') }}" class="hover:text-[#F5A623] transition-colors">Tips & Artikel</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#F5A623] pl-2.5">Kategori Populer</h4>
                <ul class="space-y-2.5 text-xs text-slate-300 font-medium">
                    <li><a href="{{ route('scholarships.index') }}?kategori=dalam+negeri" class="hover:text-[#F5A623] transition-colors">Beasiswa Dalam Negeri</a></li>
                    <li><a href="{{ route('scholarships.index') }}?kategori=luar+negeri" class="hover:text-[#F5A623] transition-colors">Beasiswa Luar Negeri</a></li>
                    <li><a href="{{ route('scholarships.index') }}?jenjang=S1" class="hover:text-[#F5A623] transition-colors">Beasiswa S1</a></li>
                    <li><a href="{{ route('scholarships.index') }}?jenjang=S2" class="hover:text-[#F5A623] transition-colors">Beasiswa S2</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-l-2 border-[#F5A623] pl-2.5">Hubungi Kami</h4>
                <p class="text-xs text-slate-300 leading-relaxed">
                    Ada pertanyaan? Kirimkan email ke:<br>
                    <strong class="text-white hover:text-[#F5A623] cursor-pointer">support@findship.id</strong>
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border-t border-white/10 mt-12 pt-8 text-center text-xs text-slate-400 font-medium">
            <p>&copy; 2026 FindShip. Hak Cipta Dilindungi. Dibuat dengan &hearts; untuk Pendidikan Indonesia.</p>
        </div>
    </footer>
    @if(session('purchased_ids'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const clearIds = "{{ session('purchased_ids') }}".split(',').map(Number);
                const checkStoreAndClear = () => {
                    if (window.Alpine && window.Alpine.store('cart')) {
                        window.Alpine.store('cart').clear(clearIds);
                    } else {
                        setTimeout(checkStoreAndClear, 50);
                    }
                };
                checkStoreAndClear();
            });
        </script>
    @endif
</body>
</html>
