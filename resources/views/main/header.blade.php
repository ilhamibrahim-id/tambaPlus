<!doctype html>
<html class="no-js" lang="zxx">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fiction Multipage Bootstrap Template</title>
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
    <script src="{{asset('plugins/modernizr.min.js"')}}'></script>
  </head>
  @yield('konten')
