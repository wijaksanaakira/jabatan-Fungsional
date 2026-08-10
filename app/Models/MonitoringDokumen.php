<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonitoringDokumen extends Model
{
    use SoftDeletes;

    protected $table = 'monitoring_dokumen';

    protected $fillable = [
        'pegawai_id',
        'nama',
        'nip',
        'jabatan_fungsional_id',
        'unit_kerja',
        'nomor_hp',
        'status',
        'catatan',
        'created_by',
        'updated_by',
    ];

    public function items()
    {
        return $this->hasMany(MonitoringDokumenItem::class, 'monitoring_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function jabatanFungsional()
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatan_fungsional_id');
    }

    public function getProgressAttribute()
    {
        $totalItems = $this->items()->where('status', '!=', 'N/A')->count();
        if ($totalItems === 0) return 0;

        $completedItems = $this->items()
            ->whereIn('status', ['Lengkap', 'Diverifikasi'])
            ->count();

        return round(($completedItems / $totalItems) * 100);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'Belum Diproses' => 'bg-gray-100 text-gray-800',
            'Proses' => 'bg-blue-100 text-blue-800',
            'Menunggu Dokumen' => 'bg-yellow-100 text-yellow-800',
            'Perlu Perbaikan' => 'bg-red-100 text-red-800',
            'Lengkap' => 'bg-green-100 text-green-800',
            'Selesai' => 'bg-emerald-100 text-emerald-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}