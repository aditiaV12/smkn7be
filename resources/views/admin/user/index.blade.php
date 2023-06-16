@extends('layout.admin')
@section('konten')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="{{ route('admin.create') }}" class="btn btn-primary">+ Tambah Admin</a>
        
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
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Email</th>
                <th>Nama</th>
                <th>Password</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->password }}</td>
                  <td>
                      <a href="{{ route('admin.edit',$item->id) }}"><button class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></a>
                      <form action="{{ route('admin.destroy' ,$item->id) }}"onsubmit="return confirm('Apakah Anda Yakin ingin menghapus Berita ini?')" class="d-inline" method="POST">
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