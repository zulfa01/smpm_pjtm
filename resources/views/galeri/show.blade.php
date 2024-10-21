@extends('layouts.frontend.app', [
    'title' => 'Detail Galeri',
])

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">{{ $galeri->judul }}</h2>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Galeri</h5>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $galeri->deskripsi }}</p>
            
            <div class="text-center">
                <img src="{{ asset('uploads/galeri/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="img-fluid" style="max-width: 300px; height: auto;">
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('galeri.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@stop
