<x-admin-layout>
    <x-slot name="title">Edit Artikel</x-slot>
    <x-slot name="header">Edit Artikel</x-slot>

    <!-- Header Actions -->
    <div>
        <a href="{{ route('admin.artikel.index') }}" class="inline-flex items-center text-xs font-bold text-[#1E3A5F] hover:text-[#F5A623] transition-colors group">
            <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
            Kembali ke Daftar Artikel
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white border border-slate-200 rounded-3xl p-6 sm:p-8 shadow-sm max-w-3xl">
        <form action="{{ route('admin.artikel.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Form Row 1: Judul -->
            <div class="space-y-1">
                <label for="title" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Judul Artikel</label>
                <x-text-input id="title" name="title" type="text" required class="w-full mt-1 block" placeholder="Contoh: 5 Kunci Utama Lolos Beasiswa AAS ke Australia" :value="old('title', $article->title)" />
                <x-input-error :messages="$errors->get('title')" class="mt-1" />
            </div>

            <!-- Form Row 2: Penulis -->
            <div class="space-y-1">
                <label for="author" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Penulis / Sumber</label>
                <x-text-input id="author" name="author" type="text" required class="w-full mt-1 block" placeholder="Contoh: Sarah Wijaya (AAS Awardee)" :value="old('author', $article->author)" />
                <x-input-error :messages="$errors->get('author')" class="mt-1" />
            </div>

            <!-- Form Row 3: Thumbnail (Pilih Salah Satu) -->
            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-100 space-y-4">
                <h3 class="text-xs font-extrabold text-[#1E3A5F] uppercase tracking-wider">Thumbnail Gambar (Pilih salah satu)</h3>
                
                @if($article->thumbnail)
                    <div class="flex items-center gap-4 p-2 bg-white rounded-xl border border-slate-100 max-w-sm">
                        <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset($article->thumbnail) }}" alt="Preview" class="w-20 h-14 object-cover rounded-lg">
                        <div>
                            <p class="text-xs font-bold text-slate-500">Thumbnail Saat Ini</p>
                            <span class="text-[10px] text-slate-400 font-mono truncate block max-w-[200px]">{{ basename($article->thumbnail) }}</span>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label for="thumbnail_file" class="text-xs font-semibold text-slate-500 block">Ganti Gambar (JPG/PNG/WebP)</label>
                        <input type="file" name="thumbnail_file" id="thumbnail_file" accept="image/*" class="w-full mt-1 text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-white file:text-[#1E3A5F] file:border file:border-slate-200 hover:file:bg-slate-100">
                        <x-input-error :messages="$errors->get('thumbnail_file')" class="mt-1" />
                    </div>

                    <div class="space-y-1">
                        <label for="thumbnail_url" class="text-xs font-semibold text-slate-500 block">Atau Ganti URL Gambar Online</label>
                        <x-text-input id="thumbnail_url" name="thumbnail_url" type="url" class="w-full mt-1 block bg-white" placeholder="https://images.unsplash.com/..." :value="old('thumbnail_url', str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : '')" />
                        <x-input-error :messages="$errors->get('thumbnail_url')" class="mt-1" />
                    </div>
                </div>
            </div>

            <!-- Form Row 4: Ringkasan Singkat (Excerpt) -->
            <div class="space-y-1">
                <label for="excerpt" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Ringkasan Pendek (Excerpt)</label>
                <textarea id="excerpt" name="excerpt" rows="2" class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm py-2.5 px-4 mt-1" placeholder="Masukkan ringkasan singkat artikel yang muncul di daftar blog (maksimal 200 karakter).">{{ old('excerpt', $article->excerpt) }}</textarea>
                <x-input-error :messages="$errors->get('excerpt')" class="mt-1" />
            </div>

            <!-- Form Row 5: Konten Utama (HTML Supported) -->
            <div class="space-y-1">
                <label for="content" class="text-xs font-bold text-slate-600 uppercase tracking-wider block">Konten Artikel Lengkap</label>
                <p class="text-[10px] text-slate-400 font-semibold mb-1">Mendukung tag HTML standar seperti &lt;p&gt;, &lt;h3&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;, dll.</p>
                <textarea id="content" name="content" rows="12" required class="w-full border-slate-200 focus:border-[#1E3A5F] focus:ring-[#1E3A5F] rounded-xl shadow-sm bg-slate-50 text-slate-800 text-sm font-mono py-2.5 px-4 mt-1" placeholder="Tulis atau paste isi artikel Anda di sini...">{{ old('content', $article->content) }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-1" />
            </div>

            <!-- Submit Buttons -->
            <div class="pt-4 border-t border-slate-100 flex items-center gap-3">
                <x-primary-button>
                    Simpan Perubahan
                </x-primary-button>
                <a href="{{ route('admin.artikel.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-6 py-3 rounded-xl text-xs font-extrabold uppercase tracking-widest transition-all">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
