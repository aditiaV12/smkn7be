<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMKN 7 Baleendah | {{ $judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- slider --}}
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@300;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap');
      *{
        padding: 0;
        margin: 0;
        font-family: 'Montserrat', sans-serif;;


      }
     
    </style>

  </head>
  
  <body >

    @include('pages.navbar')
    <div class=""data-bs-spy="scroll" data-bs-target="#navbar" >

      @yield('content')
    </div>
    

   {{-- footer --}}
<footer class="py-3 bg-primary " >
  <div class="container ">

    <ul class="nav  justify-content-center border-bottom pb-2 mb-3 ">
      <li class="nav-item"><a href="/" class="nav-link px-2 text-white">Home</a></li>
      <li class="nav-item"><a href="/berita" class="nav-link px-2 text-white">Berita</a></li>
      <li class="nav-item"><a href="/sarpras" class="nav-link px-2 text-white">Sarana Dan Prasarana</a></li>
      <li class="nav-item"><a href="/staff" class="nav-link px-2 text-white">Staff</a></li>
      <li class="nav-item"><a href="/about" class="nav-link px-2 text-white">About</a></li>
    </ul>
    <div class="d-flex justify-content-between">
      <p class="text-center text-white">© 2023 Company, Inc</p>
  
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-white" href="#"><i class="fa-brands fa-instagram"></i></a></li>
        <li class="ms-3"><a class="text-white" href="#"><i class="fa-brands fa-facebook"></i></a></li>
        <li class="ms-3"><a class="text-white" href="#"><i class="fa-brands fa-twitter"></i></a></li>
      </ul>
    </div>
  </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f757ca959b.js" crossorigin="anonymous"></script>

    {{-- slider --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
      var swiper = new Swiper(".mySwiper" ,{
    
        grabCursor: true,
        centeredSlides: false,
        spaceBetween:30,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 0,
          stretch: 0,
          depth: 0,
          modifier: 1,
          slideShadows: true,
        },
        navigation: {
          nextEl: ".fa-solid fa-circle-arrow-left",
          prevEl: ".fa-solid fa-circle-arrow-right",
        },
      });
    </script>

  </body>
</html>