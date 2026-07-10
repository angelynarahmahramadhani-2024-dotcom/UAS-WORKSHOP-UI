<x-admin-layout>
    <x-slot name="title">Edit Beasiswa</x-slot>
    <x-slot name="header">Edit Beasiswa</x-slot>

    <!-- Header Actions -->
    <div>
        <a href="{{ route('admin.beasiswa.index') }}" class="inline-flex items-center text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors group">
            <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            Kembali ke Daftar Beasiswa
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm max-w-3xl">
        <form action="{{ route('admin.beasiswa.update', $scholarship->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Form Row 1: Judul & Penyelenggara -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="judul" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Judul Beasiswa</label>
                    <x-text-input id="judul" name="judul" type="text" required class="w-full mt-1 block" placeholder="Contoh: Beasiswa LPDP 2026" :value="old('judul', $scholarship->judul)" />
                    <x-input-error :messages="$errors->get('judul')" class="mt-1" />
                </div>
                
                <div class="space-y-1">
                    <label for="penyelenggara" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Penyelenggara</label>
                    <x-text-input id="penyelenggara" name="penyelenggara" type="text" required class="w-full mt-1 block" placeholder="Contoh: Kementerian Keuangan RI" :value="old('penyelenggara', $scholarship->penyelenggara)" />
                    <x-input-error :messages="$errors->get('penyelenggara')" class="mt-1" />
                </div>
            </div>

            <!-- Form Row 2: Kategori & Jenjang -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="kategori" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Kategori Lokasi</label>
                    <select name="kategori" id="kategori" required class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1">
                        <option value="dalam negeri" {{ old('kategori', $scholarship->kategori) == 'dalam negeri' ? 'selected' : '' }}>Dalam Negeri</option>
                        <option value="luar negeri" {{ old('kategori', $scholarship->kategori) == 'luar negeri' ? 'selected' : '' }}>Luar Negeri</option>
                    </select>
                    <x-input-error :messages="$errors->get('kategori')" class="mt-1" />
                </div>

                <div class="space-y-1">
                    <label for="jenjang" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Jenjang Pendidikan</label>
                    <x-text-input id="jenjang" name="jenjang" type="text" required class="w-full mt-1 block" placeholder="Contoh: S1 / S2 / S3 / D3" :value="old('jenjang', $scholarship->jenjang)" />
                    <x-input-error :messages="$errors->get('jenjang')" class="mt-1" />
                </div>
            </div>

            <!-- Form Row 3: Jurusan & Min IPK -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="jurusan" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Jurusan Target</label>
                    <x-text-input id="jurusan" name="jurusan" type="text" required class="w-full mt-1 block" placeholder="Contoh: Semua Jurusan / Teknik" :value="old('jurusan', $scholarship->jurusan)" />
                    <x-input-error :messages="$errors->get('jurusan')" class="mt-1" />
                </div>

                <div class="space-y-1">
                    <label for="min_ipk" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Minimum IPK</label>
                    <x-text-input id="min_ipk" name="min_ipk" type="number" step="0.01" min="0.00" max="4.00" class="w-full mt-1 block" placeholder="Kosongkan jika tidak ada" :value="old('min_ipk', $scholarship->min_ipk)" />
                    <x-input-error :messages="$errors->get('min_ipk')" class="mt-1" />
                </div>
            </div>

            <!-- Form Row 4: Deadline & Link Resmi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="deadline" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Tenggat (Deadline)</label>
                    <x-text-input id="deadline" name="deadline" type="date" required class="w-full mt-1 block" :value="old('deadline', $scholarship->deadline->format('Y-m-d'))" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-1" />
                </div>

                <div class="space-y-1">
                    <label for="link_resmi" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Link Resmi Pendaftaran</label>
                    <x-text-input id="link_resmi" name="link_resmi" type="url" class="w-full mt-1 block" placeholder="https://..." :value="old('link_resmi', $scholarship->link_resmi)" />
                    <x-input-error :messages="$errors->get('link_resmi')" class="mt-1" />
                </div>
            </div>

            <!-- Form Row 5: Deskripsi -->
            <div class="space-y-1">
                <label for="deskripsi" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Deskripsi Beasiswa</label>
                <textarea id="deskripsi" name="deskripsi" rows="6" required class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1" placeholder="Masukkan detail cakupan beasiswa, persyaratan dokumen, dll.">{{ old('deskripsi', $scholarship->deskripsi) }}</textarea>
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>

            <!-- Form Row 6: Status -->
            <div class="space-y-1 max-w-xs">
                <label for="status" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Status Publikasi</label>
                <select name="status" id="status" required class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1">
                    <option value="aktif" {{ old('status', $scholarship->status) == 'aktif' ? 'selected' : '' }}>Aktif (Tampilkan)</option>
                    <option value="nonaktif" {{ old('status', $scholarship->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-1" />
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 border-t border-slate-100 flex items-center gap-3">
                <x-primary-button>
                    Simpan Perubahan
                </x-primary-button>
                <a href="{{ route('admin.beasiswa.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl text-xs font-extrabold uppercase tracking-widest transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
