@extends('layout.main')
@section('content')



{{-- hero --}}
<div class="cover-container py-5 mb-2" >

  <div class="container col-xxl-8 px-4 py-2" >
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5" style="height: 80vh;">
      <div class="col-10 col-sm-8 col-lg-6 mx-auto">
        <img src="{{ asset('smkn7.jpg') }}" class="d-block img-fluid " alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6 mb-2">
        <h1 class="fw-bold" class="display-5 fw-bold text-body-emphasis lh-2 mb-3">SMK Negri 7 Baleendah</h1>
        <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias labore beatae dolorem exercitationem earum nesciunt repellat consectetur quisquam sit neque. Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
      </div>
    </div>
  </div>
</div>
{{-- end hero --}}

{{-- jurusan --}}
<div class="container col-xxl-8 py-5 mt-3" >
    <div class="text-center mx-auto  w-75">
        <h1 class="display-6 fw-semibold mb-3 " >Jurusan</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque doloribus fugit architecto tempore odit nobis sequi veritatis error doloremque voluptatum, ipsa expedita placeat magnam! Laboriosam, quos minima. Quibusdam, eius! Ad?</p>
    </div>
    <div class=" row flex gap-3 justify-content-center text-center">
        <div class="gap-3 rounded d-flex shadow-sm jurusan-item align-items-center  justify-content-center  " style=" width: 250px ; height: 350px; border:1px solid #0C134F">
            <div class="flex-column ">

                <i class="fa-solid fa-gears display-1"></i><h3 class="fw-semibold">Teknik Otomotif</h3>
            </div>
        </div>
        <div class="gap-3 rounded d-flex shadow-sm jurusan-item align-items-center  justify-content-center  " style=" width: 250px ; height: 350px; border:1px solid #0C134F">
            <div class="flex-column ">

                <i class="fa-sharp fa-solid fa-bolt display-1"></i></i><h3 class="fw-semibold">Teknik Elektronika</h3>
            </div>
        </div>
        <div class="gap-3 rounded d-flex shadow-sm jurusan-item align-items-center  justify-content-center  " style=" width: 250px ; height: 350px; border:1px solid #0C134F">
            <div class="flex-column ">

                <i class="fa-solid fa-computer display-1 "></i><h3 class="fw-semibold">Pengembangan Perangkat lunak dan Game</h3>
            </div>
        </div>
        <div class="gap-3 rounded d-flex shadow-sm jurusan-item align-items-center  justify-content-center  " style=" width: 250px ; height: 350px; border:1px solid #0C134F">
            <div class="flex-column ">

                <i class="fa-solid fa-sharp fa-city display-1 "></i><h3 class="fw-semibold">Desain Pemodelan dan Informasi Bangunan</h3>
            </div>
        </div>
        
        
     <div id="eskul"></div>
    </div>
</div>
{{-- end jurusan --}}
{{-- eskul --}}
<div class="cover-container py-5" style="background-color: whitesmoke">
    <div class="container ">
        <div class="text-center">
            <h1 class="fw-semibold anchor" >Ekstrakulikuler</h1>

        </div>
        <div class="flex gap-2 row justify-content-center my-5 ">
            @foreach ($eskul as $item)
                
            <div class="card shadow-sm  col-lg-3 col-md-4 col-sm-5 text-center " style="background-color: {{ $item->color }};  ">
              <div class="card-body justify-content-center">
                <div class="display-6"><img src="{{ asset('storage/img/icon/'.$item->icon) }}" alt="" height="100"></div>
                <a href="{{ $item->instagram }}" class=" text-decoration-none"><h4 class="fw-bold text-white"></i>{{ $item->nama }}</h4></a>
              </div>
            </div>
            @endforeach
            
        
            
            
        </div>
    </div>
    
</div>
{{-- end eskul --}}

{{-- BERITA --}}
<div class="album py-5 ">
    <div class="container">
        <h1 class="fw-semibold my-5">Berita Terkini</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($berita as $item) 
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{ asset('storage/img/berita/'.$item->cover) }}" width="100%" height="255" alt="" class="card-img-top">
            <div class="card-body">
              <a href="berita/{{ $item->slug }}" class="text-decoration-none text-body">
                <h4 class="card-title">{{ $item->judul }}</h4>
              </a>
              <p class="card-text">{!! Str::limit($item->isi, 200, '...</div>') !!}</p>
              <div class="d-flex justify-content-between align-items-center">
                <a href="berita/{{ $item->slug }}">Read More ...</a>
                <small class="text-body-secondary">{{ $item->created_at->diffForHumans() }}</small>
              </div>
            </div>
          </div>
        </div>
        
   
        @endforeach
      </div>
      <div class="mt-3 justify-content-center d-flex">

        <a href="/berita" class="btn btn-outline-primary mx-auto">Lihat Selengkapnnya<i class="fa-solid fa-arrow-right ms-1"></i></a>
      </div>
    </div>
    <div id="prestasi"></div>
</div>
{{-- END BERITA --}}

