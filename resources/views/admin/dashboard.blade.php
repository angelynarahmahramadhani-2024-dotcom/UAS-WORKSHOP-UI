<x-admin-layout>
    <x-slot name="title">Dashboard Utama</x-slot>
    <x-slot name="header">Dashboard Utama</x-slot>

    <!-- Metrics Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
        <!-- Card 1: Beasiswa Terdaftar -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Beasiswa Terdaftar</p>
                <div class="w-10 h-10 bg-blue-50 text-[#1E3A5F] rounded-xl flex items-center justify-center border border-blue-100 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-4-9 4 9 5z"></path></svg>
                </div>
            </div>
            <div class="mt-4 space-y-1">
                <p class="text-2xl font-extrabold text-[#1E3A5F]">{{ $stats['beasiswa_count'] ?? 0 }}</p>
                <div class="flex items-center gap-1">
                    @if(($trends['beasiswa'] ?? 0) > 0)
                        <span class="text-[10px] font-extrabold text-emerald-600 flex items-center bg-emerald-50 px-1.5 py-0.5 rounded-md">
                            ▲ +{{ $trends['beasiswa'] }}
                        </span>
                        <span class="text-[10px] text-slate-400 font-bold">baru mgg ini</span>
                    @else
                        <span class="text-[10px] font-extrabold text-slate-400 bg-slate-50 px-1.5 py-0.5 rounded-md">Statis</span>
                        <span class="text-[10px] text-slate-400 font-bold">no info</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 2: Pengguna Mahasiswa -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Pengguna Aktif</p>
                <div class="w-10 h-10 bg-indigo-50 text-indigo-700 rounded-xl flex items-center justify-center border border-indigo-100 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 space-y-1">
                <p class="text-2xl font-extrabold text-[#1E3A5F]">{{ $stats['user_count'] ?? 0 }}</p>
                <div class="flex items-center gap-1">
                    @if(($trends['user'] ?? 0) > 0)
                        <span class="text-[10px] font-extrabold text-emerald-600 flex items-center bg-emerald-50 px-1.5 py-0.5 rounded-md">
                            ▲ +{{ $trends['user'] }}
                        </span>
                        <span class="text-[10px] text-slate-400 font-bold">mgg ini</span>
                    @else
                        <span class="text-[10px] font-extrabold text-slate-400 bg-slate-50 px-1.5 py-0.5 rounded-md">Stabil</span>
                        <span class="text-[10px] text-slate-400 font-bold">tidak ada baru</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 3: Total Transaksi -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total Transaksi</p>
                <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-xl flex items-center justify-center border border-teal-100 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                </div>
            </div>
            <div class="mt-4 space-y-1">
                <p class="text-2xl font-extrabold text-[#1E3A5F]">{{ $stats['transaksi_count'] ?? 0 }}</p>
                <div class="flex items-center gap-1">
                    @if(($trends['transaksi'] ?? 0) > 0)
                        <span class="text-[10px] font-extrabold text-emerald-600 flex items-center bg-emerald-50 px-1.5 py-0.5 rounded-md">
                            ▲ +{{ $trends['transaksi'] }}
                        </span>
                        <span class="text-[10px] text-slate-400 font-bold">transaksi baru</span>
                    @else
                        <span class="text-[10px] font-extrabold text-slate-400 bg-slate-50 px-1.5 py-0.5 rounded-md">Konstan</span>
                        <span class="text-[10px] text-slate-400 font-bold">tiada transaksi</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 4: Menunggu Verifikasi -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Menunggu Verifikasi</p>
                <div class="w-10 h-10 {{ ($stats['pending_transaksi_count'] ?? 0) > 0 ? 'bg-amber-100 text-amber-800 animate-pulse border border-amber-200' : 'bg-slate-50 text-slate-400 border border-slate-100' }} rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 space-y-1">
                <p class="text-2xl font-extrabold {{ ($stats['pending_transaksi_count'] ?? 0) > 0 ? 'text-[#F5A623]' : 'text-[#1E3A5F]' }}">{{ $stats['pending_transaksi_count'] ?? 0 }}</p>
                <div class="flex items-center gap-1">
                    @if(($trends['pending'] ?? 0) > 0)
                        <span class="text-[10px] font-extrabold text-amber-600 bg-amber-50 px-1.5 py-0.5 rounded-md">
                            ▲ +{{ $trends['pending'] }}
                        </span>
                        <span class="text-[10px] text-amber-700 font-bold">24 jam terakhir</span>
                    @else
                        <span class="text-[10px] font-extrabold text-slate-400 bg-slate-50 px-1.5 py-0.5 rounded-md">Clear</span>
                        <span class="text-[10px] text-slate-400 font-bold">semua terverifikasi</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Card 5: Total Pendapatan (NEW CARD) -->
        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Total Pendapatan</p>
                <div class="w-10 h-10 bg-amber-50 text-[#F5A623] rounded-xl flex items-center justify-center border border-amber-100 shrink-0">
                    <span class="font-extrabold text-xs">Rp</span>
                </div>
            </div>
            <div class="mt-4 space-y-1">
                <p class="text-xl font-extrabold text-[#1E3A5F] truncate" title="Rp{{ number_format($stats['total_revenue'] ?? 0, 0, ',', '.') }}">
                    Rp{{ number_format($stats['total_revenue'] ?? 0, 0, ',', '.') }}
                </p>
                <div class="flex items-center gap-1">
                    @if(($trends['revenue'] ?? 0) > 0)
                        <span class="text-[10px] font-extrabold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded-md">
                            ▲ +Rp{{ number_format($trends['revenue'], 0, ',', '.') }}
                        </span>
                        <span class="text-[10px] text-slate-400 font-bold">mgg ini</span>
                    @else
                        <span class="text-[10px] font-extrabold text-slate-400 bg-slate-50 px-1.5 py-0.5 rounded-md">Rp0</span>
                        <span class="text-[10px] text-slate-400 font-bold">belum bertambah</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Baris 2: Interactive Revenue Chart & Distributions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left: Revenue Chart Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4 lg:col-span-2">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div class="space-y-0.5">
                    <h3 class="text-base font-bold text-[#1E3A5F]">Tren Pendapatan Bimbingan</h3>
                    <p class="text-xs text-slate-400 font-semibold">Statistik nominal transaksi berhasil</p>
                </div>
                <!-- Time Range Filter -->
                <div>
                    <select id="timeRangeFilter" onchange="updateRevenueChart(this.value)" class="text-xs font-extrabold text-slate-600 bg-slate-150 border border-slate-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#1E3A5F]">
                        <option value="7days">7 Hari Terakhir</option>
                        <option value="30days" selected>30 Hari Terakhir</option>
                        <option value="1year">1 Tahun Terakhir</option>
                    </select>
                </div>
            </div>
            <!-- Canvas Container -->
            <div class="relative h-[300px] w-full">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Right: Donut Distribution Charts -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-[#1E3A5F]">Distribusi Data</h3>
                <p class="text-xs text-slate-400 font-semibold">Status Transaksi & Kategori Beasiswa</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4 flex-1 items-center">
                <!-- Status Donut -->
                <div class="flex flex-col items-center justify-center space-y-3">
                    <div class="relative w-28 h-28">
                        <canvas id="statusChart"></canvas>
                    </div>
                    <span class="text-xs font-extrabold text-[#1E3A5F] text-center">Transaksi</span>
                </div>

                <!-- Kategori Donut -->
                <div class="flex flex-col items-center justify-center space-y-3">
                    <div class="relative w-28 h-28">
                        <canvas id="kategoriChart"></canvas>
                    </div>
                    <span class="text-xs font-extrabold text-[#1E3A5F] text-center">Kategori Beasiswa</span>
                </div>
            </div>

            <!-- Legends Indicators -->
            <div class="grid grid-cols-2 gap-x-4 gap-y-1.5 pt-4 border-t border-slate-150 text-[10px] font-bold text-slate-500">
                <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block"></span>
                    <span>Berhasil</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#1E3A5F] inline-block"></span>
                    <span>Dalam Negeri</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#F5A623] inline-block"></span>
                    <span>Menunggu</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-400 inline-block"></span>
                    <span>Luar Negeri</span>
                </div>
                <div class="flex items-center gap-1.5 col-span-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500 inline-block"></span>
                    <span>Ditolak</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Baris 3: Best Sellers & Recent Lists -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Column 1: Top 5 Kelas Premium Terlaris -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="text-base font-bold text-[#1E3A5F]">Top 5 Kelas Terlaris</h3>
                <p class="text-xs text-slate-400 font-semibold">Paling banyak dibeli mahasiswa</p>
            </div>
            
            <div class="divide-y divide-slate-100 flex-1">
                @forelse($topClasses as $index => $tc)
                    <div class="py-3 flex items-center gap-3.5 hover:bg-slate-50/50 px-2 rounded-xl transition-all">
                        <!-- Rank Badge -->
                        @php
                            $rankColors = [
                                0 => 'bg-amber-100 text-amber-700 border-amber-200', // Gold
                                1 => 'bg-slate-100 text-slate-700 border-slate-200', // Silver
                                2 => 'bg-orange-100 text-orange-700 border-orange-200', // Bronze
                            ];
                            $defaultColor = 'bg-slate-50 text-slate-500 border-slate-150';
                            $rankColor = $rankColors[$index] ?? $defaultColor;
                        @endphp
                        <span class="w-7 h-7 rounded-full border flex items-center justify-center font-extrabold text-xs {{ $rankColor }} shrink-0">
                            #{{ $index + 1 }}
                        </span>
                        
                        <div class="min-w-0 flex-1">
                            <h4 class="text-xs font-bold text-slate-700 truncate" title="{{ $tc->kelas->judul ?? 'Kelas Premium' }}">
                                {{ $tc->kelas->judul ?? 'Kelas Premium' }}
                            </h4>
                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">{{ $tc->kelas->kategori ?? 'Umum' }}</span>
                        </div>
                        
                        <div class="text-right shrink-0">
                            <span class="text-xs font-extrabold text-[#1E3A5F] block">{{ $tc->total_sales }} Terjual</span>
                            <span class="text-[9px] text-[#F5A623] font-bold">Rp{{ number_format($tc->kelas->harga ?? 0, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="text-center p-8 text-slate-400 font-medium">
                        Belum ada kelas terjual.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Column 2 & 3 Combined or Side-by-Side inside a lg:col-span-2 container -->
        <div class="xl:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8">
            <!-- Table 1: Recent Transactions -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="text-base font-bold text-[#1E3A5F]">Transaksi Terbaru</h3>
                    <a href="{{ route('admin.verifikasi.index') }}" class="text-xs font-extrabold text-[#1E3A5F] hover:text-[#F5A623] transition-colors">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 uppercase tracking-wider font-bold">
                                <th class="p-3 rounded-l-xl">User</th>
                                <th class="p-3">Kelas</th>
                                <th class="p-3">Bukti</th>
                                <th class="p-3 rounded-r-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($recentTransactions as $tx)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="p-3 font-bold text-slate-700 truncate max-w-[80px]" title="{{ $tx->user->name ?? 'User' }}">{{ $tx->user->name ?? 'User' }}</td>
                                    <td class="p-3 font-semibold text-slate-500 truncate max-w-[100px]" title="{{ $tx->kelas->judul ?? 'Kelas' }}">{{ $tx->kelas->judul ?? 'Kelas' }}</td>
                                    <td class="p-3">
                                        @if($tx->bukti_bayar)
                                            <a href="{{ asset($tx->bukti_bayar) }}" target="_blank" rel="noopener noreferrer" class="text-[#1E3A5F] hover:text-[#F5A623] font-extrabold underline">Lihat</a>
                                        @else
                                            <span class="text-slate-400 font-bold">N/A</span>
                                        @endif
                                    </td>
                                    <td class="p-3">
                                        @if($tx->status === 'berhasil')
                                            <span class="px-2 py-0.5 text-[9px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full uppercase">OK</span>
                                        @elseif($tx->status === 'ditolak')
                                            <span class="px-2 py-0.5 text-[9px] font-extrabold bg-rose-50 text-rose-700 border border-rose-100 rounded-full uppercase">NO</span>
                                        @else
                                            <span class="px-2 py-0.5 text-[9px] font-extrabold bg-amber-50 text-amber-700 border border-amber-100 rounded-full uppercase">Wait</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-slate-400 font-medium">Belum ada transaksi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 2: Recent Scholarships -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <h3 class="text-base font-bold text-[#1E3A5F]">Beasiswa Terbaru</h3>
                    <a href="{{ route('admin.beasiswa.index') }}" class="text-xs font-extrabold text-[#1E3A5F] hover:text-[#F5A623] transition-colors">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50 text-slate-400 uppercase tracking-wider font-bold">
                                <th class="p-3 rounded-l-xl">Judul</th>
                                <th class="p-3">Kat.</th>
                                <th class="p-3">Jenjang</th>
                                <th class="p-3 rounded-r-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($recentScholarships as $beasiswa)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="p-3 font-bold text-slate-700 truncate max-w-[100px]" title="{{ $beasiswa->judul }}">{{ $beasiswa->judul }}</td>
                                    <td class="p-3 text-slate-500 font-bold capitalize truncate max-w-[60px]">{{ $beasiswa->kategori }}</td>
                                    <td class="p-3 font-extrabold text-slate-600">{{ $beasiswa->jenjang }}</td>
                                    <td class="p-3">
                                        @if($beasiswa->status === 'aktif')
                                            <span class="px-2 py-0.5 text-[9px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full uppercase">Aktif</span>
                                        @else
                                            <span class="px-2 py-0.5 text-[9px] font-extrabold bg-slate-100 text-slate-500 border border-slate-200 rounded-full uppercase">Off</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-8 text-center text-slate-400 font-medium">Belum ada beasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Library and Rendering Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // 1. Data configuration injected from Backend
        const chartData = {
            '7days': {
                labels: @json(collect($revenue7Days)->pluck('label')),
                values: @json(collect($revenue7Days)->pluck('value'))
            },
            '30days': {
                labels: @json(collect($revenue30Days)->pluck('label')),
                values: @json(collect($revenue30Days)->pluck('value'))
            },
            '1year': {
                labels: @json(collect($revenue1Year)->pluck('label')),
                values: @json(collect($revenue1Year)->pluck('value'))
            }
        };

        let revenueChart = null;

        // Initialize Revenue Chart
        function initRevenueChart() {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            
            // Build linear gradient for high aesthetics
            const gradient = ctx.createLinearGradient(0, 0, 0, 300);
            gradient.addColorStop(0, 'rgba(30, 58, 95, 0.25)'); // Navy
            gradient.addColorStop(1, 'rgba(245, 166, 35, 0.02)');  // Gold-Orange

            revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData['30days'].labels,
                    datasets: [{
                        label: 'Pendapatan (Rp)',
                        data: chartData['30days'].values,
                        borderColor: '#1E3A5F', // Deep Navy
                        borderWidth: 3.5,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#F5A623', // Gold
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let value = context.raw;
                                    return ' ' + new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(value);
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            grid: { color: 'rgba(226, 232, 240, 0.6)' },
                            ticks: {
                                font: { weight: 'bold', size: 10 },
                                callback: function(value) {
                                    if (value >= 1000000) return 'Rp' + (value / 1000000) + 'M';
                                    if (value >= 1000) return 'Rp' + (value / 1000) + 'K';
                                    return 'Rp' + value;
                                }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { weight: 'bold', size: 9 } }
                        }
                    }
                }
            });
        }

        // Dropdown Switcher Event
        function updateRevenueChart(range) {
            if (!revenueChart || !chartData[range]) return;
            
            revenueChart.data.labels = chartData[range].labels;
            revenueChart.data.datasets[0].data = chartData[range].values;
            revenueChart.update();
        }

        // 2. Distributions Charts Setup
        function initDistributionCharts() {
            // Status Donut Chart
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Berhasil', 'Menunggu', 'Ditolak'],
                    datasets: [{
                        data: [
                            {{ $distributions['status']['berhasil'] ?? 0 }},
                            {{ $distributions['status']['menunggu'] ?? 0 }},
                            {{ $distributions['status']['ditolak'] ?? 0 }}
                        ],
                        backgroundColor: ['#10B981', '#F5A623', '#EF4444'],
                        borderWidth: 2,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.label + ': ' + context.raw + ' transaksi';
                                }
                            }
                        }
                    },
                    cutout: '68%'
                }
            });

            // Kategori Donut Chart
            const katCtx = document.getElementById('kategoriChart').getContext('2d');
            new Chart(katCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Dalam Negeri', 'Luar Negeri'],
                    datasets: [{
                        data: [
                            {{ $distributions['kategori']['dalam_negeri'] ?? 0 }},
                            {{ $distributions['kategori']['luar_negeri'] ?? 0 }}
                        ],
                        backgroundColor: ['#1E3A5F', '#FBBD23'],
                        borderWidth: 2,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ' ' + context.label + ': ' + context.raw + ' beasiswa';
                                }
                            }
                        }
                    },
                    cutout: '68%'
                }
            });
        }

        // Fire once loaded
        window.addEventListener('DOMContentLoaded', () => {
            initRevenueChart();
            initDistributionCharts();
        });
    </script>
</x-admin-layout>
