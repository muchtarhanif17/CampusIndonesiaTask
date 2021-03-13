@extends('admin.layout.main')

@section('container')
    <h3 class="mb-3">Dashboard</h3>

    <div class="container">
        <div class="row">
            <div class="col-6">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
                <img src="{{asset('asset/image/profile/'. $data->image)}}" height="200px" width="200px" alt="" class="mt-3"> 
            <table class="mt-5">
                <tr>
                    <td>Nama : {{$data->name}}</td>
                </tr>
                <tr>
                    <td>Email : {{$data->email}}</td>
                </tr> 
            </table>
            <table class="mt-3">
                <tr>
                    <td>
                        <a href="/dashboard/changepassword" class="btn btn-primary">Change Password</a>
                        <a href="/dashboard/edit/{{$data->id}}" class="btn btn-warning">Edit Profile</a>
                    </td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    
@endsection