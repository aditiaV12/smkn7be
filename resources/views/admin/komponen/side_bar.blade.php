<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
          <a href="" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column mb-3" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' :'' }} ">
              <i class=" fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
         <li class="nav-item text-white">Pages</li>
          <li class="nav-item">
            <a href="{{ route('berita.index') }}" class="nav-link {{ Request::is('dashboard/berita*') ? 'active' :'' }}">
              <i class="fa-solid fa-copy nav-icon"></i>
              <p>
            Berita
               
              </p>
            </a>
            <ul class="nav ">
             
              <li class="nav-item">
                <a href="{{ route('berita.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon nav-icon"></i>
                  <p>Tambah Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('staff.index') }}" class="nav-link {{ Request::is('dashboard/staff*') ? 'active' :'' }}">
              <i class="fa-solid fa-users nav-icon nav-icon"></i>
              <p>
                Staff
              </p>
            </a>
            <ul class="nav">
              <li class="nav-item">
                <a href="{{ route('jabatan.index') }}" class="nav-link">
                 <i class="far fa-circle nav-icon nav-icon"></i>
                  <p>Jabatan</p>

                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('dashboard/admin*') ? 'active' :'' }}">
              <i class="fa-solid fa-user  nav-icon"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('eskul.index') }}" class="nav-link {{ Request::is('dashboard/eskul*') ? 'active' :'' }}">
              <i class="fa-solid fa-person-hiking  nav-icon"></i>
              <p>
                Ekstrakulikuler
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kepsek.index') }}" class="nav-link {{ Request::is('dashboard/kepsek*') ? 'active' :'' }}">
              <i class=" fa-solid fa-book-open-reader  nav-icon"></i>
              <p>
               Sambutan Kepsek
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('about.index') }}" class="nav-link {{ Request::is('dashboard/about*') ? 'active' :'' }}">
              <i class="fa-solid fa-landmark  nav-icon"></i>
              <p>
                Tentang Kita
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sarpras.index') }}" class="nav-link {{ Request::is('dashboard/sarpras*') ? 'active' :'' }}">
              <i class="fa-solid fa-building  nav-icon"></i>
              <p>
                  Sarana Dan Prasarana
              </p>
            </a>
            
          </li>
              
           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>