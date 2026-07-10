<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'jurusan', 'ipk', 'asal_kampus', 'status'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the notifications for the user.
     */
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'user_id');
    }

    /**
     * Get the unread notifications for the user.
     */
    public function unreadNotifikasi()
    {
        return $this->notifikasi()->where('is_read', false);
    }

    /**
     * Get wishlist items of the user.
     */
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }

    /**
     * Get transactions of the user.
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }
}
