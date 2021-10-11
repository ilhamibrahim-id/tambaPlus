@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <center>
                    @if ($kry->foto == null)
                    <img src="{{ asset('assets/img/logo-small.png') }}" height="150px" width="150px" class="rounded">
                @else
                <img src="{{ $kry->foto }}" class="card-img-top" alt="...">
                @endif
                    </center>
                    <div class="card-body">
                    <center>
                      <p class="card-text">{{ $kry->nama }}</p>
                    </center>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">NIK</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Username</th>
                            <th scope="col">No.Telp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">{{ $kry->nik }}</th>
                            <th scope="row">
                                @if ($kry->jabatan == null)
                                    -
                                @else
                                    {{ $kry->jabatan->nama }}
                                @endif
                            </th>
                            <th scope="row">{{ $kry->username }}</th>
                            <th scope="row">{{ $kry->tlpn }}</th>
                            <th scope="row">{{ $kry->email }}</th>
                            <th scope="row"> {{ $kry->alamat }}</th>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                  <form action="{{ route('karyawan') }}" class="login-form">
                    <button type="submit"
                        class="btn form-control btn-danger rounded submit px-3">Kembali</button>
                </form>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
