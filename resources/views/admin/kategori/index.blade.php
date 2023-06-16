@extends('layout.admin')
@section('konten')


    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary">+ Tambah kategori</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body ">
              <div class="card-body table-responsive">
                <table id="example1" class="table  ">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama</th>
                      <th>Slug</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->slug }}</td>
                      <td>
                        <a href="{{ route('kategori.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                        <form action="{{ route('kategori.destroy' ,$item->id) }}" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
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
    </div>
@endsection