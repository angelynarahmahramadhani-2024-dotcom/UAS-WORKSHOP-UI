<?php

namespace Tests\Unit;

use App\Models\PromoCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * TU-01 s.d. TU-05  — Unit Test: Model PromoCode
 *
 * Jenis  : Whitebox / Unit Test
 * Tujuan : Memverifikasi logika bisnis PromoCode::isValid() dan
 *          PromoCode::getDiscountAmount() secara terisolasi.
 */
class PromoCodeTest extends TestCase
{
    use RefreshDatabase;

    // ------------------------------------------------------------------ TU-01
    /** @test */
    public function test_promo_aktif_belum_expired_adalah_valid(): void
    {
        $promo = PromoCode::factory()->create([
            'status'      => 'aktif',
            'expiry_date' => now()->addDays(7),
        ]);

        $this->assertTrue($promo->isValid());
    }

    // ------------------------------------------------------------------ TU-02
    /** @test */
    public function test_promo_nonaktif_tidak_valid(): void
    {
        $promo = PromoCode::factory()->nonaktif()->create();

        $this->assertFalse($promo->isValid());
    }

    // ------------------------------------------------------------------ TU-03
    /** @test */
    public function test_promo_expired_tidak_valid(): void
    {
        $promo = PromoCode::factory()->expired()->create([
            'status' => 'aktif',
        ]);

        $this->assertFalse($promo->isValid());
    }

    // ------------------------------------------------------------------ TU-04: Boundary — diskon persen 10%
    /** @test */
    public function test_diskon_persen_10_dari_subtotal_100000(): void
    {
        $promo = PromoCode::factory()->persen(10)->make();

        $diskon = $promo->getDiscountAmount(100000);

        $this->assertEquals(10000.00, $diskon);
    }

    // ------------------------------------------------------------------ TU-05: Boundary — diskon nominal tidak melebihi subtotal
    /** @test */
    public function test_diskon_nominal_tidak_melebihi_subtotal(): void
    {
        // Diskon Rp 50.000 pada subtotal Rp 30.000 → max Rp 30.000
        $promo = PromoCode::factory()->nominal(50000)->make();

        $diskon = $promo->getDiscountAmount(30000);

        $this->assertEquals(30000.00, $diskon);
    }

    // ------------------------------------------------------------------ Boundary value: persen 0%
    /** @test */
    public function test_diskon_persen_nol_menghasilkan_diskon_nol(): void
    {
        $promo = PromoCode::factory()->persen(0)->make();

        $this->assertEquals(0.0, $promo->getDiscountAmount(100000));
    }

    // ------------------------------------------------------------------ Boundary value: persen 100%
    /** @test */
    public function test_diskon_persen_seratus_menghasilkan_sama_dengan_subtotal(): void
    {
        $promo = PromoCode::factory()->persen(100)->make();

        $this->assertEquals(100000.0, $promo->getDiscountAmount(100000));
    }
}

