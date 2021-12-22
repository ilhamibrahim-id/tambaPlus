@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- JUDUL HALAMAN --}}
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                                Data Karyawan
                            @elseif ((request()->is('admin/listjob')) || (request()->is('admin/listjob/cari')))
                                Data List Job
                            @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                                Data Job
                            @elseif ((request()->is('admin/jabatan')) ||(request()->is('admin/jabatan/cari')))
                                Data Jabatan
                            @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                                Data Blog
                            @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                                Data Layanan
                            @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                                Data Admin
                            @elseif ((request()->is('admin/histori')) ||(request()->is('admin/histori/cari')))
                                Data History
                            @endif
                        </h4>
                    </div>
                    {{-- CARI DATA --}}
                    <form method="GET" @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                        action="{{ url('/admin/karyawan/cari') }}"
                    @elseif ((request()->is('admin/listjob')) || (request()->is('admin/listjob/cari')))
                        action="{{ url('/admin/listjob/cari') }}"
                    @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                        action="{{ url('/admin/job/cari') }}"
                    @elseif ((request()->is('admin/jabatan')) ||(request()->is('admin/jabatan/cari')))
                        action="{{ url('/admin/jabatan/cari') }}"
                    @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                        action="{{ url('/admin/blog/cari') }}"
                    @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                        action="{{ url('/admin/layanan/cari') }}"
                    @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                        action="{{ url('/admin/admin/cari') }}"
                        @endif
                        >
                        @csrf
                        <div class="input-group rounded">
                            <input type="text" class="form-control rounded" placeholder="Cari Data..."
                                value="{{ old('keyword') }}" aria-label="Search" aria-describedby="search-addon"
                                name="keyword" />
                            <button type="submit">
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                    {{-- TAMBAH DATA --}}
                    @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                        <button class="btn" data-toggle="modal" data-target="#form"
                            onclick="location.href='/admin/karyawan/tambah';"><i class="nc-icon nc-simple-add"> Tambah
                                Data</i></button>
                    @elseif (request()->is('admin/listjob') || request()->is('admin/listjob/cari'))
                        <button class="btn" data-toggle="modal" data-target="#form"
                            onclick="location.href='/admin/listjob/tambah';"><i class="nc-icon nc-simple-add"> Tambah
                                Data</i></button>
                    @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                        <button class="btn" data-toggle="modal" data-target="#form"
                            onclick="location.href='/admin/job/tambah';"><i class="nc-icon nc-simple-add"> Tambah
                                Data</i></button>
                    @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                        <button class="btn" data-toggle="modal" data-target="#form"
                            onclick="location.href='/admin/blog/tambah';"><i class="nc-icon nc-simple-add"> Tambah
                                Data</i></button>
                    @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                        <button class="btn" data-toggle="modal" data-target="#form"
                            onclick="location.href='/admin/layanan/tambah';"><i class="nc-icon nc-simple-add"> Tambah
                                Data</i></button>
                    @endif
                    {{-- KONTEN --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                {{-- KEPALA TABEL --}}
                                <thead class=" text-primary">
                                    @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>jabatan</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('admin/listjob')) || (request()->is('admin/listjob/cari')))
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>File Pendukung</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                                        <th>Nama Job</th>
                                        <th>Nama Karyawan</th>
                                        <th>Laporan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('admin/jabatan')) ||(request()->is('admin/jabatan/cari')))
                                        <th>Nama Jabatan</th>
                                        <th>Deskripsi</th>
                                        <th>Gaji</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                                        <th>Nama Layanan</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    @endif
                                </thead>
                                {{-- BADAN TABEL --}}
                                <tbody>
                                    {{-- TABEL KARYAWAN --}}
                                    @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                                        @foreach ($kry as $karyawan)
                                            <tr>
                                                <th>
                                                    {{ $karyawan->nik }}
                                                </th>
                                                <th>
                                                    {{ $karyawan->nama }}
                                                </th>
                                                <th>
                                                    @if ($karyawan->jabatan == null)
                                                        -
                                                    @else
                                                        {{ $karyawan->jabatan->nama }}
                                                    @endif
                                                </th>
                                                <th>
                                                    {{ $karyawan->username }}
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/karyawan/edit/{{ $karyawan->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/karyawan/detail/{{ $karyawan->id }}';">Detail
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/karyawan/hapus/{{ $karyawan->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL LIST JOB --}}
                                    @elseif ((request()->is('admin/listjob')) || (request()->is('admin/listjob/cari')))
                                        @foreach ($lj as $list)
                                            <tr>
                                                <th>
                                                    {{ $list->nama }}
                                                </th>
                                                <th>
                                                    {{ $list->deskripsi }}
                                                </th>
                                                <th>
                                                    @if ($list->file == null)
                                                        -
                                                    @else
                                                        {{ $list->file }}
                                                    @endif
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/listjob/edit/{{ $list->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/listjob/hapus/{{ $list->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL JOB --}}
                                    @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                                        @foreach ($job as $jb)
                                            <tr>
                                                <th>
                                                    @foreach ($lj as $listjob)
                                                        @if ($jb->listjob_id == $listjob->id)
                                                            {{ $listjob->nama }}
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th>
                                                    @foreach ($kry as $karyawan)
                                                        @if ($jb->karyawan_id == $karyawan->id)
                                                            {{ $karyawan->nama }}
                                                        @endif
                                                    @endforeach
                                                </th>
                                                <th>
                                                    @if ($jb->bukti == null)
                                                        -
                                                    @else
                                                        {{ $jb->bukti }}
                                                    @endif
                                                </th>
                                                <th>
                                                    {{ $jb->status }}
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/job/edit/{{ $jb->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/job/hapus/{{ $jb->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL JABATAN --}}
                                    @elseif ((request()->is('admin/jabatan')) ||(request()->is('admin/jabatan/cari')))
                                        @foreach ($jabatan as $jbt)
                                            <tr>
                                                <th>
                                                    {{ $jbt->nama }}
                                                </th>
                                                <th>
                                                    {{ $jbt->deskripsi }}
                                                </th>
                                                <th>
                                                    {{ $jbt->gaji }}
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/jabatan/detail/{{ $jbt->id }}';">Detail
                                                        Data</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL BLOG --}}
                                    @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                                        @foreach ($blog as $bg)
                                            <tr>
                                                <th>
                                                    {{ $bg->judul }}
                                                </th>
                                                <th>
                                                    {{ $bg->isi }}
                                                </th>
                                                <th>
                                                    @if ($bg->gambar == null)
                                                        -
                                                    @else
                                                        <img src="{{ asset('storage/' . $bg->gambar) }}" width="90px">
                                                    @endif
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/blog/edit/{{ $bg->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/blog/hapus/{{ $bg->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL LAYANAN --}}
                                    @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                                        @foreach ($lyn as $layanan)
                                            <tr>
                                                <th>
                                                    {{ $layanan->nama }}
                                                </th>
                                                <th>
                                                    {{ $layanan->deskripsi }}
                                                </th>
                                                <th>
                                                    {{ $layanan->harga }}
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/layanan/edit/{{ $layanan->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/layanan/hapus/{{ $layanan->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL ADMIN --}}
                                    @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                                        @foreach ($admin as $adm)
                                            <tr>
                                                <th>
                                                    {{ $adm->username }}
                                                </th>
                                                <th>
                                                    {{ $adm->nama }}
                                                </th>
                                                <th>
                                                    {{ $adm->jabatan }}
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/admin/edit/{{ $adm->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/admin/hapus/{{ $adm->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{-- PAGINATION --}}
                            @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                                {{ $kry->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('admin/listjob')) || (request()->is('admin/listjob/cari')))
                                {{ $lj->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                                {{ $job->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('admin/jabatan')) ||(request()->is('admin/jabatan/cari')))
                                {{ $jabatan->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                                {{ $blog->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                                {{ $lyn->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                                {{ $admin->render('pagination::bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
