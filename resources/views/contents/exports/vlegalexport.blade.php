<table border="1">
    <thead>
    </thead>
    <tbody>
    @foreach($header as $d)
        <tr>
            <td>{{ $d->tipe_data }} </td>
            <td>{{ $d->npwp }} </td>
            <td>{{ $d->nama_eksportir }} </td> 
            <td>{{ $d->alamat_eksportir }} </td>
            <td>{{ $d->kode_propinsi }} </td> 
            <td>{{ $d->kode_kabupaten }} </td> 
            <td>{{ $d->no_etpik }} </td>
            <td>{{ $d->nama_importir }} </td>
            <td>{{ $d->alamat_importir }} </td>
            <td>{{ $d->kode_negara_importir }} </td>
            <td>{{ $d->kode_pelabuhan_muat }} </td>
            <td>{{ $d->kode_pelabuhan_bongkar }} </td>
            <td>{{ $d->kode_negara_tujuan }} </td>
            <td>{{ $d->skema_kerjasama }} </td>
            <td>{{ $d->no_vlegal }} </td>
            <td>{{ $d->transportasi }} </td>
            <td>{{ $d->no_invoice }} </td>
            <td>{{ \Carbon\Carbon::parse($d->tgl_invoice)->format('Ymd') }} </td>
            <td>{{ $d->keterangan }} </td> 
            <td>{{ $d->kode_pengaman }} </td> 
            <td>{{ $d->kode_pejabat_ttd }} </td>
            <td>{{ $d->tempat_ttd }} </td>
            <td>{{ \Carbon\Carbon::parse($d->tgl_ttd)->format('Ymd') }} </td>
            <td>{{ $d->no_slk }} </td>
            <td>{{ $d->digital_sign }}</td>
            <td>{{ $d->lokasi_stuffing }}</td>
        </tr>
    @endforeach
    @foreach($detail as $d)
        <tr>
            <td>{{ $d->tipe_data}} </td> 
            <td>{{ $d->no_hs}} </td> 
            <td>{{ $d->nama_produk}} </td> 
            <td><span>{{$d->volume}}</span></td> 
            <td><span>{{$d->net_weight}}</span></td>
            <td>{{ $d->nou}} </td> 
            <td><span>{{$d->value}}</span></td>
            <td>{{ $d->scientific_name}} </td>
            <td>{{ $d->kode_harvest_country}} </td>
            <td>{{ $d->hs_printed}} </td> 
            <td>{{ $d->valuta}} </td>
        </tr>
    @endforeach
    </tbody>
</table>