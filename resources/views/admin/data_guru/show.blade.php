@extends('layouts.frontend.app', ['title' => 'Detail Data Guru'])

@section('content')
<div class="container">
    <h2>Detail Data Guru</h2>
    <h3>{{ $guru->nama }}</h3>
    <p>Jabatan: {{ $guru->jabatan }}</p>
    <p>Mata Pelajaran: {{ $guru->mata_pelajaran }}</p>
    <img src="{{ $guru->getFotoUrl() }}" alt="{{ $guru->nama }}">
    <a href="{{ route('data_guru.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@stop
