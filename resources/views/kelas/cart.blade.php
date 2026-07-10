<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja Kelas Premium — FindShip</title>
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
        @media (min-width: 1024px) {
            .cart-grid {
                display: grid !important;
                grid-template-columns: repeat(12, minmax(0, 1fr)) !important;
                gap: 2rem !important;
            }
            .col-left {
                grid-column: span 8 / span 8 !important;
            }
            .col-right {
                grid-column: span 4 / span 4 !important;
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-[#F5A623] selection:text-white">

    <!-- Header / Navbar -->
    <x-guest-navbar />

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12" 
          x-data="{ 
              checkedIds: [],
              promoCodeInput: '',
              discountAmount: 0,
              promoApplied: false,
              appliedPromoCode: '',
              promoError: '',
              promoSuccessMessage: '',
              serviceFee: 2000,
              
              init() {
                  const checkStore = () => {
                      if (window.Alpine && window.Alpine.store('cart')) {
                          this.checkedIds = window.Alpine.store('cart').items.map(i => Number(i.id));
                      } else {
                          setTimeout(checkStore, 50);
                      }
                  };
                  checkStore();
              },
              
              toggleSelectAll() {
                  const items = window.Alpine.store('cart').items;
                  if (this.checkedIds.length === items.length) {
                      this.checkedIds = [];
                  } else {
                      this.checkedIds = items.map(i => Number(i.id));
                  }
              },
              
              isAllSelected() {
                  const items = window.Alpine.store('cart').items;
                  return items.length > 0 && this.checkedIds.length === items.length;
              },
              
              getSelectedItems() {
                  if (!window.Alpine || !window.Alpine.store('cart')) return [];
                  return window.Alpine.store('cart').items.filter(item => this.checkedIds.includes(Number(item.id)));
              },
              
              calculateSubtotal() {
                  const selected = this.getSelectedItems();
                  let total = 0;
                  selected.forEach(item => {
                      const cleanPrice = parseInt(item.harga.toString().replace(/[^0-9]/g, '')) || 0;
                      total += cleanPrice;
                  });
                  return total;
              },

              async applyPromoCode() {
                  this.promoError = '';
                  this.promoSuccessMessage = '';
                  const subtotal = this.calculateSubtotal();
                  if (subtotal === 0) {
                      this.promoError = 'Pilih minimal 1 kelas sebelum memasukkan kode promo.';
                      return;
                  }
                  if (!this.promoCodeInput.trim()) {
                      this.promoError = 'Kode promo tidak boleh kosong.';
                      return;
                  }

                  try {
                      const res = await fetch('{{ route('kelas.promo') }}', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/json',
                              'X-CSRF-TOKEN': '{{ csrf_token() }}'
                          },
                          body: JSON.stringify({
                              code: this.promoCodeInput,
                              subtotal: subtotal
                          })
                      });
                      const data = await res.json();
                      if (data.success) {
                          this.discountAmount = Number(data.discount);
                          this.promoApplied = true;
                          this.appliedPromoCode = this.promoCodeInput;
                          this.promoSuccessMessage = data.message;
                      } else {
                          this.promoError = data.message;
                          this.discountAmount = 0;
                          this.promoApplied = false;
                          this.appliedPromoCode = '';
                      }
                  } catch (e) {
                      console.error(e);
                      this.promoError = 'Terjadi kesalahan sistem saat memvalidasi kode.';
                  }
              },

              removePromo() {
                  this.promoApplied = false;
                  this.appliedPromoCode = '';
                  this.discountAmount = 0;
                  this.promoCodeInput = '';
                  this.promoSuccessMessage = '';
                  this.promoError = '';
              },

              calculateTax() {
                  const sub = this.calculateSubtotal();
                  const disc = this.discountAmount;
                  return Math.round((sub - disc) * 0.11);
              },

              calculateGrandTotal() {
                  const sub = this.calculateSubtotal();
                  if (sub === 0) return 0;
                  const disc = this.discountAmount;
                  const tax = this.calculateTax();
                  return sub - disc + this.serviceFee + tax;
              },
              
              formatRupiah(num) {
                  return 'Rp' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
              },
              
              checkout() {
                  if (this.checkedIds.length === 0) return;
                  let url = '{{ route('kelas.checkout-multi') }}?ids=' + this.checkedIds.join(',');
                  if (this.promoApplied) {
                      url += '&promo=' + encodeURIComponent(this.appliedPromoCode);
                  }
                  window.location.href = url;
              }
          }" 
          x-cloak>
          
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-[#1E3A5F] tracking-tight">Keranjang Belanja</h1>
            <p class="text-slate-500 text-xs sm:text-sm mt-1">Kelola kelas persiapan beasiswa premium yang ingin Anda ikuti.</p>
        </div>

        <!-- Empty State -->
        <template x-if="!$store.cart || $store.cart.items.length === 0">
            <div class="bg-white border border-slate-200 rounded-3xl p-12 text-center max-w-xl mx-auto space-y-6 shadow-sm mt-6 animate-fade-in">
                <div class="w-16 h-16 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mx-auto text-[#1E3A5F]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <div class="space-y-2">
                    <h3 class="font-extrabold text-[#1E3A5F] text-lg">Keranjangmu masih kosong</h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed max-w-xs mx-auto">Jelajahi materi esai beasiswa, IELTS preparation bootcamp, dan bimbingan interview premium lainnya.</p>
                </div>
                <a href="{{ route('kelas.index') }}" class="inline-block bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white px-6 py-3.5 rounded-xl text-xs font-bold transition-all shadow-md">
                    Lihat Katalog Kelas Premium
                </a>
            </div>
        </template>

        <!-- Cart Content Present -->
        <template x-if="$store.cart && $store.cart.items.length > 0">
            <div class="cart-grid grid grid-cols-1 gap-8 items-start">
                
                <!-- Left Panel: Selected Items List (col-left) -->
                <div class="col-left space-y-6">
                    <!-- Select All Control -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-4 flex items-center justify-between shadow-sm">
                        <label class="flex items-center gap-3 cursor-pointer select-none">
                            <input type="checkbox" 
                                   @click="toggleSelectAll()" 
                                   :checked="isAllSelected()"
                                   class="w-4 h-4 text-[#1E3A5F] border-slate-300 rounded focus:ring-[#1E3A5F] focus:ring-2">
                            <span class="text-xs font-bold text-slate-700">Pilih Semua Kelas</span>
                        </label>
                        <span class="text-xs font-extrabold text-slate-500 bg-slate-100 px-3 py-1 rounded-full" x-text="checkedIds.length + ' kelas terpilih'"></span>
                    </div>

                    <!-- Items Card -->
                    <div class="bg-white border border-slate-200 rounded-3xl divide-y divide-slate-100 overflow-hidden shadow-sm">
                        <template x-for="item in $store.cart.items" :key="item.id">
                            <div class="p-5 sm:p-6 flex items-start gap-4 hover:bg-slate-50/40 transition-colors">
                                <!-- Checkbox -->
                                <div class="pt-6 sm:pt-4">
                                    <input type="checkbox" 
                                           :value="Number(item.id)" 
                                           x-model.number="checkedIds"
                                           class="w-4 h-4 text-[#1E3A5F] border-slate-300 rounded focus:ring-[#1E3A5F] focus:ring-2">
                                </div>

                                <!-- Thumbnail -->
                                <div class="w-20 h-16 sm:w-24 sm:h-20 bg-slate-100 rounded-xl overflow-hidden shrink-0 border border-slate-100">
                                    <template x-if="item.thumbnail">
                                        <img :src="item.thumbnail" :alt="item.judul" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="!item.thumbnail">
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 bg-slate-50">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                        </div>
                                    </template>
                                </div>

                                <!-- Details -->
                                <div class="flex-1 min-w-0">
                                    <a :href="'/kelas/' + item.id" class="text-xs sm:text-sm font-extrabold text-[#1E3A5F] hover:text-[#F5A623] transition-colors leading-snug line-clamp-2 block" x-text="item.judul"></a>
                                    <p class="text-[#F5A623] text-sm font-black mt-2" x-text="formatRupiah(parseInt(item.harga.toString().replace(/[^0-9]/g, '')) || 0)"></p>
                                </div>

                                <!-- Actions -->
                                <div>
                                    <button @click="$store.cart.remove(item.id); checkedIds = checkedIds.filter(id => id != item.id)" 
                                            class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-rose-50 transition-all" 
                                            title="Hapus dari keranjang">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 0v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Recommended Other Classes Section -->
                    <div class="space-y-4 pt-4">
                        <h4 class="text-base font-bold text-[#1E3A5F] border-l-4 border-[#F5A623] pl-3">Rekomendasi Kelas Lain Untukmu</h4>
                        <div class="grid sm:grid-cols-2 gap-4">
                            @php
                                $allClasses = \App\Models\KelasPremium::where('status', 'aktif')->take(4)->get();
                            @endphp
                            @foreach($allClasses as $rec)
                                <div x-show="!$store.cart.items.some(i => i.id == {{ $rec->id }})" 
                                     class="bg-white border border-slate-200 rounded-3xl p-5 shadow-sm flex gap-3.5 items-center hover:shadow-md transition-shadow">
                                    <div class="w-16 h-16 rounded-xl bg-slate-100 overflow-hidden shrink-0 border border-slate-100">
                                        @if($rec->thumbnail)
                                            <img src="{{ $rec->thumbnail }}" alt="{{ $rec->judul }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-[#1E3A5F]/20">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 space-y-1">
                                        <h5 class="text-xs font-extrabold text-[#1E3A5F] truncate hover:text-[#F5A623]">
                                            <a href="{{ route('kelas.show', $rec->id) }}">{{ $rec->judul }}</a>
                                        </h5>
                                        <p class="text-[#F5A623] text-xs font-bold">Rp{{ number_format($rec->harga, 0, ',', '.') }}</p>
                                        <button @click="Alpine.store('cart').add({{ $rec->id }}, '{{ addslashes($rec->judul) }}', {{ $rec->harga }}, '{{ $rec->thumbnail }}')"
                                                class="text-[10px] font-bold text-[#1E3A5F] hover:underline flex items-center gap-1">
                                            + Tambah Keranjang
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Panel: Summary & Promo Code (col-right) -->
                <div class="col-right space-y-6">
                    
                    <!-- Promo Code Block -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-4">
                        <h4 class="text-xs font-extrabold text-slate-400 uppercase tracking-wider">Mempunyai Kode Promo?</h4>
                        <div class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" 
                                       x-model="promoCodeInput"
                                       :disabled="promoApplied"
                                       placeholder="Contoh: PROMO10" 
                                       class="flex-1 bg-slate-50 border border-slate-200 focus:bg-white rounded-xl px-4 py-3 text-xs font-bold focus:outline-none focus:ring-2 focus:ring-[#1E3A5F] transition-all disabled:opacity-50">
                                <template x-if="!promoApplied">
                                    <button @click="applyPromoCode()" class="bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white px-4 py-3 rounded-xl text-xs font-bold transition-all shrink-0">
                                        Terapkan
                                    </button>
                                </template>
                                <template x-if="promoApplied">
                                    <button @click="removePromo()" class="bg-rose-50 hover:bg-rose-100 text-rose-600 px-4 py-3 rounded-xl text-xs font-bold transition-all shrink-0 border border-rose-100">
                                        Batalkan
                                    </button>
                                </template>
                            </div>
                            
                            <!-- Messages status indicators -->
                            <p class="text-[10px] font-bold text-rose-600 leading-normal" x-show="promoError !== ''" x-text="promoError"></p>
                            <p class="text-[10px] font-bold text-emerald-600 leading-normal" x-show="promoSuccessMessage !== ''" x-text="promoSuccessMessage"></p>
                            <div class="p-2.5 bg-amber-50 border border-amber-100 rounded-xl text-[9px] font-bold text-amber-800 leading-relaxed">
                                Tip: Coba gunakan kode <strong>PROMO10</strong> (Diskon 10%) atau <strong>DAPAT50K</strong> (Diskon Rp50.000)!
                            </div>
                        </div>
                    </div>

                    <!-- Summary Billing Card -->
                    <div class="bg-white border border-slate-200 rounded-3xl p-6 shadow-sm space-y-6">
                        <h3 class="font-bold text-[#1E3A5F] text-base border-b border-slate-50 pb-3">Ringkasan Belanja</h3>

                        <div class="space-y-3 font-semibold text-xs text-slate-500">
                            <!-- Items Count -->
                            <div class="flex justify-between items-center">
                                <span>Subtotal (Item Terpilih)</span>
                                <span class="text-slate-800 font-bold" x-text="formatRupiah(calculateSubtotal())"></span>
                            </div>

                            <!-- Discount (conditional) -->
                            <template x-if="promoApplied">
                                <div class="flex justify-between items-center text-emerald-600 font-bold">
                                    <span>Potongan Promo</span>
                                    <span x-text="'-' + formatRupiah(discountAmount)"></span>
                                </div>
                            </template>

                            <!-- Service Fee -->
                            <div class="flex justify-between items-center" x-show="calculateSubtotal() > 0">
                                <span>Biaya Layanan</span>
                                <span class="text-slate-800 font-bold" x-text="formatRupiah(serviceFee)"></span>
                            </div>

                            <!-- Tax (PPN 11%) -->
                            <div class="flex justify-between items-center" x-show="calculateSubtotal() > 0">
                                <span>Pajak (PPN 11%)</span>
                                <span class="text-slate-800 font-bold" x-text="formatRupiah(calculateTax())"></span>
                            </div>

                            <hr class="border-slate-50 my-3">

                            <!-- Grand Total -->
                            <div class="flex justify-between items-center text-sm">
                                <span class="font-bold text-slate-800">Total Pembayaran</span>
                                <span class="text-[#F5A623] text-lg font-black" x-text="formatRupiah(calculateGrandTotal())"></span>
                            </div>
                        </div>

                        <!-- Checkout CTA -->
                        <div class="space-y-3 pt-2">
                            <button @click="checkout()" 
                                    :disabled="checkedIds.length === 0" 
                                    :class="checkedIds.length === 0 ? 'bg-slate-100 text-slate-400 cursor-not-allowed border-slate-200' : 'bg-[#1E3A5F] hover:bg-[#F5A623] hover:text-[#1E3A5F] text-white cursor-pointer shadow-lg shadow-[#1E3A5F]/15'"
                                    class="w-full text-center py-3.5 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 border">
                                Lanjut ke Checkout
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"></path></svg>
                            </button>
                            <p class="text-[9px] text-slate-400 text-center leading-relaxed">
                                Menekan tombol di atas berarti menyetujui seluruh ketentuan pendaftaran kelas FindShip.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </template>
    </main>

    <!-- Footer -->
    <x-guest-footer />
</body>
</html>
