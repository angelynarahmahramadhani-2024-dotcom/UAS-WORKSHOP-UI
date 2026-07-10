<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'user_id',
        'kelas_id',
        'bukti_bayar',
        'status',
        'transaction_id',
        'payment_method',
        'discount_amount',
        'service_fee',
        'tax_amount',
        'total_amount',
    ];

    protected $casts = [
        'discount_amount' => 'decimal:2',
        'service_fee' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Get user who made the transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get class purchased.
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(KelasPremium::class, 'kelas_id');
    }
}
