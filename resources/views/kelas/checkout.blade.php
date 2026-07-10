<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout {{ $class->judul }} — FindShip</title>
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

    <!-- Main Checkout Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Page Title -->
        <div class="mb-10 text-center md:text-left space-y-2">
            <h1 class="text-3xl font-extrabold text-[#1E3A5F] tracking-tight">Checkout Pembelian Kelas</h1>
            <p class="text-sm text-slate-500 font-medium">Selesaikan pembayaran untuk bergabung ke program bimbingan beasiswa premium.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT COLUMN: Order Summary (lg:col-span-7) -->
            <section class="lg:col-span-7 bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                <h3 class="text-lg font-bold text-[#1E3A5F] border-b border-slate-100 pb-4">Ringkasan Pemesanan</h3>

                <div class="flex flex-col sm:flex-row gap-5 items-start sm:items-center">
                    <!-- Thumbnail -->
                    <div class="w-full sm:w-32 h-24 rounded-2xl bg-slate-100 overflow-hidden shrink-0 border border-slate-100">
                        @if($class->thumbnail)
                            <img src="{{ $class->thumbnail }}" alt="{{ $class->judul }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-[#1E3A5F]/20">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                            </div>
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="space-y-1.5 flex-1">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-[#F5A623]/10 text-[#F5A623] uppercase tracking-wider">
                            Premium Class
                        </span>
                        <h4 class="text-base font-extrabold text-[#1E3A5F] leading-snug">{{ $class->judul }}</h4>
                        <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed">{{ strip_tags($class->deskripsi) }}</p>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="border-t border-b border-slate-100 py-4 flex justify-between items-center text-sm">
                    <span class="text-slate-500 font-semibold">Total Investasi Kelas</span>
                    <span class="text-xl font-extrabold text-[#F5A623]">Rp{{ number_format($class->harga, 0, ',', '.') }}</span>
                </div>

                <!-- User Details Info -->
                <div class="space-y-4 pt-2">
                    <h5 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Informasi Akun Pembeli</h5>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Nama Lengkap</span>
                            <span class="text-sm font-bold text-[#1E3A5F] mt-1 block truncate">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Alamat Email</span>
                            <span class="text-sm font-bold text-[#1E3A5F] mt-1 block truncate">{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Button Back -->
                <div class="pt-4">
                    <a href="{{ route('kelas.show', $class->id) }}" class="inline-flex items-center gap-2 text-xs font-extrabold text-slate-400 hover:text-[#1E3A5F] transition-colors uppercase tracking-wider">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Detail Kelas
                    </a>
                </div>
            </section>

            <!-- RIGHT COLUMN: Payment Info & Stepper (lg:col-span-5) -->
            <section class="lg:col-span-5 space-y-8">
                
                <!-- Stepper Progress Panel -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm">
                    <div class="flex items-center justify-between gap-2">
                        <!-- Step 1 -->
                        <div class="flex flex-col items-center flex-1 relative">
                            <div class="w-8 h-8 rounded-full bg-[#1E3A5F] text-white flex items-center justify-center font-bold text-xs shadow-md shadow-[#1E3A5F]/20 relative z-10 border-2 border-white">1</div>
                            <span class="text-[9px] font-extrabold text-[#1E3A5F] mt-2 uppercase tracking-wider text-center">Pesan</span>
                        </div>
                        <!-- Line -->
                        <div class="h-0.5 bg-slate-200 flex-1 -mt-5"></div>
                        <!-- Step 2 -->
                        <div class="flex flex-col items-center flex-1 relative">
                            <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-xs relative z-10 border-2 border-white">2</div>
                            <span class="text-[9px] font-bold text-slate-400 mt-2 uppercase tracking-wider text-center">Transfer</span>
                        </div>
                        <!-- Line -->
                        <div class="h-0.5 bg-slate-200 flex-1 -mt-5"></div>
                        <!-- Step 3 -->
                        <div class="flex flex-col items-center flex-1 relative">
                            <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-xs relative z-10 border-2 border-white">3</div>
                            <span class="text-[9px] font-bold text-slate-400 mt-2 uppercase tracking-wider text-center">Verifikasi</span>
                        </div>
                        <!-- Line -->
                        <div class="h-0.5 bg-slate-200 flex-1 -mt-5"></div>
                        <!-- Step 4 -->
                        <div class="flex flex-col items-center flex-1 relative">
                            <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-xs relative z-10 border-2 border-white">4</div>
                            <span class="text-[9px] font-bold text-slate-400 mt-2 uppercase tracking-wider text-center">Akses</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Details Box -->
                <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                    <h3 class="text-base font-bold text-[#1E3A5F] border-b border-slate-100 pb-3">Instruksi Pembayaran</h3>

                    <div class="space-y-4">
                        <div>
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nominal Transfer</p>
                            <p class="text-3xl font-extrabold text-[#1E3A5F] mt-1.5 tracking-tight">
                                Rp{{ number_format($class->harga, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Bank Details -->
                        <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
                            <div class="flex justify-between items-center text-xs font-semibold border-b border-slate-200/60 pb-2">
                                <span class="text-slate-400">Nama Bank</span>
                                <span class="text-[#1E3A5F] font-extrabold uppercase tracking-wide">Bank Mandiri</span>
                            </div>
                            <div class="flex justify-between items-center text-xs font-semibold border-b border-slate-200/60 pb-2">
                                <span class="text-slate-400">Nomor Rekening</span>
                                <span class="text-[#1E3A5F] font-extrabold text-sm tracking-wider">123-4567-890</span>
                            </div>
                            <div class="flex justify-between items-center text-xs font-semibold">
                                <span class="text-slate-400">Nama Penerima</span>
                                <span class="text-[#1E3A5F] font-extrabold">FindShip Indonesia</span>
                            </div>
                        </div>

                        <!-- Time limit warning -->
                        <div class="p-3 bg-rose-50 border border-rose-100 rounded-xl flex gap-2.5 items-start text-xs font-bold text-rose-800">
                            <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="leading-relaxed">Batas Waktu: Transfer harus diselesaikan dalam waktu maksimal 24 jam sebelum pemesanan otomatis dibatalkan.</p>
                        </div>
                    </div>

                    <!-- Submit Checkout Form -->
                    <form action="{{ route('kelas.processCheckout', $class->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-center bg-[#F5A623] hover:bg-[#e0951b] text-white py-4 rounded-xl text-sm font-bold shadow-lg shadow-[#F5A623]/25 hover:shadow-xl hover:-translate-y-0.5 transition-all">
                            Konfirmasi & Lanjut Upload Bukti
                        </button>
                    </form>
                </div>

            </section>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />

</body>
</html>
