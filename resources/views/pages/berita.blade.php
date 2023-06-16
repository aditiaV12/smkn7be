@extends('layout.main')
@section('content')
<main >
  <div class="container p-2">
    <h2 class="fw-semibold">{{ $judul }}</h2>
    
    <div class="mb-3 col-md-8 mx-auto">
      <form action="/berita">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
      </form>
    </div>
  </div>

      @if ($data->count())
      <div class="container mt-3">
        <div class="card mb-3 text-center">
          <img src="{{ asset('storage/img/berita/'.$data[0]->cover) }}" width="100%" height="300" class="card-img-top object-fit-cover bg-black" alt="{{ $data[0]->slug }}">
          <div class="card-body">
            <h5 class="card-title">{{ $data[0]->judul }}</h5>
            <small class="text-body">Created By {{ $data[0]->author }} in {{ $data[0]->kategori->nama }}</small>
            <p class="card-text">{!! Str::limit($data[0]->isi, 300, '...</div>') !!}</p>
            <div class="card-text d-flex justify-content-between">
              <a href="berita/{{ $data[0]->slug }}" class="btn btn-outline-primary">Read More</a>
              <small class="text-body-secondary">{{ $data[0]->created_at->diffForHumans() }}</small></div>
            </div>
          </div>
        </div>      

   
  
  
    <div class="album py-3 ">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($data->skip(1) as $item) 
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('storage/img/berita/'.$item->cover) }}" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <div class="card-body" >
                <a href="berita/{{ $item->slug }}" class="text-decoration-none text-body">
                  <h5 class="card-title ">{{ $item->judul }}</h5>
                </a>
                <small>Created By {{ $item->author }} in {{ $item->kategori->nama }}</small>
                <p class="card-text">{!! Str::limit($item->isi,100,"...</div>") !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="berita/{{ $item->slug }}" class="">Read More...</a>
                  <small class="text-body-secondary">{{ $item->created_at->diffForHumans() }}</small>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    @else
    <div class="mt-3 text-center align-items-center vh-100">
      <h2>Berita Tidak Ditemukan</h2>
    </div>
    @endif
    <div class="container">
      
      {{ $data->links() }}
    </div>
</main>
@endsection