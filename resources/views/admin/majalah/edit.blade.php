@extends('admin.layouts.app', ['activePage' => 'majalah'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Edit Majalah</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin/dashboard">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/majalah">Majalah</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data Majalah</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Majalah</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/majalah" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr>

      <form action="/admin/majalah/update/{{$majalah->id}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}

         <div class="row">
            <!-- Judul Majalah -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Judul Majalah <span class="text-danger">*</span></label>
                  <input type="text" name="judul" required class="form-control" value="{{ $majalah->judul }}" placeholder="Masukkan Judul Majalah...">
               </div>
            </div>

            <!-- Tanggal Majalah -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Tanggal Majalah <span class="text-danger">*</span></label>
                  <input type="date" name="tanggal" class="form-control" value="{{ $majalah->tanggal ?? '' }}" required>
               </div>
            </div>

            <!-- File Majalah -->
            <div class="col-md-12 mb-3">
               <div class="form-group">
                  <label>File Majalah <span class="text-danger">*</span></label>
                  <input type="file" name="file" class="form-control">
                  @if($majalah->file)
                     <p class="mt-2">
                        <a href="{{ asset('public/majalah/'.$majalah->file) }}" target="_blank" class="btn btn-sm btn-info">
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