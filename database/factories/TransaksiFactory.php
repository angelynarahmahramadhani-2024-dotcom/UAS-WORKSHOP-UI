<?php

namespace Database\Factories;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\KelasPremium;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaksi>
 */
class TransaksiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'         => User::factory(),
            'kelas_id'        => KelasPremium::factory(),
            'bukti_bayar'     => null,
            'status'          => 'menunggu',
            'transaction_id'  => strtoupper(fake()->unique()->bothify('TRX-####-????')),
            'payment_method'  => 'bank',
            'discount_amount' => 0,
            'service_fee'     => 0,
            'tax_amount'      => 0,
            'total_amount'    => 100000,
        ];
    }

    /** Transaksi berhasil (sudah disetujui admin). */
    public function berhasil(): static
    {
        return $this->state(fn () => ['status' => 'berhasil']);
    }

    /** Transaksi ditolak admin. */
    public function ditolak(): static
    {
        return $this->state(fn () => ['status' => 'ditolak']);
    }

    /** Transaksi sudah upload bukti tapi belum diverifikasi. */
    public function sudahUpload(): static
    {
        return $this->state(fn () => [
            'bukti_bayar' => 'storage/bukti-bayar/contoh.jpg',
        ]);
    }
}

