@extends('home')

@section('add-adt')
> Edit V-Legal Header
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kode_negara_importir').select2({
            placeholder: "Pilih Kode Auditee",
            allowClear: true
        });
        $('#kode_pelabuhan_bongkar').select2({
            placeholder: "Pilih Kode Auditee",
            allowClear: true
        });
        $('#kode_negara_tujuan').select2({
            placeholder: "Pilih Kode Auditee",
            allowClear: true
        });
        $('#kode_pelabuhan_muat').select2({
            placeholder: "Pilih Kode Auditee",
            allowClear: true
        });
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
                url: '{{ url("/header/audit-data") }}/'+id,
                success: function(data){
                    $("#kode_pejabat_ttd").val(data.kodePen);
                    $("#npwp").val(data.npwp);
                    $("#nama_eksportir").val(data.namaEks);
                    $("#alamat_eksportir").val(data.alamatEks);
                    $("#kode_propinsi").val(data.kodeProv);
                    $("#no_etpik").val(data.etpik);
                    $("#skema_kerjasama").val(data.skema);
                $("#tempat_ttd").val(data.tempat); //tempat ttd
                $("#no_slk").val(data.slk);
                $("#kode").val(data.kodePen);
                $("#kode_kabupaten").val(data.kodeKab);
                // $("#provinsi").append("<option selected>"+data.provinsi+"</option>");
            }
        });
        });
    });
</script>
@endsection

