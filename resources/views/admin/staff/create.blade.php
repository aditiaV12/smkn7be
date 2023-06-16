@extends('layout.admin')

@section('konten')
<div class="card">
    <form action="{{ route('staff.store') }}" class="p-3"  method="post" enctype="multipart/form-data">
        @csrf   
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Profile</label>
            <input value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror" type="file" id="formfile" name="foto" >
            @error('foto')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Staff</label>
            <input value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name="nama" >
            @error('nama')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan  </label>
            <input value="{{ old('jabatan') }}" class="form-control @error('jabatan') is-invalid @enderror" type="text" id="jabatan" name="jabatan" >
            @error('jabatan')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select"  name="kategori" aria-label="Default select example" >
                @foreach ($kategori as $item)
                    @if (old('kategori') == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->jabatan }}</option>
                    @else   
                    <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                    @endif
                @endforeach
                  
            </select>
        </div>

        <button class="btn btn-primary " type="submit"  name="submit">Submit</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
  
            
@endsection