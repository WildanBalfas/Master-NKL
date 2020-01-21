@extends('home')

@section('register')
> Register
@endsection

@section('form_register')
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
<form method="POST" action="{{route('register.store')}}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-4">
            <select id="role" name="role" class="form-control">
                <option selected></option>
                <option>admin</option>
                <option>client</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="name" name="name" autofocus>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
            <input type="password" class="form-control" id="myInput" name="password">
            <br>
            <input type="checkbox" onclick="myFunction()">Show Password
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        <button type="submit" class="btn btn-success" value="submit">Save</button>
        <a class="btn btn-secondary" href="{{ route('view.user') }}">Cancel</a>
    </div>
</form>
@endsection
