@extends('layout.admin')
@section('konten')

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('sarpras.create') }}" class="btn btn-primary">+ Tambah Artikel</a>
          
            <div class="card-tools col-md-4">
                <form action="{{ route('sarpras.index') }}">
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
                  <th>Author</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        <a href="{{ route('sarpras.show' ,$item->id) }}"><button class="btn btn-primary"><i class="fas fa-eye"></i> Views</button></a>
                        <a href="{{ route('sarpras.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                        <form action="{{ route('sarpras.destroy' ,$item->id) }}"nsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
                {{ $data->links() }}
              </tbody>
              @else
              <div class="p-3">
                <h2 class="text-center">Data tidak Ditemukan</h2>
              </div>
              @endif
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection