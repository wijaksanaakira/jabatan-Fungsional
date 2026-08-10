<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenJabatanFungsional extends Model
{
    protected $table = 'dokumen_jabatan_fungsional';
    public $timestamps = false; // Existing table relies on this or custom logic

    protected $fillable = [
        'judul_dokumen',
        'nama_peraturan',
        'id_jabatan_fungsional',
        'jenis_dokumen_id',
        'link',
        'file_path',
        'tanggal',
        'jumlah_tunjangan',
        'keterangan',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah_tunjangan' => 'decimal:2',
    ];

    public function jabatanFungsional()
    {
        return $this->belongsTo(JabatanFungsional::class, 'id_jabatan_fungsional');
    }

    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'jenis_dokumen_id');
    }
}