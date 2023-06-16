@extends('layout.admin')
@section('konten')

<form action="{{ route('admin.update',$data->id) }}" method="post">
@csrf
@method('PUT')
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ $data->password }}">
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror



</div>
<button type="submit" class="btn btn-primary" name="submit"> simpan</button>
</form>
    
@endsection