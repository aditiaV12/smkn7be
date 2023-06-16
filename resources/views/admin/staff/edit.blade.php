@extends('layout.admin')

@section('konten')

<div class="card">
    <form action="{{ route('staff.update',$data->id) }}" class="p-3"  method="post" enctype="multipart/form-data">
        @csrf   
        @method('put')
        <div class="mb-3">
          <label for="foto" class="form-label">Foto Profile</label>
            <img src="{{ asset('storage/img/staff/'.$data->foto) }}" width="100px" alt="{{ $data->nama }}" class="d-block mb-3"  >  
            <input type="hidden" name="oldimage" class="form-control">
            <input class="form-control" type="file" id="formfile" name="foto" >
            @error('foto')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Staff</label>
            <input class="form-control" type="text" id="nama" name="nama" value="{{ $data->nama }}" >
            @error('nama')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Posisi</label>
            <input class="form-control" type="text" id="jabatan" name="jabatan" value="{{ $data->jabatan }}">
            @error('jabatan')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                
            @enderror
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" name="kategori" aria-label="Default select example" >
              @foreach ($kategori as $item)
                @if (old('kategori',$data->staff_kategori_id) == $item->id)
                    <option value="{{ $item->id }}" selected>{{ $item->jabatan }}</option>
                    
                @else
                    <option value="{{ $item->id }}" >{{ $item->jabatan }}</option>  
                    
                @endif    
              
              @endforeach
            </select>
        </div>

        <button class="btn btn-primary " type="submit"  name="submit">Submit</button>
        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
  
            
@endsection