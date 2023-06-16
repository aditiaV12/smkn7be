@extends('layout.admin')
@section('konten')


    <div class="row">
      <div class="col-12">
        <div class="card">
          @if (count($data)==1)
          <div class="card-header">
                
            <a href="{{ route('about.create') }}" class="btn btn-primary d-none">+ Tambah Berita</a>
            @else
            <a href="{{ route('about.create') }}" class="btn btn-primary">+ Tambah Keterangan</a>
          </div>
          @endif
          <!-- /.card-header -->
          <div class="card-body ">
            @foreach ($data as $item)
       
                <a href="{{ route('about.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit <i class="fas fa-pen"></i></i></a>
                <a href="{{ route('about.destroy',$item->id) }}" class="btn btn-danger btn-sm">Del <i class="fas fa-trash"></i></i></a>
            
               <h1>Visi</h1> 
            <p>
                {!! $item->visi !!}
            </p>
            <h1>Misi</h1>
            <p>
                {!! $item->misi !!}
            </p>
            <h1>Sejarah</h1>
            <p>
                {!! $item->sejarah !!}
            </p>
        </div>
        @endforeach
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection