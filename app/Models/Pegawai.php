<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = [
        'nama_pegawai',
        'id_jenis',
        'nip',
        'jabatan_fungsional_id',
        'unit_kerja',
        'nomor_hp',
        'email',
        'status',
        'created_at',
        'updated_at'
    ];

    public function jenisPegawai()
    {
        return $this->belongsTo(JenisPegawai::class, 'id_jenis');
    }

    public function jabatanFungsional()
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatan_fungsional_id');
    }

    public function skPegawai()
    {
        return $this->hasMany(SkPegawai::class, 'id_pegawai');
    }

    public function monitoring()
    {
        return $this->hasMany(MonitoringDokumen::class, 'pegawai_id');
    }
}