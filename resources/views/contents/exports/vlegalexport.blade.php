<table border="1">
    <thead>
    	<!-- <tr>
    		<th colspan="6" align="center">
    			<b>ELEMEN DATA HEADER</b>
    		</th>
    	< -->/tr>
	    <!-- <tr>
	        <th>Tipe Data</th>
			<th>NPWP</th>
			<th>Nama Eksportir</th>
			<th>Alamat Eksportir</th>
			<th>Kode Propinsi</th>
			<th>Kode Kabupaten</th>
			<th>No. ETPIK</th>
			<th>Nama Importir</th>
			<th>Alamat Importir</th>
			<th>Kode Negara Importir</th>
			<th>Kode Pelabuhan Muat</th>
			<th>Kode Pelabuhan Bongkar</th>
			<th>Kode Negara Tujuan</th>
			<th>Skema Kerjasama</th>
			<th>No. V-Legal</th>
			<th>Transportasi</th>
			<th>No. Invoice</th>
			<th>Tgl. Invoice</th>
			<th>Keterangan</th>
			<th>Kode Pengaman</th>
			<th>Kode Pejabat TTD</th>
			<th>Tempat TTD</th>
			<th>Tgl. TTD</th>
			<th>No. S-LK</th>
			<th>Digital Sign</th>
	    </tr> -->
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
            <td> {{ $d->tipe_data}} </td> 
            <td> {{ $d->no_hs}} </td> 
            <td> {{ $d->nama_produk}} </td> 
            <td> {{ $d->volume}} </td> 
            <td> {{ $d->net_weight}} </td>
            <td> {{ $d->nou}} </td> 
            <td> {{ $d->value}} </td>
            <td> {{ $d->scientific_name}} </td>
            <td> {{ $d->kode_harvest_country}} </td>
            <td> {{ $d->hs_printed}} </td> 
            <td> {{ $d->valuta}} </td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- <table border="1">
    <thead>
    	<tr>
    		<th colspan="6" align="center">
    			<b>ELEMEN DATA DETAIL</b>
    		</th>
    	</tr>
	    <tr>
	        <th>Tipe Data</th>
			<th>No. HS</th>
			<th>Nama Produk</th>
			<th>Volume</th>
			<th>Net Weight</th>
			<th>Number of Unit</th>
			<th>Value (USD)</th>
			<th>Scientific Name</th>
			<th>Kode Harvest Country</th>
			<th>HS Printed</th>
			<th>Valuta</th>
	    </tr>
    </thead>
    <tbody>
    @foreach($detail as $d)
        <tr>
            <td> {{ $d->tipe_data}} </td> 
            <td> {{ $d->no_hs}} </td> 
	        <td> {{ $d->nama_produk}} </td> 
	        <td> {{ $d->volume}} </td> 
	        <td> {{ $d->net_weight}} </td>
	        <td> {{ $d->nou}} </td> 
	        <td> {{ $d->value}} </td>
	     	<td> {{ $d->scientific_name}} </td>
	        <td> {{ $d->kode_harvest_country}} </td>
	        <td> {{ $d->hs_printed}} </td> 
	        <td> {{ $d->valuta}} </td>
        </tr>
    @endforeach
    </tbody>
</table> -->