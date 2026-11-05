<?php

namespace Tests\Feature;

use App\Models\Beasiswa;
use App\Models\Favorit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * TC-01 s.d. TC-10  — Feature Test: Beasiswa (Scholarship)
 *
 * Jenis  : Blackbox / Feature Test (HTTP)
 * Tujuan : Memverifikasi endpoint beasiswa dari sisi input-output
 *          tanpa mengintip implementasi controller.
 */
class BeasiswaTest extends TestCase
{
    use RefreshDatabase;

    // ------------------------------------------------------------------ TC-01
    /** @test */
    public function test_halaman_daftar_beasiswa_dapat_diakses_publik(): void
    {
        Beasiswa::factory()->count(3)->create();

        $response = $this->get('/scholarships');

        $response->assertStatus(200);
        $response->assertViewIs('scholarships.index');
    }

    // ------------------------------------------------------------------ TC-02
    /** @test */
    public function test_beasiswa_nonaktif_tidak_muncul_di_daftar(): void
    {
        $aktif    = Beasiswa::factory()->create(['judul' => 'Beasiswa Aktif', 'status' => 'aktif']);
        $nonaktif = Beasiswa::factory()->nonaktif()->create(['judul' => 'Beasiswa Nonaktif']);

        $response = $this->get('/scholarships');

        $response->assertSee($aktif->judul);
        $response->assertDontSee($nonaktif->judul);
    }

    // ------------------------------------------------------------------ TC-03
    /** @test */
    public function test_filter_pencarian_keyword_menampilkan_hasil_relevan(): void
    {
        Beasiswa::factory()->create(['judul' => 'Beasiswa Unggulan Dikti']);
        Beasiswa::factory()->create(['judul' => 'Program LPDP']);

        $response = $this->get('/scholarships?q=Unggulan');

        $response->assertSee('Beasiswa Unggulan Dikti');
        $response->assertDontSee('Program LPDP');
    }

    // ------------------------------------------------------------------ TC-04: Boundary value IPK = 3.00
    /** @test */
    public function test_filter_min_ipk_menampilkan_beasiswa_yang_sesuai(): void
    {
        // Beasiswa butuh IPK min 3.00 — mahasiswa IPK 3.00 harus bisa lihat
        $cocok   = Beasiswa::factory()->create(['judul' => 'Beasiswa IPK 3', 'min_ipk' => 3.00]);
        $ketat   = Beasiswa::factory()->create(['judul' => 'Beasiswa IPK 3.5', 'min_ipk' => 3.50]);

        // Filter: tampilkan beasiswa yang min_ipk <= 3.00
        $response = $this->get('/scholarships?min_ipk=3.00');

        $response->assertSee($cocok->judul);
        $response->assertDontSee($ketat->judul);
    }

    // ------------------------------------------------------------------ TC-05
    /** @test */
    public function test_halaman_detail_beasiswa_dapat_diakses(): void
    {
        $beasiswa = Beasiswa::factory()->create();

        $response = $this->get("/scholarships/{$beasiswa->id}");

        $response->assertStatus(200);
        $response->assertViewIs('scholarships.show');
        $response->assertSee($beasiswa->judul);
    }

    // ------------------------------------------------------------------ TC-06
    /** @test */
    public function test_detail_beasiswa_nonaktif_mengembalikan_404(): void
    {
        $beasiswa = Beasiswa::factory()->nonaktif()->create();

        $response = $this->get("/scholarships/{$beasiswa->id}");

        $response->assertStatus(404);
    }

    // ------------------------------------------------------------------ TC-07
    /** @test */
    public function test_toggle_favorit_membutuhkan_login(): void
    {
        $beasiswa = Beasiswa::factory()->create();

        $response = $this->post("/scholarships/{$beasiswa->id}/favorite");

        // Tanpa login → redirect ke halaman login
        $response->assertRedirect('/login');
    }

    // ------------------------------------------------------------------ TC-08
    /** @test */
    public function test_user_login_dapat_menambahkan_favorit(): void
    {
        $user     = User::factory()->create();
        $beasiswa = Beasiswa::factory()->create();

        $this->actingAs($user)
             ->post("/scholarships/{$beasiswa->id}/favorite");

        $this->assertDatabaseHas('favorit', [
            'user_id'     => $user->id,
            'beasiswa_id' => $beasiswa->id,
        ]);
    }

    // ------------------------------------------------------------------ TC-09
    /** @test */
    public function test_toggle_favorit_kedua_kali_menghapus_favorit(): void
    {
        $user     = User::factory()->create();
        $beasiswa = Beasiswa::factory()->create();

        // Pertama: tambah
        $this->actingAs($user)->post("/scholarships/{$beasiswa->id}/favorite");
        $this->assertDatabaseHas('favorit', ['user_id' => $user->id, 'beasiswa_id' => $beasiswa->id]);

        // Kedua: hapus (toggle)
        $this->actingAs($user)->post("/scholarships/{$beasiswa->id}/favorite");
        $this->assertDatabaseMissing('favorit', ['user_id' => $user->id, 'beasiswa_id' => $beasiswa->id]);
    }

    // ------------------------------------------------------------------ TC-10: Boundary — filter jenjang
    /** @test */
    public function test_filter_jenjang_s1_hanya_menampilkan_beasiswa_s1(): void
    {
        $s1 = Beasiswa::factory()->create(['judul' => 'Beasiswa S1', 'jenjang' => 'S1']);
        $s2 = Beasiswa::factory()->create(['judul' => 'Beasiswa S2', 'jenjang' => 'S2']);

        $response = $this->get('/scholarships?jenjang=S1');

        $response->assertSee($s1->judul);
        $response->assertDontSee($s2->judul);
    }
}

