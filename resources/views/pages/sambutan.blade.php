@extends('layout.main')
@section('content')

    <div class="container  my-3 ">
        <div class="">
            <h2 class="fw-bold my-3">Sambutan Kepala Sekolah SMK Negri 7 Baleendah</h2>
            <div class="col-12 row py-3">
                <div class="col-md-4">
                    
                    <img src="{{ asset('storage/img/kepsek/'.$kepsek->foto) }}" alt="" class="rounded object-fit-contain" width="100%" height="100%">
                 
                </div>
                <div class="col-md-8 card-body">
                    <h3 class="card-title fw-semibold mb-1 ">{{ $kepsek->nama }}</h3>
                    <p class="card-text lh-2 fw-regular ">{!! $kepsek->sambutan !!}</p>
                </div>
            </div>
        </div>
    </div>
    
@endsection
