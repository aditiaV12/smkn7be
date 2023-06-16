@extends('layout.admin')
@section('konten')

<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">
           Edit Data
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('kategori.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror">
                @error('cover')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>
        
            <button type="submit" name="submit" class="btn btn-primary ">Kirim Berita <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection