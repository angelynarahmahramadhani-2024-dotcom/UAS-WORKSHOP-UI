<x-admin-layout>
    <x-slot name="title">Manajemen Artikel</x-slot>
    <x-slot name="header">Manajemen Artikel</x-slot>

    <!-- Header Actions -->
    <div class="flex items-center justify-between">
        <p class="text-sm text-slate-500 font-semibold">Kelola artikel tips beasiswa dan panduan sukses mahasiswa.</p>
        <a href="{{ route('admin.artikel.create') }}" class="bg-[#1E3A5F] hover:bg-[#F5A623] text-white px-5 py-2.5 rounded-xl text-xs font-bold transition-all shadow-sm">
            + Tulis Artikel Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 uppercase tracking-wider font-bold border-b border-slate-100">
                        <th class="p-4 font-bold">Thumbnail</th>
                        <th class="p-4 font-bold">Judul Artikel</th>
                        <th class="p-4 font-bold">Penulis</th>
                        <th class="p-4 font-bold">Tanggal Rilis</th>
                        <th class="p-4 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $art)
                        <tr class="hover:bg-slate-50/40 transition-colors">
                            <td class="p-4">
                                @if($art->thumbnail)
                                    <img src="{{ str_starts_with($art->thumbnail, 'http') ? $art->thumbnail : asset($art->thumbnail) }}" alt="{{ $art->title }}" class="w-16 h-10 object-cover rounded-lg border border-slate-100">
                                @else
                                    <div class="w-16 h-10 bg-slate-100 rounded-lg flex items-center justify-center text-slate-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="p-4 font-bold text-slate-700 max-w-[250px] truncate" title="{{ $art->title }}">
                                <a href="{{ route('artikel.show', $art->slug) }}" target="_blank" class="hover:text-[#F5A623] transition-colors">{!! $art->title !!}</a>
                            </td>
                            <td class="p-4 font-semibold text-slate-500">{{ $art->author }}</td>
                            <td class="p-4 text-slate-400 font-semibold">{{ $art->created_at ? $art->created_at->format('d M Y') : '-' }}</td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.artikel.edit', $art->id) }}" class="bg-blue-50 text-blue-700 border border-blue-100 hover:bg-[#1E3A5F] hover:text-white p-2 rounded-xl transition-all" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.artikel.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-50 text-rose-700 border border-rose-100 hover:bg-rose-600 hover:text-white p-2 rounded-xl transition-all" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-12 text-center text-slate-400 font-semibold">Belum ada data artikel terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $articles->links() }}
    </div>
</x-admin-layout>
