@extends('layouts.frontend.app', ['title' => 'Detail Galeri'])

@section('content')
<div class="container">
    <h2>Detail Galeri</h2>
    <h3>{{ $galeri->judul }}</h3>
    <p>Deskripsi: {{ $galeri->deskripsi }}</p>
    <img src="{{ $galeri->getFotoUrl() }}" alt="{{ $galeri->judul }}" class="img-fluid">
    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@stop
