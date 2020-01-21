@extends('home')

@section('title')
> Daftar V-Legal
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DT/css/dataTables.bootstrap4.min.css') }}">
@stop

@section('content')
<a href="{{route('v-legal-header.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="margin-bottom:20px"><i class="fas fa-plus fa-sm text-white-50"></i> Create V-Legal </a>
<table class="table table-bordered" id="tblegal">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama Importir</th>
            <th>Nama Eksportir</th>
            <th>Data V-Legal</th>
            <th>Status</th>
            <th>Lampiran</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lh as $index => $a)
        @if(Auth::user()->role == 'admin' && $a->status == 'TERKIRIM' || Auth::user()->role == 'admin' && $a->status == 'DRAFT')
        <tr>
            <td>{{ ++$index }}</td>
            <td>{{ $a->nama_importir }}</td>
            <td>{{ $a->nama_eksportir }}</td>
            <td>Nomor : {{ $a->npwp }}<br>Tanggal : {{ \Carbon\Carbon::parse($a->tgl_invoice)->format('Y-m-d') }}</td>
            <td>{{ $a->status }}</td>
            <td>@if(!empty($a->lampiran))<a href="{{ asset($a->lampiran) }}" target="_blank">Lihat</a>@endif</td>
            <td>
                <a href="{{ route('v-legal-header.edit', $a->id) }}"><i class="fas fa-edit"></i></a>
                <a data-target="#delModal<?php echo $a->id; ?>" data-toggle="modal" href="#"><i class="fas fa-trash" style="color:red;"></i><a>
                    <a href="{{ route('vlh.excel', $a->id) }}"><i class="fas fa-file-excel" style="color:green;"></i></a>
                    <div class="modal fade" id="delModal<?php echo $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih " Yes " jika anda yakin data {{ $a->npwp }} ini dihapus</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('v-legal-header.hapus', $a->id) }}" class="btn btn-danger" data-target="#delModal">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a data-target="#viewModal<?php echo $a->id; ?>" data-toggle="modal" href="#"><i class="fas fa-eye"></i><a>
                        <div class="modal fade" id="viewModal<?php echo $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View Data V-Legal</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css">
                                            .tg  {border-collapse:collapse;border-spacing:0;border-width:1px;border-style:solid;border-color:#ccc;margin:0px auto;}
                                            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:7px 17px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                                            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:7px 17px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                                            .tg .tg-8hko{font-size:x-small;text-align:left;vertical-align:top}
                                            .tg .tg-7p3h{font-size:x-small;border-color:inherit;text-align:left;vertical-align:top}
                                            .tg .tg-gm9y{font-size:100%;background-color:#9aff99;color:#000000;border-color:inherit;text-align:center;vertical-align:top}
                                            .tg .tg-2qzf{font-size:x-small;border-color:#000000;text-align:left;vertical-align:top}
                                            .tg .tg-0lax{text-align:left;vertical-align:top}
                                            .tg .tg-3uo6{background-color:#9aff99;color:#000000;text-align:center;vertical-align:top}
                                        </style>
                                        <table class="tg">
                                          <tr>
                                            <th class="tg-gm9y" colspan="3">IMPORTIR</th>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Nama Importir<br></td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->nama_importir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Alamat Importir</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->alamat_eksportir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Negara Importir</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->kode_negara_importir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">No Invoice</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->no_invoice }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Tanggal Invoice</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ \Carbon\Carbon::parse($a->tgl_invoice)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-3uo6" colspan="3">V-LEGAL DATA</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Negara Tujuan</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->kode_negara_tujuan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Pelabuhan Muat</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->kode_pelabuhan_muat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Pelabuhan Bongkar</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->kode_pelabuhan_bongkar }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">No. SLK</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->no_slk }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">V-Legal Number</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->no_vlegal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Lokasi Stuffing</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->lokasi_stuffing }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Transportasi</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->transportasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Keterangan</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Approve Date</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ \Carbon\Carbon::parse($a->tgl_ttd)->format('d-m-Y') }}</td>
                                        </tr>
                                    </table>
                                    <br>
                                    <input type="checkbox" name="confirmation" value="Yes" required><p align="justify" style="font-size: 12px;">Saya setuju bahwa saya telah memberikan informasi yang benar dan dapat dipertanggungjawabkan sesuai dengan data yang telah dilampirkan. Apabila dikemudian hari diketahui bahwa data tersebut tidak benar, maka saya siap menerima konsekuensi yang sesuai dengan peraturan yang ada pada Lembaga Sertifikasi tersebut.</p>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a href="#" class="btn btn-success" data-target="#viewModal">Kirim</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endif
            @if(Auth::user()->role == 'client' && $a->user_id == Auth::user()->id)
            <!-- @if($a->user_id == Auth::user()->id) -->
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $a->nama_importir }}</td>
                <td>{{ $a->nama_eksportir }}</td>
                <td>Nomor : {{ $a->npwp }}<br>Tanggal : {{ \Carbon\Carbon::parse($a->tgl_invoice)->format('Y-m-d') }}</td>
                <td>{{ $a->status }}</td>
                <td>@if(!empty($a->lampiran))<a href="{{ asset($a->lampiran) }}" target="_blank">Lihat</a>@endif</td>
                <td>
                <!-- @if(Auth::user()->role == 'admin' || Auth::user()->role == 'Admin')
                <a href="{{ route('vlh.excel', $a->id) }}"><i class="fas fa-file-excel"></i></a>
                @endif -->
                @if($a->status == 'DRAFT') 
                <a href="{{ route('v-legal-header.edit', $a->id) }}"><i class="fas fa-edit"></i></a>
                <!-- @endif
                    @if($a->status == 'DRAFT') -->
                    <a data-target="#delModal<?php echo $a->id; ?>" data-toggle="modal" href="#"><i class="fas fa-trash"></i></a>
                    <div class="modal fade" id="delModal<?php echo $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih " Yes " jika anda yakin data {{ $a->npwp }} ini dihapus</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a href="{{ route('v-legal-header.hapus', $a->id) }}" class="btn btn-danger" data-target="#delModal">Yes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <a data-target="#viewModal<?php echo $a->id; ?>" data-toggle="modal" href="#"><i class="fas fa-eye"></i><a>
                        <div class="modal fade" id="viewModal<?php echo $a->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View Data V-Legal</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <style type="text/css">
                                            .tg  {border-collapse:collapse;border-spacing:0;border-width:1px;border-style:solid;border-color:#ccc;margin:0px auto;}
                                            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:7px 17px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                                            .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:7px 17px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                                            .tg .tg-8hko{font-size:x-small;text-align:left;vertical-align:top}
                                            .tg .tg-7p3h{font-size:x-small;border-color:inherit;text-align:left;vertical-align:top}
                                            .tg .tg-gm9y{font-size:100%;background-color:#9aff99;color:#000000;border-color:inherit;text-align:center;vertical-align:top}
                                            .tg .tg-2qzf{font-size:x-small;border-color:#000000;text-align:left;vertical-align:top}
                                            .tg .tg-0lax{text-align:left;vertical-align:top}
                                            .tg .tg-3uo6{background-color:#9aff99;color:#000000;text-align:center;vertical-align:top}
                                        </style>
                                        <table class="tg">
                                          <tr>
                                            <th class="tg-gm9y" colspan="3">IMPORTIR</th>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Nama Importir<br></td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->nama_importir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Alamat Importir</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->alamat_eksportir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Negara Importir</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->kode_negara_importir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">No Invoice</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ $a->no_invoice }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-2qzf">Tanggal Invoice</td>
                                            <td class="tg-7p3h">:</td>
                                            <td class="tg-7p3h">{{ \Carbon\Carbon::parse($a->tgl_invoice)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                            <td class="tg-0lax"></td>
                                        </tr>
                                        <tr>
                                            <td class="tg-3uo6" colspan="3">V-LEGAL DATA</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Negara Tujuan</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->kode_negara_tujuan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Pelabuhan Muat</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->kode_pelabuhan_muat }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Pelabuhan Bongkar</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->kode_pelabuhan_bongkar }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">No. SLK</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->no_slk }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">V-Legal Number</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->no_vlegal }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Lokasi Stuffing</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->lokasi_stuffing }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Transportasi</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->transportasi }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Keterangan</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ $a->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="tg-8hko">Approve Date</td>
                                            <td class="tg-8hko">:</td>
                                            <td class="tg-8hko">{{ \Carbon\Carbon::parse($a->tgl_ttd)->format('d-m-Y') }}</td>
                                        </tr>
                                    </table>
                                    <br>
                                    @if($a->status == 'DRAFT')
                                    <input type="checkbox" name="confirmation" value="Yes" required><p align="justify" style="font-size: 12px;">Saya setuju bahwa saya telah memberikan informasi yang benar dan dapat dipertanggungjawabkan sesuai dengan data yang telah dilampirkan. Apabila dikemudian hari diketahui bahwa data tersebut tidak benar, maka saya siap menerima konsekuensi yang sesuai dengan peraturan yang ada pada Lembaga Sertifikasi tersebut.</p>
                                </div>
                                @endif
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    @if($a->status == 'DRAFT')
                                    <a href="#" class="btn btn-success" data-target="#viewModal">Back</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- @endif -->
            @endif
            @endforeach
        </tbody>
    </table>
    @endsection


    @section('js')
    <script type="text/javascript" src="{{ asset('vendor/DT/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/DT/dataTables.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
     $(document).ready(function() 
     {
        $('#tblegal').DataTable();
    });
</script>
@stop