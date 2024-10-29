@extends('layouts.frontend.app', [
    'title' => 'About',
])

@section('content')
<div class="regular-page-area section-padding-75">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Main Container -->
            <div class="col-12 col-lg-10">
                <div class="box-wrapper p-4 shadow-lg">
                    <!-- About Us Section -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white text-center">
                            <h4>Informasi Program</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-justify">
                                SMP Muhammadiyah Pujotomo tidak hanya berfokus pada prestasi akademik, tetapi juga membentuk karakter siswa dengan nilai-nilai Islam yang kuat melalui berbagai program unggulan. Sekolah ini menawarkan beragam program pendidikan, mulai dari pelatihan keterampilan hingga pengembangan potensi wirausaha. Program-program tersebut dirancang untuk menumbuhkan keterampilan praktis dan spiritual siswa, mendukung mereka menjadi pribadi yang berprestasi, berakhlak mulia, serta siap menghadapi tantangan masa depan. Di samping itu, fasilitas yang lengkap dan kegiatan ekstrakurikuler yang variatif memperkaya pengalaman belajar siswa secara menyeluruh.
                            </p>
                        </div>
                    </div>

                    <!-- Programs Section -->

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">Program Unggulan</div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>&#8226; Hafalan Juz 30</li>
                                    <li>&#8226; Tilawah / Qiro'ah</li>
                                    <li>&#8226; Enterpreneur / Kewirausahaan</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">Fasilitas</div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>&#8226; Laboratorium Komputer</li>
                                    <li>&#8226; Laboratorium IPA</li>
                                    <li>&#8226; Perpustakaan</li>
                                    <li>&#8226; Musholla</li>
                                    <li>&#8226; Pondok Pesantren & Panti Asuhan</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">Program Pembiasaan</div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>&#8226; Asmaul Husna</li>
                                    <li>&#8226; Surat pendek</li>
                                    <li>&#8226; Daily English</li>
                                    <li>&#8226; Ngaji Morning</li>
                                    <li>&#8226; Sholat Dhuha</li>
                                </ul>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header bg-primary text-white">Ekstrakurikuler</div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li>&#8226; Olahraga</li>
                                    <li>&#8226; Pencak Silat</li>
                                    <li>&#8226; Panahan</li>
                                    <li>&#8226; Hizbul Wathan</li>
                                    <li>&#8226; English Club</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
