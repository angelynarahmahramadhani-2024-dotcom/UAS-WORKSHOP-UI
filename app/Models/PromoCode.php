<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $table = 'promo_codes';

    protected $fillable = [
        'code',
        'type',
        'value',
        'expiry_date',
        'status',
    ];

    protected $casts = [
        'value' => 'decimal:2',
        'expiry_date' => 'datetime',
    ];

    /**
     * Check if the promo code is currently valid.
     */
    public function isValid(): bool
    {
        if ($this->status !== 'aktif') {
            return false;
        }

        if ($this->expiry_date && $this->expiry_date->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * Calculate discount amount.
     */
    public function getDiscountAmount($subtotal): float
    {
        if ($this->type === 'percent') {
            return round(($subtotal * ($this->value / 100)), 2);
        }

        return min((float)$this->value, (float)$subtotal);
    }
}
