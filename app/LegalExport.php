<?php

namespace App;

use App\LegalHeader;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Events\AfterSheet;
use DB;

class LegalExport implements FromView, ShouldAutoSize, WithColumnFormatting
{
	public function __construct(int $id)
    {
        $this->id = $id;
    }


    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER,
            'D' => '@'
        ];
    }

    public function view(): View
    {
    	$header = LegalHeader::select(
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
            'lokasi_stuffing'
        )
        ->where('id',$this->id)->get();

        $detail = DB::table('legal_header as a')
        ->select('b.tipe_data',
            'b.no_hs', 
            'b.nama_produk', 
            'b.volume', 
            'b.net_weight',
            'b.nou', 
            'b.value',
            'b.scientific_name',
            'b.kode_harvest_country',
            'b.hs_printed', 
            'b.valuta')
        ->leftJoin('legal_detail as b', 'a.id', '=', 'b.id_header')
        ->where('a.id', $this->id)
        ->get();

        $data = [
            'header' => $header,
            'detail' => $detail
        ];

        return view('contents.exports.vlegalexport', $data);
    }
}
