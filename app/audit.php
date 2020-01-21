<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class audit extends Model
{
    protected $table = "audits";
    protected $fillable = [
        'kodeAu',
        'namaAu',
        'provinsi',
        'jenisAu',
        'tglMul',
        'tglSel',
        'rencana',
        'hasil',
        'progress',
        'user_id'
    ];
}
