<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSk extends Model
{
    protected $table = 'data_sk';
    public $timestamps = false;

    protected $fillable = [
        'nomor_sk',
        'id_jenis',
        'tmt',
        'tanggal_sk',
        'link_sk',
    ];

    protected $casts = [
        'tmt' => 'date',
        'tanggal_sk' => 'date',
    ];

    public function jenisSk()
    {
        return $this->belongsTo(JenisSk::class, 'id_jenis', 'id_jenis');
    }

    public function skPegawai()
    {
        return $this->hasMany(SkPegawai::class, 'id_sk');
    }
}