<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Favorit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    /**
     * Display a list of scholarships with search and filters.
     */
    public function index(Request $request)
    {
        $query = Beasiswa::where('status', 'aktif');

        // Filter: Keyword (judul atau penyelenggara)
        if ($request->filled('q')) {
            $keyword = $request->input('q');
            $query->where(function($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('penyelenggara', 'like', "%{$keyword}%")
                  ->orWhere('deskripsi', 'like', "%{$keyword}%");
            });
        }

        // Filter: Kategori (dalam negeri / luar negeri)
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        // Filter: Jenjang (S1, S2, S3, D3)
        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->input('jenjang'));
        }

        // Filter: Min IPK (tampilkan beasiswa yang min_ipk <= ipk pencari)
        if ($request->filled('min_ipk')) {
            $query->where(function($q) use ($request) {
                $q->where('min_ipk', '<=', $request->input('min_ipk'))
                  ->orWhereNull('min_ipk');
            });
        }

        // Filter: Jurusan (cocok dengan jurusan spesifik ATAU 'Semua Jurusan')
        if ($request->filled('jurusan')) {
            $jurusan = $request->input('jurusan');
            $query->where(function($q) use ($jurusan) {
                $q->where('jurusan', 'like', "%{$jurusan}%")
                  ->orWhere('jurusan', 'Semua Jurusan');
            });
        }

        // Urutkan berdasarkan deadline terdekat yang belum lewat
        $query->orderBy('deadline', 'asc');

        $scholarships = $query->paginate(6)->withQueryString();

        return view('scholarships.index', compact('scholarships'));
    }

    /**
     * Display details of a scholarship.
     */
    public function show(int $id)
    {
        $scholarship = Beasiswa::where('status', 'aktif')->findOrFail($id);

        // Calculate countdown
        $today = now()->startOfDay();
        $deadline = $scholarship->deadline->startOfDay();
        
        if ($today->gt($deadline)) {
            $daysLeft = -1; // Already passed
        } else {
            $daysLeft = $today->diffInDays($deadline);
        }

        // Check if current authenticated user has favorited this scholarship
        $isFavorited = false;
        if (Auth::check()) {
            $isFavorited = Favorit::where('user_id', Auth::id())
                ->where('beasiswa_id', $id)
                ->exists();
        }

        return view('scholarships.show', compact('scholarship', 'daysLeft', 'isFavorited'));
    }

    /**
     * Toggle favorite status (AJAX or normal POST).
     */
    public function toggleFavorite(int $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk menyimpan favorit.');
        }

        $userId = Auth::id();
        $favorite = Favorit::where('user_id', $userId)
            ->where('beasiswa_id', $id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Beasiswa dihapus dari daftar favorit.';
        } else {
            Favorit::create([
                'user_id' => $userId,
                'beasiswa_id' => $id,
            ]);
            $message = 'Beasiswa berhasil disimpan ke favorit.';
        }

        return back()->with('status', $message);
    }
}
