@extends('layout.admin')
@section('konten')


    <div class="row">
      <div class="col-12">
        <div class="card">
          @if (count($data)===1)
          <div class="card-header">
            <a href="{{ route('kepsek.create') }}" class="btn btn-primary d-none">+ Tambah Kepala Sekolah</a>
             
         @else
         <a href="{{ route('kepsek.create') }}" class="btn btn-primary ">+ Tambah Kepala Sekolah</a>
        </div>
        @endif
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Foto</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                    
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <img src="{{ asset('storage/img/kepsek/'.$item->foto) }}" width="100px" alt="" srcset="">
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('kepsek.show' ,$item->id) }}"><button class="btn btn-primary"><i class="fas fa-eye"></i></i> Views</button></a>
                        <a href="{{ route('kepsek.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                        <form action="{{ route('kepsek.destroy',$item->id) }}" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
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
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
@endsection