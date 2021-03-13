@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Tambah Data Jurusan</h2>
            <form method="post" action="/campus/major">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Jurusan</label>
                  <input type="text" class="form-control @error('nama')is-invalid @enderror" id="nama" placeholder="Masukkan Jurusan" name="nama" value="{{old('nama')}}">
                  
                  @error('nama')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection