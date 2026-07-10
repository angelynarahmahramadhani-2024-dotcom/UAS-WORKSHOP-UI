<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Beasiswa extends Model
{
    use HasFactory;

    protected $table = 'beasiswa';

    protected $fillable = [
        'judul',
        'penyelenggara',
        'kategori',
        'jenjang',
        'jurusan',
        'min_ipk',
        'deadline',
        'deskripsi',
        'link_resmi',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'min_ipk' => 'decimal:2',
    ];

    /**
     * Get favorites for the scholarship.
     */
    public function favorits(): HasMany
    {
        return $this->hasMany(Favorit::class, 'beasiswa_id');
    }
}
