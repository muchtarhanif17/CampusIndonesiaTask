@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Tambah Data Institusi</h2>
            <form method="post" action="/campus/institute">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Institusi</label>
                  <input type="text" class="form-control @error('nama')is-invalid @enderror" id="nama" placeholder="Masukkan Nama Institusi" name="nama" value="{{old('nama')}}">
                  
                  @error('nama')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control  @error('alamat')is-invalid @enderror" id="alamat" placeholder="Alamat " name="alamat" value="{{old('alamat')}}">
                    @error('alamat')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" placeholder="Kota " name="kota" value="{{old('kota')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Ex : Example@example.com " name="email" value="{{old('email')}}">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor telepon</label>
                    <input type="text" class="form-control" id="telp" placeholder="Ex : 082023291 " name="telp" value="{{old('telp')}}">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection