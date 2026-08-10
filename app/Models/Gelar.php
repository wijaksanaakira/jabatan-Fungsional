<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gelar extends Model
{
    protected $table = 'gelar';
    public $timestamps = false;

    protected $fillable = [
        'fakultas',
        'program_studi',
        'jenjang',
        'gelar',
        'gelar_inggris',
    ];
}