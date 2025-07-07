@extends('admin.layouts.app', [
'activePage' => 'berita',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Data Berita</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/berita">Data Berita</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Data Berita</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Berita</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/berita" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr style="margin-top: 0px">
      <form action="/admin/berita/create" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="form-label">Nama Berita <span class="text-danger">*</span></label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Berita ....." required autofocus>
        </div>
        <div class="col-md-6">
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="form-label">Tanggal Berita <span class="text-danger">*</span></label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

    </div>

    <div class="col-md-12 mb-3">
        <div class="form-group">
            <label class="form-label">Deskripsi Berita <span class="text-danger">*</span></label>
            <textarea name="deskripsi" class="form-control" required placeholder="Masukkan Deskripsi ....." required></textarea>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="form-label">OPD <span class="text-danger">*</span></label>
            <select class="form-control" name="opd" required>
            <option value="">-- Pilih OPD --</option>
            @foreach($opd as $data)
        <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
            </select>
        </div>
    </div>
    
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="form-label">Sumber Berita <span class="text-danger">*</span></label>
            <input type="text" name="sumberberita" required class="form-control" placeholder="Masukkan Sumber Berita ....." >
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="form-label">Penulis Berita <span class="text-danger">*</span></label>
            <input type="text" name="penulisberita" required class="form-control" placeholder="Masukkan Penulis Berita .....">
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label class="form-label">Foto Berita <span class="text-danger">*</span></label>
            <input type="file" name="foto" required="" class="form-control" id="foto" onchange="previewImage()">
        </div>
    </div>

    <div class="col-md-6 mb-3 text-center">
        <img id="preview" src="#" alt="Pratinjau Gambar" style="max-width: 200px; display: none;">
            </div>
</div>
         <button type="submit" class="btn btn-primary mt-1 mr-2"><span class="icon-copy ti-save"></span> Tambah Data</button>               
      </form>
   </div>
<script>

function previewImage() {
    var preview = document.getElementById('preview');
    var file = document.getElementById('foto').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.display = 'block';
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "#";
        preview.style.display = 'none';
    }
}
</script>
@endsection