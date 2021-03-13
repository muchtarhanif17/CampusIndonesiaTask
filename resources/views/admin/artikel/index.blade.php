@extends('admin.layout.main')

@section('container')

<h3>Halaman Artikel</h3>

<div class="container">

    <div class="row mb-3 ml-2 mt-3">
        <a href="/artikel/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Terbit</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Isi Artikel</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $arc)    
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$arc->created_at}}</td>
                        <td>{{$arc->category}}</td>
                        <td>{{$arc->title}}</td>
                        <td>{{$arc->value_article}}</td>
                        <td>
                           <img src="{{asset('asset/image/'. $arc->image)}}" height="200px" width="300px" alt=""> 
                        </td>
                        <td>
                            <a href="/artikel/{{$arc->id}}/edit" class="badge badge-warning mb-2">ubah</a>
                            <form method="post" action="/artikel/{{$arc->id}}">
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
