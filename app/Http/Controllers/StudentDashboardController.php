<?php

namespace App\Http\Controllers;

use App\Models\Favorit;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Display the Student Dashboard.
     */
    public function index()
    {
        if (Auth::user() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $userId = Auth::id();

        // Fetch user's favorited scholarships
        $favorites = Favorit::with('beasiswa')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        // Fetch user's class purchase transactions
        $transactions = Transaksi::with('kelas')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('dashboard', compact('favorites', 'transactions'));
    }
}
