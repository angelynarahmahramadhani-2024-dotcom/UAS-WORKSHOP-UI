<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBeasiswaController;
use App\Http\Controllers\AdminKelasController;
use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminVerifikasiController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'home'])->name('home.student')->middleware('auth');

Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
Route::get('/scholarships/{id}', [ScholarshipController::class, 'show'])->name('scholarships.show');
Route::post('/scholarships/{id}/favorite', [ScholarshipController::class, 'toggleFavorite'])
    ->middleware('auth')
    ->name('scholarships.favorite');

// Kelas Premium Routes
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/keranjang', function () {
    return view('kelas.cart');
})->name('kelas.cart');
Route::post('/kelas/keranjang/promo', [KelasController::class, 'checkPromo'])->name('kelas.promo')->middleware('auth');
Route::get('/kelas/checkout-multi', [KelasController::class, 'showCheckoutMulti'])->name('kelas.checkout-multi')->middleware('auth');
Route::post('/kelas/checkout-multi', [KelasController::class, 'processCheckoutMulti'])->name('kelas.checkout-multi.process')->middleware('auth');
Route::post('/kelas/{id}/wishlist', [KelasController::class, 'toggleWishlist'])->name('kelas.wishlist')->middleware('auth');
Route::get('/kelas/transaksi/{transaction_id}/success', [KelasController::class, 'checkoutSuccess'])->name('kelas.checkout-success')->middleware('auth');
Route::get('/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');

Route::middleware('auth')->group(function () {
    Route::get('/kelas/{id}/checkout', [KelasController::class, 'showCheckout'])->name('kelas.checkout');
    Route::post('/kelas/{id}/checkout', [KelasController::class, 'processCheckout'])->name('kelas.processCheckout');
    Route::get('/kelas/{id}/upload-bukti', [KelasController::class, 'showUploadBukti'])->name('kelas.upload-bukti');
    Route::post('/kelas/{id}/upload-bukti', [KelasController::class, 'uploadBukti'])->name('transaksi.upload');
    Route::get('/kelas/{id}/download-materi', [KelasController::class, 'downloadMateri'])->name('kelas.download-materi');
    Route::get('/riwayat-transaksi', [KelasController::class, 'riwayat'])->name('transaksi.riwayat');
});

// Tips Artikel Routes (WordPress Headless)
Route::get('/wordpress/artikel', [BlogController::class, 'index'])->name('artikel.index');
Route::get('/wordpress/artikel/{id}', [BlogController::class, 'show'])->name('artikel.show');

// Redirect lama /artikel ke /wordpress/artikel
Route::redirect('/artikel', '/wordpress/artikel');
Route::redirect('/artikel/{id}', '/wordpress/artikel/{id}');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // CRUD Beasiswa
    Route::resource('beasiswa', AdminBeasiswaController::class, ['as' => 'admin']);
    
    // CRUD Kelas Premium
    Route::resource('kelas', AdminKelasController::class, ['as' => 'admin']);

    // CRUD Artikel
    Route::resource('artikel', AdminArtikelController::class, ['as' => 'admin']);
    
    // Verifikasi Pembayaran
    Route::get('/verifikasi', [AdminVerifikasiController::class, 'index'])->name('admin.verifikasi.index');
    Route::post('/verifikasi/{id}/approve', [AdminVerifikasiController::class, 'approve'])->name('admin.verifikasi.approve');
    Route::post('/verifikasi/{id}/reject', [AdminVerifikasiController::class, 'reject'])->name('admin.verifikasi.reject');
    
    // Manajemen Pengguna
    Route::get('/pengguna', [AdminUserController::class, 'index'])->name('admin.pengguna.index');
    Route::post('/pengguna/{id}/toggle', [AdminUserController::class, 'toggleStatus'])->name('admin.pengguna.toggle');
});

use App\Http\Controllers\StudentDashboardController;

Route::redirect('/dashboard', '/home')->name('dashboard');

use App\Http\Controllers\NotifikasiController;

Route::get('/nonaktif', function () {
    return view('auth.nonaktif');
})->name('auth.nonaktif');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notifikasi Routes
    Route::get('/api/notifikasi/unread', [NotifikasiController::class, 'getUnreadJson'])->name('notifikasi.unread-json');
    Route::post('/api/notifikasi/tambah-keranjang', [NotifikasiController::class, 'tambahKeranjang'])->name('notifikasi.tambah-keranjang');
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('/notifikasi/{id}/baca', [NotifikasiController::class, 'baca'])->name('notifikasi.baca');
    Route::get('/notifikasi/{id}/go', [NotifikasiController::class, 'readAndRedirect'])->name('notifikasi.go');
    Route::post('/notifikasi/baca-semua', [NotifikasiController::class, 'bacaSemua'])->name('notifikasi.baca-semua');
    Route::delete('/notifikasi/hapus-semua', [NotifikasiController::class, 'hapusSemua'])->name('notifikasi.hapus-semua');
});

require __DIR__.'/auth.php';

// Route darurat untuk membuat symbolic link storage di shared hosting
Route::get('/run-storage-link', function () {
    return "Storage link sukses dikonfigurasi secara langsung (tanpa symlink untuk hosting shared)!";
});

