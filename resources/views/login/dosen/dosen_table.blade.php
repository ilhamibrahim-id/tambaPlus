@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('dosen/kelas'))
                                Data Kelas
                            @elseif ((request()->is('dosen/nilai')))
                                Nilai
                            @endif
                        </h4>
                    </div>
                    @if (request()->is('dosen/nilai'))
                        <form action="{{ route('dosen_cetak') }}" class="login-form">
                            <button type="submit" class="btn form-control btn-primary rounded submit px-3">Cetak
                                Pdf</button>
                        </form>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                            Jumlah Mahasiswa
                                        @elseif ((request()->is('dosen/nilai')))
                                            Mata kuliah
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                            Mata Kuliah
                                        @elseif ((request()->is('dosen/nilai')))
                                            Nilai Tertinggi
                                        @endif
                                    </th>
                                    <th>
                                        @if (request()->is('dosen/kelas'))
                                            Action
                                        @elseif ((request()->is('dosen/nilai')))
                                            Nilai Terendah
                                        @endif
                                    </th>
                                    @if (request()->is('dosen/nilai'))
                                        <th>
                                            Nilai Rata Rata
                                        </th>
                                    @endif
                                    @if (request()->is('dosen/nilai'))
                                        <th>
                                            Action
                                        </th>
                                    @endif
                                </thead>
                                <tbody>
                                    @if (request()->is('dosen/kelas'))
                                        @foreach ($kelas as $kelasa)
                                            @foreach ($kode as $kd)
                                                @foreach ($kelasa->kelas as $kls)
                                                    @if ($kls->pivot->kode == $kd->kode_pengajar)
                                                        <tr>
                                                            <td>
                                                                {{ $kls->nama_kelas }}
                                                            </td>
                                                            <td>
                                                                {{ $kls->mahasiswa_count }}
                                                            </td>
                                                            <td>
                                                                {{ $kelasa->nama_mk }}
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('main.detailkelas', $kls->id) }}"
                                                                    class="login-form">
                                                                    <button type="submit"
                                                                        class="btn form-control btn-primary rounded submit px-3">Detail
                                                                        Kelas</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @elseif ((request()->is('dosen/nilai')))
                                        @foreach ($kelas as $kelasa)
                                            @foreach ($kode as $kd)
                                                @foreach ($kelasa->kelas as $kls)
                                                    @if ($kls->pivot->kode == $kd->kode_pengajar)
                                                        <tr>
                                                            <td>
                                                                {{ $kls->nama_kelas }}
                                                            </td>
                                                            <td>
                                                                {{ $kelasa->nama_mk }}
                                                            </td>
                                                            <td>
                                                                {{ $nilai->where('kode', '=', $kd->kode_pengajar)->where('kelas_id', '=', $kls->id)->max('nilai') }}
                                                            </td>
                                                            <td>
                                                                {{ $nilai->where('kode', '=', $kd->kode_pengajar)->where('kelas_id', '=', $kls->id)->min('nilai') }}
                                                            </td>
                                                            <td>
                                                                {{ $nilai->where('kode', '=', $kd->kode_pengajar)->where('kelas_id', '=', $kls->id)->avg('nilai') }}
                                                            </td>
                                                            <td>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <button type="submit"
                                                                    class="btn form-control btn-primary rounded submit px-3"
                                                                    onclick="location.href='/dosen/detailkelas/{{ $kls->id }}/{{ $kd->kode_pengajar }}';">Beri
                                                                    Nilai</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @endif
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
