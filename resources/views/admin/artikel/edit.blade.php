@extends('admin.layout.main')

@section('container')
    
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3 mb-2">Form Ubah Artikel</h2>
            <form method="post" action="/artikel/{{$article->id}}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="title">Judul</label>
                  <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" placeholder="Judul" name="title" value="{{$article->title}}">
                  
                  @error('title')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <input type="text" class="form-control  @error('content')is-invalid @enderror" id="content" placeholder="Konten " name="content" value="{{$article->value_article}}">
                    @error('content')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control" id="image" placeholder="" name="image" value="{{$article->image}}">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" placeholder=" " name="category" value="{{$article->category}}">
                </div>
        
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
@endsection