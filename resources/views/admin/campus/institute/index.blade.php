@extends('admin.layout.main')

@section('container')
<div class="container">

    <h3 class="mt-3">Data Institusi</h3>
    <div class="row mb-3">
        <a href="/campus" class="btn btn-warning ml-2 mr-2">Kembali</a>
        <a href="/campus/institute/create" class="btn btn-primary">Tambah Data</a>
    </div>
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
                        <th scope="col">Nama Institusi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($institute as $ins)    
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$ins->name}}</td>
                        <td>{{$ins->address}}</td>
                        <td>{{$ins->city}}</td>
                        <td>{{$ins->email}}</td>
                        <td>{{$ins->telp}}</td>
                        <td>
                            <a href="/campus/institute/{{$ins->id}}/edit"><button class="badge badge-warning mb-2">Ubah</button></a>
                            <form method="post" action="/campus/institute/{{$ins->id}}">
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