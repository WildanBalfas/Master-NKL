@extends('home')

@section('edit-usr')
> Edit User
@endsection

@section('form_edit_user')
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<form method="POST" action="/{{ $user_data->id }}/update-user">
    {{ csrf_field() }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-4">
        <input type="text" id="name" class="form-control" name="name" value="{{$user_data->name}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
            <input type="text" id="email" class="form-control" name="email" value="{{$user_data->email}}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password Baru</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="password" id="myInput">
            <br>
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="submit">Update</button>
        <a class="btn btn-secondary" href="{{ route('view.user') }}">Cancel</a>
    </div>
    </div>
    <input type="hidden" name="_method" value="PUT"/>
</form>
@endsection