@section('content')
<form method="POST" action="{{ route('vlh.update', $data->id) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <p class="col-sm-2" style="font-weight: bold; font-size: 20px; color: green;">LICENSEE</p>
                    <hr class="col-sm-9" style="border-top: 1px solid; color: darkgrey;">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kode Auditee</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" name="kodeAu"> --}}
                        <select name="client_id" id="client_id" class="form-control">
                            <option value="null">Pilih Kode Auditee</option>
                            @foreach($client as $c)
                            <option value="{{ $c->kodeAu }}" {{ $c->kodeAu == $data->client_id ? 'selected' : '' }}>{{ $c->kodeAu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">No. ETPIK</label>
                    <div class="col-sm-8">
                       <input type="text" class="form-control" name="no_etpik" id="no_etpik" readonly value="{{ $data->no_etpik }}">
                   </div>
               </div>
               <div class="form-group row" hidden>
                <label class="col-sm-4 col-form-label">Tipe Data</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="tipe_data" id="tipe_data" value="{{ $data->tipe_data }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">NPWP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="npwp" id="npwp" readonly value="{{ $data->npwp }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Eksportir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_eksportir" id="nama_eksportir" readonly value="{{ $data->nama_eksportir }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Alamat Eksportir</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="alamat_eksportir" readonly id="alamat_eksportir">{{ $data->alamat_eksportir }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Provinsi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="kode_propinsi" id="kode_propinsi" readonly value="{{  $data->kode_propinsi }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kabupaten/Kota</label>
                <div class="col-sm-8">
                   <input type="text" class="form-control" name="kode_kabupaten" id="kode_kabupaten" readonly value="{{ $data->kode_kabupaten }}">
               </div>
           </div>
           <br>
           <div class="form-group row">
            <p class="col-sm-2" style="font-weight: bold; font-size: 20px; color: green;">IMPORTIR</p>
            <hr class="col-sm-9" style="border-top: 1px solid; color: darkgrey;">
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Nama Importir</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nama_importir" id="nama_importir" value="{{ $data->nama_importir }}">
          </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Alamat Importir</label>
        <div class="col-sm-8">
            <textarea class="form-control" rows="3" name="alamat_importir" id="alamat_importir">{{ $data->alamat_importir }}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Negara Importir</label>
        <div class="col-sm-8">
            <select name="kode_negara_importir" id="kode_negara_importir" class="form-control">
                @foreach($negara as $p)
                <option value="{{ $p->kodeNegara }}" {{ $p->kodeNegara == $data->kode_negara_tujuan ? 'selected' : '' }}>{{ $p->kodeNegara.' - '.$p->nameNegara }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">No Invoice</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="no_invoice" id="no_invoice" value="{{ $data->no_invoice }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Tgl. Invoice</label>
        <div class="col-sm-8">
            <input type="date" class="form-control" name="tgl_invoice" id="tgl_invoice" value="{{ $data->tgl_invoice }}">
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group row">
        <p class="col-sm-4" style="font-weight: bold; font-size: 20px; color: green;">VLEGAL-DATA</p>
        <hr class="col-sm-7" style="border-top: 1px solid; color: darkgrey;">
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Negara Tujuan</label>
        <div class="col-sm-8">
            <select name="kode_negara_tujuan" id="kode_negara_tujuan" class="form-control">
                @foreach($negara as $p)
                <option value="{{ $p->kodeNegara }}" {{ $p->kodeNegara == $data->kode_negara_tujuan ? 'selected' : '' }}>{{ $p->kodeNegara.' - '.$p->nameNegara }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Pelabuhan Muat</label>
        <div class="col-sm-8">
            <select name="kode_pelabuhan_muat" id="kode_pelabuhan_muat" class="form-control">
                @foreach($pel_muat as $p)
                <option value="{{ $p->kodePelMuat }}" {{ $p->kodePelMuat == $data->kode_pelabuhan_muat ? 'selected' : '' }}>{{ $p->kodePelMuat.' - '.$p->namePelMuat }}</option>
                @endforeach
            </select>
            <!-- <input type="text" class="form-control" name="kode_pelabuhan_muat" id="kode_pelabuhan_muat" > -->
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Pelabuhan Bongkar</label>
        <div class="col-sm-8">
            <select name="kode_pelabuhan_bongkar" id="kode_pelabuhan_bongkar" class="form-control">
                @foreach($pel_bongkar as $p)
                <option value="{{ $p->kodePelBongkar }}" {{ $p->kodePelBongkar == $data->kode_pelabuhan_bongkar ? 'selected' : '' }}>{{ $p->kodePelBongkar.' - '.$p->namePelBongkar }}</option>
                @endforeach
            </select>
            <!-- <input type="text" class="form-control" name="kode_pelabuhan_bongkar" id="kode_pelabuhan_bongkar" > -->
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">No. S-LK</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="no_slk" id="no_slk" readonly value="{{ $data->no_slk }}">
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">V-Legal Number</label>
    <div class="col-sm-8">
     <input type="text" class="form-control" name="no_vlegal" id="no_vlegal" value="{{ $data->no_vlegal }}">
 </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Lokasi Stuffing</label>
    <div class="col-sm-8">
       <input type="text" class="form-control" name="lokasi_stuffing" id="lokasi_stuffing" value="{{ $data->lokasi_stuffing }}">
   </div>
</div>
@if(Auth::user()->role == 'admin')
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Status</label>
    <div class="col-sm-8">
        <select name="status" id="status" class="form-control" s>
            <option value="DRAFT" {{ $data->status == 'DRAFT' ? 'selected' : '' }}>DRAFT</option>
            <option value="TERKIRIM" {{ $data->status == 'TERKIRIM' ? 'selected' : '' }}>TERKIRIM</option>
            <option value="DALAM PROSES" {{ $data->status == 'DALAM PROSES' ? 'selected' : '' }}>DALAM PROSES</option>
            <option value="DITOLAK" {{ $data->status == 'DITOLAK' ? 'selected' : '' }}>DITOLAK</option>
            <option value="SELESAI" {{ $data->status == 'SELESAI' ? 'selected' : '' }}>SELESAI</option>
        </select>
        <!-- <input type="text" class="form-control" name="status" id="status" value="{{ $data->status }}"> -->
    </div>
</div>
@elseif(Auth::user()->role == 'client')
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Status</label>
    <div class="col-sm-8">
        @if(Auth::user()->role == 'client')
         <input type="text" class="form-control" name="status" id="status" value="{{ $data->status }}" readonly>
        @endif
    </div>
</div>
@endif
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Skema Kerjasama</label>
    <div class="col-sm-8">
       <input type="text" class="form-control" name="skema_kerjasama" id="skema_kerjasama"readonly value="{{ $data->skema_kerjasama }}">
   </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Transportasi</label>
    <div class="col-sm-8">
        <!-- <input type="text" class="form-control" name="transportasi" id="transportasi" value="{{ $data->transportasi }}"> -->
        <select name="transportasi" id="transportasi" class="form-control">
            <option selected value="{{ $data->transportasi }}">{{ $data->transportasi }}</option>
            <option value="1">BYSEA</option>
            <option value="2">BYAIR</option>
            <option value="3">BYLAND</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Keterangan</label>
    <div class="col-sm-8">
        <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $data->keterangan }}</textarea>
    </div>
</div>
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Kode Pengaman</label>
    <div class="col-sm-8">
       <input type="text" class="form-control" name="kode_pengaman" id="kode_pengaman" value="{{ $data->kode_pengaman }}">
   </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Pejabat TTD</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="kode_pejabat_ttd" id="kode_pejabat_ttd" readonly value="{{ $data->kode_pejabat_ttd }}">
    </div>
</div>
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Tempat TTD</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="tempat_ttd" id="tempat_ttd" readonly value="{{ $data->tempat_ttd }}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Approve Date</label>
    <div class="col-sm-8">
        <input type="date" class="form-control" name="tgl_ttd" id="tgl_ttd" value="{{ $data->tgl_ttd }}">
    </div>
</div>
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Digital Sign</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="digital_sign" id="digital_sign" value="{{ $data->digital_sign }}" readonly>
    </div>
</div>
</div>
</div>
<div class="form-group row text-center">
    <a class="btn btn-secondary" href="{{ url('v-legal-header') }}">Cancel</a>
    <div class="col-md-4">
        <button type="submit" class="btn btn-block btn-success" value="submit">Next <i class="fa fa-arrow-right"></i></button>
    </div>
</div>
</div>


</form>
@endsection
