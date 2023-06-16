@extends('layout.admin')
@section('konten')

  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="toggle ">
          <a href="{{ route('sarpras.index') }}" class="btn btn-secondary"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Kembali</a>
            <a href="{{ route('sarpras.edit',$data->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
            <form action="{{ route('sarpras.destroy' ,$data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
            </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img src="{{ asset('storage/img/sarpras/'.$data->foto)  }}" class="img-fluid" alt="">
            <h3>{{ $data->judul }}</h3>
            <p class="border-bottom">Di tulis Oleh {{ $data->author}} pada {{ $data->created_at }}</p>
            <br>
         <p>
       {!! $data->body !!}
        </p> 
        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>

@endsection