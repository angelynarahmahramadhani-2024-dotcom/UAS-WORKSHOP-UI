<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * TC-31 s.d. TC-40  — Feature Test: Autentikasi & Otorisasi
 *
 * Jenis  : Blackbox / Feature Test (HTTP)
 * Tujuan : Verifikasi alur registrasi, login, logout, dan
 *          pembatasan akses berdasarkan role.
 */
class AuthOtorisasiTest extends TestCase
{
    use RefreshDatabase;

    // ------------------------------------------------------------------ TC-31
    /** @test */
    public function test_halaman_login_dapat_diakses(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    // ------------------------------------------------------------------ TC-32
    /** @test */
    public function test_login_dengan_kredensial_valid_berhasil(): void
    {
        $user = User::factory()->create([
            'email'    => 'test@example.com',
            'password' => bcrypt('password123'),
            'status'   => 'aktif',
        ]);

        $response = $this->post('/login', [
            'email'    => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect();
        $this->assertAuthenticatedAs($user);
    }

    // ------------------------------------------------------------------ TC-33
    /** @test */
    public function test_login_dengan_password_salah_ditolak(): void
    {
        User::factory()->create([
            'email'    => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email'    => 'test@example.com',
            'password' => 'passwordSalah',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    // ------------------------------------------------------------------ TC-34
    /** @test */
    public function test_halaman_registrasi_dapat_diakses(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    // ------------------------------------------------------------------ TC-35
    /** @test */
    public function test_registrasi_dengan_data_valid_membuat_user_baru(): void
    {
        $response = $this->post('/register', [
            'name'                  => 'Mahasiswa Baru',
            'email'                 => 'baru@example.com',
            'password'              => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'baru@example.com']);
        $this->assertAuthenticated();
    }

    // ------------------------------------------------------------------ TC-36
    /** @test */
    public function test_registrasi_tanpa_konfirmasi_password_ditolak(): void
    {
        $response = $this->post('/register', [
            'name'                  => 'User Test',
            'email'                 => 'test2@example.com',
            'password'              => 'Password123!',
            'password_confirmation' => 'BedaBeda999!',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    // ------------------------------------------------------------------ TC-37
    /** @test */
    public function test_logout_berhasil_menghapus_sesi(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }

    // ------------------------------------------------------------------ TC-38
    /** @test */
    public function test_admin_dapat_akses_halaman_dashboard_admin(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
    }

    // ------------------------------------------------------------------ TC-39
    /** @test */
    public function test_mahasiswa_tidak_dapat_akses_dashboard_admin(): void
    {
        $mahasiswa = User::factory()->create(['role' => 'mahasiswa']);

        $response = $this->actingAs($mahasiswa)->get('/admin/dashboard');

        // Harus redirect atau 403, bukan 200
        $this->assertNotEquals(200, $response->getStatusCode());
    }

    // ------------------------------------------------------------------ TC-40
    /** @test */
    public function test_tamu_tidak_dapat_akses_halaman_profil(): void
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/login');
    }
}

