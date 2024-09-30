@extends('layouts.frontend.app', ['title' => 'Home',])

@section('content')
<!-- ##### Hero Area Start ##### -->
<section class="hero-area bg-img bg-overlay-2by5" style="background-image: url({{ asset('img/bg/bg1.jpg') }});">
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
        <div class="card mb-4 shadow">
            <div class="card-header bg-primary text-white text-center">
                <h4>Selamat Datang</h4>
            </div>
            <div class="card-body">
                <p class="lead text-justify">
                    SMP Muhammadiyah 1 Mertoyudan, yang sebelumnya dikenal sebagai SMP Muhammadiyah Pujotomo, memiliki sejarah yang kaya dan berkontribusi besar dalam pendidikan di wilayah Magelang. Sekolah ini didirikan sebagai bagian dari upaya Muhammadiyah untuk memberikan pendidikan yang berkualitas dan berlandaskan nilai-nilai Islam.
                    Sejak awal berdirinya, SMP Muhammadiyah 1 Mertoyudan telah berfokus pada pembentukan karakter siswa, dengan menekankan pendidikan moral, akhlak, dan keagamaan. Sekolah ini berusaha untuk menciptakan lingkungan belajar yang kondusif, di mana siswa dapat berkembang secara akademis dan spiritual.
                    Dalam perjalanannya, SMP Muhammadiyah 1 Mertoyudan telah mengalami berbagai perkembangan, baik dari segi kurikulum maupun fasilitas. Dengan dukungan dari komunitas dan orang tua, sekolah ini terus berupaya untuk meningkatkan kualitas pendidikan, menghadirkan program-program inovatif, serta menjalin kerjasama dengan berbagai pihak.
                    Saat ini, SMP Muhammadiyah 1 Mertoyudan dikenal sebagai salah satu sekolah unggulan di wilayah Mertoyudan dan sekitarnya, dengan komitmen untuk mencetak generasi yang berakhlak mulia, berilmu, dan siap menghadapi tantangan zaman.
                    SMP Muhammadiyah 1 Mertoyudan merupakan salah satu dari sekian SMP yang ada di Kabupaten Magelang. 
                    Berdiri sejak 1 Februari 1976, saat ini dipimpin oleh Bapak Agus Haryanto, S.Pd. Beralamat di 
                    Jl. Santan, Glagak, Sumberrejo, Kec. Mertoyudan, Kab. Magelang.
                </p>
            </div>
        </div>

        <!-- Visi, Misi, dan Tujuan dalam 3 kotak -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-header bg-primary text-white">Visi</div>
                    <div class="card-body">
                        <p class="text-justify">SMP Muhammadiyah 1 Mertoyudan menjadi sekolah unggulan yang berlandaskan nilai-nilai Islam dan berorientasi pada pengembangan karakter siswa.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-header bg-primary text-white">Misi</div>
                    <div class="card-body">
                        <ul class="list-unstyled text-justify">
                            <li class="mb-2">Menyelenggarakan pendidikan yang berkualitas dan berkarakter.</li>
                            <li class="mb-2">Mengembangkan potensi siswa melalui berbagai program akademik dan non-akademik.</li>
                            <li class="mb-2">Menanamkan nilai-nilai keislaman dalam setiap aspek pendidikan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 text-center shadow-sm">
                    <div class="card-header bg-primary text-white">Tujuan</div>
                    <div class="card-body">
                        <p class="text-justify">Menyiapkan siswa yang cerdas, berakhlak mulia, dan siap berkontribusi positif bagi masyarakat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($pengumuman->isNotEmpty())
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
            <div class="col-12 col-md-6 col-lg-6 mb-4">
                <div class="single-upcoming-events wow fadeInUp" data-wow-delay="250ms">
                    <div class="events-thumb">
                        <img src="{{ asset('img/bg/pengumuman.png') }}" alt="" class="img-fluid">
                        <h6 class="event-date">{{ $pn->tgl }} | BY: {{ $pn->user->name }}</h6>
                        <h4 class="event-title">{{ $pn->judul }}</h4>
                    </div>
                    <div>
                        <a href="{{ route('pengumuman.show', $pn->slug) }}" class="btn btn-primary col-lg">Detail</a>
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

@if($artikel->isNotEmpty())
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
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            {{ $art->judul }}
                            <span class="badge badge-danger">Penulis: {{ $art->user->name }}</span>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset($art->getThumbnail()) }}" class="img-fluid" style="height: 300px; object-fit: cover; object-position: center;">
                            <div class="card-text mt-3">
                                {!! Str::limit($art->deskripsi, 100) !!}
                            </div>
                            <a href="{{ route('artikel.show', $art->slug) }}" class="btn btn-primary btn-sm">Selengkapnya</a>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-primary">Kategori: {{ $art->kategoriArtikel->nama_kategori }}</span>
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

@endsection
