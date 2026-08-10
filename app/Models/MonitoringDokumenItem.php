<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoringDokumenItem extends Model
{
    protected $table = 'monitoring_dokumen_item';

    protected $fillable = [
        'monitoring_id',
        'persyaratan_id',
        'nama_dokumen',
        'wajib',
        'status',
        'file_path',
        'link',
        'catatan',
        'verified_by',
        'verified_at',
    ];

    protected $casts = [
        'wajib' => 'boolean',
        'verified_at' => 'datetime',
    ];

    public function monitoring()
    {
        return $this->belongsTo(MonitoringDokumen::class, 'monitoring_id');
    }

    public function persyaratan()
    {
        return $this->belongsTo(Dokumen::class, 'persyaratan_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}