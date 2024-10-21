@extends('layouts.backend.app', [
    'title' => 'Manage Messages',
    'contentTitle' => 'Messages Received',
])

@section('content')
<x-alert></x-alert>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Pesan Masuk</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengirim</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $no = 1;
                    @endphp

                    @foreach($messages as $message)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ Str::limit($message->message, 50) }}</td>
                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus pesan ini?')" type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    $(document).ready(function() {
        $('.table').DataTable(); // Jika menggunakan DataTables
    });
</script>
@endpush
