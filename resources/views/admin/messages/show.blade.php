@extends('layouts.backend.app', [
    'title' => 'Detail Pesan',
])

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Pesan</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Pesan:</strong> {{ $message->message }}</p>
            <p><strong>Tanggal:</strong> {{ $message->created_at->format('d/m/Y H:i') }}</p>

            <div class="text-right">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@stop
