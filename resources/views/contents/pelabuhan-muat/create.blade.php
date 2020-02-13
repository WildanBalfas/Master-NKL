@extends('home')

@section('add-clt')
> Tambah Pelabuhan Muat
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection

@section('form_PelMuat')
<form method="POST" action="{{ route('pelabuhan_muat.store') }}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Pelabuhan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="kodePelMuat" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Pelabuhan</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="namePelMuat" required>
        </div>
    </div>
@endsection
