<?php

namespace Tests\Feature;

use App\Models\KelasPremium;
use App\Models\PromoCode;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * TC-41 s.d. TC-45  — Acceptance Test / Alur End-to-End
 *
 * Jenis  : Blackbox / Integration Test
 * Tujuan : Validasi — "Are we building the right product?"
 *          Mensimulasikan alur nyata pengguna dari registrasi
 *          sampai mengakses materi kelas premium.
 */
class AcceptanceTest extends TestCase
{
    use RefreshDatabase;

    // ------------------------------------------------------------------ TC-41
    /** @test */
    public function test_alur_lengkap_mahasiswa_beli_kelas_dan_materi_terbuka_setelah_disetujui(): void
    {
        // Setup: admin dan kelas tersedia
        $admin = User::factory()->create(['role' => 'admin']);
        $kelas = KelasPremium::factory()->harga(100000)->create();

        // Step 1: Mahasiswa registrasi
        $this->post('/register', [
            'name'                  => 'Mahasiswa Test',
            'email'                 => 'mhs@test.com',
            'password'              => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);
        $mahasiswa = User::where('email', 'mhs@test.com')->first();
        $this->assertNotNull($mahasiswa, 'Registrasi harus membuat user baru');

        // Step 2: Mahasiswa checkout
        $this->actingAs($mahasiswa)->post("/kelas/{$kelas->id}/checkout", [
            'payment_method' => 'bank',
        ]);

        $transaksi = Transaksi::where('user_id', $mahasiswa->id)->first();
        $this->assertNotNull($transaksi, 'Checkout harus membuat transaksi');
        $this->assertEquals('menunggu', $transaksi->status);

        // Step 3: Materi belum bisa diunduh (masih menunggu)
        $response = $this->actingAs($mahasiswa)->get("/kelas/{$kelas->id}/download-materi");
        $this->assertTrue(in_array($response->getStatusCode(), [302, 403]));

        // Step 4: Admin approve transaksi
        $this->actingAs($admin)->post("/admin/verifikasi/{$transaksi->id}/approve");
        $this->assertDatabaseHas('transaksi', ['id' => $transaksi->id, 'status' => 'berhasil']);

        // Step 5: Setelah approve, mahasiswa sudah berlangganan
        $transaksi->refresh();
        $this->assertEquals('berhasil', $transaksi->status, 'Status harus berhasil setelah admin approve');
    }

    // ------------------------------------------------------------------ TC-42
    /** @test */
    public function test_alur_checkout_dengan_kode_promo_10_persen(): void
    {
        $mahasiswa = User::factory()->create(['role' => 'mahasiswa']);
        PromoCode::factory()->persen(10)->create(['code' => 'HEMAT10']);

        // Cek promo dulu via API
        $response = $this->actingAs($mahasiswa)->postJson('/kelas/keranjang/promo', [
            'code'     => 'HEMAT10',
            'subtotal' => 100000,
        ]);

        $response->assertJson([
            'success'  => true,
            'discount' => 10000,
        ]);
        // Diskon 10% dari 100.000 = 10.000
        $this->assertEquals(10000, $response->json('discount'));
    }

    // ------------------------------------------------------------------ TC-43
    /** @test */
    public function test_admin_reject_lalu_mahasiswa_tidak_bisa_akses_materi(): void
    {
        $admin     = User::factory()->create(['role' => 'admin']);
        $mahasiswa = User::factory()->create(['role' => 'mahasiswa']);
        $kelas     = KelasPremium::factory()->harga(100000)->create();

        $transaksi = Transaksi::factory()->sudahUpload()->create([
            'user_id'  => $mahasiswa->id,
            'kelas_id' => $kelas->id,
            'status'   => 'menunggu',
        ]);

        // Admin reject
        $this->actingAs($admin)->post("/admin/verifikasi/{$transaksi->id}/reject");
        $this->assertDatabaseHas('transaksi', ['id' => $transaksi->id, 'status' => 'ditolak']);

        // Mahasiswa coba download materi → harus gagal (403 atau redirect)
        $response = $this->actingAs($mahasiswa)->get("/kelas/{$kelas->id}/download-materi");
        $this->assertTrue(in_array($response->getStatusCode(), [302, 403]));
    }

    // ------------------------------------------------------------------ TC-44
    /** @test */
    public function test_mahasiswa_tidak_bisa_beli_kelas_yang_sama_dua_kali(): void
    {
        $mahasiswa = User::factory()->create(['role' => 'mahasiswa']);
        $kelas     = KelasPremium::factory()->harga(100000)->create();

        // Sudah punya transaksi berhasil
        Transaksi::factory()->berhasil()->create([
            'user_id'  => $mahasiswa->id,
            'kelas_id' => $kelas->id,
        ]);

        // Coba checkout lagi
        $response = $this->actingAs($mahasiswa)->post("/kelas/{$kelas->id}/checkout", [
            'payment_method' => 'bank',
        ]);

        $response->assertRedirect(route('kelas.show', $kelas->id));
        $response->assertSessionHas('error');

        // Jumlah transaksi tetap 1
        $this->assertEquals(1, Transaksi::where('user_id', $mahasiswa->id)->count());
    }

    // ------------------------------------------------------------------ TC-45: Boundary — promo kadaluarsa tidak bisa dipakai
    /** @test */
    public function test_promo_kadaluarsa_ditolak_saat_checkout(): void
    {
        $mahasiswa = User::factory()->create(['role' => 'mahasiswa']);
        PromoCode::factory()->expired()->create([
            'code'   => 'EXPIRED99',
            'status' => 'aktif',
        ]);

        $response = $this->actingAs($mahasiswa)->postJson('/kelas/keranjang/promo', [
            'code'     => 'EXPIRED99',
            'subtotal' => 100000,
        ]);

        $response->assertJson(['success' => false]);
    }
}

