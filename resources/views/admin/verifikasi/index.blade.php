<x-admin-layout>
    <x-slot name="title">Verifikasi Pembayaran</x-slot>
    <x-slot name="header">Verifikasi Pembayaran</x-slot>

    <!-- Header info -->
    <div>
        <p class="text-sm text-slate-500 font-semibold">Tinjau unggahan bukti bayar mahasiswa dan berikan akses ke kelas premium.</p>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 uppercase tracking-wider font-bold border-b border-slate-100">
                        <th class="p-4 font-bold">Tanggal</th>
                        <th class="p-4 font-bold">Nama Mahasiswa</th>
                        <th class="p-4 font-bold">Program Kelas</th>
                        <th class="p-4 font-bold">Investasi</th>
                        <th class="p-4 font-bold">Bukti Transfer</th>
                        <th class="p-4 font-bold">Status</th>
                        <th class="p-4 font-bold text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($transactions as $tx)
                        <tr class="hover:bg-slate-50/40 transition-colors">
                            <td class="p-4 font-medium text-slate-500">{{ $tx->created_at->format('d M Y, H:i') }} WIB</td>
                            <td class="p-4 font-bold text-slate-700">
                                <p>{{ $tx->user->name ?? 'User' }}</p>
                                <p class="text-[10px] text-slate-400 font-semibold mt-0.5">{{ $tx->user->email ?? '' }}</p>
                            </td>
                            <td class="p-4 font-semibold text-slate-600 leading-snug">{{ $tx->kelas->judul ?? 'Kelas' }}</td>
                            <td class="p-4 font-extrabold text-[#F5A623]">Rp{{ number_format($tx->kelas->harga ?? 0, 0, ',', '.') }}</td>
                            <td class="p-4">
                                @if($tx->bukti_bayar)
                                    <a href="{{ asset($tx->bukti_bayar) }}" target="_blank" rel="noopener noreferrer" class="text-[#1E3A5F] hover:text-[#F5A623] font-bold underline inline-flex items-center gap-1">
                                        Lihat Berkas
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @else
                                    <span class="text-rose-500 font-bold bg-rose-50 px-2.5 py-1 rounded border border-rose-100">Belum Unggah</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if($tx->status === 'berhasil')
                                    <span class="px-2.5 py-1 text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full uppercase">Berhasil</span>
                                @elseif($tx->status === 'ditolak')
                                    <span class="px-2.5 py-1 text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-100 rounded-full uppercase">Ditolak</span>
                                @else
                                    <span class="px-2.5 py-1 text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100 rounded-full uppercase animate-pulse">Menunggu</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if($tx->status === 'menunggu')
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Approve form -->
                                        <form action="{{ route('admin.verifikasi.approve', $tx->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENYETUJUI transaksi ini?')">
                                            @csrf
                                            <button type="submit" class="bg-emerald-50 hover:bg-emerald-600 border border-emerald-200 text-emerald-700 hover:text-white px-3 py-1.5 rounded-xl text-xs font-bold transition-all">
                                                Setujui
                                            </button>
                                        </form>

                                        <!-- Reject form -->
                                        <form action="{{ route('admin.verifikasi.reject', $tx->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin MENOLAK transaksi ini?')">
                                            @csrf
                                            <button type="submit" class="bg-rose-50 hover:bg-rose-600 border border-rose-200 text-rose-700 hover:text-white px-3 py-1.5 rounded-xl text-xs font-bold transition-all">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="text-center text-slate-400 font-semibold">-</div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-slate-400 font-semibold">Belum ada transaksi pembayaran masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $transactions->links() }}
    </div>
</x-admin-layout>
