<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Sistem Informasi Karyawan TambaPlus
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body style="background-image: url('{{ url('images/polinema.png') }}');">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <center>
                    @if ($data->foto == null)
                        <img src="{{ asset('assets/img/logo-small.png') }}" width="150px">
                    @else
                        <img src="{{ asset('storage/' . $data->foto) }}" width="150px">
                    @endif
                </center>
                <a href="/main/edituser" class="simple-text logo-normal">
                    HI,{{ $data->nama }}<br /> Login By
                    {{ auth()->user()->role }}
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <a href="/admin/dashboard">
                            <i class="nc-icon nc-shop"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @if (auth()->user()->role == 'admin')
                        <li
                            class="{{ request()->is('admin/karyawan') ? 'active' : '' }} ">
                            <a href="/admin/karyawan">
                                <i class="nc-icon nc-circle-10"></i>
                                <p> Karyawan </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li class="{{ request()->is('admin/listjob') ? 'active' : '' }}">
                            <a href="/admin/listjob">
                                <i class="nc-icon nc-bank"></i>
                                <p> List Job </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li
                            class="{{ request()->is('admin/job') ? 'active' : '' }}">
                            <a href="/admin/job">
                                <i class="nc-icon nc-ruler-pencil"></i>
                                <p> Job </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li
                            class="{{ request()->is('admin/jabatan') ? 'active' : '' }}">
                            <a href="/admin/jabatan">
                                <i class="nc-icon nc-single-02"></i>
                                <p> Jabatan </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li
                            class="{{ request()->is('admin/blog') ? 'active' : '' }}">
                            <a href="/admin/blog">
                                <i class="nc-icon nc-glasses-2"></i>
                                <p> Blog </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li
                            class="{{ request()->is('admin/layanan') ? 'active' : '' }}">
                            <a href="/admin/layanan">
                                <i class="nc-icon nc-laptop"></i>
                                <p> Layanan </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <li
                            class="{{ request()->is('admin/admin') ? 'active' : '' }}">
                            <a href="/admin/admin">
                                <i class="nc-icon nc-laptop"></i>
                                <p> Admin </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'dosen')
                        <li class="{{ request()->is('dosen/kelas') ? 'active' : '' }}">
                            <a href="/dosen/kelas">
                                <i class="nc-icon nc-bank"></i>
                                <p> Job </p>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->role == 'dosen')
                        <li class="{{ request()->is('dosen/nilai') ? 'active' : '' }}">
                            <a href="/dosen/nilai">
                                <i class="nc-icon nc-globe-2"></i>
                                <p> Laporan </p>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Sistem Informasi Kayawan TambaPlus</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Fitur Akun</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" type="button" href="/main/edituser">Edit Profile</a>
                                    <a class="dropdown-item" type="button" href="/main/gantipassword">Ganti Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('konten')
