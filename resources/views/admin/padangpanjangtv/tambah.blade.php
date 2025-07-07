@extends('admin.layouts.app', [
    'activePage' => 'padangpanjangtv'
])
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Tambah Data Padang Panjang TV</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.padangpanjangtv.read') }}">Data Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.padangpanjangtv.read') }}">Padang Panjang TV</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h2 class="text-primary h2"><i class="bx bxs-plus-square"></i> Tambah Data</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('admin.padangpanjangtv.read') }}" class="btn btn-primary btn-sm">
                    <i class="bx bxs-left-arrow-square"></i> Kembali
                </a>
            </div>
        </div>
        <hr style="margin-top: 0px;">
        
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="{{ route('admin.padangpanjangtv.create') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" required name="judul" class="form-control" placeholder="Masukkan judul video...">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">Link Padang Panjang TV <span class="text-danger">*</span></label>
                        <input type="url" required name="link" class="form-control" placeholder="Masukkan link Padang Panjang TV...">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-2"><i class="bx bxs-save"></i> Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
