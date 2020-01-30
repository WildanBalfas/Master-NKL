@extends('home')

@section('add-clt')
> Tambah Client
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

function showSurat(suratId, element)
{
    document.getElementById(suratId).style.display = element.value == 'DIBEKUKAN' ? 'block' : 'none';
}
</script>

@endsection

@section('form_client')
<form method="POST" action="/input-client" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-4">
            <select name="user_id" class="form-control" id="user_id">
              @foreach($users as $p)
              <option value="{{ $p->id }}">{{ $p->name }}</option>
              @endforeach
          </select>
      </div>
  </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tipe Client</label>
        <div class="col-sm-4">
            <select name="tipeClient" class="form-control" onchange="showDiv('hidden_div', this)">
                <option selected value="Eksportir">Eksportir</option>
                <option value="Eksportir Non Produsen">Eksportir Non Produsen</option>
                <option value="Non Eksportir">Non Eksportir</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Auditee</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="kodeAu" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Auditee</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="namaAu" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Provinsi</label>
        <div class="col-sm-4">
            <select name="provinsi" class="form-control" id="provinsi">
              @foreach($provinsi as $p)
              <option value="{{ $p->nameProvinsi }}">{{ $p->nameProvinsi }}</option>
              @endforeach
          </select>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Lingkup Usaha</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="lingkup">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">No. Sertifikat</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="noSer">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Masa Berlaku</label>
    <div class="col-sm-3">
        <input type="date" class="form-control" name="sdSer">
    </div>
    s/d
    <div class="col-sm-3">
        <input type="date" class="form-control" name="edSer">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Durasi</label>
    <div class="col-sm-4">
        <select name="durasi" class="form-control">
            <option selected>1 Tahun</option>
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
        <input type="text" class="form-control" name="progress">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-4">
        <select name="status" class="form-control" onchange="showSurat('hidden_surat', this)">
            <option selected value="AKTIF">AKTIF</option>
            <option value="DICABUT">DICABUT</option>
            <option value="DIBEKUKAN">DIBEKUKAN</option>
        </select>
    </div>
</div>
<div id="hidden_surat" style="display: none;">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">File Surat</label>
        <div class="col-sm-4">
            <input type="file" class="form-control" name="surat" id="surat">
        </div>
    </div>
</div>
<div id="hidden_div">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">NPWP</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="npwp">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama Eksportir</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="namaEks">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat Eksportir</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="alamatEks">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Kode Provinsi</label>
        <div class="col-sm-4">
            <select name="kodeProv" class="form-control" id="kode_provinsi">
              @foreach($provinsi as $p)
              <option value="{{ $p->kodeProvinsi }}">{{ $p->kodeProvinsi.' - '.$p->nameProvinsi }}</option>
              @endforeach
          </select>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode Kabupaten</label>
    <div class="col-sm-4">
        <select name="kodeKab" class="form-control" id="kode_kabupaten">
          @foreach($kabupaten as $k)
          <option value="{{ $k->kodeKab }}">{{ $k->kodeKab.' - '.$k->nameKab }}</option>
          @endforeach
      </select>
  </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">No. ETPIK</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="etpik">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Skema Kerja Sama</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="skema" value="0" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kode Penjabat</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="kodePen" value="SNR" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tempat TTD</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="tempat" value="BOGOR" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">No. SLK</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="slk">
    </div>
</div>
</div>
<div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="submit">Save</button>
        <a class="btn btn-secondary" href="{{ url('view-client') }}">Cancel</a>
    </div>
</div>
</form>
@endsection
