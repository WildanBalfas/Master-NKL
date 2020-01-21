@extends('home')

@section('add-adt')
> Edit V-Legal Detail
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
    <form method="POST" action="{{route('v-legal-detail.update', $data->id)}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" class="form-control" name="id_header" id="id_header" value="{{$data->id_header}}">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">HS Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_hs" id="no_hs" value="{{$data->no_hs}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Deskripsi Produk</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{$data->nama_produk}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Volume(M3)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="volume" id="volume" value="{{$data->volume}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Net Weight(KG)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="net_weight" id="net_weight" value="{{$data->net_weight}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Number of Unit</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nou" id="nou" value="{{$data->nou}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Value</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="value" id="value" value="{{$data->value}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Currency</label>
                        <div class="col-sm-8">
                            <select name="valuta" id="valuta" class="form-control">
                                @foreach($mata_uang as $p)
                                <option value="{{ $p->currencyCode }}" {{ $p->currencyCode == $data->valuta ? 'selected' : '' }}>{{ $p->currencyCode.' - '.$p->currencyName }}</option>
                                @endforeach
                            </select>
                            <!-- <input type="text" class="form-control" name="valuta" id="valuta" value="{{$data->valuta}}"> -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Scientific Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="scientific_name" id="scientific_name" value="{{$data->scientific_name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Country of Harvest</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="kode_harvest_country" id="kode_harvest_country" value="{{$data->kode_harvest_country}}">
                        </div>
                    </div>
                    <div class="form-group row" hidden>
                        <label class="col-sm-4 col-form-label">HS Printed</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="hs_printed" id="hs_printed" value="{{$data->hs_printed}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <button type="button" class="btn btn-block btn-primary" role="button"><i class="fa fa-arrow-left"></i> Back</button>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-block btn-success" value="submit"><i class="fa fa-save"></i> Update</button>
            </div>
        </div>
    </form>
</div>

@endsection
