<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $fillable = [
        'user_id',
        'kelas_id',
    ];

    /**
     * Get the user that owns the wishlist item.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the class that belongs to the wishlist item.
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(KelasPremium::class, 'kelas_id');
    }
}
