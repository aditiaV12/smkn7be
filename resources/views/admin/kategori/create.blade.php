@extends('layout.admin')
@section('konten')


<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">
           Tambah Data
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama kategori</label>
                <input type="text" name="nama" id="" class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>            
              <button type="submit" name="submit" class="btn btn-primary ">Kirim Data <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection