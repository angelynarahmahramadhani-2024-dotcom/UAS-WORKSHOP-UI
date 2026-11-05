<?php

namespace Tests\Feature;

use App\Models\KelasPremium;
use App\Models\PromoCode;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * TC-11 s.d. TC-30  — Feature Test: Kelas Premium & Transaksi
 *
 * Jenis  : Blackbox / Feature Test (HTTP)
 * Tujuan : Verifikasi alur checkout, promo, upload bukti, dan
 *          verifikasi admin dari sudut input-output.
 */
class KelasTransaksiTest extends TestCase
{
    use RefreshDatabase;

    // ------------------------------------------------------------------ Helpers
    private function buatUser(string $role = 'mahasiswa'): User
    {
        return User::factory()->create(['role' => $role]);
    }

    private function buatKelas(int $harga = 100000): KelasPremium
    {
        return KelasPremium::factory()->harga($harga)->create();
    }

    // ================================================================== KELAS INDEX
    // ------------------------------------------------------------------ TC-11
    /** @test */
    public function test_halaman_daftar_kelas_dapat_diakses_publik(): void
    {
        KelasPremium::factory()->count(3)->create();

        $response = $this->get('/kelas');

        $response->assertStatus(200);
        $response->assertViewIs('kelas.index');
    }

    // ------------------------------------------------------------------ TC-12
    /** @test */
    public function test_kelas_nonaktif_tidak_muncul_di_daftar(): void
    {
        $aktif    = KelasPremium::factory()->create(['judul' => 'Kelas Aktif']);
        $nonaktif = KelasPremium::factory()->nonaktif()->create(['judul' => 'Kelas Nonaktif']);

        $response = $this->get('/kelas');

        $response->assertSee($aktif->judul);
        $response->assertDontSee($nonaktif->judul);
    }

    // ------------------------------------------------------------------ TC-13
    /** @test */
    public function test_halaman_detail_kelas_aktif_dapat_diakses(): void
    {
        $kelas = $this->buatKelas();

        $response = $this->get("/kelas/{$kelas->id}");

        $response->assertStatus(200);
        $response->assertSee($kelas->judul);
    }

    // ------------------------------------------------------------------ TC-14
    /** @test */
    public function test_detail_kelas_nonaktif_mengembalikan_404(): void
    {
        $kelas = KelasPremium::factory()->nonaktif()->create();

        $response = $this->get("/kelas/{$kelas->id}");

        $response->assertStatus(404);
    }

    // ================================================================== CHECKOUT
    // ------------------------------------------------------------------ TC-15
    /** @test */
    public function test_halaman_checkout_membutuhkan_login(): void
    {
        $kelas = $this->buatKelas();

        $response = $this->get("/kelas/{$kelas->id}/checkout");

        $response->assertRedirect('/login');
    }

    // ------------------------------------------------------------------ TC-16
    /** @test */
    public function test_user_login_dapat_melihat_halaman_checkout(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas();

        $response = $this->actingAs($user)->get("/kelas/{$kelas->id}/checkout");

        $response->assertStatus(200);
    }

    // ------------------------------------------------------------------ TC-17
    /** @test */
    public function test_proses_checkout_membuat_transaksi_berstatus_menunggu(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas(100000);

        $this->actingAs($user)->post("/kelas/{$kelas->id}/checkout", [
            'payment_method' => 'bank',
        ]);

        $this->assertDatabaseHas('transaksi', [
            'user_id'  => $user->id,
            'kelas_id' => $kelas->id,
            'status'   => 'menunggu',
        ]);
    }

    // ------------------------------------------------------------------ TC-18
    /** @test */
    public function test_checkout_kelas_yang_sudah_dibeli_ditolak(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas();

        // Buat transaksi berhasil (sudah beli)
        Transaksi::factory()->berhasil()->create([
            'user_id'  => $user->id,
            'kelas_id' => $kelas->id,
        ]);

        $response = $this->actingAs($user)->post("/kelas/{$kelas->id}/checkout", [
            'payment_method' => 'bank',
        ]);

        $response->assertRedirect(route('kelas.show', $kelas->id));
        $response->assertSessionHas('error');
    }

    // ================================================================== WISHLIST
    // ------------------------------------------------------------------ TC-19
    /** @test */
    public function test_toggle_wishlist_membutuhkan_login(): void
    {
        $kelas = $this->buatKelas();

        $response = $this->post("/kelas/{$kelas->id}/wishlist");

        $response->assertRedirect('/login');
    }

    // ------------------------------------------------------------------ TC-20
    /** @test */
    public function test_user_login_dapat_menambah_kelas_ke_wishlist(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas();

        $response = $this->actingAs($user)->postJson("/kelas/{$kelas->id}/wishlist");

        $response->assertJson(['status' => 'added']);
        $this->assertDatabaseHas('wishlist', [
            'user_id'  => $user->id,
            'kelas_id' => $kelas->id,
        ]);
    }

    // ------------------------------------------------------------------ TC-21
    /** @test */
    public function test_toggle_wishlist_kedua_kali_menghapus_dari_wishlist(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas();

        $this->actingAs($user)->postJson("/kelas/{$kelas->id}/wishlist"); // tambah
        $response = $this->actingAs($user)->postJson("/kelas/{$kelas->id}/wishlist"); // hapus

        $response->assertJson(['status' => 'removed']);
        $this->assertDatabaseMissing('wishlist', ['user_id' => $user->id, 'kelas_id' => $kelas->id]);
    }

    // ================================================================== PROMO CODE
    // ------------------------------------------------------------------ TC-22
    /** @test */
    public function test_kode_promo_valid_mengembalikan_diskon(): void
    {
        $user  = $this->buatUser();
        $promo = PromoCode::factory()->persen(10)->create(['code' => 'DISKON10']);

        $response = $this->actingAs($user)->postJson('/kelas/keranjang/promo', [
            'code'     => 'DISKON10',
            'subtotal' => 100000,
        ]);

        $response->assertJson([
            'success'  => true,
            'discount' => 10000,
        ]);
    }

    // ------------------------------------------------------------------ TC-23
    /** @test */
    public function test_kode_promo_tidak_ditemukan_mengembalikan_error(): void
    {
        $user = $this->buatUser();

        $response = $this->actingAs($user)->postJson('/kelas/keranjang/promo', [
            'code'     => 'TIDAKADA',
            'subtotal' => 100000,
        ]);

        $response->assertJson(['success' => false]);
    }

    // ------------------------------------------------------------------ TC-24
    /** @test */
    public function test_kode_promo_expired_mengembalikan_error(): void
    {
        $user  = $this->buatUser();
        $promo = PromoCode::factory()->expired()->create(['code' => 'EXPIRED01', 'status' => 'aktif']);

        $response = $this->actingAs($user)->postJson('/kelas/keranjang/promo', [
            'code'     => 'EXPIRED01',
            'subtotal' => 100000,
        ]);

        $response->assertJson(['success' => false]);
    }

    // ------------------------------------------------------------------ TC-25
    /** @test */
    public function test_kode_promo_nonaktif_mengembalikan_error(): void
    {
        $user  = $this->buatUser();
        $promo = PromoCode::factory()->nonaktif()->create(['code' => 'NONAKTIF1']);

        $response = $this->actingAs($user)->postJson('/kelas/keranjang/promo', [
            'code'     => 'NONAKTIF1',
            'subtotal' => 100000,
        ]);

        $response->assertJson(['success' => false]);
    }

    // ================================================================== ADMIN VERIFIKASI
    // ------------------------------------------------------------------ TC-26
    /** @test */
    public function test_admin_dapat_menyetujui_transaksi_menunggu(): void
    {
        $admin    = $this->buatUser('admin');
        $kelas    = $this->buatKelas();
        $transaksi = Transaksi::factory()->sudahUpload()->create([
            'kelas_id' => $kelas->id,
            'status'   => 'menunggu',
        ]);

        $this->actingAs($admin)
             ->post("/admin/verifikasi/{$transaksi->id}/approve");

        $this->assertDatabaseHas('transaksi', [
            'id'     => $transaksi->id,
            'status' => 'berhasil',
        ]);
    }

    // ------------------------------------------------------------------ TC-27
    /** @test */
    public function test_admin_dapat_menolak_transaksi(): void
    {
        $admin     = $this->buatUser('admin');
        $kelas     = $this->buatKelas();
        $transaksi = Transaksi::factory()->sudahUpload()->create([
            'kelas_id' => $kelas->id,
            'status'   => 'menunggu',
        ]);

        $this->actingAs($admin)
             ->post("/admin/verifikasi/{$transaksi->id}/reject");

        $this->assertDatabaseHas('transaksi', [
            'id'     => $transaksi->id,
            'status' => 'ditolak',
        ]);
    }

    // ------------------------------------------------------------------ TC-28
    /** @test */
    public function test_user_biasa_tidak_bisa_akses_admin_verifikasi(): void
    {
        $user      = $this->buatUser('mahasiswa');
        $kelas     = $this->buatKelas();
        $transaksi = Transaksi::factory()->create(['kelas_id' => $kelas->id]);

        $response = $this->actingAs($user)
                         ->post("/admin/verifikasi/{$transaksi->id}/approve");

        // Harus ditolak (403 atau redirect)
        $this->assertTrue(
            in_array($response->getStatusCode(), [302, 403]),
            "Expected 302 or 403, got: " . $response->getStatusCode()
        );
    }

    // ================================================================== RIWAYAT TRANSAKSI
    // ------------------------------------------------------------------ TC-29
    /** @test */
    public function test_user_dapat_melihat_riwayat_transaksinya_sendiri(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas();
        Transaksi::factory()->create(['user_id' => $user->id, 'kelas_id' => $kelas->id]);

        $response = $this->actingAs($user)->get('/riwayat-transaksi');

        $response->assertStatus(200);
    }

    // ------------------------------------------------------------------ TC-30: Materi tertutup selama menunggu
    /** @test */
    public function test_download_materi_ditolak_jika_transaksi_menunggu(): void
    {
        $user  = $this->buatUser();
        $kelas = $this->buatKelas();
        Transaksi::factory()->create([
            'user_id'  => $user->id,
            'kelas_id' => $kelas->id,
            'status'   => 'menunggu',
        ]);

        $response = $this->actingAs($user)->get("/kelas/{$kelas->id}/download-materi");

        // Akses ditolak karena transaksi belum disetujui (403 atau redirect)
        $this->assertTrue(in_array($response->getStatusCode(), [302, 403]));
    }
}

