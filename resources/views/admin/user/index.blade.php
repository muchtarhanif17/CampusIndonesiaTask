@extends('admin.layout.main')

@section('container')
    <div class="container">
        <h3 class="mt-3">Halaman Pengelolaan User</h3>
        <a href="/user/create" class="btn btn-primary my-3">Tambah User</a>
        <div class="row">
            <div class="col-10">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $usr)    
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->email}}</td>
                            <td>admin</td>
                            <td>
                                <a href="/user/{{$usr->id}}/edit" class="badge badge-warning mb-2">ubah</a>
                                <form method="post" action="/user/{{$usr->id}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="badge badge-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection