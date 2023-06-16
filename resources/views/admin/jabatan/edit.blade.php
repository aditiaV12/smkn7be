@extends('layout.admin')
@section('konten')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-body">
         <form action="{{ route('jabatan.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf   
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Jabatan </label>
                <input class="form-control  @error('nama') is-invalid @enderror" type="text" id="nama" value="{{ $data->nama }}" name="nama">
                @error('nama')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

              <button type="submit"  name="submit" class="btn btn-primary ">Kirim Jabatan <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('jabatan.index') }}" class="btn btn-secondary">Batal</a>
         </form>
        </div>
      </div>
    </div>
    <!-- /.col-->
</div>
    
@endsection