<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumen extends Model
{
    use SoftDeletes;

    protected $table = 'dokumen';
    public $timestamps = false; // Existing logic

    protected $fillable = [
        'nama_file',
        'kategori',
        'link',
        'file_path',
        'keterangan',
        'status',
        'urutan',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function jabatanFungsional()
    {
        return $this->belongsToMany(JabatanFungsional::class, 'jabatan_fungsional_persyaratan', 'persyaratan_id', 'jabatan_fungsional_id')
                    ->withPivot('wajib', 'urutan');
    }
}