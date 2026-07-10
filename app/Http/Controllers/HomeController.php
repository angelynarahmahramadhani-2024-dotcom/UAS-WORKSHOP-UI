<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\User;
use App\Models\KelasPremium;
use App\Services\WordPressService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected WordPressService $wpService;

    public function __construct(WordPressService $wpService)
    {
        $this->wpService = $wpService;
    }

    /**
     * Display the Landing Page.
     */
    public function index()
    {
        if (\Illuminate\Support\Facades\Auth::check()) {
            if (\Illuminate\Support\Facades\Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home.student');
        }

        // 1. Fetch featured scholarships (take 3 active, sorted by closest deadline)
        $featuredScholarships = Beasiswa::where('status', 'aktif')
            ->orderBy('deadline', 'asc')
            ->take(3)
            ->get();

        // 2. Fetch recent articles from WordPress (take 3)
        $recentArticles = $this->wpService->getPosts(3);

        // 3. Compile platform statistics
        $stats = [
            'beasiswa_count' => Beasiswa::where('status', 'aktif')->count(),
            'user_count' => User::where('role', 'mahasiswa')->count(),
            'kelas_count' => KelasPremium::where('status', 'aktif')->count(),
        ];

        return view('welcome', compact('featuredScholarships', 'recentArticles', 'stats'));
    }

    /**
     * Display the Student Home Page.
     */
    public function home()
    {
        // Programmatically run scholarship deadline checks to generate notifications for the user
        try {
            \Illuminate\Support\Facades\Artisan::call('beasiswa:cek-deadline');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Gagal menjalankan beasiswa:cek-deadline: ' . $e->getMessage());
        }

        $user = \Illuminate\Support\Facades\Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $userId = $user->id;

        // 1. Fetch favorited scholarships
        $favorites = \App\Models\Favorit::with('beasiswa')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        // 2. Fetch profile-matched scholarships (matches major or IPK)
        $matchQuery = Beasiswa::where('status', 'aktif');

        if ($user->ipk) {
            $matchQuery->where(function($q) use ($user) {
                $q->where('min_ipk', '<=', $user->ipk)
                  ->orWhereNull('min_ipk');
            });
        }
        if ($user->jurusan) {
            $matchQuery->where(function($q) use ($user) {
                $q->where('jurusan', 'LIKE', '%' . $user->jurusan . '%')
                  ->orWhere('jurusan', 'LIKE', '%Semua%');
            });
        }
        
        $recommendedScholarships = $matchQuery->latest()->take(5)->get();

        // 3. Closest deadlines
        $deadlineScholarships = Beasiswa::where('status', 'aktif')
            ->whereIn('id', array_unique(array_merge(
                $favorites->pluck('beasiswa_id')->toArray(),
                $recommendedScholarships->pluck('id')->toArray()
            )))
            ->where('deadline', '>=', today())
            ->orderBy('deadline', 'asc')
            ->take(3)
            ->get();

        // 4. Premium Classes enrolled
        $enrolledClassIds = \App\Models\Transaksi::where('user_id', $userId)
            ->where('status', 'berhasil')
            ->pluck('kelas_id')
            ->toArray();

        $enrolledClasses = KelasPremium::whereIn('id', $enrolledClassIds)->get();

        // 5. Recommended premium classes (not enrolled yet)
        $recommendedClasses = KelasPremium::where('status', 'aktif')
            ->whereNotIn('id', $enrolledClassIds)
            ->orderBy('rating', 'desc')
            ->take(3)
            ->get();

        return view('home', compact(
            'user', 
            'favorites', 
            'recommendedScholarships', 
            'deadlineScholarships', 
            'enrolledClasses', 
            'recommendedClasses'
        ));
    }
}
