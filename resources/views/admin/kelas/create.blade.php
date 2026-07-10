<x-admin-layout>
    <x-slot name="title">Tambah Kelas Premium Baru</x-slot>
    <x-slot name="header">Tambah Kelas Premium Baru</x-slot>

    <!-- Header Actions -->
    <div>
        <a href="{{ route('admin.kelas.index') }}" class="inline-flex items-center text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors group">
            <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            Kembali ke Daftar Kelas
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm max-w-2xl">
        <form action="{{ route('admin.kelas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Form Row 1: Judul -->
            <div class="space-y-1">
                <label for="judul" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Judul Kelas</label>
                <x-text-input id="judul" name="judul" type="text" required class="w-full mt-1 block" placeholder="Contoh: Mastering IELTS Preparation Bootcamp" :value="old('judul')" />
                <x-input-error :messages="$errors->get('judul')" class="mt-1" />
            </div>

            <!-- Form Row 2: Harga & Thumbnail -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="harga" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Harga Kelas (Rp)</label>
                    <x-text-input id="harga" name="harga" type="number" min="0" required class="w-full mt-1 block" placeholder="Contoh: 150000" :value="old('harga')" />
                    <x-input-error :messages="$errors->get('harga')" class="mt-1" />
                </div>
                
                <div class="space-y-1">
                    <label for="thumbnail" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Thumbnail URL</label>
                    <x-text-input id="thumbnail" name="thumbnail" type="url" class="w-full mt-1 block" placeholder="https://unsplash.com/..." :value="old('thumbnail')" />
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-1" />
                </div>
            </div>

            <!-- Form Row 3: Deskripsi Singkat & Konten Publik -->
            <div class="space-y-1">
                <label for="deskripsi" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Deskripsi Utama</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" required class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1" placeholder="Masukkan ringkasan materi bimbingan.">{{ old('deskripsi') }}</textarea>
                <x-input-error :messages="$errors->get('deskripsi')" class="mt-1" />
            </div>

            <div class="space-y-1">
                <label for="konten_publik" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Teaser / Konten Publik (Terbuka untuk Umum)</label>
                <textarea id="konten_publik" name="konten_publik" rows="3" class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1" placeholder="Teaser promosi yang dapat dibaca oleh user yang belum berlangganan.">{{ old('konten_publik') }}</textarea>
                <x-input-error :messages="$errors->get('konten_publik')" class="mt-1" />
            </div>

            <!-- Form Row 4: Konten Premium (HTML/Markdown support) -->
            <div class="space-y-1">
                <label for="konten_premium" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Materi Lengkap / Konten Premium (Hanya Subscriber)</label>
                <textarea id="konten_premium" name="konten_premium" rows="6" class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1" placeholder="Masukkan materi lengkap, silabus mendalam, atau teks premium (dapat memuat HTML tag).">{{ old('konten_premium') }}</textarea>
                <x-input-error :messages="$errors->get('konten_premium')" class="mt-1" />
            </div>

            <!-- Form Row 5: Link Zoom & Rekaman -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label for="link_zoom" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Link Room Zoom / Meet</label>
                    <x-text-input id="link_zoom" name="link_zoom" type="url" class="w-full mt-1 block" placeholder="https://zoom.us/j/..." :value="old('link_zoom')" />
                    <x-input-error :messages="$errors->get('link_zoom')" class="mt-1" />
                </div>
                
                <div class="space-y-1">
                    <label for="link_rekaman" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Link Rekaman (Youtube / Drive)</label>
                    <x-text-input id="link_rekaman" name="link_rekaman" type="url" class="w-full mt-1 block" placeholder="https://youtube.com/embed/..." :value="old('link_rekaman')" />
                    <x-input-error :messages="$errors->get('link_rekaman')" class="mt-1" />
                </div>
            </div>

            <!-- Form Row 6: Upload File PDF Materi -->
            <div class="space-y-1">
                <label for="file_materi" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Unggah File PDF Materi (Max 10MB)</label>
                <input type="file" name="file_materi" id="file_materi" accept="application/pdf" class="w-full mt-1 text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                <x-input-error :messages="$errors->get('file_materi')" class="mt-1" />
            </div>

            <!-- Form Row 7: Kurikulum (JSON Format) -->
            <div class="space-y-1">
                <label for="kurikulum" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Daftar Kurikulum / Modul (Format JSON)</label>
                <textarea id="kurikulum" name="kurikulum" rows="5" class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm font-mono py-2.5 px-4 mt-1" placeholder='Example:
[
  {"judul": "Sesi 1: Introduction", "materi": "Materi pembuka"},
  {"judul": "Sesi 2: Writing Essay", "materi": "Menulis draf awal"}
]'>{{ old('kurikulum') }}</textarea>
                <x-input-error :messages="$errors->get('kurikulum')" class="mt-1" />
            </div>

            <!-- Form Row 8: Status -->
            <div class="space-y-1 max-w-xs">
                <label for="status" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Status Kelas</label>
                <select name="status" id="status" required class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif (Tampilkan)</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif (Sembunyikan)</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-1" />
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 border-t border-slate-100 flex items-center gap-3">
                <x-primary-button>
                    Simpan Kelas
                </x-primary-button>
                <a href="{{ route('admin.kelas.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl text-xs font-extrabold uppercase tracking-widest transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
