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
            ========================= -->
            @foreach ($data as $datas)
            <div class="blog-list-section blog-content-right row">
              <div class="col-md-9 blog-content-area">
                <div class="blog-img">
                  <img class="img-responsive" src="{{  asset('storage/' . $datas->gambar) }}" alt="">
                </div>
                <div class="blog-content">
                  <a href="/blog-single/{{ $datas->id }}"><h4 class="blog-title">{{ $datas->judul }}</h4></a>
                  <div class="meta">
                    <div class="date">
                      {{ $datas->created_at }}
                    </div>
                    <div class="author">
                      <p>By Admin</p>
                    </div>
                  </div>
                  <p class="blog-decisions">{{ Str::limit($datas->isi, 50) }}</p>
                  <a class="btn btn-default th-btn solid-btn" href="/blog-single/{{ $datas->id }}" role="button">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            @endforeach
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
