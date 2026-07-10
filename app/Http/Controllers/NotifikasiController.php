<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    /**
     * Display listing of notifications.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $filter = $request->query('filter', 'semua');

        $query = $user->notifikasi();

        if ($filter === 'belum_dibaca') {
            $query->where('is_read', false);
        } elseif ($filter === 'deadline') {
            $query->where('tipe', 'deadline');
        } elseif ($filter === 'transaksi') {
            $query->where('tipe', 'transaksi');
        }

        $notifikasi = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        // Mark all unread notifications as read when the list page is opened
        $user->notifikasi()->where('is_read', false)->update(['is_read' => true]);

        return view('notifikasi.index', compact('notifikasi', 'filter'));
    }

    /**
     * Mark a single notification as read.
     */
    public function baca($id)
    {
        Notifikasi::where('id', $id)
            ->where('user_id', Auth::id())
            ->update(['is_read' => true]);

        return redirect()->back();
    }

    /**
     * Mark single notification as read and redirect to target URL.
     */
    public function readAndRedirect($id)
    {
        $notif = Notifikasi::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notif->update(['is_read' => true]);

        return redirect($notif->url ?? route('notifikasi.index'));
    }

    /**
     * Mark all user notifications as read.
     */
    public function bacaSemua()
    {
        Auth::user()->notifikasi()
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return redirect()->back()->with('status', 'Semua notifikasi ditandai sebagai dibaca');
    }

    /**
     * Delete all notifications of current user.
     */
    public function hapusSemua()
    {
        Auth::user()->notifikasi()->delete();

        return redirect()->back()->with('status', 'Semua notifikasi berhasil dihapus');
    }

    /**
     * Get the number of unread notifications and the latest 5 notifications in JSON format.
     */
    public function getUnreadJson()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['unread_count' => 0, 'notifications' => []]);
        }

        $unreadCount = $user->unreadNotifikasi()->count();
        $notifications = $user->notifikasi()
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($notif) {
                return [
                    'id' => $notif->id,
                    'judul' => $notif->judul,
                    'pesan' => $notif->pesan,
                    'tipe' => $notif->tipe,
                    'url' => route('notifikasi.go', $notif->id),
                    'is_read' => (bool)$notif->is_read,
                    'time_ago' => $notif->created_at->diffForHumans(),
                ];
            });

        return response()->json([
            'unread_count' => $unreadCount,
            'notifications' => $notifications,
        ]);
    }

    /**
     * Store a notification when user adds a class to their cart.
     */
    public function tambahKeranjang(Request $request)
    {
        $judul = $request->input('judul', 'Kelas Premium');
        
        $notif = Notifikasi::kirim(
            Auth::id(),
            '🛒 Kelas Ditambahkan ke Keranjang',
            'Kelas "' . $judul . '" telah berhasil ditambahkan ke keranjang belanja Anda.',
            'transaksi',
            route('kelas.cart')
        );

        return response()->json([
            'success' => true,
            'notification' => $notif
        ]);
    }
}
