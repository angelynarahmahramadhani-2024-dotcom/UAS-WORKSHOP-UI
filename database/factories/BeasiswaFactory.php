<?php

namespace Database\Factories;

use App\Models\Beasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Beasiswa>
 */
class BeasiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul'         => fake()->sentence(4),
            'penyelenggara' => fake()->company(),
            'kategori'      => fake()->randomElement(['dalam negeri', 'luar negeri']),
            'jenjang'       => fake()->randomElement(['S1', 'S2', 'S3', 'D3']),
            'jurusan'       => fake()->randomElement(['Teknik Informatika', 'Semua Jurusan', 'Ekonomi']),
            'min_ipk'       => fake()->randomFloat(2, 2.50, 3.90),
            'deadline'      => now()->addDays(fake()->numberBetween(10, 90)),
            'deskripsi'     => fake()->paragraph(),
            'link_resmi'    => fake()->url(),
            'status'        => 'aktif',
        ];
    }

    /** Beasiswa yang sudah expired (deadline kemarin). */
    public function expired(): static
    {
        return $this->state(fn () => [
            'deadline' => now()->subDay(),
        ]);
    }

    /** Beasiswa dengan status nonaktif. */
    public function nonaktif(): static
    {
        return $this->state(fn () => [
            'status' => 'nonaktif',
        ]);
    }
}

