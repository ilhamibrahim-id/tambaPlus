<!doctype html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tambah+</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
    <!-- ThemeFisher Icon -->
    <link rel="stylesheet" href="{{asset('plugins/themefisher-fonts/themefisher-fonts.css')}}">
    <!-- Light Box -->
    <link rel="stylesheet" href="{{asset('plugins/magnific-popup/magnific-popup.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('plugins/animate/animate.css')}}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map_canvas {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
    </style>
    <script src="{{asset('plugins/modernizr.min.js')}}"></script>
  </head>
  <body>
    <div class="loading">
      <div class="windows8 loading-position">
        <div class="wBall" id="wBall_1">
          <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_2">
          <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_3">
          <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_4">
          <div class="wInnerBall"></div>
        </div>
        <div class="wBall" id="wBall_5">
          <div class="wInnerBall"></div>
        </div>
      </div>
    </div>


   <!-- Navigation -section
    =========================-->
  <nav class="navbar navbar-fixed-top navigation" >
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand logo" href="index.html">
          <img src="{{asset('images/logo.png')}}" alt="">
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right menu">
          <li><a href="/">Home</a></li>
          <li><a href="/servis">Service</a></li>
          <li><a href="/kontak">Contact</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
  @yield('konten')
