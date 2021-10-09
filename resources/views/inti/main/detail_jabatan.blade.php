@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail {{ $jabatan->nama }}</h4>
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <button class="btn" data-toggle="modal" data-target="#form" 
                        onclick="location.href='{{ route('editjabatan', $jabatan->id) }}';"
                        ><i
                                class="nc-icon nc-simple-add">Tambah Data</i></button>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Jabatan</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                </thead>
                                <tbody>
                                    @foreach ($jabatan->karyawan as $kry)
                                        <tr>
                                            <td>
                                                {{ $jabatan->nama }}
                                            </td>
                                            <td>
                                                {{ $kry->nik }}
                                            </td>
                                            <td>
                                                {{ $kry->nama }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form action="{{ route('jabatan') }}" class="login-form">
                                <button type="submit"
                                    class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
