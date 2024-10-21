@extends('layouts.frontend.app', [
    'title' => 'Galeri',
])

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Galeri</h2>
    
    <div class="row">
        @foreach($galeri as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $item->getFotoUrl() }}" alt="{{ $item->judul }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
                        <a href="{{ route('galeri.show', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="pagination">
        {{ $galeri->links() }} <!-- Memanggil links() dari objek paginator -->
    </div>
</div>
@stop
