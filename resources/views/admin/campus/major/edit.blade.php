@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Ubah Data Jurusan</h2>
            <form method="post" action="/campus/major/{{$major->id}}">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="nama">Nama Jurusan</label>
                  <input type="text" class="form-control @error('nama')is-invalid @enderror" id="nama" placeholder="" name="nama" value="{{$major->name}}">
                  @error('nama')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection