<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAuthToken extends Model
{
    protected $table = 'user_auth_tokens';

    protected $fillable = [
        'user_id',
        'token_hash',
        'type',
        'status',
        'expires_at',
        'last_used_at',
        'created_by',
        'revoked_at',
        'revoked_by',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'last_used_at' => 'datetime',
        'revoked_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function revoker()
    {
        return $this->belongsTo(User::class, 'revoked_by');
    }

    public function isValid()
    {
        return $this->status === 'active' &&
               (!$this->expires_at || $this->expires_at->isFuture()) &&
               !$this->revoked_at;
    }
}