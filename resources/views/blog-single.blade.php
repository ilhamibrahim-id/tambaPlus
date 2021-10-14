@extends('main.header')
@section('konten')
    <section class="page-header services-header" data-parallax="scroll" data-image-src="images/header/blog-folding-img.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Berita</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Sections 
        =========================-->
    <section class="blog-single">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>{{ $data->judul }}</h2>
                </div>
                <div class="col-md-12">
                    <div class="blog-single-section-img">
                        <img src="{{ asset('storage/' . $data->gambar) }}" alt="Blog Single Img">
                    </div>
                    <div class="blog-single-content">
                        <div class="blog-content-description">
                            <h3><a class="blog-content-title" href="#">{{ $data->judul }}</a></h3>
                            <div class="meta">
                                <div class="date" style="color:white">
                                    {{ $data->created_at }}
                                </div>
                                <div class="author">
                                    <p>By Admin</p>
                                </div>
                            </div>
                            <p class="blog-description">{{ $data->isi }}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="see-all-post text-center">
                            <a class="btn btn-default th-btn solid-btn" href="/blog" role="button"><i
                                    class="fa fa-long-arrow-left" aria-hidden="true"></i> Back To All Posts </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('main.footer')
@endsection
