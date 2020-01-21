@extends('home')

@section('add-adt')
> Tambah Rencana Audit
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    var $kode = $('#kodeAu');
    $kode.select2({
        placeholder: "Pilih Kode Auditee",
        allowClear: true
    });
    $kode.on("change", function(e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: '{{ url("audit-data") }}/'+id,
            success: function(data){
                $("#namaAu").val(data.namaAu);
                $("#provinsi").append("<option selected>"+data.provinsi+"</option>");
            }
        });
    });
});
</script>
@endsection

@section('form_audit')
<form method="POST" action="/input-audit" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Auditee</label>
        <div class="col-sm-4">
            {{-- <input type="text" class="form-control" name="kodeAu"> --}}
            <select name="kodeAu" id="kodeAu" class="form-control">
                <option value="null" selected>Pilih Kode Auditee</option>
                @foreach($client as $c)
                <option value="{{ $c->kodeAu }}">{{ $c->kodeAu }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Auditee</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="namaAu" id="namaAu" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-4">
            <select name="provinsi" class="form-control" id="provinsi" readonly>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Jenis Audit</label>
        <div class="col-sm-4">
            <select name="jenisAu" id="jenisAu" class="form-control">
                <option selected>AUDIT AWAL</option>
                <option>PENILIKAN-I</option>
                <option>PENILIKAN-II</option>
                <option>PENILIKAN-III</option>
                <option>PENILIKAN-IV</option>
                <option>PENILIKAN-V</option>
                <option>RE-SERTIFIKASI</option>
                <option>AUDIT KHUSUS</option>
            </select>
            <!-- <input type="text" class="form-control" name="jenisAu"> -->
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tgl. Mulai</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="tglMul">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tgl. Selesai</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" name="tglSel">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">File Rencana</label>
        <div class="col-sm-3">
            <input type="file" class="form-control" name="rencana" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Progress</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="progress">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="submit">Save</button>
        <a class="btn btn-secondary" href="{{ url('view-audit') }}">Cancel</a>
    </div>
    </div>
</form>
@endsection
