<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Pembelian Kelas Premium — FindShip</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        [x-cloak] { display: none !important; }
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
            <p class="text-sm text-slate-500 font-medium">Selesaikan pembayaran untuk bergabung ke program bimbingan beasiswa premium pilihan Anda.</p>
        </div>

        @if (session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl text-sm font-bold flex items-center gap-2 shadow-sm">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start" 
             x-data="{ 
                 paymentMethod: 'bank',
                 copyText(val) {
                     navigator.clipboard.writeText(val);
                     window.dispatchEvent(new CustomEvent('toast', { 
                         detail: { message: 'Nomor berhasil disalin!' } 
                     }));
                 }
             }">
            
            <!-- LEFT COLUMN: Order Summary (lg:col-span-7) -->
            <section class="lg:col-span-7 bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                <h3 class="text-lg font-bold text-[#1E3A5F] border-b border-slate-100 pb-4">Ringkasan Pemesanan</h3>

                <div class="space-y-4 max-h-[300px] overflow-y-auto pr-2 divide-y divide-slate-100">
                    @foreach($classes as $index => $class)
                        <div class="flex gap-4 items-center py-4 first:pt-0">
                            <!-- Thumbnail -->
                            <div class="w-24 h-16 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-100">
                                @if($class->thumbnail)
                                    <img src="{{ $class->thumbnail }}" alt="{{ $class->judul }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[#1E3A5F]/20 bg-slate-50">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Details -->
                            <div class="space-y-1 flex-1 min-w-0">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[9px] font-bold bg-[#F5A623]/10 text-[#F5A623] uppercase tracking-wider">
                                    {{ $class->kategori }}
                                </span>
                                <h4 class="text-sm font-extrabold text-[#1E3A5F] leading-snug truncate">{{ $class->judul }}</h4>
                                <p class="text-xs text-slate-500 font-bold">Rp{{ number_format($class->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Billing Summary Breakdown -->
                <div class="border-t border-slate-100 pt-4 space-y-3 text-xs font-semibold text-slate-500">
                    <div class="flex justify-between items-center">
                        <span>Subtotal ({{ count($classes) }} Kelas)</span>
                        <span class="text-slate-800 font-bold">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    
                    @if($discount > 0)
                        <div class="flex justify-between items-center text-emerald-600 font-bold">
                            <span>Diskon Kode Promo ({{ $promoCode }})</span>
                            <span>-Rp{{ number_format($discount, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center">
                        <span>Biaya Layanan</span>
                        <span>Rp2.000</span>
                    </div>

                    @php
                        $serviceFee = 2000;
                        $tax = ($subtotal - $discount) * 0.11;
                        $grandTotal = $subtotal - $discount + $serviceFee + $tax;
                    @endphp

                    <div class="flex justify-between items-center">
                        <span>Pajak (PPN 11%)</span>
                        <span>Rp{{ number_format($tax, 0, ',', '.') }}</span>
                    </div>

                    <div class="border-t border-slate-100 pt-3 flex justify-between items-center text-sm">
                        <span class="text-[#1E3A5F] font-bold">Total Pembayaran</span>
                        <span class="text-xl font-extrabold text-[#F5A623]">Rp{{ number_format($grandTotal, 0, ',', '.') }}</span>
                    </div>
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
                    <a href="{{ route('kelas.cart') }}" class="inline-flex items-center gap-2 text-xs font-extrabold text-slate-400 hover:text-[#1E3A5F] transition-colors uppercase tracking-wider">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Keranjang Belanja
                    </a>
                </div>
            </section>

            <!-- RIGHT COLUMN: Payment Info & Upload Form (lg:col-span-5) -->
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
                        <div class="h-0.5 bg-[#1E3A5F]/30 flex-1 -mt-5"></div>
                        <!-- Step 2 -->
                        <div class="flex flex-col items-center flex-1 relative">
                            <div class="w-8 h-8 rounded-full bg-[#1E3A5F] text-white flex items-center justify-center font-bold text-xs relative z-10 border-2 border-white">2</div>
                            <span class="text-[9px] font-extrabold text-[#1E3A5F] mt-2 uppercase tracking-wider text-center">Transfer</span>
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

                <!-- Form Section -->
                <form action="{{ route('kelas.checkout-multi.process') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <input type="hidden" name="ids" value="{{ $idsString }}">
                    <input type="hidden" name="promo_code" value="{{ $promoCode }}">
                    <input type="hidden" name="payment_method" :value="paymentMethod">

                    <!-- Payment Details Box -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                        <h3 class="text-base font-bold text-[#1E3A5F] border-b border-slate-100 pb-3">Pilih Metode Pembayaran</h3>

                        <!-- Payment tabs selection -->
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" 
                                    @click="paymentMethod = 'bank'"
                                    :class="paymentMethod === 'bank' ? 'border-[#1E3A5F] bg-[#1E3A5F]/5 text-[#1E3A5F]' : 'border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="border-2 rounded-2xl py-3 text-center text-xs font-bold transition-all flex flex-col items-center justify-center gap-1.5 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                Bank Transfer
                            </button>
                            <button type="button" 
                                    @click="paymentMethod = 'ewallet'"
                                    :class="paymentMethod === 'ewallet' ? 'border-[#1E3A5F] bg-[#1E3A5F]/5 text-[#1E3A5F]' : 'border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="border-2 rounded-2xl py-3 text-center text-xs font-bold transition-all flex flex-col items-center justify-center gap-1.5 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                E-Wallet
                            </button>
                            <button type="button" 
                                    @click="paymentMethod = 'qris'"
                                    :class="paymentMethod === 'qris' ? 'border-[#1E3A5F] bg-[#1E3A5F]/5 text-[#1E3A5F]' : 'border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="border-2 rounded-2xl py-3 text-center text-xs font-bold transition-all flex flex-col items-center justify-center gap-1.5 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                                QRIS Pay
                            </button>
                        </div>

                        <!-- Instructions Details based on choice -->
                        <div class="space-y-4 pt-2">
                            <!-- BANK TRANSFER DETAILS -->
                            <div x-show="paymentMethod === 'bank'" class="space-y-3">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tujuan Bank Transfer</p>
                                <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
                                    <div class="flex justify-between items-center text-xs font-semibold border-b border-slate-200/60 pb-2">
                                        <span class="text-slate-400">Nama Bank</span>
                                        <span class="text-[#1E3A5F] font-extrabold uppercase tracking-wide">Bank Mandiri</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-slate-200/60 pb-2">
                                        <span class="text-xs text-slate-400 font-semibold">Nomor Rekening</span>
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#1E3A5F] font-extrabold text-sm tracking-wider">1234567890</span>
                                            <button type="button" @click="copyText('1234567890')" class="text-slate-400 hover:text-[#1E3A5F] transition-colors p-1" title="Salin Rekening">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center text-xs font-semibold">
                                        <span class="text-slate-400">Nama Penerima</span>
                                        <span class="text-[#1E3A5F] font-extrabold">FindShip Indonesia</span>
                                    </div>
                                </div>
                            </div>

                            <!-- E-WALLET DETAILS -->
                            <div x-show="paymentMethod === 'ewallet'" class="space-y-3" style="display: none;">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tujuan E-Wallet Transfer</p>
                                <div class="p-5 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
                                    <div class="flex justify-between items-center text-xs font-semibold border-b border-slate-200/60 pb-2">
                                        <span class="text-slate-400">Pilihan E-Wallet</span>
                                        <span class="text-[#1E3A5F] font-extrabold uppercase tracking-wide">OVO / GoPay / DANA</span>
                                    </div>
                                    <div class="flex justify-between items-center border-b border-slate-200/60 pb-2">
                                        <span class="text-xs text-slate-400 font-semibold">Nomor Handphone</span>
                                        <div class="flex items-center gap-2">
                                            <span class="text-[#1E3A5F] font-extrabold text-sm tracking-wider">081234567890</span>
                                            <button type="button" @click="copyText('081234567890')" class="text-slate-400 hover:text-[#1E3A5F] transition-colors p-1" title="Salin Nomor HP">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center text-xs font-semibold">
                                        <span class="text-slate-400">Nama Penerima</span>
                                        <span class="text-[#1E3A5F] font-extrabold">FindShip Indonesia</span>
                                    </div>
                                </div>
                            </div>

                            <!-- QRIS DETAILS -->
                            <div x-show="paymentMethod === 'qris'" class="space-y-4" style="display: none;">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider text-center">Pindai Kode QRIS di bawah ini</p>
                                
                                <!-- Premium QRIS Card Container -->
                                <div class="bg-white border-2 border-slate-100 rounded-3xl p-5 shadow-lg max-w-[320px] mx-auto text-slate-800 space-y-4 relative overflow-hidden">
                                    <!-- Top Bar with QRIS and GPN branding -->
                                    <div class="flex items-center justify-between border-b pb-3 border-slate-100">
                                        <!-- Logo QRIS (red/blue) -->
                                        <div class="flex items-center gap-1 select-none">
                                            <span class="text-lg font-black italic tracking-tighter text-rose-600">QR</span>
                                            <span class="text-lg font-black italic tracking-tighter text-blue-600">IS</span>
                                        </div>
                                        <!-- Logo GPN -->
                                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-0.5 rounded-md border border-slate-100/80">
                                            <span class="text-[8px] font-extrabold text-blue-900 tracking-wide">GPN</span>
                                            <div class="w-1 h-2.5 bg-rose-500 rounded-xs"></div>
                                            <div class="w-1 h-2.5 bg-[#F5A623] rounded-xs"></div>
                                        </div>
                                    </div>

                                    <!-- Merchant Info -->
                                    <div class="text-center space-y-0.5">
                                        <h4 class="text-sm font-extrabold text-[#1E3A5F] tracking-tight">FindShip Indonesia</h4>
                                        <p class="text-[8px] text-slate-400 font-bold tracking-wider">NMID: ID202607090885</p>
                                    </div>

                                    <!-- QR Code Image Box -->
                                    <div class="relative bg-slate-50 border border-slate-100 rounded-2xl p-4 flex items-center justify-center shadow-inner">
                                        <!-- Generate QR server URL dynamically -->
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&color=0b1528&data=https://findship.com/pay/qris/TX-multi-{{ $grandTotal }}" 
                                             alt="QRIS Code FindShip" 
                                             class="w-40 h-40 object-contain mix-blend-multiply">
                                        
                                        <!-- Small logo badge in the center of QR code -->
                                        <div class="absolute w-7 h-7 rounded-lg bg-white shadow-md flex items-center justify-center border border-slate-100 p-0.5">
                                            <img src="{{ asset('images/logo.png') }}" class="w-full h-full object-contain">
                                        </div>
                                    </div>

                                    <!-- Amount Tag inside QRIS card -->
                                    <div class="bg-[#1E3A5F]/5 border border-[#1E3A5F]/10 rounded-2xl p-2.5 text-center space-y-0.5">
                                        <p class="text-[8px] font-bold text-slate-400 uppercase tracking-wider">NOMINAL PEMBAYARAN</p>
                                        <p class="text-base font-black text-[#1E3A5F]">Rp{{ number_format($grandTotal, 0, ',', '.') }}</p>
                                    </div>

                                    <!-- Small footer text inside card -->
                                    <div class="text-center">
                                        <p class="text-[8px] font-extrabold text-slate-400 tracking-wide uppercase">DIPROSES OLEH BANK MANDIRI & GPN</p>
                                    </div>
                                </div>

                                <p class="text-[10px] text-slate-400 leading-normal max-w-xs mx-auto text-center">Dapat dipindai menggunakan seluruh aplikasi perbankan m-banking dan e-wallet resmi Indonesia.</p>
                            </div>
                        </div>

                        <!-- Limit Warning Banner -->
                        <div class="p-3.5 bg-rose-50 border border-rose-100 rounded-xl flex gap-2.5 items-start text-xs font-bold text-rose-800">
                            <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p class="leading-relaxed">Penting: Lakukan transfer tepat sejumlah Rp{{ number_format($grandTotal, 0, ',', '.') }} agar verifikasi status berjalan lancar.</p>
                        </div>
                    </div>

                    <!-- Upload Proof Box -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                        <h3 class="text-base font-bold text-[#1E3A5F] border-b border-slate-100 pb-3">Unggah Bukti Transfer</h3>

                        <div class="space-y-4" x-data="{ fileName: '' }">
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-44 border-2 border-slate-300 border-dashed rounded-2xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors p-4 text-center">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4-4m4 4V4"></path></svg>
                                        <p class="mb-1 text-xs text-slate-500 font-bold"><span class="text-[#1E3A5F]">Klik untuk unggah</span> berkas bukti transfer</p>
                                        <p class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">Format JPG, JPEG, PNG, atau PDF (Maks 10MB)</p>
                                        <!-- Selected name indicator -->
                                        <p class="mt-2 text-xs font-bold text-[#F5A623] max-w-[250px] truncate" x-text="fileName" x-show="fileName !== ''"></p>
                                    </div>
                                    <input type="file" 
                                           name="bukti_bayar" 
                                           class="hidden" 
                                           required
                                           accept="image/jpeg,image/png,image/jpg,application/pdf"
                                           @change="fileName = $event.target.files[0] ? $event.target.files[0].name : ''">
                                </label>
                            </div>
                            @error('bukti_bayar')
                                <p class="text-rose-600 text-xs font-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Buttons -->
                        <button type="submit" class="w-full text-center bg-[#F5A623] hover:bg-[#e0951b] text-white py-4 rounded-xl text-sm font-bold shadow-lg shadow-[#F5A623]/25 hover:shadow-xl hover:-translate-y-0.5 transition-all">
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </form>

            </section>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />

</body>
</html>
