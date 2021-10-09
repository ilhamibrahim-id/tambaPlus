@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail {{ $kry->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Username</th>
                                    <th>No.Telp</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $kry->nik }}
                                        </td>
                                        <td>
                                            {{ $kry->nama }}
                                        </td>
                                        <td>
                                            @if ($kry->jabatan == null)
                                                -
                                            @else
                                                {{ $kry->jabatan->nama }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $kry->username }}
                                        </td>
                                        <td>
                                            {{ $kry->tlpn }}
                                        </td>
                                        <td>
                                            {{ $kry->email }}
                                        </td>
                                        <td>
                                            {{ $kry->alamat }}
                                        </td>
                                        <td>
                                            @if ($kry->foto == null)
                                                -
                                            @else
                                                {{ $kry->foto }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('karyawan') }}" class="login-form">
                                <button type="submit"
                                    class="btn form-control btn-danger rounded submit px-3">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
