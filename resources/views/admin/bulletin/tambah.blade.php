@extends('admin.layouts.app', ['activePage' => 'bulletin'])

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Tambah Data Bulletin</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.bulletin.read') }}">Data Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.bulletin.read') }}">Bulletin</a></li>
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
            <a href="/admin/bulletin" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                </a>
            </div>
        </div>
        <hr>

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

        <form action="/admin/bulletin/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">Judul Bulletin <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control" required autofocus placeholder="Masukkan Judul bulletin ...">
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">Tanggal Bulletin <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        <label class="form-label">File Bulletin <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-2">
                        <i class="bx bxs-save"></i> Tambah Data
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
