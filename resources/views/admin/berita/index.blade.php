@extends('layout.admin')
@section('konten')


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('berita.create') }}" class="btn btn-primary">+ Tambah Berita</a>
          
            <div class="card-tools col-md-4">
              <form action="{{ route('berita.index') }}">
              <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control float-right" placeholder="Search">
                
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                  
                </div>
              </div>
             </form>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              @if ($data->count())
                  
             
              <thead>
                <tr>
                  <th>No</th>
                  <th>@sortablelink('author','Author')</th>
                  <th>Kategori</th>
                  <th>@sortablelink('judul','Title')</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                    
                
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->kategori->nama }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        <a href="{{ route('berita.show' ,$item->id) }}"><button class="btn btn-primary"><i class="fas fa-eye"></i> Views</button></a>
                        <a href="{{ route('berita.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                        <form action="{{ route('berita.destroy' ,$item->id) }}"onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
                        </form>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            
              @else
                  
              @endif
            </table>
            <div class="ms-2">

              {{ $data->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection