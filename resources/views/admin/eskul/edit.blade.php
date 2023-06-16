@extends('layout.admin')
@section('konten')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
      
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('eskul.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf   
           @method('PUT')
            <div class="mb-3">
                <label for="icon" class="form-label">Icon Ekstrakulikuler</label>
                <img src="{{ asset('storage/img/icon/'.$data->icon) }}" class="d-block" width="200" alt="">
                <input type="hidden" name="image">
                <input class="form-control  @error('icon') is-invalid @enderror" type="file" id="icon" value="{{ old('icon',$data->icon) }}" name="icon">
                @error('icon')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Ekstrakulikuler</label>
                <input class="form-control  @error('nama') is-invalid @enderror" type="text" id="nama" value="{{ $data->nama }}" name="nama">
                @error('nama')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
              </div>
          
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram Ekstrakulikuler</label>
                <input class="form-control  @error('instagram') is-invalid @enderror" type="text" id="instagram" value="{{ $data->instagram }}" name="instagram">
                @error('instagram')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Warna Ekstrakulikuler</label>
                <input class="form-control  @error('color') is-invalid @enderror" type="color" id="color" value="{{ old('color',$data->color) }}" name="color">
                @error('color')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    
                @enderror
            </div>


          

              <button type="submit"  name="submit" class="btn btn-primary ">Simpan Ekstrakulikuler <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('eskul.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
</div>
    
@endsection