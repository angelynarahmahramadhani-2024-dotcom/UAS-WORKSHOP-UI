<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorit extends Model
{
    use HasFactory;

    protected $table = 'favorit';

    protected $fillable = [
        'user_id',
        'beasiswa_id',
    ];

    /**
     * Get user who favorited the scholarship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get favorited scholarship.
     */
    public function beasiswa(): BelongsTo
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }
}
