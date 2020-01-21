@extends('home')

@section('edit-adt')
> Edit Audit
@endsection

@section('form_edit_audit')
<form method="POST" action="/{{ $audit_data->id }}/update-audit" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Auditee</label>
        <div class="col-sm-4">
        <input type="text" id="kodeAu" class="form-control" name="kodeAu" value="{{$audit_data->kodeAu}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Auditee</label>
        <div class="col-sm-4">
            <input type="text" id="namaAu" class="form-control" name="namaAu" value="{{$audit_data->namaAu}}" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-4">
            <select name="provinsi" class="form-control" id="provinsi" readonly>
                <option selected>{{$audit_data->provinsi}}</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Audit</label>
        <div class="col-sm-4">
            <select name="jenisAu" id="jenisAu" class="form-control">
                <option selected>{{$audit_data->jenisAu}}</option>
                <option>AUDIT AWAL</option>
                <option>PENILIKAN-I</option>
                <option>PENILIKAN-II</option>
                <option>PENILIKAN-III</option>
                <option>PENILIKAN-IV</option>
                <option>PENILIKAN-V</option>
                <option>RE-SERTIFIKASI</option>
                <option>AUDIT KHUSUS</option>
            </select>
            <!-- <input type="text" class="form-control" name="jenisAu" value="{{$audit_data->jenisAu}}"> -->
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tgl. Mulai</label>
        <div class="col-sm-3">
            <input type="date" class="form-control" name="tglMul" value="{{$audit_data->tglMul}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tgl. Selesai</label>
        <div class="col-sm-3">
            <input type="date" class="form-control" name="tglSel" value="{{$audit_data->tglSel}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">File Hasil</label>
        <div class="col-sm-3">
        <input type="file" class="form-control" name="hasil" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Progress</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="progress" value="{{$audit_data->progress}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="submit">Update</button>
        <a class="btn btn-secondary" href="{{ url('view-audit') }}">Cancel</a>
    </div>
    </div>
    <input type="hidden" name="_method" value="PUT"/>
</form>
@endsection
