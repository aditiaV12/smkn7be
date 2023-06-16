@extends('layout.main')
@section('content')
<div class="container mt-5">

    <div class="p-2 p-md-5 mb-4 rounded text-body-emphasis">
      <img src="{{ asset('storage/img/sarpras/'.$sarpras->foto) }}" alt="" class=" object-fit-fill" width="100%" height="400">
    </div>
  </div>
<article class="blog-post container mb-5">
    <h2 class="display-5 link-body-emphasis mb-1">{{ $sarpras->judul }}</h2>
    <p class="blog-post-meta">{{ $sarpras->created_at->diffForHumans() }} by {{ $sarpras->author }} </p>

    
    <hr>
    {!! $sarpras->body !!}
  </article>
    
@endsection