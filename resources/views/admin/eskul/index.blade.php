@extends('layout.admin')
@section('konten')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('eskul.create') }}" class="btn btn-primary">+ Tambah Ekstrakulikuler</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Ekstrakulikuler</th>
                <th>Ikon</th>
                <th>Instagram</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>
                    <img src="{{ asset('storage/img/icon/'.$item->icon) }}" width="100" alt="" srcset="">
                  </td>
                  <td>{{ $item->instagram }}</td>
                  <td>
                      <a href="{{ route('eskul.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                      <form action="{{ route('eskul.destroy' ,$item->id) }}"onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
                      </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
    
@endsection