<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'mahasiswa')
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.pengguna.index', compact('users'));
    }

    public function toggleStatus(int $id)
    {
        $user = User::where('role', 'mahasiswa')->findOrFail($id);
        
        // Prevent deactivating own account
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Kamu tidak bisa menonaktifkan akunmu sendiri.');
        }
        
        $newStatus = $user->status === 'aktif' ? 'nonaktif' : 'aktif';
        $user->update(['status' => $newStatus]);

        if ($newStatus === 'nonaktif') {
            // Send deactivation notification
            \App\Models\Notifikasi::kirim(
                $user->id,
                '🔒 Akun Dinonaktifkan',
                'Akun FindShip kamu telah dinonaktifkan oleh admin. Hubungi kami jika ada pertanyaan.',
                'akun',
                null
            );

            // Force session logout by deleting from sessions table
            \Illuminate\Support\Facades\DB::table('sessions')->where('user_id', $user->id)->delete();
        }

        $message = $newStatus === 'aktif' 
            ? "Akun {$user->name} berhasil diaktifkan." 
            : "Akun {$user->name} berhasil dinonaktifkan.";
        
        return back()->with('status', $message);
    }
}
