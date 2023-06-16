@extends('layout.admin')
@section('konten')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">
           Tambah Berita
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('jabatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf   
           
            <div class="mb-3">
                <label for="jabatan" class="form-label">Nama Jabatan </label>
                <input class="form-control  @error('jabatan') is-invalid @enderror" type="text" id="jabatan" value="{{ old('jabatan') }}" name="jabatan">
                @error('jabatan')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

              <button type="submit"  name="submit" class="btn btn-primary ">Icon Berita <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
</div>
    
@endsection