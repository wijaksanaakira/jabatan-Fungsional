<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JabatanFungsional extends Model
{
    protected $table = 'jabatan_fungsional';

    protected $fillable = [
        'nama',
        'status',
        'keterangan',
        'created_by',
        'updated_by',
    ];

    public function dokumenJabatan()
    {
        return $this->hasMany(DokumenJabatanFungsional::class, 'id_jabatan_fungsional');
    }

    public function persyaratan()
    {
        return $this->belongsToMany(Dokumen::class, 'jabatan_fungsional_persyaratan', 'jabatan_fungsional_id', 'persyaratan_id')
                    ->withPivot('wajib', 'urutan');
    }

    public function monitoring()
    {
        return $this->hasMany(MonitoringDokumen::class, 'jabatan_fungsional_id');
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jabatan_fungsional_id');
    }
}