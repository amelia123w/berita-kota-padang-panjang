@extends('admin.layouts.app', ['activePage' => 'berita'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Berita</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/berita">Data Berita</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Berita</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Berita</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/berita" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr>

      <form action="/admin/berita/update/{{$berita->id}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}

         <div class="row">
            <!-- Nama Berita -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Nama Berita <span class="text-danger">*</span></label>
                  <input type="text" name="nama" required class="form-control" value="{{ $berita->nama }}" placeholder="Masukkan Nama Berita...">
               </div>
            </div>

            <!-- Tanggal Berita -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Tanggal Berita <span class="text-danger">*</span></label>
                  <input type="date" name="tanggal" class="form-control" value="{{ $berita->tanggal ?? '' }}" required>
               </div>
            </div>

            <!-- Deskripsi Berita -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>Deskripsi Berita <span class="text-danger">*</span></label>
                  <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi..." rows="4" required>{{ $berita->deskripsi ?? '' }}</textarea>
               </div>
            </div>

            <!-- OPD -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>OPD <span class="text-danger">*</span></label>
                  <select class="form-control" name="opd" required>
                     <option value="">-- Pilih OPD --</option>
                     @foreach($opd as $data)
                        <option value="{{ $data->id }}" @if($berita->opd == $data->id) selected @endif>
                           {{ $data->nama }}
                        </option>
                     @endforeach
                  </select>
               </div>
            </div>

            <!-- Sumber Berita -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>Sumber Berita<span class="text-danger">*</span></label>
                  <input type="text" name="sumberberita" required class="form-control" value="{{ $berita->sumberberita }}" placeholder="Masukkan Sumber Berita...">
               </div>
            </div>

            <!-- Penulis Berita -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>Penulis Berita <span class="text-danger">*</span></label>
                  <input type="text" name="penulisberita" required class="form-control" value="{{ $berita->penulisberita }}" placeholder="Masukkan Penulis Berita...">
               </div>
            </div>

            <!-- Foto Berita -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>Foto Berita <span class="text-danger">*</span></label>
                  <input type="file" name="foto" class="form-control">
                  @if($berita->foto)
                     <img src="{{ asset('public/berita/'.$berita->foto) }}" alt="Foto Berita" class="img-fluid mt-2" width="150">
                  @endif
               </div>
            </div>

            <!-- Tombol Submit -->
            <div class="col-md-12">
               <button type="submit" class="btn btn-primary mt-2"><i class="icon-copy ti-save"></i> Update Data</button>
            </div>
         </div>
      </form>

   </div>
</div>
@endsection
