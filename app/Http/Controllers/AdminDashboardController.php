<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\User;
use App\Models\KelasPremium;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display the Admin Dashboard.
     */
    public function index()
    {
        // 1. Core stats
        $stats = [
            'beasiswa_count' => Beasiswa::count(),
            'user_count' => User::where('role', 'mahasiswa')->count(),
            'transaksi_count' => Transaksi::count(),
            'pending_transaksi_count' => Transaksi::where('status', 'menunggu')->count(),
            'total_revenue' => Transaksi::where('status', 'berhasil')->sum('total_amount'),
        ];

        // 2. Trend stats (last 7 days / last 24h)
        $trends = [
            'beasiswa' => Beasiswa::where('created_at', '>=', now()->subDays(7))->count(),
            'user' => User::where('role', 'mahasiswa')->where('created_at', '>=', now()->subDays(7))->count(),
            'transaksi' => Transaksi::where('created_at', '>=', now()->subDays(7))->count(),
            'pending' => Transaksi::where('status', 'menunggu')->where('created_at', '>=', now()->subDays(1))->count(),
            'revenue' => Transaksi::where('status', 'berhasil')->where('created_at', '>=', now()->subDays(7))->sum('total_amount'),
        ];

        // 3. Revenue Chart Data (7 Days, 30 Days, 1 Year) - Database agnostic grouping via PHP Collection
        $allSuccessfulTx = Transaksi::where('status', 'berhasil')
            ->where('created_at', '>=', now()->subMonths(12))
            ->get();

        // 7 Days daily
        $revenue7Days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateStr = $date->format('Y-m-d');
            $label = $date->format('d M');
            $sum = $allSuccessfulTx->filter(function($tx) use ($dateStr) {
                return $tx->created_at->format('Y-m-d') === $dateStr;
            })->sum('total_amount');
            $revenue7Days[] = ['label' => $label, 'value' => (float)$sum];
        }

        // 30 Days daily
        $revenue30Days = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dateStr = $date->format('Y-m-d');
            $label = $date->format('d M');
            $sum = $allSuccessfulTx->filter(function($tx) use ($dateStr) {
                return $tx->created_at->format('Y-m-d') === $dateStr;
            })->sum('total_amount');
            $revenue30Days[] = ['label' => $label, 'value' => (float)$sum];
        }

        // 1 Year monthly
        $revenue1Year = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $monthStr = $month->format('Y-m');
            $label = $month->format('M Y');
            $sum = $allSuccessfulTx->filter(function($tx) use ($monthStr) {
                return $tx->created_at->format('Y-m') === $monthStr;
            })->sum('total_amount');
            $revenue1Year[] = ['label' => $label, 'value' => (float)$sum];
        }

        // 4. Distributions
        $distributions = [
            'status' => [
                'berhasil' => Transaksi::where('status', 'berhasil')->count(),
                'menunggu' => Transaksi::where('status', 'menunggu')->count(),
                'ditolak' => Transaksi::where('status', 'ditolak')->count(),
            ],
            'kategori' => [
                'dalam_negeri' => Beasiswa::where('kategori', 'dalam negeri')->count(),
                'luar_negeri' => Beasiswa::where('kategori', 'luar negeri')->count(),
            ]
        ];

        // 5. Top 5 Best Selling Premium Classes
        $topClasses = Transaksi::where('status', 'berhasil')
            ->selectRaw('kelas_id, COUNT(*) as total_sales')
            ->groupBy('kelas_id')
            ->orderBy('total_sales', 'desc')
            ->with('kelas')
            ->take(5)
            ->get();

        // 6. Recent tables (existing logic)
        $recentTransactions = Transaksi::with(['user', 'kelas'])
            ->latest()
            ->take(5)
            ->get();

        $recentScholarships = Beasiswa::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'trends',
            'revenue7Days',
            'revenue30Days',
            'revenue1Year',
            'distributions',
            'topClasses',
            'recentTransactions',
            'recentScholarships'
        ));
    }
}
