@extends('admin.layouts.app', ['activePage' => 'padangpanjangtv'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Padang Panjang TV</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/padangpanjangtv">Data Padang Panjang TV</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data </h2>
         </div>
         <div class="pull-right">
            <a href="/admin/padangpanjangtv" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <hr>

      <form action="/admin/padangpanjangtv/update/{{$padangpanjangtv->id}}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}

         <div class="row">
            <!-- Input Judul -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Judul <span class="text-danger">*</span></label>
                  <input type="text" name="judul" required class="form-control" value="{{ $padangpanjangtv->judul }}" placeholder="Masukkan Judul...">
               </div>
            </div>

            <!-- Input Link -->
            <div class="col-md-6 mb-3">
               <div class="form-group">
                  <label>Link Padang Panjang TV <span class="text-danger">*</span></label>
                  <input type="text" name="link" required class="form-control" value="{{ $padangpanjangtv->link }}" placeholder="Masukkan Link Padang Panjang TV...">
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
