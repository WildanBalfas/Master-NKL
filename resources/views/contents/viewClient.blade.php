@extends('home')

@section('title-clt')
> Daftar Client
@endsection

@section('client-content')
<a href="{{url('input-client')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="margin-bottom:20px"><i class="fas fa-plus fa-sm text-white-50"></i> Add Client</a>
<table class="table table-bordered" id="tblegal">
    <thead class="thead-light">
        <tr>
            <th>Kode Auditee</th>
            <th>Auditee</th>
            <th>Provinsi</th>
            <th>Usaha</th>
            <th>No. Sertifikat</th>
            <th>Masa Berlaku</th>
            <th>Durasi</th>
            <th>Progress</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($client as $c)
        <tr>
            <td>{{ $c->kodeAu }}</td>
            <td>{{ $c->namaAu }}</td>
            <td>{{ $c->provinsi }}</td>
            <td>{{ $c->lingkup }}</td>
            <td>{{ $c->noSer }}</td>
            <td>{{ \Carbon\Carbon::parse($c->sdSer)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($c->edSer)->format('d-m-Y') }}</td>
            <td>{{ $c->durasi }}</td>
            <td>{{ $c->progress }}</td>
            <td>
                @if($c->status == 'DICABUT')
                    <div style="color: red;">{{ $c->status }}</div>
                @elseif($c->status == 'DIBEKUKAN')
                    <div style="color: blue;">{{ $c->status }}</div>
                @else
                    {{ $c->status }}
                @endif
            </td>
            <td>
                <a href="/{{ $c->id }}/edit"><i class="fas fa-edit"></i></a>
                <a data-target="#delModal<?php echo $c->id; ?>" data-toggle="modal" href="#"><i class="fas fa-trash" style="color: red;"></i></a>
                @if(!empty($c->surat))
                <a href="{{ asset($c->surat) }}" target="_blank"><i class="fas fa-paperclip"></i></a>
                @endif

                <div class="modal fade" id="delModal<?php echo $c->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Pilih " Yes " jika anda yakin data {{ $c->kodeAu }} ini dihapus</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a href="/{{ $c->id }}/delete" class="btn btn-danger" data-target="#delModal">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
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
