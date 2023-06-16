@extends('layout.admin')
@section('konten')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('staff.create') }}" class="btn btn-primary">+ Tambah Staff</a>
                <div class="card-tools col-md-4">
                  <form action="{{ route('staff.index') }}">
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

            <div class="card-body table-responsive">
                <table id="example1" class="table table-hover text-nowrap ">
                  @if ($data->count())
                  <thead>
                  <tr>
                <th>NO</th>
                <th>Foto</th>
                <th>@sortablelink('nama','Nama')</th>
                <th>@sortablelink('jabatan','Posisi')</th>
                <th>Kategori</th>
                <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <img src="{{ asset('storage/img/staff/'.$item->foto) }}" alt="" style="width: 100px">
                      </td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->jabatan }}</td>
                      <td>{{ $item->staff_kategori->jabatan }}</td>
                      <td>
                        <a href="{{ route('staff.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                        <form action="{{ route('staff.destroy' ,$item->id) }}" onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  {{ $data->links() }}
                  @else
                  <div class="p-3">
                    <h3 class="text-center text-danger">Data Tidak Ditemukan</h3>
                  </div>
                    @endif
                </table>
            </div>
            
        </div>
    </div>
</div>
    


@endsection