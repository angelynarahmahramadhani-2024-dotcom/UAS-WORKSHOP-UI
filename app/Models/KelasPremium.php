<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KelasPremium extends Model
{
    use HasFactory;

    protected $table = 'kelas_premium';

    protected $fillable = [
        'judul',
        'deskripsi',
        'konten_publik',
        'konten_premium',
        'file_materi',
        'link_zoom',
        'link_rekaman',
        'kurikulum',
        'status',
        'harga',
        'thumbnail',
        'kategori',
        'rating',
        'discount_percentage',
        'discount_expiry',
        'duration',
        'lessons_count',
        'includes',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'kurikulum' => 'array',
        'discount_expiry' => 'datetime',
        'includes' => 'array',
        'rating' => 'decimal:2',
    ];

    /**
     * Get transactions for the class.
     */
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'kelas_id');
    }
}
