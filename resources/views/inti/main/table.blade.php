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
                            @endif
                        </h4>
                    </div>
                    {{-- CARI DATA --}}
                    <form method="GET" 
                        @if (request()->is('admin/karyawan') || request()->is('admin/karyawan/cari'))
                            action="{{ url('/admin/karyawan/cari') }}"
                        @elseif ((request()->is('admin/listjob')) || (request()->is('admin/listjob/cari')))
                            action="{{ url('/admin/karyawan/cari') }}"
                        @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                            action="{{ url('/admin/karyawan/cari') }}"
                        @elseif ((request()->is('admin/jabatan')) ||(request()->is('admin/jabatan/cari')))
                            action="{{ url('/admin/karyawan/cari') }}"
                        @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                            action="{{ url('/admin/karyawan/cari') }}"
                        @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                            action="{{ url('/admin/karyawan/cari') }}"
                        @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                            action="{{ url('/admin/karyawan/cari') }}"
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
                    @if (!request()->is('admin/jabatan'))
                    <button class="btn" data-toggle="modal" data-target="#form"
                        @if ((request()->is('admin/karyawan')) || (request()->is('admin/karyawan/cari')))
                            onclick="location.href='/admin/karyawan/tambah';"
                        @elseif (request()->is('admin/listjob') || request()->is('admin/listjob/cari'))
                            onclick="location.href='/admin/listjob/tambah';"
                        @elseif ((request()->is('admin/job')) || (request()->is('admin/job/cari')))
                            onclick="location.href='/admin/job/tambah';"
                        @elseif ((request()->is('admin/blog')) ||(request()->is('admin/blog/cari')))
                            onclick="location.href='/admin/blog/tambah';"
                        @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                            onclick="location.href='/admin/layanan/tambah';"
                        @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                            onclick="location.href='/admin/admin/tambah';"
                        @endif
                    ><i class="nc-icon nc-simple-add"> Tambah Data</i></button>
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
                                        <th>No.Telpn</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Username</th>
                                        <th>Foto</th>
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
                                        <th>Alamat</th>
                                    @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                                        <th>Alamat</th>
                                    @endif
                                </thead>
                                {{-- BADAN TABEL --}}
                                <tbody>
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
                                                    {{ $karyawan->tlpn }}
                                                </th>
                                                <th>
                                                    {{ $karyawan->email }}
                                                </th>
                                                <th>
                                                    {{ $karyawan->alamat }}
                                                </th>
                                                <th>
                                                    {{ $karyawan->username }}
                                                </th>
                                                <th>
                                                    @if ($karyawan->foto == null)
                                                        -
                                                    @else
                                                        {{ $karyawan->foto }}
                                                    @endif
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/admin/karyawan/edit/{{ $karyawan->id }}';">Edit
                                                        Data</button>
                                                    <button type="submit"
                                                        class="btn form-control btn-danger rounded submit px-3"
                                                        onclick="location.href='/admin/karyawan/hapus/{{ $karyawan->id }}';">Hapus</button>
                                                </th>
                                            </tr>
                                        @endforeach
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
                                                    {{ $bg->gambar }}
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
                                    @elseif ((request()->is('admin/layanan')) ||(request()->is('admin/layanan/cari')))
                                        <th>Alamat</th>
                                    @elseif ((request()->is('admin/admin')) ||(request()->is('admin/admin/cari')))
                                        <th>Alamat</th>
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
