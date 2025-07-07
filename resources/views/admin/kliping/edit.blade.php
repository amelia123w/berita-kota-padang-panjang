@extends('admin.layouts.app', ['activePage' => 'kliping'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Edit Kliping</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin/dashboard">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/kliping">Kliping</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Kliping</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Kliping</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/kliping" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr>

      <form action="/admin/kliping/update/{{$kliping->id}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}

         <div class="row">
            <!-- Judul kliping -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Judul Kliping <span class="text-danger">*</span></label>
                  <input type="text" name="judul" required class="form-control" value="{{ $kliping->judul }}" placeholder="Masukkan Judul kliping...">
               </div>
            </div>

            <!-- Tanggal kliping -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Tanggal Kliping <span class="text-danger">*</span></label>
                  <input type="date" name="tanggal" class="form-control" value="{{ $kliping->tanggal ?? '' }}" required>
               </div>
            </div>

            <!-- File kliping -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>File Kliping <span class="text-danger">*</span></label>
                  <input type="file" name="file" class="form-control">
                  @if($kliping->file)
                     <p class="mt-2">
                        <a href="{{ asset('public/kliping/'.$kliping->file) }}" target="_blank" class="btn btn-sm btn-info">
                           <i class="bx bxs-file"></i> Lihat File Lama
                        </a>
                     </p>
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