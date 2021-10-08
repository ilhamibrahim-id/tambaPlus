@extends('main.header')
@section('konten')
<section class="page-header services-header" data-parallax="scroll" data-image-src="images/header/contact-folding-img.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Gabung Jadi Mitra Kami</h1>
        </div>
      </div>
    </div>
  </section>
<section class="contact-form">
    <div class="container">
      <div class="row">
        <div class="title text-center">
          <h2>Gabung Jadi Mitra</h2>
        </div>
        <form class="" method="post">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="No E-KTP">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group margin-0">
              <input type="text" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="col-md-6 margin-0">
            <div class="form-group">
              <textarea class="form-control " rows="3" placeholder="Alasan Gabung Dengan Kami ?"></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-btn text-center">
              <input class="btn btn-default btn-main" type="submit" value="Sent Message">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@include('main.footer')
@endsection
