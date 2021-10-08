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

    <!-- Service Item Sections
    =========================-->
    <section class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title text-center">
              <h2>Layanan</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item text-center">
              <div class="services-icon">
                <i class="tf-presentation"></i>
              </div>
              <h4 class="service-title">Isi Angin</h4>
              <p class="service-description">
                Banyak dari kita tidak menyadari bahwa kendaraan kita kurang angin sehingga hal ini tidak bisa dianggap remeh,
                tamba plus siap sedia mengisi angin di ban kendaraan anda.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item text-center">
              <div class="services-icon">
                <i class="tf-mobile"></i>
              </div>
              <h4 class="service-title">Ban Biasa</h4>
              <p class="service-description">
                Kami melayani ban biasa pada umumnya tak usah khawatir ban anda tidak bisa kami layani.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item text-center">
              <div class="services-icon">
                <i class="tf-telescope"></i>
              </div>
              <h4 class="service-title">Ban Tubles</h4>
              <p class="service-description">
                Seperti yang kita tau bahwa ban tubles sangat kuat menghadapi rintangan paku dijalan tapi tidak menjadi kemungkinan
                bahwa ban tubles bisa terjadi bocor maka kami juga siap melayani ban tubles yang sedang bocor.
              </p>
            </div>
          </div>
      </div>
    </section>


    <!-- Pricing Table Sections
    =========================-->
    <section class="pricing-table">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title text-center">
              <h2>Harga Penawaran</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="table text-center">
              <!-- pricing table
              ===================== -->
              <div class="table-price border-effect">
                <h4 class="pricing-title">Isi Angin</h4>
                <h2 class="price">Rp. 3.000</h2>
                <p class="table-month">/ Ban</p>
              </div>
              <div class="pricing-list border-effect">
                <ul class="features-list">
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Di Isi Dengan Standard Ban
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Bisa Di Isi Sesuai Keinginan Tekanan Angin
                    </p>
                  </li>
                </ul>
                <input type="button" class="btn btn-default btn-main th-btn-border" value="pesan sekarang">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="table text-center">
              <!-- pricing table
              ===================== -->
              <div class="table-price border-effect">
                <h4 class="pricing-title">Ban Biasa</h4>
                <h2 class="price">Rp. 10.000</h2>
                <p class="table-month">/ Lubang</p>
              </div>
              <div class="pricing-list border-effect">
                <ul class="features-list">
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Dikerjakan Dengan Cepat
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Melakukan Metode Tambal Ban yang Praktis
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Melakukan Tambal Ban dengan Baik
                    </p>
                  </li>
                </ul>
                <input type="button" class="btn btn-default btn-main th-btn-border" value="pesan sekarang">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="table text-center">
              <!-- pricing table
              ===================== -->
              <div class="table-price border-effect">
                <h4 class="pricing-title">Ban Tubles</h4>
                <h2 class="price">Rp. 20.000</h2>
                <p class="table-month">/ Lubang</p>
              </div>
              <div class="pricing-list border-effect">
                <ul class="features-list">
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Tubles Menggunakan Alat Modern
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Pengerjaan Tidak Sampai 10 Menit
                    </p>
                  </li>
                  <li>
                    <p>
                      <i class="tf-ion-ios-checkmark-outline" aria-hidden="true"></i>
                      Menggunakan Karet Standard Tubles
                    </p>
                  </li>
                </ul>
                <input type="button" class="btn btn-default btn-main th-btn-border" value="pesan sekarang">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @include('main.footer')
@endsection
