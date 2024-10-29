@extends('layouts.frontend.app', [
    'title' => 'Informasi PPDB',
])

@section('content')
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="contact--info mt-50 mb-50">
                    <h4>Informasi PPDB</h4>
                    <div class="brochure">
                        <img src="img\bg\brosur.jpg" alt="Brosur PPDB" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- Info Kontak -->
            <div class="col-12 col-lg-6">
                <div class="contact--info mt-50">
                    <h4>Info Kontak</h4>
                    <ul class="contact-list">
                        <li>
                            <h6><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> Jam Masuk</h6>
                            <h6>07:00 WIB - 13:00 WIB</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-phone fa-fw" aria-hidden="true"></i> No Telp</h6>
                            <h6>0293325924</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-envelope fa-fw" aria-hidden="true"></i> Email</h6>
                            <h6>smp_muh_pujotomo@yahoo.com</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-map-pin fa-fw" aria-hidden="true"></i> Alamat</h6>
                            <h6>Jl. Santan, Glagak, Sumberrejo, Kec. Mertoyudan</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .brochure {
        position: relative;
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .brochure img {
        width: 100%;
        height: auto;
    }

    .brochure-content {
        position: absolute;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .brochure-content h5 {
        margin-bottom: 15px;
        color: #333;
    }

    .brochure-content p {
        margin-bottom: 10px;
        color: #555;
    }
</style>
@stop
