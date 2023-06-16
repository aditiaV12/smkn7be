@extends('layout.admin')
@section('konten')


<div class="row">
    <div class="col-md-12">
      <div class="card ">
   
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('kepsek.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="hidden" name="oldfoto" value="{{ $data->foto }}">
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="formfile" name="foto" >
                @error('foto')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name="nama" value="{{ $data->nama }}">
                @error('nama')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="sambutan" class="form-label">Isi Sambutan Sekolah</label>
                @error('sambutan')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
                <input id="sambutan" type="hidden" name="sambutan" >
                <trix-editor input="sambutan">{!! $data->sambutan !!}</trix-editor>
              </div>

              <button type="submit" name="submit" class="btn btn-primary ">Submit <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('kepsek.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection