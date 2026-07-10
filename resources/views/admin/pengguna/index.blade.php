<x-admin-layout>
    <x-slot name="title">Manajemen Pengguna</x-slot>
    <x-slot name="header">Manajemen Pengguna</x-slot>

    <!-- Header info -->
    <div>
        <p class="text-sm text-slate-500 font-semibold">Kelola status keaktifan akun mahasiswa terdaftar pada platform FindShip.</p>
    </div>

    <!-- Table Card -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs sm:text-sm">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 uppercase tracking-wider font-bold border-b border-slate-100">
                        <th class="p-4 font-bold">Nama Mahasiswa</th>
                        <th class="p-4 font-bold">Jurusan</th>
                        <th class="p-4 font-bold">IPK</th>
                        <th class="p-4 font-bold">Asal Kampus</th>
                        <th class="p-4 font-bold">Status Akun</th>
                        <th class="p-4 font-bold text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/40 transition-colors">
                            <td class="p-4 font-bold text-slate-700">
                                <p>{{ $user->name }}</p>
                                <p class="text-[10px] text-slate-400 font-semibold mt-0.5">{{ $user->email }}</p>
                            </td>
                            <td class="p-4 text-slate-500 font-medium">{{ $user->jurusan ?? '-' }}</td>
                            <td class="p-4 font-bold text-slate-600">{{ $user->ipk ? number_format($user->ipk, 2) : '-' }}</td>
                            <td class="p-4 text-slate-500 font-medium">{{ $user->asal_kampus ?? '-' }}</td>
                            <td class="p-4">
                                @if($user->status === 'aktif')
                                    <span class="px-2.5 py-1 text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full uppercase">Aktif</span>
                                @else
                                    <span class="px-2.5 py-1 text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-100 rounded-full uppercase">Nonaktif</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center">
                                    <form action="{{ route('admin.pengguna.toggle', $user->id) }}" method="POST" onsubmit="return confirm('{{ $user->status === 'aktif' ? 'Yakin ingin menonaktifkan akun ' . $user->name . '? User akan langsung ter-logout.' : 'Apakah Anda yakin ingin mengaktifkan akun ' . $user->name . '?' }}')">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold transition-all border shadow-sm {{ $user->status === 'aktif' ? 'bg-rose-50 hover:bg-rose-600 border-rose-200 text-rose-700 hover:text-white' : 'bg-emerald-50 hover:bg-emerald-600 border-emerald-200 text-emerald-700 hover:text-white' }}">
                                            {{ $user->status === 'aktif' ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-slate-400 font-semibold">Belum ada pengguna terdaftar dengan role mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pt-4">
        {{ $users->links() }}
    </div>
</x-admin-layout>
