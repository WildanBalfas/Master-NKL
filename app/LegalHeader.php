<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalHeader extends Model
{
     protected $table='legal_header';
    protected $fillable = [
    	'user_id',
        'client_id',
        'tipe_data',
        'npwp',
        'nama_eksportir', 
        'alamat_eksportir',
        'kode_propinsi', 
        'kode_kabupaten', 
       	'no_etpik',
        'nama_importir',
        'alamat_importir',
        'kode_negara_importir',
        'kode_pelabuhan_muat',
        'kode_pelabuhan_bongkar',
        'kode_negara_tujuan',
        'skema_kerjasama',
        'no_vlegal',
        'transportasi',
        'no_invoice',
        'tgl_invoice',
        'keterangan', 
        'kode_pejabat_ttd',
        'kode_pengaman', 
        'tempat_ttd',
        'tgl_ttd',
        'no_slk',
        'digital_sign',
        'lokasi_stuffing',
        'status',
        'lampiran'
    ];


    public function l_detail() {
    	return $this->hasMany('App\LegalDetail', 'header_id', 'id');
    }
}
