@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                Data Karyawan
                            @elseif ((request()->is('main/table_job')) || (request()->is('main/carijob')))
                                Data Job
                            @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                                Data Blog
                            @elseif ((request()->is('main/table_layanan')) ||(request()->is('main/carilayanan')))
                                Data Layanan
                            @elseif ((request()->is('main/table_laporan')))
                                Data Laporan
                            @endif
                        </h4>
                    </div>
                    @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                    <form method="GET" action="{{url('/main/carikaryawan')}}">
                        @csrf
                     <div class="input-group rounded">
                        <input type="text" class="form-control rounded" placeholder="Cari Data Mahasiswa .." value="{{ old('keyword') }}" aria-label="Search"
                            aria-describedby="search-addon" name="keyword"/>
                            <button type="submit">
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="nc-icon nc-zoom-split"></i>
                        </span>
                            </button>
                    </div>
                    </form>
                    @elseif ((request()->is('main/table_job')) || (request()->is('main/carijob')))
                    <form method="GET" action="{{url('/main/carijob')}}">
                        @csrf
                     <div class="input-group rounded">
                        <input type="text" class="form-control rounded" placeholder="Cari Data Mahasiswa .." value="{{ old('keyword') }}" aria-label="Search"
                            aria-describedby="search-addon" name="keyword"/>
                            <button type="submit">
                        <span class="input-group-text border-0" id="search-addon">
                            <i class="nc-icon nc-zoom-split"></i>
                        </span>
                            </button>
                    </div>
                    </form>
                    @elseif ((request()->is('main/table_layanan')) || (request()->is('main/carilayanan')))
                    <form method="GET" action="{{url('main/carilayanan')}}">
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" placeholder="Cari Data Dosen .." value="{{ old('keyword') }}" aria-label="Search"
                                aria-describedby="search-addon" name="keyword"/>
                                <button type="submit">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="nc-icon nc-zoom-split"></i>
                            </span>
                                </button>
                        </div>
                    </form>
                    @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                    <form method="GET" action="{{url('main/cariblog')}}">
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" placeholder="Cari Data Mata Kuliah .." value="{{ old('keyword') }}" aria-label="Search"
                                aria-describedby="search-addon" name="keyword"/>
                                <button type="submit">
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="nc-icon nc-zoom-split"></i>
                            </span>
                                </button>
                        </div>
                    </form>
                    @endif
                    @if (!request()->is('main/table_laporan'))
                        <button class="btn" data-toggle="modal" data-target="#form" 
                        @if (request()->is('main/table_job') || request()->is('main/carijob'))
                             onclick="location.href='/main/job/tambah';"
                        @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                                                      onclick="location.href='/main/blog/tambah';"
                        @elseif ((request()->is('main/table_layanan')) ||(request()->is('main/carilayanan')))
                                                      onclick="location.href='/main/layanan/tambah';"
                        @elseif ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                                      onclick="location.href='/main/karyawan/tambah';" 
                                                      =@endif>
                            <i class="nc-icon nc-simple-add"> Tambah Data</i></button>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                            Nik
                                        @elseif ((request()->is('main/table_job')) || (request()->is('main/carijob')))
                                            Nama
                                        @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                                            Judul
                                        @elseif ((request()->is('main/table_layanan')) ||(request()->is('main/carilayanan')))
                                            Nama Layanan
                                        @elseif ((request()->is('main/table_laporan')))
                                            Nama Job
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                            Nama
                                        @elseif ((request()->is('main/table_job')) || (request()->is('main/carijob')))
                                            Deskripsi
                                        @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                                            Isi
                                        @elseif ((request()->is('main/table_layanan')) ||(request()->is('main/carilayanan')))
                                            Deskripsi
                                        @elseif ((request()->is('main/table_laporan')))
                                            Nama Karyawan
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                            Jabatan
                                        @elseif ((request()->is('main/table_job')) || (request()->is('main/carijob')))
                                            File Pendukung
                                        @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                                            Gambar
                                        @elseif ((request()->is('main/table_layanan')) ||(request()->is('main/carilayanan')))
                                            Harga
                                        @elseif ((request()->is('main/table_laporan')))
                                            Bukti Job
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                            No.Telp
                                        @elseif ((request()->is('main/table_job')) || (request()->is('main/carijob')))
                                            Action
                                        @elseif ((request()->is('main/table_blog')) || (request()->is('main/cariblog')))
                                            Action
                                        @elseif ((request()->is('main/table_layanan')) ||(request()->is('main/carilayanan')))
                                            Action
                                        @elseif ((request()->is('main/table_laporan')))
                                            Status
                                        @endif
                                    </th>
                                    <th>
                                        @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                            Email
                                        @elseif ((request()->is('main/table_laporan')))
                                            Action
                                        @endif
                                    </th>
                                    @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                        <th>
                                            Alamat
                                        </th>
                                    @endif
                                    @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                        <th>
                                            Username
                                        </th>
                                    @endif
                                    @if ((request()->is('main/table_karyawan')) || (request()->is('main/carikaryawan')))
                                        <th>
                                            Foto
                                        </th>
                                    @endif
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                            {{ $kelas->render('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
