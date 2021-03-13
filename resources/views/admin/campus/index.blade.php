@extends('admin.layout.main')

@section('container')
<div class="container">
    <h3 class="my-3">Halaman Kelola Kampus</h3>
    
    <div class="row">
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="/campus/institute">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Institusi</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$institute->count()}}</div>
                            </div>
                            <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="/campus/major">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Jurusan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$major->count()}}</div>
                            </div>
                            <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>

    <a href="/campus/create" class="btn btn-primary mb-3">Tambah Data</a>

    <div class="row">
        <div class="col-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr class="thead-dark">
                        <th scope="col">#</th>
                        <th scope="col">Nama Institusi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campus as $data)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    @foreach ($major as $mjr)
                       <?php  if ($data->major_id == $mjr->id) {?> 
                            @foreach ($institute as $ins)    
                                <?php if($data->institute_id == $ins->id ){?> 
                                    <td>{{$ins->name}}</td> 
                                    <td>{{$ins->address}}</td>
                            <?php } ?>      
                            @endforeach  
                            <td>{{$mjr->name}}</td>  
                        <?php } ?>   
                        @endforeach
                        
                        <td>
                            <a href="/campus/{{$data->id}}/edit" class="badge badge-warning mb-2">ubah</a>
                            <form method="post" action="/campus/{{$data->id}}">
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