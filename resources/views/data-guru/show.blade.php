@extends('layouts.frontend.app', [
    'title' => 'Detail Data Guru',
])

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded border-0">
        <div class="card-body">
            <div class="text-center">
                <h2 class="mb-3">{{ $data_guru->nama }}</h2>
                <img src="{{ asset('uploads/guru/' . $data_guru->foto) }}" alt="{{ $data_guru->nama }}" class="img-fluid" style="max-width: 150px; height: 150px; object-fit: cover;">
            </div>
            <h5 class="card-title text-center mt-3">Detail Guru</h5>
            <div class="card-text text-center">
                <p><strong>Jabatan:</strong> {{ $data_guru->jabatan }}</p>
                <p><strong>Mata Pelajaran:</strong> {{ $data_guru->mata_pelajaran }}</p>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('data-guru.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@stop
