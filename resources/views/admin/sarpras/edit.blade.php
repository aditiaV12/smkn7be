@extends('layout.admin')
@section('konten')
<div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('sarpras.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="foto" class="form-label">Cover Sarana dan Prasarana</label>
                <input type="hidden" name="oldimage" value="{{ $data->foto }}">
                <input class="form-control" type="file" id="formfile" name="foto" value="{{ $data->foto }}">
                @error('foto')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input class="form-control" type="text" id="judul" name="judul" value="{{ $data->judul }}">
                @error('judul')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="author" class="form-label">Penulis Artikel</label>
                <input class="form-control" type="text" id="author" name="author" value="{{ $data->author }}">
                @error('author')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>


            <div class="mb-3">
                <label for="body" class="form-label">Isi Artikel</label>
                @error('body')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
                <input id="body" type="hidden" name="body" >
                <trix-editor input="body">{!!  $data->body !!}</trix-editor>
              </div>

              <button type="submit" name="submit" class="btn btn-primary ">Kirim Artikel <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('sarpras.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection