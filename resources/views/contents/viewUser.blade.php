@extends('home')

@section('title-usr')
> Daftar User
@endsection

@section('user-content')
        <a href="{{route('register.form')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="margin-bottom:20px"><i class="fas fa-plus fa-sm text-white-50"></i> Add User</a>
        <table class="table">
  <thead class="thead-light">
    <tr>
        <th>Role</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $u)
        <tr>
        <td>{{ $u->role }}</td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td>{{ $u->showPassword}}</td>
        <td>
            <a href="/{{ $u->id }}/edit-user"><i class="fas fa-edit"></i></a>
            <a data-target="#delModal<?php echo $u->id; ?>" data-toggle="modal" href="#"><i class="fas fa-trash" style="color: red;"></i></a>

            <div class="modal fade" id="delModal<?php echo $u->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">Pilih " Yes " jika anda yakin user {{ $u->name }} ini dihapus</div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="/{{ $u->id }}/delete-user" class="btn btn-danger" data-target="#delModal">Yes</a>
                    </div>
                </div>
                </div>
            </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
