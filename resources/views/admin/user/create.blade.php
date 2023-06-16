@extends('layout.admin')
@section('konten')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="post">
                    @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                
                
                
                        </div>
                    <button type="submit" class="btn btn-primary" name="submit"> Simpan <i class="fa-solid fa-paper plane"></i></button>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali <i class="fa-solid fa-arrow-left"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>

    
@endsection