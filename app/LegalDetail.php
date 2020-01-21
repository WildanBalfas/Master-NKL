<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalDetail extends Model
{
    protected $table='legal_detail';
    protected $fillable = [
        'no_hs', 
        'nama_produk', 
        'volume', 
        'net_weight',
        'nou', 
        'value',
     	'scientific_name',
        'kode_harvest_country',
        'hs_printed', 
        'valuta',
    	'id_header'        
    ];


    public function l_header() {
    	return $this->belongsTo('App\LegalHeader');
    }
}
