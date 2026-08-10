<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'audit_logs';
    public $timestamps = false; // Using custom created_at handled by DB or manually

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'role',
        'action',
        'module',
        'subject_type',
        'subject_id',
        'subject_name',
        'old_values',
        'new_values',
        'method',
        'url',
        'ip_address',
        'user_agent',
        'status',
        'description',
        'created_at',
    ];

    protected $casts = [
        'old_values' => 'array',
        'new_values' => 'array',
        'created_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}