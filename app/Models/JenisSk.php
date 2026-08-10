<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSk extends Model
{
    protected $table = 'jenis_sk';
    protected $primaryKey = 'id_jenis';
    public $timestamps = false;

    protected $fillable = [
        'nama_jenis',
    ];

    public function dataSk()
    {
        return $this->hasMany(DataSk::class, 'id_jenis', 'id_jenis');
    }
}