{{-- prestasi --}}
<div class="cover-container py-2 text-white"  style="background-color:#0C134F">
  <div class="text-center mx-auto py-2 w-75">
    <h1 class="display-6 fw-semibold mb-3 ">Prestasi <a href="#prestasi" class="anchor-link"></a></h1>
    
</div>
  <div class="container col-xxl-8 py-2 mb-3" >
  
    <div class=" row flex gap-5 justify-content-center text-center">
        <div class="gap-3 border border-5 border-primary rounded-circle  p-5 d-flex  align-items-center  justify-content-center  " style=" width: 300px ; height: 300px;">
            <div class="flex-column ">
  
                <div class="display-6 fw-semibold"><i class="fa-solid display-5 fa-trophy d-block"></i>100</div><h4 class="fw-semibold">Tingkat Nasional</h4>
  
            </div>
        </div>
        <div class="gap-3 border border-5 border-primary rounded-circle  p-5 d-flex  align-items-center  justify-content-center  " style=" width: 300px ; height: 300px;">
            <div class="flex-column ">
  
                <div class="display-6 fw-semibold"><i class="fa-solid display-5 fa-trophy d-block"></i>100</div><h4 class="fw-semibold">Tingkat Nasional</h4>
            </div>
        </div>
        <div class="gap-3 border border-5 border-primary rounded-circle  p-5 d-flex  align-items-center  justify-content-center  " style=" width: 300px ; height: 300px;">
            <div class="flex-column ">
  
                <div class="display-6 fw-semibold"><i class="fa-solid display-5 fa-trophy d-block"></i>100</div><h4 class="fw-semibold">Tingkat Nasional</h4>
            </div>
        </div>
    </div>
  </div>
</div>
{{-- end prestasi --}}
{{-- STAFF --}}

<section class="staff" >
    <div class="staff container my-5">
      <div class="d-flex justify-content-between">
        <h1 class="fw-semibold">Tenaga Pendidik</h1>
        <div class="btn-group">
          <i class='fa-solid display-6 fa-circle-arrow-left'></i>
          <i class='fa-solid display-6 fa-circle-arrow-right'></i>
        </div>
      </div>
     
       
        <div class="swiper mySwiper ">
          <div class="swiper-wrapper d-flex  py-2">
            @foreach ($staff as $item)
                
            <div class="swiper-slide card " style="max-width: 255px; height: 320px;">
                <img src="{{ asset('storage/img/staff/'.$item->foto) }}" class="card-img-top object-content-contain " width="100%" height="100%" alt>
                <div class="bg-white p-1 w-75 text-center  position-absolute bottom-0 start-50 mb-1 translate-middle-x mh-50">
                  <small class="fw-semibold" style="color: #0C134F"> {{ $item->jabatan }}</small>
                
                  <h6 class="fw-semi-bold" style="color: #0C134F">{{ $item->nama }}</h6>
                </div>
            </div>
              @endforeach
          

    
  
    </div>
    <div  id="contact"></div>
</section>
{{-- STAFF  --}}



{{-- kontak --}}

<section >
  <div class="cover-container py-2" style="background-color: whitesmoke">
  
    <div class="container my-3">
      <h1 class="fw-semibold text-center mb-5" id="contact">Hubungi  Kami </a></h1>
      <div class="row flex-lg-row align-items-start">
        <div class="col-lg-6 flex-column gap-2">
            <h4 class="fw-semibold">Kontak</h4>
            <div class="d-flex flex-row gap-2  align-items-center mb-3 fs-5">
                <i class="fa-solid fa-envelope border col-1 p-2 text-center"></i>
                <div class=" fw-regular">email@gmail.com</div>
            </div>
      
            <div class="d-flex align-items-center gap-2 flex-row mb-3 fs-5">
              <i class="fa-solid fa-location-dot border col-1 p-2 text-center"></i>
              <div class=" fw-regular fs-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, asperiores.</div>
            </div>
            <div class="d-flex align-items-center gap-2 flex-row mb-3 fs-5">
              <i class="fa-solid fa-phone border col-1 p-2 text-center"></i>
              <div class=" fw-regular">email@gmail.com</div>
            </div>
          <h4 class="fw-semibold">Denah</h4>
            <iframe class="ratio ratio-4x3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.951268670699!2d107.64889287532179!3d-7.015013968717197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f9cd53f7b9%3A0xf84e76c83055f248!2sSMKN%207%20Baleendah!5e0!3m2!1sid!2sid!4v1685936353338!5m2!1sid!2sid" class="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-6 ">
          <h4 class="fw-semibold">Kotak Saran</h4>
         <form action="">
          <div class="mb-3 row">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="mb-3 row">
            <label for="subjek">Subject</label>
            <input type="text" name="subjek" class="form-control">
          
          </div>
          <div class="mb-3 row">
            <label for="body">Pesan</label>
            <textarea name="body" id="body" class="form-control p-2" cols="30" rows="10"></textarea>
          </div>
          <button class="btn btn-info" type="submit" style="color: #0C134F">Kirim<i class="fa-solid fa-paper-plane ms-2"></i></button>
         </form>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection