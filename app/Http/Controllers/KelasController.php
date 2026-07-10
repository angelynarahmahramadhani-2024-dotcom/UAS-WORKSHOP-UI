<?php

namespace App\Http\Controllers;

use App\Models\KelasPremium;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of active premium classes.
     */
    public function index(Request $request)
    {
        $kategori = $request->query('kategori', 'Semua');
        $sort = $request->query('sort', 'terpopuler');

        $query = KelasPremium::where('status', 'aktif');

        if ($kategori && $kategori !== 'Semua') {
            $query->where('kategori', $kategori);
        }

        if ($sort === 'termurah') {
            $query->orderBy('harga', 'asc');
        } elseif ($sort === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        } else {
            // Default: Terpopuler / Best Rating
            $query->orderBy('rating', 'desc');
        }

        $classes = $query->get();
        return view('kelas.index', compact('classes', 'kategori', 'sort'));
    }

    /**
     * Display details of a specific premium class.
     */
    public function show(int $id)
    {
        $class = KelasPremium::where('status', 'aktif')->findOrFail($id);
        
        $sudahBerlangganan = false;
        $transaction = null;

        if (Auth::check()) {
            $transaction = Transaksi::where('user_id', Auth::id())
                ->where('kelas_id', $id)
                ->latest()
                ->first();
            $sudahBerlangganan = $transaction && $transaction->status === 'berhasil';
        }

        return view('kelas.show', compact('class', 'transaction', 'sudahBerlangganan'));
    }

    /**
     * Display checkout page for premium class.
     */
    public function showCheckout(int $id)
    {
        $class = KelasPremium::where('status', 'aktif')->findOrFail($id);
        $userId = Auth::id();

        // Check if there's already a transaction
        $existing = Transaksi::where('user_id', $userId)
            ->where('kelas_id', $id)
            ->first();

        if ($existing) {
            if ($existing->status === 'berhasil') {
                return redirect()->route('kelas.show', $id)->with('error', 'Anda sudah membeli kelas ini.');
            } elseif ($existing->status === 'menunggu') {
                if ($existing->bukti_bayar) {
                    return redirect()->route('transaksi.riwayat')->with('status', 'Pemesanan Anda sedang diverifikasi admin.');
                } else {
                    // Has pending order but hasn't uploaded payment proof, redirect to upload page directly
                    return redirect()->route('kelas.upload-bukti', $id);
                }
            }
        }

        return view('kelas.checkout', compact('class'));
    }

    /**
     * Process checkout and create transaction record.
     */
    public function processCheckout(Request $request, int $id)
    {
        $class = KelasPremium::where('status', 'aktif')->findOrFail($id);
        $userId = Auth::id();
        $paymentMethod = $request->input('payment_method', 'bank');

        $existing = Transaksi::where('user_id', $userId)
            ->where('kelas_id', $id)
            ->first();

        if (!$existing) {
            $existing = Transaksi::create([
                'user_id' => $userId,
                'kelas_id' => $id,
                'bukti_bayar' => null,
                'status' => 'menunggu',
                'payment_method' => $paymentMethod,
                'total_amount' => $class->harga,
            ]);

            // Send notification for transaction created
            \App\Models\Notifikasi::kirim(
                $userId,
                '💳 Menunggu Pembayaran',
                'Menunggu pembayaran untuk kelas premium "' . $class->judul . '". Silakan upload bukti pembayaran.',
                'transaksi',
                route('kelas.upload-bukti', $id)
            );
        } elseif ($existing->status === 'berhasil') {
            return redirect()->route('kelas.show', $id)->with('error', 'Anda sudah membeli kelas ini.');
        } elseif ($existing->status === 'menunggu' && $existing->bukti_bayar) {
            return redirect()->route('transaksi.riwayat')->with('status', 'Pemesanan Anda sedang diverifikasi admin.');
        } else {
            $existing->update([
                'payment_method' => $paymentMethod,
                'total_amount' => $class->harga,
            ]);
        }

        return redirect()->route('kelas.upload-bukti', $id);
    }

    /**
     * Display upload payment proof page.
     */
    public function showUploadBukti(int $id)
    {
        $class = KelasPremium::where('status', 'aktif')->findOrFail($id);
        $userId = Auth::id();

        $transaction = Transaksi::where('user_id', $userId)
            ->where('kelas_id', $id)
            ->firstOrFail();

        if ($transaction->status === 'berhasil') {
            return redirect()->route('kelas.show', $id)->with('error', 'Anda sudah membeli kelas ini.');
        }

        return view('kelas.upload-bukti', compact('class', 'transaction'));
    }

    /**
     * Handle payment proof upload.
     */
    public function uploadBukti(Request $request, int $id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $transaction = Transaksi::where('user_id', Auth::id())
            ->where('kelas_id', $id)
            ->firstOrFail();

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/bukti-bayar'), $filename);
            $buktiBayarPath = 'storage/bukti-bayar/' . $filename;

            // Update database with public storage path
            $transaction->update([
                'bukti_bayar' => $buktiBayarPath,
                'status' => 'menunggu', // Reset status if they upload a new one after rejection
            ]);

            // Send notification for payment uploaded
            \App\Models\Notifikasi::kirim(
                Auth::id(),
                '⏳ Pembayaran Sedang Diverifikasi',
                'Bukti pembayaran kelas "' . $transaction->kelas->judul . '" sedang diverifikasi admin.',
                'transaksi',
                route('transaksi.riwayat')
            );

            // Notify admin about transaction pending verification
            $admins = \App\Models\User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                \App\Models\Notifikasi::kirim(
                    $admin->id,
                    '🔔 Bukti Pembayaran Baru Masuk',
                    'Mahasiswa ' . Auth::user()->name . ' telah mengunggah bukti pembayaran untuk kelas "' . $transaction->kelas->judul . '".',
                    'transaksi',
                    route('admin.verifikasi.index')
                );
            }

            return redirect()->route('transaksi.riwayat')->with('status', 'Bukti pembayaran berhasil diunggah. Admin akan memverifikasi dalam waktu maksimal 24 jam.');
        }

        return back()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }

    /**
     * Display authenticated user's transaction history.
     */
    public function riwayat()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $transactions = Transaksi::with('kelas')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('kelas.riwayat', compact('transactions'));
    }

    /**
     * Download secure class material file.
     */
    public function downloadMateri(int $id)
    {
        $class = KelasPremium::where('status', 'aktif')->findOrFail($id);
        
        // Verify payment is successful
        $transaction = Transaksi::where('user_id', Auth::id())
            ->where('kelas_id', $id)
            ->where('status', 'berhasil')
            ->first();

        if (!$transaction) {
            abort(403, 'Akses ditolak. Silakan selesaikan pembayaran kelas terlebih dahulu.');
        }

        if (!$class->file_materi) {
            return back()->with('error', 'File materi belum diunggah oleh admin.');
        }

        $cleanPath = str_replace('storage/', '', $class->file_materi);
        $filePath = storage_path('app/public/' . $cleanPath);

        if (!file_exists($filePath)) {
            // Generate dummy file if seeded or not present
            $dir = dirname($filePath);
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            file_put_contents($filePath, "%PDF-1.4\n%...\nFindShip Premium Class Material dummy PDF file content.\nEnjoy your learning!");
        }

        return response()->download($filePath, basename($filePath));
    }

    /**
     * Display checkout page for multiple premium classes.
     */
    public function showCheckoutMulti(Request $request)
    {
        $idsString = $request->query('ids');
        $promoCodeInput = $request->query('promo');
        
        if (!$idsString) {
            return redirect()->route('kelas.cart')->with('error', 'Pilih minimal satu kelas untuk checkout.');
        }

        $ids = array_filter(explode(',', $idsString));
        if (empty($ids)) {
            return redirect()->route('kelas.cart')->with('error', 'Pilih minimal satu kelas untuk checkout.');
        }

        $classes = KelasPremium::where('status', 'aktif')->whereIn('id', $ids)->get();
        if ($classes->isEmpty()) {
            return redirect()->route('kelas.cart')->with('error', 'Kelas yang dipilih tidak ditemukan.');
        }

        $userId = Auth::id();
        
        // Filter classes: check if they are already purchased/pending
        $verifiedClasses = [];
        foreach ($classes as $class) {
            $existing = Transaksi::where('user_id', $userId)
                ->where('kelas_id', $class->id)
                ->first();

            if ($existing) {
                if ($existing->status === 'berhasil') {
                    return redirect()->route('kelas.cart')->with('error', 'Kelas "' . $class->judul . '" sudah Anda beli.');
                }
            }
            $verifiedClasses[] = $class;
        }

        if (empty($verifiedClasses)) {
            return redirect()->route('kelas.cart')->with('error', 'Semua kelas yang dipilih sudah Anda beli.');
        }

        // Calculations
        $subtotal = 0;
        foreach ($verifiedClasses as $c) {
            $subtotal += $c->harga;
        }

        $discount = 0;
        if ($promoCodeInput) {
            $promo = \App\Models\PromoCode::where('code', $promoCodeInput)->first();
            if ($promo && $promo->isValid()) {
                $discount = $promo->getDiscountAmount($subtotal);
            }
        }

        return view('kelas.checkout-multi', [
            'classes' => $verifiedClasses,
            'idsString' => $idsString,
            'promoCode' => $promoCodeInput,
            'discount' => $discount,
            'subtotal' => $subtotal
        ]);
    }

    /**
     * Process multi-item checkout and handle receipt upload.
     */
    public function processCheckoutMulti(Request $request)
    {
        $request->validate([
            'ids' => 'required|string',
            'bukti_bayar' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10240',
            'payment_method' => 'required|string',
            'promo_code' => 'nullable|string',
        ]);

        $idsString = $request->input('ids');
        $ids = array_filter(explode(',', $idsString));
        $userId = Auth::id();
        $paymentMethod = $request->input('payment_method');
        $promoCodeInput = $request->input('promo_code');

        if (empty($ids)) {
            return back()->with('error', 'Data kelas tidak valid.');
        }

        $classes = KelasPremium::where('status', 'aktif')->whereIn('id', $ids)->get();
        if ($classes->isEmpty()) {
            return back()->with('error', 'Kelas tidak ditemukan.');
        }

        // Calculations
        $subtotal = 0;
        foreach ($classes as $class) {
            $subtotal += $class->harga;
        }

        $discount = 0;
        if ($promoCodeInput) {
            $promo = \App\Models\PromoCode::where('code', $promoCodeInput)->first();
            if ($promo && $promo->isValid()) {
                $discount = $promo->getDiscountAmount($subtotal);
            }
        }

        $serviceFee = 2000.00;
        $tax = round(($subtotal - $discount) * 0.11, 2);
        $totalAmount = $subtotal - $discount + $serviceFee + $tax;

        // Generate Transaction ID
        $transactionId = 'TX-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(6));

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/bukti-bayar'), $filename);
            $buktiBayarPath = 'storage/bukti-bayar/' . $filename;

            foreach ($classes as $class) {
                Transaksi::create([
                    'user_id' => $userId,
                    'kelas_id' => $class->id,
                    'bukti_bayar' => $buktiBayarPath,
                    'status' => 'menunggu',
                    'transaction_id' => $transactionId,
                    'payment_method' => $paymentMethod,
                    'discount_amount' => $discount / count($classes),
                    'service_fee' => $serviceFee / count($classes),
                    'tax_amount' => $tax / count($classes),
                    'total_amount' => $totalAmount,
                ]);
            }

            // Send notification for multi checkout transaction submitted
            \App\Models\Notifikasi::kirim(
                $userId,
                '⏳ Pembayaran Sedang Diverifikasi',
                'Pembayaran multi-kelas sebesar Rp ' . number_format($totalAmount, 0, ',', '.') . ' sedang diverifikasi admin.',
                'transaksi',
                route('transaksi.riwayat')
            );

            // Notify admin about transaction pending verification
            $admins = \App\Models\User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                \App\Models\Notifikasi::kirim(
                    $admin->id,
                    '🔔 Bukti Pembayaran Baru (Multi-Kelas)',
                    'Mahasiswa ' . Auth::user()->name . ' telah mengunggah bukti pembayaran multi-kelas sebesar Rp ' . number_format($totalAmount, 0, ',', '.') . '.',
                    'transaksi',
                    route('admin.verifikasi.index')
                );
            }

            // Redirect to success page
            return redirect()->route('kelas.checkout-success', $transactionId)
                ->with('purchased_ids', $idsString);
        }

        return back()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }

    /**
     * Display checkout success/confirmation status page.
     */
    public function checkoutSuccess($transaction_id)
    {
        $transactions = Transaksi::with('kelas')
            ->where('transaction_id', $transaction_id)
            ->where('user_id', Auth::id())
            ->get();

        if ($transactions->isEmpty()) {
            abort(404, 'Transaksi tidak ditemukan.');
        }

        $firstTx = $transactions->first();
        $totalAmount = $firstTx->total_amount;
        $paymentMethod = $firstTx->payment_method;

        return view('kelas.success', compact('transactions', 'transaction_id', 'totalAmount', 'paymentMethod'));
    }

    /**
     * Toggle wishlist item for user.
     */
    public function toggleWishlist(Request $request, int $id)
    {
        $userId = Auth::id();
        $wishlist = \App\Models\Wishlist::where('user_id', $userId)
            ->where('kelas_id', $id)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'status' => 'removed',
                'message' => 'Kelas dihapus dari Wishlist Anda'
            ]);
        }

        \App\Models\Wishlist::create([
            'user_id' => $userId,
            'kelas_id' => $id,
        ]);

        return response()->json([
            'status' => 'added',
            'message' => 'Kelas berhasil ditambahkan ke Wishlist Anda!'
        ]);
    }

    /**
     * Validate promo code and calculate discount.
     */
    public function checkPromo(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'subtotal' => 'required|numeric',
        ]);

        $code = $request->input('code');
        $subtotal = $request->input('subtotal');

        $promo = \App\Models\PromoCode::where('code', $code)->first();

        if (!$promo || !$promo->isValid()) {
            return response()->json([
                'success' => false,
                'message' => 'Kode promo tidak valid atau telah kadaluarsa.'
            ]);
        }

        $discount = $promo->getDiscountAmount($subtotal);

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'message' => 'Kode promo berhasil digunakan! Diskon ' . ($promo->type === 'percent' ? $promo->value . '%' : 'Rp' . number_format($promo->value, 0, ',', '.')) . ' diterapkan.'
        ]);
    }
}
