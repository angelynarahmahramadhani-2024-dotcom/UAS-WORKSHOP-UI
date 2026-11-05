<?php

namespace Database\Factories;

use App\Models\PromoCode;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PromoCode>
 */
class PromoCodeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code'        => strtoupper(fake()->unique()->lexify('PROMO????')),
            'type'        => 'percent',
            'value'       => 10,
            'expiry_date' => now()->addDays(30),
            'status'      => 'aktif',
        ];
    }

    /** Promo nominal (Rp). */
    public function nominal(float $value): static
    {
        return $this->state(fn () => [
            'type'  => 'nominal',
            'value' => $value,
        ]);
    }

    /** Promo persen. */
    public function persen(float $persen): static
    {
        return $this->state(fn () => [
            'type'  => 'percent',
            'value' => $persen,
        ]);
    }

    /** Promo sudah kadaluarsa. */
    public function expired(): static
    {
        return $this->state(fn () => [
            'expiry_date' => now()->subDay(),
        ]);
    }

    /** Promo nonaktif. */
    public function nonaktif(): static
    {
        return $this->state(fn () => [
            'status' => 'nonaktif',
        ]);
    }
}

