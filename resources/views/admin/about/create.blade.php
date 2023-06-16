@extends('layout.admin')
@section('konten')



<div class="row">
    <div class="col-md-12">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">
           Tambah Data
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         <form action="{{ route('about.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="visi" class="form-label">Visi</label>
                <input id="visi" type="hidden" name="visi" >
                <trix-editor input="visi"></trix-editor>
              </div>

            <div class="mb-3">
                <label for="misi" class="form-label">Misi</label>
                <input id="misi" type="hidden" name="misi" >
                <trix-editor input="misi"></trix-editor>
              </div>

            <div class="mb-3">
                <label for="sejarah" class="form-label">Sejarah</label>
                <input id="sejarah" type="hidden" name="sejarah" >
                <trix-editor input="sejarah"></trix-editor>
              </div>

              <button type="submit" name="submit" class="btn btn-primary ">Kirim Berita <i class="fas fa-paper-plane"></i></button>

              <a href="{{ route('about.index') }}" class="btn btn-secondary">Batal</a>
         </form>


        </div>
       
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection