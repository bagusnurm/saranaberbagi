<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     public function canAccessPanel(Panel $panel): bool
    {
        // Cuma role staf (super_admin/admin/volunteer) yang boleh masuk
        // panel /berbagi. Donatur register lewat /auth tapi nggak
        // dikasih role apa pun, jadi otomatis ketolak di sini —
        // mereka tetap bisa donasi & login di frontend seperti biasa.
        return $this->hasAnyRole(['super_admin', 'admin', 'volunteer']);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function campaignComments(): HasMany
    {
        return $this->hasMany(CampaignComment::class);
    }
}
