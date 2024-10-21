@extends('layouts.frontend.app', [
    'title' => 'Detail Data Guru',
])

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">{{ $data_guru->nama }}</h2>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail Guru</h5>
            <p class="card-text"><strong>Jabatan:</strong> {{ $data_guru->jabatan }}</p>
            <p class="card-text"><strong>Mata Pelajaran:</strong> {{ $data_guru->mata_pelajaran }}</p>
            
            <div class="text-center">
                <img src="{{ asset('uploads/guru/' . $data_guru->foto) }}" alt="{{ $data_guru->nama }}" class="img-fluid" style="max-width: 200px; height: auto;">
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('data-guru.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@stop
