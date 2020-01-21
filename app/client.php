<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $table = "clients";
    protected $fillable = [
        'tipeClient',
        'kodeAu',
        'namaAu',
        'provinsi',
        'lingkup',
        'noSer',
        'sdSer',
        'edSer',
        'durasi',
        'progress',
        'status',
        'npwp',
        'namaEks',
        'alamatEks',
        'kodeProv',
        'kodeKab',
        'etpik',
        'skema',
        'kodePen',
        'tempat',
        'slk',
        'surat'
    ];
}
