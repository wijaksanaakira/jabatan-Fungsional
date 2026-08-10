<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = 'modul';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'url',
        'urut',
        'menu',
        'icon',
    ];

    public function levelUsers()
    {
        return $this->belongsToMany(LevelUser::class, 'level_user_hak_akses', 'id_hak_akses', 'id_user_level');
    }
}