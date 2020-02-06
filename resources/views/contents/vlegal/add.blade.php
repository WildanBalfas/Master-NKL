@extends('home')
<!-- view -->
@section('add-adt')
> Tambah V-Legal Header
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

        $('#kode_negara_importir').change(function() {
            var negara = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ url("/header/pelabuhan-muat") }}/'+negara,
                success: function(data){
                    $('#kode_pelabuhan_muat').select2({
                        data: data,
                    });        
                }
            });
            
        });

        $('#kode_negara_tujuan').change(function() {
            var negara = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ url("/header/pelabuhan-bongkar") }}/'+negara,
                success: function(data){
                    $('#kode_pelabuhan_bongkar').select2({
                        data: data,
                    });        
                }
            });
        });

        $('#kode_pelabuhan_bongkar').select2({
            placeholder: "Pilih Negara Tujuan terlebih dahulu",
            allowClear: true
        });
        $('#kode_negara_tujuan').select2({
            placeholder: "Pilih negara tujuan",
            allowClear: true,
        });
        $('#kode_pelabuhan_muat').select2({
            placeholder: "Pilih negara importir terleih dahulu",
            allowClear: true,
        });


        var $kode = $('#kodeAu');
        $kode.select2({
            placeholder: "Pilih Kode Auditee",
            allowClear: true
        });
        var anu = $kode.val();
        if (anu != '')
        {
            $.ajax({
                type: "GET",
                url: '{{ url("/header/audit-data") }}/'+anu,
                success: function(data){
                    $("#kode_pejabat_ttd").val(data.kodePen);
                    $("#npwp").val(data.npwp);
                    $("#nama_eksportir").val(data.namaEks);
                    $("#alamat_eksportir").val(data.alamatEks);
                    $("#kode_propinsi").val(data.kodeProv);
                    $("#provinsi_lengkap").val(data.provinsi_lengkap);
                    $("#no_etpik").val(data.etpik);
                    $("#skema_kerjasama").val(data.skema);
                    $("#tempat_ttd").val(data.tempat); //tempat ttd
                    $("#no_slk").val(data.slk);
                    $("#kode").val(data.kodePen);
                    $("#kode_kabupaten").val(data.kodeKab);
                    $("#kabupaten_lengkap").val(data.kabupaten_lengkap);
                // $("#provinsi").append("<option selected>"+data.provinsi+"</option>");
            },
            error: function(data) {
                    //
                }   
            });
        }
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
                    $("#provinsi_lengkap").val(data.provinsi_lengkap);
                    $("#no_etpik").val(data.etpik);
                    $("#skema_kerjasama").val(data.skema);
                $("#tempat_ttd").val(data.tempat); //tempat ttd
                $("#no_slk").val(data.slk);
                $("#kode").val(data.kodePen);
                $("#kode_kabupaten").val(data.kodeKab);
                $("#kabupaten_lengkap").val(data.kabupaten_lengkap);
                // $("#provinsi").append("<option selected>"+data.provinsi+"</option>");
            },
            error: function(data) {
                    //
                }   
            });
        });
    });
</script>
@endsection

