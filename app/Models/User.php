<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CanResetPasswordTrait;

    protected $fillable = [
        'name',
        'username',
        'password',
        'foto',
        'telepon',
        'alamat',
        'status',
        'reset_token',
    ];


    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'user_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isOnline()
    {
        if ($this->last_accessed_at) {
            $lastAccessed = $this->last_accessed_at instanceof Carbon
                ? $this->last_accessed_at
                : new Carbon($this->last_accessed_at);

            return $lastAccessed->gt(Carbon::now()->subMinutes(5));
        }

        return false;
    }
}
