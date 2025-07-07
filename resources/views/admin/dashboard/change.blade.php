@extends('admin.layouts.app', [
    'activePage' => 'bidang',
  ])
@section('content')


<div class="min-height-200px">
            <div class="page-header">
               <div class="row">
                  <div class="col-md-6 col-sm-12">
                     <div class="title">
                        <h4>Data Master</h4>
                     </div>
                     <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Ganti Password</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
            <!-- Striped table start -->
            <div class="pd-20 card-box mb-30">
               <div class="clearfix">
                  <div class="pull-left">
                     <h2 class="text-primary h2"><i class="icon-copy dw dw-password"></i> Ganti Password</h2>
                  </div>
               </div>
               <hr>
               @if (session('error'))
                  <div class="alert alert-danger">
                    {{ session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
               <form action="/admin/change_password" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label>Password Lama</label>
                     <input type="text" autofocus name="current-password" class="form-control" placeholder="Masukkan Password Lama ....." required>     
                  </div>
                  <div class="form-group">
                     <label>Password Baru</label>
                     <input type="text" name="new-password" class="form-control" placeholder="Masukkan Password Baru ....." required>     
                  </div>
                  <button type="submit" class="btn btn-primary mt-1 mr-2"><span class="icon-copy ti-save"></span> Simpan Data</button>               
               </form>
            </div>
            <!-- Striped table End -->
         </div>
@endsection