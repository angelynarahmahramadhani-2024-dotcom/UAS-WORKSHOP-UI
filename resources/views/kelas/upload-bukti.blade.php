<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unggah Bukti Pembayaran — FindShip</title>
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

    <!-- Main Section -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Page Title & Navigation Back -->
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1">
                <h1 class="text-2xl font-extrabold text-[#1E3A5F] tracking-tight">Unggah Bukti Transfer</h1>
                <p class="text-xs text-slate-500 font-medium">Unggah lampiran resi transaksi agar admin dapat mengonfirmasi pesanan Anda.</p>
            </div>
            
            <!-- Stepper Progress Panel -->
            <div class="bg-white border border-slate-200 rounded-2xl px-5 py-3.5 shadow-sm min-w-[320px]">
                <div class="flex items-center justify-between gap-1">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-6 h-6 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold text-[10px]">✓</div>
                        <span class="text-[8px] font-bold text-emerald-500 mt-1 uppercase tracking-wider text-center">Pesan</span>
                    </div>
                    <!-- Line -->
                    <div class="h-0.5 bg-emerald-500 flex-1 -mt-3.5"></div>
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-6 h-6 rounded-full bg-[#1E3A5F] text-white flex items-center justify-center font-bold text-[10px] shadow-sm shadow-[#1E3A5F]/20">2</div>
                        <span class="text-[8px] font-extrabold text-[#1E3A5F] mt-1 uppercase tracking-wider text-center">Transfer</span>
                    </div>
                    <!-- Line -->
                    <div class="h-0.5 bg-slate-200 flex-1 -mt-3.5"></div>
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-[10px]">3</div>
                        <span class="text-[8px] font-bold text-slate-400 mt-1 uppercase tracking-wider text-center">Verifikasi</span>
                    </div>
                    <!-- Line -->
                    <div class="h-0.5 bg-slate-200 flex-1 -mt-3.5"></div>
                    <!-- Step 4 -->
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-[10px]">4</div>
                        <span class="text-[8px] font-bold text-slate-400 mt-1 uppercase tracking-wider text-center">Akses</span>
                    </div>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl text-xs font-bold flex items-center gap-2 shadow-sm">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            
            <!-- Order Details Card (md:col-span-5) -->
            <div x-data="{ 
                     paymentMethod: 'bank',
                     copyText(val) {
                         navigator.clipboard.writeText(val);
                         window.dispatchEvent(new CustomEvent('show-toast', { 
                             detail: { message: 'Berhasil disalin!', type: 'success' } 
                         }));
                     }
                 }" 
                 class="md:col-span-5 bg-white border border-slate-200 rounded-3xl p-5 shadow-sm space-y-5">
                <h3 class="text-sm font-bold text-[#1E3A5F] border-b border-slate-100 pb-2.5">Detail Kelas & Pembayaran</h3>
                
                <div class="space-y-3">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Judul Kelas</span>
                        <h4 class="text-sm font-bold text-[#1E3A5F] leading-snug mt-0.5">{{ $class->judul }}</h4>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Biaya Registrasi</span>
                        <p class="text-base font-extrabold text-[#F5A623] mt-0.5">Rp{{ number_format($class->harga, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Payment tabs selection -->
                <div class="grid grid-cols-3 gap-1 border-t border-slate-100 pt-4">
                    <button type="button" 
                            @click="paymentMethod = 'bank'"
                            :class="paymentMethod === 'bank' ? 'border-[#1E3A5F] bg-[#1E3A5F]/5 text-[#1E3A5F]' : 'border-slate-200 text-slate-400 hover:bg-slate-50'"
                            class="border rounded-xl py-2 text-center text-[10px] font-extrabold transition-all focus:outline-none">
                        Bank
                    </button>
                    <button type="button" 
                            @click="paymentMethod = 'ewallet'"
                            :class="paymentMethod === 'ewallet' ? 'border-[#1E3A5F] bg-[#1E3A5F]/5 text-[#1E3A5F]' : 'border-slate-200 text-slate-400 hover:bg-slate-50'"
                            class="border rounded-xl py-2 text-center text-[10px] font-extrabold transition-all focus:outline-none">
                        E-Wallet
                    </button>
                    <button type="button" 
                            @click="paymentMethod = 'qris'"
                            :class="paymentMethod === 'qris' ? 'border-[#1E3A5F] bg-[#1E3A5F]/5 text-[#1E3A5F]' : 'border-slate-200 text-slate-400 hover:bg-slate-50'"
                            class="border rounded-xl py-2 text-center text-[10px] font-extrabold transition-all focus:outline-none">
                        QRIS
                    </button>
                </div>

                <!-- Dynamic Instruction Panel -->
                <div class="border-t border-slate-100 pt-4 space-y-3">
                    
                    <!-- Bank Instructions -->
                    <div x-show="paymentMethod === 'bank'" class="space-y-3">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Transfer Bank</span>
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 space-y-2 text-xs font-semibold">
                            <div class="flex justify-between items-center pb-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Nama Bank</span>
                                <span class="text-[#1E3A5F] font-bold uppercase">Bank Mandiri</span>
                            </div>
                            <div class="flex justify-between items-center pb-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">No. Rekening</span>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[#1E3A5F] font-extrabold">123-4567-890</span>
                                    <button type="button" @click="copyText('1234567890')" class="text-slate-400 hover:text-[#1E3A5F] transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400">Penerima</span>
                                <span class="text-[#1E3A5F] font-extrabold">FindShip Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <!-- E-Wallet Instructions -->
                    <div x-show="paymentMethod === 'ewallet'" class="space-y-3" style="display: none;">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Transfer E-Wallet</span>
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 space-y-2 text-xs font-semibold">
                            <div class="flex justify-between items-center pb-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">Pilihan</span>
                                <span class="text-[#1E3A5F] font-bold uppercase">OVO / GoPay / DANA</span>
                            </div>
                            <div class="flex justify-between items-center pb-1.5 border-b border-slate-200/60">
                                <span class="text-slate-400">No. Handphone</span>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[#1E3A5F] font-extrabold">081234567890</span>
                                    <button type="button" @click="copyText('081234567890')" class="text-slate-400 hover:text-[#1E3A5F] transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-slate-400">Penerima</span>
                                <span class="text-[#1E3A5F] font-extrabold">FindShip Indonesia</span>
                            </div>
                        </div>
                    </div>

                    <!-- QRIS Instructions & Dynamic Card -->
                    <div x-show="paymentMethod === 'qris'" class="space-y-4" style="display: none;">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block text-center">Pindai QRIS</span>
                        
                        <!-- Premium QRIS Card Container -->
                        <div class="bg-white border-2 border-slate-100 rounded-3xl p-4 shadow-lg text-slate-800 space-y-3 relative overflow-hidden">
                            <!-- Top Bar -->
                            <div class="flex items-center justify-between border-b pb-2 border-slate-100">
                                <div class="flex items-center gap-1 select-none">
                                    <span class="text-base font-black italic tracking-tighter text-rose-600">QR</span>
                                    <span class="text-base font-black italic tracking-tighter text-blue-600">IS</span>
                                </div>
                                <div class="flex items-center gap-0.5 bg-slate-50 px-1.5 py-0.5 rounded border border-slate-100">
                                    <span class="text-[7px] font-extrabold text-blue-900 tracking-wide">GPN</span>
                                    <div class="w-1.5 h-2 bg-rose-500 rounded-2xs"></div>
                                    <div class="w-1.5 h-2 bg-[#F5A623] rounded-2xs"></div>
                                </div>
                            </div>

                            <!-- Merchant Info -->
                            <div class="text-center space-y-0.5">
                                <h4 class="text-xs font-extrabold text-[#1E3A5F] tracking-tight">FindShip Indonesia</h4>
                                <p class="text-[7px] text-slate-400 font-bold tracking-wider">NMID: ID202607090885</p>
                            </div>

                            <!-- QR Code Box -->
                            <div class="relative bg-slate-50 border border-slate-100 rounded-2xl p-3 flex items-center justify-center shadow-inner">
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&color=0b1528&data=https://findship.com/pay/qris/TX-single-{{ $class->harga }}" 
                                     alt="QRIS Code FindShip" 
                                     class="w-32 h-32 object-contain mix-blend-multiply">
                                
                                <!-- Center logo overlay -->
                                <div class="absolute w-6 h-6 rounded-md bg-white shadow-md flex items-center justify-center border border-slate-100 p-0.5">
                                    <img src="{{ asset('images/logo.png') }}" class="w-full h-full object-contain">
                                </div>
                            </div>

                            <!-- Nominal -->
                            <div class="bg-[#1E3A5F]/5 border border-[#1E3A5F]/10 rounded-xl p-2 text-center space-y-0.5">
                                <p class="text-[7px] font-bold text-slate-400 uppercase tracking-wider">NOMINAL PEMBAYARAN</p>
                                <p class="text-sm font-black text-[#1E3A5F]">Rp{{ number_format($class->harga, 0, ',', '.') }}</p>
                            </div>

                            <!-- Footer -->
                            <div class="text-center">
                                <p class="text-[7px] font-extrabold text-slate-400 tracking-wide uppercase">DIPROSES OLEH BANK MANDIRI & GPN</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Upload File Form Card (md:col-span-7) -->
            <div class="md:col-span-7 bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                <form action="{{ route('transaksi.upload', $class->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- File Input Box -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-700 uppercase tracking-wider block">Unggah Lampiran Bukti Transfer</label>
                        
                        <!-- Drag and drop placeholder -->
                        <div x-data="{ isDragOver: false }"
                             :class="isDragOver ? 'border-[#F5A623] bg-[#F5A623]/5' : 'border-slate-200 bg-slate-50/50 hover:bg-slate-50 hover:border-slate-300'"
                             class="border-2 border-dashed rounded-2xl p-6 text-center transition-all cursor-pointer relative"
                             @dragover.prevent="isDragOver = true"
                             @dragleave.prevent="isDragOver = false"
                             @drop.prevent="isDragOver = false; $refs.fileInput.files = $event.dataTransfer.files; triggerPreview($refs.fileInput)">
                             
                            <input type="file" 
                                   name="bukti_bayar" 
                                   id="bukti_bayar" 
                                   ref="fileInput" 
                                   required 
                                   accept="image/*"
                                   @change="previewImage($event)"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            
                            <div class="space-y-2 pointer-events-none">
                                <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mx-auto">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-600">Klik untuk cari berkas atau seret kemari</p>
                                <p class="text-[10px] text-slate-400 font-medium">Mendukung format: JPG, JPEG, PNG (Maksimal 10MB)</p>
                            </div>
                        </div>
                        
                        @error('bukti_bayar')
                            <p class="text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Preview Box -->
                    <div id="previewContainer" class="hidden space-y-2">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Pratinjau Bukti Transfer</span>
                        <div class="max-w-xs rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 relative">
                            <img id="imagePreview" src="#" alt="Pratinjau Bukti" class="w-full h-auto object-cover max-h-60">
                            <button type="button" onclick="removePreview()" class="absolute top-2 right-2 bg-slate-900/60 hover:bg-slate-900 text-white p-1.5 rounded-lg transition-colors shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Optional Note Box -->
                    <div class="space-y-2">
                        <label for="catatan" class="text-xs font-bold text-slate-700 uppercase tracking-wider block">Catatan Tambahan untuk Admin (Opsional)</label>
                        <textarea name="catatan" id="catatan" rows="3" placeholder="Tuliskan catatan seperti nama pemilik rekening pengirim jika berbeda dengan nama akun..." class="w-full bg-slate-50 border-slate-200 rounded-2xl p-4 text-xs sm:text-sm focus:border-[#1E3A5F] focus:ring-[#1E3A5F] placeholder-slate-400"></textarea>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit" class="w-full sm:flex-1 bg-[#F5A623] hover:bg-[#e0951b] text-white py-4 rounded-xl text-xs font-bold transition-all shadow-md shadow-[#F5A623]/20 hover:shadow-lg text-center">
                            Unggah Bukti Bayar
                        </button>
                        <a href="{{ route('kelas.show', $class->id) }}" class="w-full sm:w-auto text-center border border-slate-200 bg-slate-50 hover:bg-slate-100 text-slate-600 px-6 py-4 rounded-xl text-xs font-bold transition-all">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <x-guest-footer />

    <!-- JavaScript Preview Logic -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const container = document.getElementById('previewContainer');
            const preview = document.getElementById('imagePreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function removePreview() {
            const fileInput = document.getElementById('bukti_bayar');
            const container = document.getElementById('previewContainer');
            const preview = document.getElementById('imagePreview');
            
            fileInput.value = '';
            preview.src = '#';
            container.classList.add('hidden');
        }
        
        function triggerPreview(input) {
            const container = document.getElementById('previewContainer');
            const preview = document.getElementById('imagePreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    container.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
