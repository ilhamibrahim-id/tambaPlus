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
            <div class="blog-list-section blog-content-right row">
              <div class="col-md-9 blog-content-area">
                <div class="blog-img">
                  <img class="img-responsive" src="images/blog/blog-img1.jpg" alt="">
                </div>
                <div class="blog-content">
                  <a href="/blog-single"><h4 class="blog-title">A Complete, Ranke Destinat Moines’ <br /> Good Bars,Benefit of the t Media Elite</h4></a>
                  <div class="meta">
                    <div class="date">
                      <p>22<sup>nd</sup>Jan 2016</p>
                    </div>
                    <div class="author">
                      <p>By Michal Lomans</p>
                    </div>
                  </div>
                  <p class="blog-decisions">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonum euismod tincidunt ut laoreet dolore magna autem vel eum iriure dolor in.</p>
                  <a class="btn btn-default th-btn solid-btn" href="/blog-single" role="button">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>

            <!-- Blog List Slider Image
            ========================= -->
            <div class="blog-list-section blog-content-left row">
              <div class="col-md-9 blog-content-area">
                <!-- Blog slider -->
                <div id="blog-slider" class="blog-slider">
                  <div class="item">
                    <div class="blog-img">
                      <img class="img-responsive" src="images/blog/blog-img2.jpg" alt="">
                    </div>
                  </div>
                  <div class="item">
                    <div class="blog-img">
                      <img class="img-responsive" src="images/blog/blog-img1.jpg" alt="">
                    </div>
                  </div>
                  <div class="item">
                    <div class="blog-img">
                      <img class="img-responsive" src="images/blog/blog-img3.jpg" alt="">
                    </div>
                  </div>
                </div>
                <div class="blog-content">
                  <a href="/blog-single"><h4 class="blog-title">A Complete, Ranke Destinat Moines’ <br /> Good Bars.</h4></a>
                  <div class="meta">
                    <div class="date">
                      <p>22<sup>nd</sup>Jan 2016</p>
                    </div>
                    <div class="author">
                      <p>By Michal Lomans</p>
                    </div>
                  </div>
                  <p class="blog-description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonum euismod tincidunt ut laoreet dolore magna autem vel eum iriure dolor in.</p>
                  <a class="btn btn-default th-btn solid-btn" href="/blog-single" role="button">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>

              <!-- Blog List Video Image
              ========================= -->
            <div class="blog-list-section row">
              <div class="col-md-9 blog-content-area">
                <div class="video-section">
                  <img class="img-responsive" src="images/blog/blog-img3.jpg" alt="">
                  <div class="video-overlay">
                    <a id="th-video" class="th-video" href="/blog-single"><i class="fa fa-play-circle-o" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="blog-content">
                  <a href="/blog-single"><h4 class="blog-title">A Complete, Ranke Destinat Moines’ <br /> Good Bars,Benefit of the t Media Elite</h4></a>
                  <div class="meta">
                    <div class="date">
                      <p>22<sup>nd</sup>Jan 2016</p>
                    </div>
                    <div class="author">
                      <p>By Michal Lomans</p>
                    </div>
                  </div>
                  <p class="blog-decisions">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonum euismod tincidunt ut laoreet dolore magna autem vel eum iriure dolor in.</p>
                  <a class="btn btn-default th-btn solid-btn" href="/blog-single" role="button">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>

          <!-- See All Post -->
          <div class="col-md-12">
            <div class="see-all-post text-center">
              <a class="btn btn-default th-btn solid-btn" href="#" role="button">See All Posts <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
