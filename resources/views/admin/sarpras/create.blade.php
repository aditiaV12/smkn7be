@extends('layout.admin')
@section('konten')

<div class="row">
    <div class="col-md-12">
      <div class="card ">
       
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('sarpras.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="foto" class="form-label">Cover Sarana dan Prasarana</label>
                <input value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror" type="file" id="formfile" name="foto" name="">
                @error('foto')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" type="text" id="judul" name="judul">
                @error('judul')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="author" class="form-label">Penulis Artikel</label>
                <input value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror" type="text" id="author" name="author">
                @error('author')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>


            <div class="mb-3">
                <label for="body" class="form-label">Isi Artikel</label>
                @error('body')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
                <input value="{{ old('body') }}" id="body" type="hidden" name="body" >
                <trix-editor input="body"></trix-editor>
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