@section('content')
<form method="POST" action="{{ route('v-legal-header.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="col-md-12">
        <hr style="border-top: 1px solid; color: lightgrey;">
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">File Lampiran <span style="color: red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="lampiran" id="lampiran" required>
                        <p style="font-style: italic; font-size: 12px;">Jika lebih dari satu dibuat archive dalam bentuk .zip</p>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-2" style="font-weight: bold; font-size: 20px; color: green;">LICENSEE</p>
                    <hr class="col-sm-9" style="border-top: 1px solid; color: lightgrey;">
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kode Auditee</label>
                    <div class="col-sm-8">
                        {{-- <input type="text" class="form-control" name="kodeAu"> --}}
                        <select name="client_id" id="kodeAu" class="form-control" disabled="true">
                            <option value="null" selected>Pilih Kode Auditee</option>
                            @foreach($client as $c)
                            <option value="{{ $c->kodeAu }}" {{ !empty($klien) ? $c->kodeAu == $klien->kodeAu ? 'selected' : '' : '' }}>{{ $c->kodeAu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">ETPIK Number</label>
                    <div class="col-sm-8">
                     <input type="text" class="form-control" name="no_etpik" id="no_etpik" readonly>
                 </div>
             </div>
             <div class="form-group row">
                <label class="col-sm-4 col-form-label">NPWP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="npwp" id="npwp" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama Eksportir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_eksportir" id="nama_eksportir" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Alamat Eksportir</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="alamat_eksportir" readonly id="alamat_eksportir"></textarea>
                </div>
            </div>
            <div class="form-group row" hidden>
                <label class="col-sm-4 col-form-label">Tipe Data</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="tipe_data" id="tipe_data" value="H1" readonly>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Provinsi</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="provinsi_lengkap" readonly>
                  <input type="hidden" class="form-control" name="kode_propinsi" id="kode_propinsi" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Kabupaten/Kota</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="kode_kabupaten" id="kabupaten_lengkap" readonly>
              <input type="hidden" class="form-control" name="kode_kabupaten" id="kode_kabupaten" readonly>
              
        </div>
    </div>
    <br>
    <div class="form-group row">
        <p class="col-sm-2" style="font-weight: bold; font-size: 20px; color: green;">IMPORTIR</p>
        <hr class="col-sm-9" style="border-top: 1px solid; color: lightgrey;">
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Nama Importir <span style="color: red;">*</span></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="nama_importir" id="nama_importir" required>
      </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Alamat Importir <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <textarea class="form-control" rows="3" name="alamat_importir" id="alamat_importir" required></textarea>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Negara Importir <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <select name="kode_negara_importir" id="kode_negara_importir" class="form-control">
            @foreach($negara as $p)
            <option value="{{ $p->kodeNegara }}">{{ $p->kodeNegara.' - '.$p->nameNegara }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">No Invoice <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="no_invoice" id="no_invoice" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Tgl. Invoice <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <input type="date" class="form-control" name="tgl_invoice" id="tgl_invoice" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
    </div>
</div>
</div>
<div class="col-md-6">
 <div class="form-group row">
    <p class="col-sm-4" style="font-weight: bold; font-size: 20px; color: green;">VLEGAL-DATA</p>
    <hr class="col-sm-7" style="border-top: 1px solid; color: lightgrey;">
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Negara Tujuan <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <select name="kode_negara_tujuan" id="kode_negara_tujuan" class="form-control">
            @foreach($negara as $p)
            <option value="{{ $p->kodeNegara }}">{{ $p->kodeNegara.' - '.$p->nameNegara }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Kode  Pelabuhan Muat <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <select name="kode_pelabuhan_muat" id="kode_pelabuhan_muat" class="form-control">
            <!-- <option >-- pilih negara importir terlebih dahulu</option> -->
            <!-- @foreach($pel_muat as $p)
            <option value="{{ $p->kodePelMuat }}">{{ $p->kodePelMuat.' - '.$p->namePelMuat }}</option>
            @endforeach -->
        </select>
        <!-- <input type="text" class="form-control" name="kode_pelabuhan_muat" id="kode_pelabuhan_muat" > -->
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Pelabuhan Bongkar <span style="color: red;">*</span></label>
    <div class="col-sm-8">
        <select name="kode_pelabuhan_bongkar" id="kode_pelabuhan_bongkar" class="form-control">
            <!-- <option >-- pilih negara tujuan terlebih dahulu</option> -->
            <!-- @foreach($pel_bongkar as $p)
            <option value="{{ $p->kodePelBongkar }}">{{ $p->kodePelBongkar.' - '.$p->namePelBongkar }}</option>
            @endforeach -->
        </select>
        <!-- <input type="text" class="form-control" name="kode_pelabuhan_bongkar" id="kode_pelabuhan_bongkar" > -->
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">No. S-LK</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="no_slk" id="no_slk" readonly>
  </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">V-Legal Number</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="no_vlegal" id="no_vlegal" placeholder="Generated after save" {{ Auth::user()->role == 'client' ?'readonly':''}}>
  </div>
</div>
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Kode Pengaman</label>
    <div class="col-sm-8">
     <input type="text" class="form-control" name="kode_pengaman" id="kode_pengaman">
 </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Kode Pejabat TTD</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="kode_pejabat_ttd" id="kode_pejabat_ttd" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Lokasi Stuffing <span style="color: red;">*</span></label>
    <div class="col-sm-8">
     <input type="text" class="form-control" name="lokasi_stuffing" id="lokasi_stuffing" required>
 </div>
</div>
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Tempat TTD</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="tempat_ttd" id="tempat_ttd" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label">Status</label>
    <div class="col-sm-8">
        @if(Auth::user()->role == 'client')
        <input type="text" class="form-control" name="status" id="status" value="DRAFT" readonly>
        @elseif(Auth::user()->role == 'admin')
        <select name="status" id="status" class="form-control" required>
            <option selected value="DRAFT">DRAFT</option>
            <option value="TERKIRIM">TERKIRIM</option>
            <option value="DALAM PROSES">DALAM PROSES</option>
            <option value="DITOLAK">DITOLAK</option>
            <option value="SELESAI">SELESAI</option>
        </select>
        @endif
        <!-- <input type="text" class="form-control" name="status" id="status" > -->
    </div>
</div>
<div class="form-group row" hidden>
    <label class="col-sm-4 col-form-label">Skema Kerjasama</label>
    <div class="col-sm-8">
     <input type="text" class="form-control" name="skema_kerjasama" id="skema_kerjasama"readonly>
 </div>
</div>
                <!-- <div class="form-group row">
                    <label class="col-sm-4 col-form-label">No. V-Legal</label>
                    <div class="col-sm-8">
                         <input type="text" class="form-control" name="no_vlegal" id="no_vlegal" >
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Transportasi <span style="color: red;">*</span></label>
                    <div class="col-sm-8">
                        <!-- <input type="text" class="form-control" name="transportasi" id="transportasi" required> -->
                        <select name="transportasi" id="transportasi" class="form-control">
                            <option selected value="1">BY SEA</option>
                            <option value="2">BY AIR</option>
                            <option value="3">BY LAND</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Approve Date <span style="color: red;">*</span></label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="tgl_ttd" id="tgl_ttd" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="form-group row" hidden>
                    <label class="col-sm-4 col-form-label">Digital Sign</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="digital_sign" id="digital_sign" value="1" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row text-center">
            <div class="col-sm-4">
                <a class="btn btn-secondary" href="{{ url('v-legal-header') }}">Cancel</a>
                <button type="submit" class="btn btn-success" value="submit">Next <i class="fa fa-arrow-right"></i></button>
            </div>
            <div class="col-sm-8"></div>
        </div>
    </div>


</form>
@endsection
