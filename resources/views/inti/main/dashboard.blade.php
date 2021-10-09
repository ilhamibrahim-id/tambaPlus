@extends('inti.main.header')
@section('konten')
    <div class="content">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="nc-icon nc-single-02"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-title">{{ $kry }}</p>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  Jumlah Karyawan
                </div>
              </div>
            </div>
          </div>
        </div>
      @include('inti.main.att')
    </div>
@include('inti.main.footer')
@endsection


