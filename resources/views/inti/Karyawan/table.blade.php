@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- JUDUL HALAMAN --}}
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('karyawan/listjob') || request()->is('karyawan/listjob/cari'))
                                Data List Job
                            @elseif ((request()->is('karyawan/job')) || (request()->is('karyawan/job/cari')))
                                Pelaporan Job
                            @elseif ((request()->is('karyawan/jabatan')) || (request()->is('karyawan/jabatan/cari')))
                                Jabatan Anda
                            @endif
                        </h4>
                    </div>
                    {{-- KONTEN --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                {{-- KEPALA TABEL --}}
                                <thead class=" text-primary">
                                    @if (request()->is('karyawan/listjob') || request()->is('karyawan/listjob/cari'))
                                        <th>Nama</th>
                                        <th>Job</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('karyawan/job')) || (request()->is('karyawan/job/cari')))
                                        <th>Nama</th>
                                        <th>Job</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    @elseif ((request()->is('karyawan/jabatan')) ||
                                        (request()->is('karyawan/jabatan/cari')))
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Deskripsi Jabatan</th>
                                        <th>Gaji</th>
                                    @endif
                                </thead>
                                {{-- BADAN TABEL --}}
                                <tbody>
                                    {{-- TABEL LIST JOB --}}
                                    @if (request()->is('karyawan/listjob') || request()->is('karyawan/listjob/cari'))
                                        @foreach ($kry as $lj)
                                            @foreach ($lj->karyawan as $id)
                                                @if ($id->id == $data->id)
                                                    <tr>
                                                        <th>
                                                            {{ $id->nama }}
                                                        </th>
                                                        <th>
                                                            {{ $lj->nama }}
                                                        </th>
                                                        <th>
                                                            <button type="submit"
                                                                class="btn form-control btn-primary rounded submit px-3"
                                                                onclick="location.href='/karyawan/listjob/detail/{{ $lj->id }}';">Detail</button>
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        {{-- TABEL JOB --}}
                                    @elseif ((request()->is('karyawan/job')) || (request()->is('karyawan/job/cari')))
                                        @foreach ($kry->listjob as $lj)
                                            <tr>
                                                <th>
                                                    {{ $kry->nama }}
                                                </th>
                                                <th>
                                                    {{ $lj->nama }}
                                                </th>
                                                <th>
                                                    {{ $lj->pivot->status }}
                                                </th>
                                                <th>
                                                    <button type="submit"
                                                        class="btn form-control btn-primary rounded submit px-3"
                                                        onclick="location.href='/karyawan/job/detail/{{ $lj->pivot->id }}';">Upload
                                                        Laporan</button>
                                                </th>
                                            </tr>
                                        @endforeach
                                        {{-- TABEL JABATAN --}}
                                    @elseif ((request()->is('karyawan/jabatan'))
                                        ||(request()->is('karyawan/jabatan/cari')))
                                        @if ($kry->jabatan = null)
                                            <tr>
                                                <th>
                                                    {{ $kry->nama }}
                                                </th>
                                                <th>
                                                    {{ $kry->jabatan->nama }}
                                                </th>
                                                <th>
                                                    {{ $kry->jabatan->deskripsi }}
                                                </th>
                                                <th>
                                                    {{ $kry->jabatan->gaji }}
                                                </th>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                            {{-- PAGINATION --}}
                            @if (request()->is('karyawan/listjob') || request()->is('karyawan/listjob/cari'))
                                {{ $kry->render('pagination::bootstrap-4') }}
                            @elseif ((request()->is('karyawan/job')) || (request()->is('karyawan/job/cari')))
                                {{-- {{ $lj->render('pagination::bootstrap-4') }} --}}
                            @elseif ((request()->is('karyawan/jabatan')) || (request()->is('karyawan/jabatan/cari')))
                                {{-- {{ $job->render('pagination::bootstrap-4') }} --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
