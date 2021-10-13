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

<section class="blog">

    <div class="container">
      <div class="row">
        <div class="title text-center">
          <h2>Berita</h2>
        </div>
        <div class="col-md-12">
          <!-- Blog Left Sections
          =========================-->

            <!-- If you use to 1 by 1 section to blog content left or right use class
              blog content left is default but you use blog content right side
              you mast use class="blog-content-right" class with blog-list-section div
             -->
            <!-- Blog List Only Image
            ========================= -->
            @foreach ($data as $datas)
            <div class="blog-list-section blog-content-right row">
              <div class="col-md-9 blog-content-area">
                <div class="blog-img">
                  <img class="img-responsive" src="{{  asset('storage/' . $datas->gambar) }}" alt="">
                </div>
                <div class="blog-content">
                  <a href="/blog-single"><h4 class="blog-title">{{ $datas->judul }}</h4></a>
                  <div class="meta">
                    <div class="date">
                      <p>22<sup>nd</sup>Jan 2016</p>
                    </div>
                    <div class="author">
                      <p>By Michal Lomans</p>
                    </div>
                  </div>
                  <p class="blog-decisions">{{ Str::limit($datas->isi, 50) }}</p>
                </div>
              </div>
            </div>
            @endforeach
          <!-- See All Post -->
          <div class="col-md-12">
            <div class="see-all-post text-center">
                {{ $data->render('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>
	</div>
        </div>
      </div>
    </div>
  </section>
  @include('main.footer')
  @endsection
