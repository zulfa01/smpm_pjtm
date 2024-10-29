@extends('layouts.frontend.app', [
    'title' => 'Detail Galeri',
])

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded border-0">
        <div class="card-body">
            <div class="text-center">
                <h2 class="mb-3">{{ $galeri->judul }}</h2>
                <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="img-fluid" style="max-width: 300px; height: auto; object-fit: cover;">
            </div>
            <h5 class="card-title text-center mt-3">Detail Galeri</h5>
            <div class="card-text text-center">
                <p><strong>Tanggal:</strong> {{ $galeri->tanggal }}</p>
                <p><strong>Keterangan:</strong> {{ $galeri->keterangan }}</p>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('galeri.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@stop
