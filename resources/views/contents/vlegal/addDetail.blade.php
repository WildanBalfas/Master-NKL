@extends('home')

@section('add-adt')
> Tambah V-Legal Detail
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#valuta').select2();
    
});
</script>
@endsection

@section('form_audit')
<div class="">
    <form method="POST" action="{{route('v-legal-detail.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('POST') }}
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="id_header" id="id_header" value="{{$id}}">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">HS Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_hs" id="no_hs" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Deskripsi Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Volume (M3)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="volume" id="volume" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Net Weight (KG)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="net_weight" id="net_weight" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Number of Unit</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nou" id="nou" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Value</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="value" id="value" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Currency</label>
                        <div class="col-sm-8">
                            <select name="valuta" id="valuta" class="form-control" required>
                                @foreach($mata_uang as $p)
                                <option value="{{ $p->currencyCode }}">{{ $p->currencyCode.' - '.$p->currencyName }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" name="valuta" id="valuta" required> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Scientific Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="scientific_name" id="scientific_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Country of Harvest</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kode_harvest_country" id="kode_harvest_country" required>
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label class="col-sm-4 col-form-label">HS Printed</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="hs_printed" id="hs_printed">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-block btn-success" value="submit"><i class="fa fa-plus"></i> Add</button>
            </div>
            <!-- <div class="col-sm-3">
                <button type="button" class="btn btn-block btn-primary" onclick="window.location.href = '{{ route('v-legal-header.index') }}'" role="button"><i class="fa fa-save"></i> Save</button>
            </div> -->
        </div>
    </form>
</div>

<div class="">
    <table class="table table-bordered" id="tblegal">
  <thead class="thead-light">
    <tr>
        <th>No</th>
        <th>No HS</th>
        <th>Deskripsi Produk</th>
        <th>Volume(M3)</th>
        <th>Net Weight(KG)</th>
        <th>Number of Unit</th>
        <th>Value</th>
        <th>Currency (USD)</th>
        <th>Scientific name</th>
        <th>Country of Harvest</th>
        <!-- <th>HS Printed</th> -->
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($detail as $index => $a)
        <tr>
        <td>{{ ++$index }}</td>
        <td>{{ $a->no_hs }}</td>
        <td>{{ $a->nama_produk }}</td>
        <td>{{ $a->volume }}</td>
        <td>{{ $a->net_weight }}</td>
        <td>{{ $a->nou }}</td>
        <td>{{ $a->value }}</td>
        <td>{{ $a->valuta }}</td>
        <td>{{ $a->scientific_name }}</td>
        <td>{{ $a->kode_harvest_country }}</td>
        <!-- <td>{{ $a->hs_printed }}</td> -->
        <td>
            <a href="{{route('v-legal-detail.edit', $a->id)}}"><i class="fas fa-edit"></i></a>
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
                    <div class="modal-body">Pilih " Yes " jika anda yakin data {{ $a->nama_produk }} ini dihapus</div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('v-legal-detail.hapus', $a->id) }}" class="btn btn-danger" data-target="#delModal">Yes</a>
                    </div>
                </div>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="form-group row">
            <div class="col-sm-3">
                <button type="button" class="btn btn-block btn-primary" onclick="window.location.href = '{{ route('v-legal-header.index') }}'" role="button"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
</div>

@endsection
