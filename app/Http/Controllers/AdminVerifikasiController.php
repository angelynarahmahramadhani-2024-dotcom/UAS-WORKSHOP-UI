<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminVerifikasiController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::with(['user', 'kelas'])
            ->orderByRaw("FIELD(status, 'menunggu', 'berhasil', 'ditolak')")
            ->latest()
            ->paginate(15);

        return view('admin.verifikasi.index', compact('transactions'));
    }

    public function approve(int $id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->update(['status' => 'berhasil']);

        // Send payment approval notification
        \App\Models\Notifikasi::kirim(
            $transaction->user_id,
            '✅ Pembayaran Diverifikasi!',
            'Pembayaran kelas ' . $transaction->kelas->judul . ' telah dikonfirmasi. Kamu sekarang bisa mengakses materi.',
            'transaksi',
            '/kelas/' . $transaction->kelas_id
        );

        return back()->with('status', 'Transaksi berhasil disetujui. Akses kelas premium dibuka.');
    }

    public function reject(int $id)
    {
        $transaction = Transaksi::findOrFail($id);
        $transaction->update(['status' => 'ditolak']);

        // Send payment rejection notification
        \App\Models\Notifikasi::kirim(
            $transaction->user_id,
            '❌ Pembayaran Ditolak',
            'Pembayaran kelas ' . $transaction->kelas->judul . ' ditolak. Silakan upload ulang bukti transfer yang valid.',
            'transaksi',
            '/kelas/' . $transaction->kelas_id . '/checkout'
        );

        return back()->with('status', 'Transaksi ditolak. Pengguna diwajibkan mengunggah ulang bukti bayar.');
    }
}
