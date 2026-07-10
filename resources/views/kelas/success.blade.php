<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Berhasil — FindShip</title>
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
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-[#F5A623] selection:text-white">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Success Screen Content -->
    <main class="max-w-xl mx-auto px-4 py-16 text-center space-y-8">
        
        <!-- Checked Checkmark Icon -->
        <div class="w-20 h-20 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center mx-auto text-emerald-500 shadow-md">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>

        <div class="space-y-3">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#1E3A5F] tracking-tight">Pemesanan Kelas Berhasil!</h1>
            <p class="text-xs sm:text-sm text-slate-500 max-w-sm mx-auto leading-relaxed">
                Bukti transfer pembayaran Anda telah diunggah dan sedang diproses verifikasi oleh Admin FindShip.
            </p>
        </div>

        <!-- Transaction Details Card -->
        <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm text-left divide-y divide-slate-100 space-y-4">
            <div class="pb-3 flex justify-between items-center text-xs font-semibold">
                <span class="text-slate-400">ID Transaksi</span>
                <span class="text-[#1E3A5F] font-extrabold tracking-wider">{{ $transaction_id }}</span>
            </div>

            <div class="py-3.5 flex justify-between items-center text-xs font-semibold">
                <span class="text-slate-400">Status Pembayaran</span>
                <span class="px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-amber-50 text-amber-700 border border-amber-100 tracking-wider">
                    Menunggu Verifikasi
                </span>
            </div>

            <div class="py-3.5 flex justify-between items-center text-xs font-semibold">
                <span class="text-slate-400">Metode Pembayaran</span>
                <span class="text-[#1E3A5F] font-extrabold uppercase tracking-wide">
                    @if($paymentMethod === 'bank')
                        Bank Transfer
                    @elseif($paymentMethod === 'ewallet')
                        E-Wallet
                    @else
                        QRIS Pay
                    @endif
                </span>
            </div>

            <div class="py-3.5 flex justify-between items-center text-xs font-semibold">
                <span class="text-slate-400">Total Investasi</span>
                <span class="text-[#F5A623] font-black text-sm">Rp{{ number_format($totalAmount, 0, ',', '.') }}</span>
            </div>

            <div class="pt-4 text-center">
                <div class="p-3.5 bg-blue-50 border border-blue-100/60 rounded-2xl text-[10px] font-bold text-[#1E3A5F] leading-relaxed flex items-start gap-2 text-left">
                    <svg class="w-4 h-4 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p>Estimasi waktu verifikasi rata-rata: <strong>15 Menit</strong> (maksimal 24 jam untuk transfer antar bank pada jam operasional).</p>
                </div>
            </div>
        </div>

        <!-- Call to Actions -->
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
            <a href="{{ route('transaksi.riwayat') }}" class="flex-1 bg-slate-100 hover:bg-[#1E3A5F] hover:text-white text-[#1E3A5F] text-center py-3.5 rounded-xl text-xs font-bold transition-all border border-transparent">
                Riwayat Transaksi
            </a>
            <a href="{{ route('home') }}" class="flex-1 bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white text-center py-3.5 rounded-xl text-xs font-bold transition-all shadow-md shadow-[#1E3A5F]/15">
                Kembali ke Beranda
            </a>
        </div>

    </main>

    <!-- Footer -->
    <x-guest-footer />

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
