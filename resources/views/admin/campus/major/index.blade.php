@extends('admin.layout.main')

@section('container')
<div class="container">

    <h3 class="mt-3">Data Jurusan</h3>
    <div class="row mb-3">
        <a href="/campus" class="btn btn-warning ml-2 mr-2">Kembali</a>
        <a href="/campus/major/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-6">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            <table class="table">
                <thead>
                    <tr class="thead-dark text-center">
                        <th scope="col">#</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($major as $mjr)    
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$mjr->name}}</td>
                        <td class="text-center">
                            <a href="/campus/major/{{$mjr->id}}/edit" class="badge badge-warning mb-2">ubah</a>
                            <form action="/campus/major/{{$mjr->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge badge-danger">hapus</button>
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