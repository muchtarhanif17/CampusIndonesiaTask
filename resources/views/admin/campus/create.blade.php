@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Tambah Data</h2>
            <form method="post" action="/campus" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="institute">Universitas</label>
                  <select class="form-control @error('institute')is-invalid @enderror" name="institute" id="institute" >
                    <option value="" disabled selected>Pilih Universitas</option>
                    @foreach ($institute as $ins)    
                    <option value="{{$ins->id}}">{{$ins->name}}</option>
                    @endforeach
                  </select>
                  @error('institute')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="major">Jurusan</label>
                    <select class="form-control @error('institute')is-invalid @enderror" name="major" id="major" >
                        <option value="" disabled selected>Pilih Jurusan</option>
                        @foreach ($major as $mjr)    
                            <option value="{{$mjr->id}}">{{$mjr->name}}</option>
                        @endforeach
                    </select>
                    
                    @error('major')
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