<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkPegawai extends Model
{
    protected $table = 'sk_pegawai';
    public $timestamps = false;

    protected $fillable = [
        'id_pegawai',
        'id_sk',
        'created_by',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function dataSk()
    {
        return $this->belongsTo(DataSk::class, 'id_sk');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}