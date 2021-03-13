@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Ubah Data User</h2>
            <form method="post" action="/user">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{$user->name}}" readonly>
                    
                    @error('name')
                      <div class="invalid-feedback">
                      {{$message}}
                      </div>
                      @enderror
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Ex : example@example.com" name="email" value="{{$user->email}}" readonly>
                  
                  @error('email')
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