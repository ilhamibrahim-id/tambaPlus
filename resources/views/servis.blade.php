@extends('main.header')
@section('konten')


    <section class="page-header services-header" data-parallax="scroll" data-image-src="images/slider/bg-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Layanan Yang <br /> Kami Berikan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Layanan</h2>
                    </div>
                </div>
                @foreach ($data as $lyn)
                    <div class="col-md-4">
                        <div class="service-item text-center">
                            <div class="services-icon">
                                <i class="tf-presentation"></i>
                            </div>
                            <h4 class="service-title">{{ $lyn->nama }}</h4>
                            <p class="service-description">
                                {{ $lyn->deskripsi }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="pricing-table">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h2>Harga Penawaran</h2>
                    </div>
                </div>
                @foreach ($data as $lyn)
                    <div class="col-md-4">
                        <div class="table text-center">
                            <div class="table-price border-effect">
                                <h4 class="pricing-title">{{ $lyn->nama }}</h4>
                                <h3 class="price">{{ $lyn->harga }}</h3>
                            </div>
                            <div class="pricing-list border-effect">
                                <ul class="features-list">
                                    <li>
                                        <p>
                                            <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                                            {{ $lyn->deskripsi }}
                                        </p>
                                    </li>
                                </ul>
                                <input type="button" class="btn btn-default btn-main th-btn-border" value="pesan sekarang">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('main.footer')
@endsection
