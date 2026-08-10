<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'nip',
        'foto',
        'id_user_level',
        'username',
        'password',
        'auth_code',
        'auth_act',
        'dibuat_pada_tanggal',
        'is_active',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'auth_code',
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
            'is_active' => 'boolean',
            'last_login_at' => 'datetime',
            'dibuat_pada_tanggal' => 'datetime',
        ];
    }

    public function levelUser()
    {
        return $this->belongsTo(LevelUser::class, 'id_user_level', 'id_user_level');
    }

    public function authTokens()
    {
        return $this->hasMany(UserAuthToken::class, 'user_id');
    }

    public function hasRole($roleName)
    {
        return $this->levelUser && $this->levelUser->nama === $roleName;
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('Super Admin');
    }

    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    public function isOperator()
    {
        return $this->hasRole('Operator');
    }

    public function isStandardUser()
    {
        return $this->hasRole('User');
    }

    // Check if user is active
    public function isActive()
    {
        return $this->is_active;
    }
}