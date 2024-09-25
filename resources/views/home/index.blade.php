@extends('layouts.frontend.app', [
    'title' => 'Home',
])
@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url({{asset('img/bg') }}/bg1.jpg);">
    <div class="container h-150">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Hero Content -->
            </div>
        </div>
    </div>
</section>
<!-- ##### Hero Area End ##### -->

<div class="regular-page-area section-padding-100 mt-5 mb-4">
    <div class="col-lg-9 mx-auto">
        <div class="card">
            <div class="card-header">Selamat Datang</div>
            <div class="card-body">
                <p class="lead" style="text-align: justify;">
                  SMP Muhammadiyah 1 Mertoyudan merupakan salah satu dari sekian SMP yang ada di kabupaten Magelang. SMP Muhammadiyah 1 Mertoyudan berdiri sejak 1 Februari 1976, saat ini SMP Muhammadiyah 1 Mertoyudan dipimpin oleh Bapak Agus Haryanto, S.Pd. SMP Muhammadiyah 1 Mertoyudan beralamat di Jl. Santan, Glagak, Sumberrejo, Kec. Mertoyudan, Kab. Magelang.
                </p>
            </div>
        </div>

        <!-- Visi, Misi, dan Tujuan dalam 3 kotak -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header">Visi</div>
                    <div class="card-body">
                        <p style="text-align: justify;">SMP Muhammadiyah 1 Mertoyudan menjadi sekolah unggulan yang berlandaskan nilai-nilai Islam dan berorientasi pada pengembangan karakter siswa.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header">Misi</div>
                    <div class="card-body">
                        <ul style="text-align: justify;">
                            <li>Menyelenggarakan pendidikan yang berkualitas dan berkarakter.</li>
                            <li>Mengembangkan potensi siswa melalui berbagai program akademik dan non-akademik.</li>
                            <li>Menanamkan nilai-nilai keislaman dalam setiap aspek pendidikan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header">Tujuan</div>
                    <div class="card-body">
                        <p style="text-align: justify;">Menyiapkan siswa yang cerdas, berakhlak mulia, dan siap berkontribusi positif bagi masyarakat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($pengumuman->count() > 0)
<section class="upcoming-events section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Pengumuman Terbaru</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($pengumuman as $pn)
            <div class="col-12 col-md-6 col-lg-6">
                <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                    <!-- Events Thumb -->
                    <div class="events-thumb">
                        <img src="{{ asset('img/bg') }}/pengumuman.png" alt="">
                        <h6 class="event-date">{{ $pn->tgl }} | BY : {{ $pn->user->name }}</h6>
                        <h4 class="event-title">{{ $pn->judul }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('pengumuman.show',$pn->slug) }}" class="btn btn-primary col-lg">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <a href="{{ route('pengumuman') }}" class="alert alert-success alert-link mx-auto">Lihat Semua Pengumuman</a>
        </div>
    </div>
</section>
@endif

@if($artikel->count() > 0)
<!-- ##### Artikel ##### -->
<section class="blog-area section-padding-100-0 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h3>Artikel Terbaru</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($artikel as $art)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            {{ $art->judul }}
                            <span class="badge badge-danger float-right">Penulis : {{ $art->user->name }}</span>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset($art->getThumbnail()) }}" width="100%" style="height: 300px; object-fit: cover; object-position: center;">

                            <div class="card-text mt-3">
                                {!! Str::limit($art->deskripsi) !!}
                            </div>

                            <a href="{{ route('artikel.show',$art->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                        <div class="card-footer">
                                <span class="badge badge-primary float-right">kategori : {{ $art->kategoriArtikel->nama_kategori }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <a href="{{ route('artikel') }}" class="alert alert-success alert-link mx-auto mt-3">Lihat Semua Artikel</a>
        </div>
    </div>
</section>
@endif

@stop
