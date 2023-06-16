@extends('layout.admin')
@section('konten')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ 60 + $berita->count() }}</h3>

                <p>Berita</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-file"></i>
              </div>
              <a href="dashboard/berita" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ 20 + $berita->where('kategori_id','1')->count() }}</sup></h3>

                <p>Prestasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="dashboard/berita" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ DB::table('staff')->count() }}</h3>

                <p>Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="dashboard/staff" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ DB::table('eskul')->count() }}</h3>
                <p>Ekstrakulikuler</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="dashboard/eskul" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <section class="col-lg-12 connectedSortable">
          <h3 class="fw-semibold">Berita terbaru</h3>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($berita as $item)
                
            <div class="col">
              <div class="card shadow-sm">
                <img src="{{ asset('storage/img/berita/'.$item->cover) }}" class="card-img-top" width="100%" height="255" alt="">
                
                
                <div class="card-body">
                  <a href="/berita/{{ $item->slug }}"><h5 class="fw-semibold text-body">{{ $item->judul }}</h5></a>
                  <p class="card-text">{!! Str::limit($item->isi, 100, '...</div>') !!}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{ route('berita.show',$item->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                      <a href="{{ route('berita.edit',$item->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                    </div>
                    <small class="text-body-secondary">{{ $item->created_at->diffForHumans() }}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </section>
        <!-- Main row -->
        <div class="row">
         
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class=" col-lg-6 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <iframe class="ratio ratio-4x3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.951268670699!2d107.64889287532179!3d-7.015013968717197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f9cd53f7b9%3A0xf84e76c83055f248!2sSMKN%207%20Baleendah!5e0!3m2!1sid!2sid!4v1685936353338!5m2!1sid!2sid" class="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent d-none">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->
          </section>
          <section class=" col-lg-6 connectedSortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    
                    
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

@endsection
