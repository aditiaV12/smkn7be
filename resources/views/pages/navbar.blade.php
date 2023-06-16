
{{-- navbar --}}
<nav class="navbar navbar-expand-lg shadow-sm sticky-top bg-primary " id="navbar" >
    <div class="container " >
      <a class="navbar-brand fw-bold text-white" href="/">SMKN <Span style="color: #1D267D">7</Span> Baleendah</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-nav-scroll" >
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil Sekolah
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item " href="/sambutan">Sambutan Kepala Sekolah</a></li>
                <li><a class="dropdown-item " href="/about">Tentang Kami</a></li>
                <li><a class="dropdown-item " href="/sarana">Sarana dan Prasarana</a></li>
                <li><a class="dropdown-item " href="/staff">Staff</a></li>
              </ul>
            </li>
          <li class="nav-item">
            <a class="nav-link text-white  {{ Request::is('dashboard/kepsek*') ? 'active' :'' }}" href="/berita">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/#eskul">Ekstrakulikuler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/#prestasi">Prestasi</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/#contact">Contact</a>
          </li>
          </li>
        
        </ul>

      </div>
    </div>
</nav>

{{-- end navbar --}}