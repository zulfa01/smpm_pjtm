@extends('layouts.frontend.app', [
    'title' => 'List Data Guru',
])

@section('content')
@if($data_guru->count() > 0)
<section class="upcoming-events section-padding-100-0 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>List Data Guru</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($data_guru as $guru)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                    <div class="events-thumb">
                        <img src="{{ asset('uploads/guru/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                        <h6 class="event-date">Jabatan: {{ $guru->jabatan }}</h6>
                        <h4 class="event-title">{{ $guru->nama }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('data-guru.show', $guru->id) }}" class="btn btn-primary col-lg">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="pagination justify-content-center">
                {{ $data_guru->links() }}
            </div>
        </div>
    </div>
</section>
@else
<div class="alert alert-warning">Data tidak ditemukan.</div>
@endif
@stop
