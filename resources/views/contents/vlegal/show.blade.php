@extends('home')

@section('title-adt')
> Daftar Rencana Audit
@endsection

@section('audit-content')
<a href="{{url('input-audit')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="margin-bottom:20px"><i class="fas fa-plus fa-sm text-white-50"></i> Add Rencana Audit</a>
<table class="table">
  <thead class="thead-light">
    <tr>
        <th>Kode Auditee</th>
        <th>Auditee</th>
        <th>Provinsi</th>
        <th>Jenis Audit</th>
        <th>Tgl. Mulai</th>
        <th>Tgl. Selesai</th>
        <th>Pengumuman Rencana</th>
        <th>Pengumuman Hasil</th>
        <th>Progress</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($audit as $a)
        <tr>
        <td>{{ $a->kodeAu }}</td>
        <td>{{ $a->namaAu }}</td>
        <td>{{ $a->provinsi }}</td>
        <td>{{ $a->jenisAu }}</td>
        <td>{{ $a->tglMul }}</td>
        <td>{{ $a->tglSel }}</td>
        <td>
            @if(!empty($a->rencana))<a href="{{ asset($a->rencana) }}" target="_blank">Lihat</a>@endif
        </td>
        <td>
            @if(!empty($a->hasil))<a href="{{ asset($a->hasil) }}" target="_blank">Lihat</a>@endif
        </td>

        <td>{{ $a->progress }}</td>
        <td>
            <a href="/{{ $a->id }}/edit-audit"><i class="fas fa-edit"></i></a>
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
                    <div class="modal-body">Pilih " Yes " jika anda yakin data {{ $a->kodeAu }} ini dihapus</div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="/{{ $a->id }}/delete-audit" class="btn btn-danger" data-target="#delModal">Yes</a>
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
