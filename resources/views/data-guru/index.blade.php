@extends('layouts.frontend.app', [
    'title' => 'List Data Guru',
])

@section('content')
@if($data_guru->count() > 0)
<section class="upcoming-events section-padding-100-0 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading mb-5">
                    <h3 class="text-primary">Guru & Staff</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($data_guru as $guru)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="single-upcoming-events wow fadeInUp" data-wow-delay="250ms" style="border: 1px solid #eaeaea; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="events-thumb">
                        <img src="{{ asset('uploads/guru/' . $guru->foto) }}" alt="{{ $guru->nama }}" style="width: 100%; height: auto; max-height: 300px; object-fit: contain;">
                    </div>
                    <div class="p-3 text-center">
                        <h6 class="event-date text-muted">{{ $guru->jabatan }}</h6>
                        <h4 class="event-title text-truncate" style="font-weight: bold;">{{ $guru->nama }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination justify-content-center">
            {{ $data_guru->links() }}
        </div>
    </div>
</section>
@else
<div class="alert alert-warning text-center">Data tidak ditemukan.</div>
@endif
@stop
