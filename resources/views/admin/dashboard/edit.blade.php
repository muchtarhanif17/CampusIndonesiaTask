@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Ubah Profile</h2>
            <form method="post" action="/dashboard/{{$data->id}}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <input type="hidden" name="data_id" id="data_id" value="{{$data->id}}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Ex : example@example.com" name="email" value="{{$data->email}}" readonly>
                    
                    @error('email')
                      <div class="invalid-feedback">
                      {{$message}}
                      </div>
                      @enderror
                  </div>

                <div class="form-group">   
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{$data->name}}"> 
                    @error('name')
                      <div class="invalid-feedback">
                      {{$message}}
                      </div>
                      @enderror
                </div>

                <div class="form-group">   
                    <label for="img">Foto Profile</label>
                    <input type="file" class="form-control @error('img')is-invalid @enderror" id="img" name="img" value="{{$data->image}}">
                    
                    @error('img')
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