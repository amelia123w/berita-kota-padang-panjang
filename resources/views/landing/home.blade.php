@extends('landing.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Berita Kota Padang Panjang</h1>
        <p class="lead">Portal Berita Resmi Kota Padang Panjang</p>
    </div>

    <!-- BERITA TERBARU -->
    <section class="mb-5">
        <h2 class="mb-3">Berita Terbaru</h2>
        <div class="row">
            @foreach($beritas as $berita)
            <div class="col-md-4">
                <div class="card mb-3 h-100">
                    @if($berita->foto)
                        <img src="{{ asset('storage/'.$berita->foto) }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita->nama }}</h5>
                        <p class="card-text">{{ Str::limit($berita->deskripsi, 100) }}</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- MAJALAH -->
    <section class="mb-5">
        <h2 class="mb-3">Majalah</h2>
        <ul class="list-group">
            @foreach($majalahs as $item)
                <li class="list-group-item">{{ $item->judul }}</li>
            @endforeach
        </ul>
    </section>

    <!-- BULLETIN -->
    <section class="mb-5">
        <h2 class="mb-3">Bulletin</h2>
        <ul class="list-group">
            @foreach($bulletins as $item)
                <li class="list-group-item">{{ $item->judul }}</li>
            @endforeach
        </ul>
    </section>

    <!-- KLIPING -->
    <section>
        <h2 class="mb-3">Kliping</h2>
        <ul class="list-group">
            @foreach($klipings as $item)
                <li class="list-group-item">{{ $item->judul }}</li>
            @endforeach
        </ul>
    </section>
</div>
@endsection
