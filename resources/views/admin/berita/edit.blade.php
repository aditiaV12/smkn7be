@extends('layout.admin')
@section('konten')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('berita.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="cover" class="form-label">Cover Berita</label>
                <input type="hidden" name="image" value="{{ $data->cover }}">
                <input class="form-control" type="file" id="formfile" name="cover" value="{{ $data->cover }}">
              </div>
            <div class="mb-3">
              <label for="kategori" class="form-label">Kategori Berita</label>
              <select class="form-select"  name="kategori" aria-label="Default select example"  >
                @foreach ($kategori as $item)
                    @if (old('kategori',$data->id) == $item->id)  
                    <option value="{{ $item->id }} "selected>{{ $item->nama }}</option>
                    @else
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endif
                @endforeach

              </select>
            </div>  

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Berita</label>
                <input class="form-control @error('judul') is-invalid @enderror" type="text" id="judul" name="judul" value="{{ $data->judul }}">
              </div>
              @error('judul')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
                  
              @enderror

            <div class="mb-3">
                <label for="author" class="form-label">Penulis Berita</label>
                <input class="form-control @error('author') is-invalid @enderror" type="text" id="author" name="author" value="{{ $data->author }}">
              </div>
              @error('author')
              <div class="alert alert-danger" role="alert">{{ $message }}</div>
                  
              @enderror


            <div class="mb-3">
                <label for="isi" class="form-label">Isi Berita</label>
                @error('isi')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
                <input id="isi" type="hidden" name="isi" >
                <trix-editor input="isi">{!!  $data->isi !!}</trix-editor>
              </div>

              <button type="submit" name="submit" class="btn btn-primary ">Kirim Berita <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection