<div x-data="onboardingTour()" 
     x-show="show" 
     class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs" 
     style="display: none;"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
     
    <!-- Tour Card Modal -->
    <div @click.away="closeTour()" 
         class="bg-white border border-slate-100 rounded-3xl p-8 max-w-md w-full shadow-2xl relative overflow-hidden flex flex-col justify-between min-h-[320px] transition-all duration-300 transform scale-100"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="scale-95"
         x-transition:enter-end="scale-100">
         
        <!-- Top decorative element -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-[#F5A623]/10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#1E3A5F]/5 rounded-full blur-2xl"></div>

        <div class="relative z-10 space-y-4">
            <!-- Step Counter & Close -->
            <div class="flex items-center justify-between">
                <span class="text-xs font-extrabold uppercase tracking-widest text-[#F5A623] bg-[#F5A623]/10 px-3 py-1 rounded-full">
                    Langkah <span x-text="currentStep + 1"></span> dari <span x-text="steps.length"></span>
                </span>
                <button @click="closeTour()" class="text-slate-400 hover:text-slate-600 p-1.5 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Dynamic Step Content -->
            <div class="space-y-3 pt-2">
                <h4 class="text-xl font-extrabold text-[#1E3A5F]" x-text="steps[currentStep].title"></h4>
                <p class="text-slate-500 text-sm leading-relaxed" x-text="steps[currentStep].content"></p>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative z-10 flex items-center justify-between border-t border-slate-100 pt-6 mt-8">
            <button @click="prevStep()" 
                    x-show="currentStep > 0" 
                    class="text-xs font-bold text-slate-500 hover:text-[#1E3A5F] px-4 py-2 rounded-xl transition-colors">
                Kembali
            </button>
            <button @click="closeTour()" 
                    x-show="currentStep === 0" 
                    class="text-xs font-bold text-slate-400 hover:text-slate-600 px-4 py-2 rounded-xl transition-colors">
                Lewati
            </button>
            
            <button @click="nextStep()" 
                    class="bg-[#1E3A5F] hover:bg-[#F5A623] text-white px-6 py-3 rounded-xl text-xs font-bold transition-all shadow-md shadow-[#1E3A5F]/10">
                <span x-text="currentStep === steps.length - 1 ? 'Mulai Sekarang' : 'Lanjut'"></span>
            </button>
        </div>
    </div>
</div>

<script>
    function onboardingTour() {
        return {
            show: false,
            currentStep: 0,
            steps: [
                {
                    title: "Selamat Datang di FindShip! 🚢",
                    content: "Platform rekomendasi beasiswa terpintar untuk mahasiswa Indonesia. Mari keliling sejenak untuk mengenal fitur-fitur terbaik kami!"
                },
                {
                    title: "Pencarian & Filter Pintar 🔍",
                    content: "Cari beasiswa berdasarkan program studi, universitas tujuan, jenjang, atau filter spesifik IPK Anda untuk melihat beasiswa yang cocok secara instan."
                },
                {
                    title: "Bimbingan Kelas Premium 🎓",
                    content: "Persiapkan berkas esai, motivation letter, berkas visa, TOEFL/IELTS, dan latihan wawancara bersama mentor-mentor berpengalaman penerima beasiswa."
                },
                {
                    title: "Simpan Favorit & Pengingat ⏰",
                    content: "Simpan beasiswa incaran Anda ke daftar favorit untuk menerima notifikasi pengingat tenggat pendaftaran otomatis agar tidak terlewat."
                }
            ],
            init() {
                window.startOnboardingTour = () => {
                    this.currentStep = 0;
                    this.show = true;
                };
            },
            nextStep() {
                if (this.currentStep < this.steps.length - 1) {
                    this.currentStep++;
                } else {
                    this.closeTour();
                }
            },
            prevStep() {
                if (this.currentStep > 0) {
                    this.currentStep--;
                }
            },
            closeTour() {
                this.show = false;
            }
        }
    }
</script>
