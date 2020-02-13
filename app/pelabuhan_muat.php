<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class audit extends Model
{
    protected $table = "kode_pelabuhan_muat";
    protected $fillable = [
        'kodePelMuat',
        'namePelMuat'
    ];
}
