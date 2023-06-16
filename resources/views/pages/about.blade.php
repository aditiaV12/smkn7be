@extends('layout.main')
@section('content')

<div class="container my-3">
    <img src="{{ asset('smkn7.jpg') }}" alt="" class="img-fluid object-fit-cover" style="width: 100% ; height: 50vh;">
    <h1 class="fw-semibold my-3 text-center">Tentang SMK Negri 7 Baleendah</h1>
    <div class="row flex-lg-row align-items-start justify-content-center   p-2 my-2">
        <div class="col-lg-6 mb-3 text-lg-end">
            <div class="d-flex flex-column gap-3">
                <h3 class="card-title fw-bold">
                    Visi
                </h3>
                <div class="card-body"> {!! $about->visi !!}</div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex flex-column gap-3">
                <h3 class="card-title fw-bold">
                    Misi
                </h3>
                <div class="card-body"> {!! $about->misi !!}</div>
            </div>
        </div>
    </div>

    <article class="blog-post container mb-5">
        <h3 class="card-title fw-bold text-lg-center mb-3">Sejarah</h3>
        {!! $about->sejarah !!}
    </article>
</div>
@endsection