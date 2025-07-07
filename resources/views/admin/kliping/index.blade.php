@extends('admin.layouts.app', [ 
    'activePage' => 'kliping',
])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data kliping</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data kliping</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data kliping</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/kliping/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
         </div>
      </div>
      <hr style="margin-top: 0px;">

      @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
         {{ session('error') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif

      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      @endif

      <table class="table table-striped table-bordered data-table hover">
         <thead class="bg-primary text-white">
            <tr>
               <th width="5%">#</th>
               <th>Judul</th>
               <th>Tanggal</th>
               <th>File</th>
               <th class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach($kliping as $index => $item)
            <tr>
               <td>{{ $index + 1 }}</td>
               <td>{{ $item->judul }}</td>
               <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
               <td>
                  @if($item->file)
                     <a href="{{ asset('/public/kliping/'.$item->file) }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fa fa-file"></i> Lihat File
                     </a>
                  @else
                     <span class="text-danger">Tidak ada file</span>
                  @endif
               </td>
               <td class="text-center">
                  <a href="/admin/kliping/edit/{{ $item->id }}" class="btn btn-warning btn-sm">
                     <i class="fa fa-edit"></i> Edit
                  </a>
                  <!-- Tombol Hapus -->
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{$item->id}}">
                     <i class="fa fa-trash"></i> Hapus
                  </button>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>

<!-- Modal Hapus -->
@foreach($kliping as $data)
<div class="modal fade" id="deleteModal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <h4 class="text-center">Apakah Anda Yakin Menghapus Data Ini?</h4>
            <hr>
            <div class="form-group">
               <label class="form-label">Judul</label>
               <input type="text" class="form-control" value="{{$data->judul}}" readonly style="background-color:white">
            </div>
            <div class="row mt-4">
               <div class="col-md-6">
                  <!-- Form Hapus -->
                  <form action="/admin/kliping/delete/{{$data->id}}" method="POST">
                     @csrf
                     @method('get')
                     <button type="submit" class="btn btn-primary w-100">Ya</button>
                  </form>
               </div>
               <div class="col-md-6">
                  <button type="button" class="btn btn-danger w-100" data-dismiss="modal">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endforeach
@endsection
