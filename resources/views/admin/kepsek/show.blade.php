@extends('layout.admin')
@section('konten')

  <div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <div class="toggle ">
          <a href="{{ route('kepsek.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('kepsek.edit',$data->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
            <form action="{{ route('kepsek.destroy' ,$data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
            </form>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <img src="{{ asset('storage/img/kepsek/'.$data->foto)  }}" class="img-fluid" alt="">
            <h3>{{ $data->nama }}</h3>
         <p>
       {!! $data->sambutan !!}
        </p> 
        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>

@endsection