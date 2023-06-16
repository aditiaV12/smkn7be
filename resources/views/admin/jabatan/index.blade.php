@extends('layout.admin')
@section('konten')


<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('jabatan.create') }}" class="btn btn-primary">+ Tambah Jabatan</a>
        
          <div class="card-tools">
          
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
                
              </div>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <table class="table">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Jabatan </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                  
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>
                  <a href="{{ route('jabatan.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                        <form action="{{ route('jabatan.destroy' ,$item->id) }}"onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" name="submit"><i class="fas fa-trash"></i> Del</button>
                        </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
        
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection