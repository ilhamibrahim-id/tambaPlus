@extends('main.header')
@section('konten')

<!-- Contact header-section
  =========================-->
  <section class="page-header services-header" data-parallax="scroll" data-image-src="images/header/contact-folding-img.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Kontak Kami</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="contact-form">
    <div class="container">
      <div class="row">
        <div class="title text-center">
          <h2>Hubungi Kami</h2>
        </div>
        <form class="" method="post">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group margin-0">
              <input type="text" class="form-control" placeholder="Name">
            </div>
          </div>
          <div class="col-md-6 margin-0">
            <div class="form-group">
              <textarea class="form-control " rows="3" placeholder="Message"></textarea>
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
    <!-- Google map Study Sections
    =========================-->
  <section class="contact-map">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12  padding-0">
          <!-- map -->
           <div id="row"><img src="{{asset('images/maps.png')}}"></div>
          <!-- Contact Information -->
          <div class="contact-info">
            <div class="contact-img">
              <img src="images/contact/contact-img1.png" alt="">
            </div>
            <div class="contact-content">
              <div class="content-title-section">
                <h3 class="content-title"TAMBA+</h3>
              </div>
              <div class="home-address">
                <div class="flex">
                  <div class="contact-icon">
                    <i class="tf-ion-ios-home-outline"></i>
                  </div>
                  <p class="ct-info">Jl Bulak Banteng Lor 4/67,Kota Surabaya Indonesia</p>
                </div>
              </div>
              <div class="web-address">
                <div class="flex">
                  <div class="contact-icon">
                    <i class="tf-global"></i>
                  </div>
                  <a href="#" class="ct-info">tamba.plus</a>
                </div>
              </div>
              <div class="phone-address">
                <div class="flex">
                  <div class="contact-icon">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <p class="ct-info">089676301281 (Whatsapp / telp)</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Contact From Study Sections
    =========================-->

   <section class="team">
    <div class="container-fluid padding-0">
    <!-- Team title -->
    <div class="title text-center">
      <h2>Pendiri Tamba Plus</h2>
    </div>
    <div class="col-md-6 col-lg-4 padding-0">
      <div class="team-member">
        <div class="th-mouse-effect">
          <div class="team-img">
            <img src="images/team/team-pic1.jpg" alt="Team img">
          </div>
          <div class="overlay text-center">
            <div class="content">
              <h4>Vega Anggaresta</h4>
              <span>Manajemen Sistem</span>
              <p>Nothing Last Forever We Can Changes The Future.</p>

            </div>
            <div class="social-media">
              <li><a href="#"><i class="tf-ion-social-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-linkedin-outline" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-google-outline" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-instagram-outline" aria-hidden="true"></i></a></li>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 padding-0">
      <div class="team-member">
        <div class="th-mouse-effect">
          <div class="team-img">
            <img src="images/team/team-pic2.jpg" alt="Team img">
          </div>
          <div class="overlay text-center">
            <div class="content">
              <h4>Ilham Ibrahim</h4>
              <span>Front End</span>
              <p>Gelap ? Siapa Takut</p>

            </div>
            <div class="social-media">
              <li><a href="#"><i class="tf-ion-social-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-linkedin-outline" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-google-outline" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-instagram-outline" aria-hidden="true"></i></a></li>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 padding-0">
      <div class="team-member">
        <div class="th-mouse-effect">
          <div class="team-img">
            <img src="images/team/team-pic3.jpg" alt="Team img">
          </div>
          <div class="overlay text-center">
            <div class="content">
              <h4>Awang Syukriansah Dirgantoro</h4>
              <span>Back End</span>
              <p>Healing For Everyone</p>

            </div>
            <div class="social-media">
              <li><a href="#"><i class="tf-ion-social-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-linkedin-outline" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-google-outline" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="tf-ion-social-instagram-outline" aria-hidden="true"></i></a></li>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="join-team text-center">
        <a class="btn btn-default btn-main" href="#" role="button">Join Our Team</a>
      </div>
    </div>
    </div>
  </section>
   @include('main.footer')
@endsection
