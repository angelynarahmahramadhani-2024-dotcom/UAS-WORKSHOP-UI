<?php

namespace Database\Factories;

use App\Models\KelasPremium;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<KelasPremium>
 */
class KelasPremiumFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul'      => fake()->sentence(3),
            'deskripsi'  => fake()->paragraph(),
            'harga'      => fake()->randomElement([50000, 100000, 150000, 200000]),
            'thumbnail'  => null,
            'status'     => 'aktif',
        ];
    }

    /** Kelas dengan harga spesifik. */
    public function harga(int $harga): static
    {
        return $this->state(fn () => ['harga' => $harga]);
    }

    /** Kelas nonaktif. */
    public function nonaktif(): static
    {
        return $this->state(fn () => ['status' => 'nonaktif']);
    }
}

