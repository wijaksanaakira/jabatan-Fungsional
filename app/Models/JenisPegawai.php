<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPegawai extends Model
{
    protected $table = 'jenis_pegawai';
    public $timestamps = false;

    protected $fillable = [
        'nama_jenis',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jenis');
    }
}