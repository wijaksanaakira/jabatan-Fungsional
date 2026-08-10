<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model
{
    protected $table = 'level_user';
    protected $primaryKey = 'id_user_level';
    public $timestamps = false;

    protected $fillable = [
        'nama',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id_user_level', 'id_user_level');
    }

    public function hakAkses()
    {
        return $this->belongsToMany(Modul::class, 'level_user_hak_akses', 'id_user_level', 'id_hak_akses');
    }
}