@extends('layout.admin')
@section('konten')
<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-body">
         <form action="{{ route('eskul.store') }}" method="post" enctype="multipart/form-data">
            @csrf          
            <div class="mb-3">
                <label for="icon" class="form-label">Icon Eskul</label>
                <input class="form-control  @error('icon') is-invalid @enderror" type="file" id="icon" value="{{ old('icon') }}" name="icon">
                @error('icon')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="icon" class="form-label">Nama Ekstrakulikuler</label>
                <input class="form-control  @error('nama') is-invalid @enderror" type="text" id="nama" value="{{ old('nama') }}" name="nama">
                @error('nama')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="instagram" class="form-label">Instagram Ekstrakulikuler</label>
                <input class="form-control  @error('instagram') is-invalid @enderror" type="text" id="instagram" value="{{ old('instagram') }}" name="instagram">
                @error('instagram')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Warna Ekstrakulikuler</label>
                <input class="form-control form-control-color  @error('color') is-invalid @enderror" type="color" id="color" value="{{ old('color') }}" name="color">
                @error('color')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit"  name="submit" class="btn btn-primary ">Simpan</button>
              <a href="{{ route('eskul.index') }}" class="btn btn-secondary">Batal</a>
         </form>
        </div>
      </div>
    </div>
</div>
    
@endsection