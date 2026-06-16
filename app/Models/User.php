<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nik',
        'name',
        'password',
        'role',
        'must_reset_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'must_reset_password' => 'boolean',
        ];
    }

    /**
     * Check if user is an owner.
     */
    public function isOwner(): bool
    {
        return $this->role === 'owner';
    }

    /**
     * Check if user is an admin gudang.
     */
    public function isAdminGudang(): bool
    {
        return $this->role === 'admin_gudang';
    }

    /**
     * Check if user is a kasir.
     */
    public function isKasir(): bool
    {
        return $this->role === 'kasir';
    }

    /**
     * Get role display name.
     */
    public function getRoleDisplayNameAttribute(): string
    {
        return match ($this->role) {
            'owner' => 'Owner',
            'admin_gudang' => 'Admin Gudang',
            'kasir' => 'Kasir',
            default => $this->role,
        };
    }
}
