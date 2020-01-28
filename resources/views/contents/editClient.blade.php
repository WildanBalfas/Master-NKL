@extends('home')

@section('edit-clt')
> Edit Client
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#provinsi').select2({
        placeholder: "Pilih Provinsi",
        allowClear: true
    });
    $('#kode_provinsi').select2({
        placeholder: "Pilih Kode Provinsi",
        allowClear: true
    });
    $('#kode_kabupaten').select2({
        placeholder: "Pilih Kode Kabupaten",
        allowClear: true
    });
    $('#user_id').select2({
        placeholder: "Pilih Kode Kabupaten",
        allowClear: true
    });
});

  function showDiv(divId, element)
  {
    document.getElementById(divId).style.display = element.value == 'Non Eksportir' ? 'none' : 'block';
}
</script>

@endsection


@section('form_edit_client')
<form method="POST" action="/{{ $client_data->id }}/update">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-4">
            <select name="user_id" class="form-control" id="user_id">
              @foreach($users as $p)
              <option value="{{ $p->id }}" {{ $p->id == $client_data->user_id ? 'selected' : '' }} >{{ $p->name }}</option>
              @endforeach
          </select>
      </div>
  </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipe Client</label>
        <div class="col-sm-4">
            <select name="tipeClient" class="form-control" required onchange="showDiv('hidden_div', this)">
                <option selected>{{$client_data->tipeClient}}</option>
                <option value="Eksportir">Eksportir</option>
                <option value="Eksportir Non Produsen">Eksportir Non Produsen</option>
                <option value="Non Eksportir">Non Eksportir</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Auditee</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="kodeAu" value="{{$client_data->kodeAu}}" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Auditee</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="namaAu" value="{{$client_data->namaAu}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-4">
          <select name="provinsi" class="form-control" id="provinsi">
            @foreach($provinsi as $p)
            <option value="{{ $p->nameProvinsi }}" {{ $client_data->provinsi == $p->nameProvinsi ? 'selected' : '' }}>{{ $p->nameProvinsi }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Lingkup Usaha</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="lingkup" value="{{$client_data->lingkup}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">No. Sertifikat</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="noSer" value="{{$client_data->noSer}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Masa Berlaku</label>
    <div class="col-sm-3">
        <input type="date" class="form-control" name="sdSer" value="{{$client_data->sdSer}}">
    </div>
    s/d
    <div class="col-sm-3">
        <input type="date" class="form-control" name="edSer" value="{{$client_data->edSer}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Durasi</label>
    <div class="col-sm-4">
        <select name="durasi" class="form-control">
            <option selected>{{$client_data->durasi}}</option>
            <option>1 Tahun</option>
            <option>3 Tahun</option>
            <option>5 Tahun</option>
            <option>6 Tahun</option>
            <option>7 Tahun</option>
            <option>10 Tahun</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Progress</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="progress" value="{{$client_data->progress}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-4">
        <select name="status" class="form-control">
            <option selected>{{$client_data->status}}</option>
            <option>AKTIF</option>
            <option>DICABUT</option>
            <option>DIBEKUKAN</option>
        </select>
    </div>
</div>
@if($client_data->tipeClient == 'Non Eksportir')
<div id="hidden_div" style="display: none;">
@elseif($client_data->tipeClient == 'Eksportir' && $client_data->tipeClient == 'Eksportir Non Produsen')
<div id="hidden_div">
@endif
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">NPWP</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="npwp" value="{{$client_data->npwp}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Eksportir</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="namaEks" value="{{$client_data->namaEks}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat Eksportir</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="alamatEks" value="{{$client_data->alamatEks}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Provinsi</label>
        <div class="col-sm-4">
            <select name="kodeProv" class="form-control" id="kode_provinsi">
              @foreach($provinsi as $p)
              <option value="{{ $p->kodeProvinsi }}" {{ $client_data->kodeProv == $p->kodeProvinsi ? 'selected' : '' }} >{{ $p->kodeProvinsi.' - '.$p->nameProvinsi }}</option>
              @endforeach
          </select>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-4">
        <select name="kodeKab" class="form-control" id="kode_kabupaten">
          @foreach($kabupaten as $k)
          <option value="{{ $k->kodeKab }}" {{ $client_data->kodeKab == $k->kodeKab ? 'selected' : '' }}>{{ $k->kodeKab.' - '.$k->nameKab }}</option>
          @endforeach
      </select>
  </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">No. ETPIK</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="etpik" value="{{$client_data->etpik}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Skema Kerja Sama</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="skema" value="{{$client_data->skema}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode Penjabat</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="kodePen" value="{{$client_data->kodePen}}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tempat TTD</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="tempat" value="{{$client_data->tempat}}" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">No. SLK</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="slk" value="{{$client_data->slk}}">
    </div>
</div>
</div>
<div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="submit">Update</button>
        <a class="btn btn-secondary" href="{{ url('view-client') }}">Cancel</a>
    </div>
</div>
<input type="hidden" name="_method" value="PUT"/>
</form>
@endsection
