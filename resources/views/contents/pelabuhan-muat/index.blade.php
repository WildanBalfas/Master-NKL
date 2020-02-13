@extends('home')

@section('title-clt')
> List Pelabuhan Muat
@endsection

@section('content')
<a href="{{route('v-legal-header.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="margin-bottom:20px"><i class="fas fa-plus fa-sm text-white-50"></i> Create V-Legal </a>
<table class="table table-bordered" id="tblegal">
    <thead class="thead-light">
        <tr>
            <th>Kode Pelabuhan Muat</th>
            <th>Nama Pelabuhan Muat</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	@foreach ($muats as $m)
    	<tr>
    		<td>{{ $m->kodePelMuat }}</td>
    		<td>{{ $m->namePelMuat }}</td>
    		<td>
    			<a href="#"><i class="fas fa-edit"></i></a>
    			<a href="#"><i class="fas fa-trash" style="color: red;"></i></a>
    		</td>
    	</tr>
    	@endforeach
    </tbody>
</table>
@endsection