@extends('layout.main')
@section('content')

<div class="container my-3 vh-100">
    
    <img src="{{ asset('smkn7.jpg') }}" alt="" class=" mx-auto d-block object-fit-cover mb-3"  width="100%" height="300">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex flex-column">

            <h3 class="fw-semibold">Staff</h3>
            <p>Staff-staff SMK Negri 7 Baleendah</p>
        </div>
        <div class="col-md-4">
            <form action="/staff" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Button</button>
                </div>
            </form>
        </div>
       
    </div>
    <div class="my-auto">
        @if ($staff->count())
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>nama</th>
                    <th>Posisi</th>
                    <th>Status</th>
                </tr>
            </thead>
          
            <tbody>
                @foreach ($staff as $item)
                
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->staff_kategori->jabatan }}</td>
                </tr>
                @endforeach
               
            </tbody>              
          
            {{ $staff->links() }}
        </table>
        @else
            <h2 class="card-title text-center my-3">Data Tidak Ditemukan</h2>
        @endif
    </div>
</div>

    
@endsection