@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Ubah Data Institusi</h2>
            <form method="post" action="/campus/institute/{{$institute->id}}">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Institusi</label>
                  <input type="text" class="form-control @error('nama')is-invalid @enderror" id="nama" placeholder="Masukkan Nama Institusi" name="nama" value="{{$institute->name}}">
                  
                  @error('nama')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control  @error('alamat')is-invalid @enderror" id="alamat" placeholder="Alamat " name="alamat" value="{{$institute->address}}">
                    @error('alamat')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" placeholder="Kota " name="kota" value="{{$institute->city}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Ex : Example@example.com " name="email" value="{{$institute->email}}">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor telepon</label>
                    <input type="text" class="form-control" id="telp" placeholder="Ex : 082023291 " name="telp" value="{{$institute->telp}}">
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection