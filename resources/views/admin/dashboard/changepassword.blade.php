@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Ubah Password</h2>
            <form method="post" action="/dashboard/changepassword/{{$data->id}}">
                @method('patch')
                @csrf
                <input type="hidden" name="data_id" id="data_id" value="{{$data->id}}">
                <div class="form-group">
                    <label for="old_password">Password lama</label>
                    <input type="password" class="form-control @error('old_password')is-invalid @enderror" id="old_password" placeholder="Password lama" name="old_password" >
                    
                    @error('old_password')
                      <div class="invalid-feedback">
                      {{$message}}
                      </div>
                      @enderror
                  </div>

                <div class="form-group">   
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control @error('new_password')is-invalid @enderror" id="new_password" placeholder="Password Baru" name="new_password"> 
                    @error('new_password')
                      <div class="invalid-feedback">
                      {{$message}}
                      </div>
                      @enderror
                </div>

                <div class="form-group">   
                    <label for="new_password1">Ulangi Password Baru</label>
                    <input type="password" class="form-control @error('img')is-invalid @enderror" id="new_password1" placeholder="Konfirmasi Password Baru" name="new_password1">
                    
                    @error('new_password1')
                      <div class="invalid-feedback">
                      {{$message}}
                      </div>
                      @enderror
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>
@endsection