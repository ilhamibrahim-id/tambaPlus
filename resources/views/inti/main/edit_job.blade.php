@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Job {{ $job->id }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/admin/job/update" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Nama Job : </label>
                                        <select class="custom-select" id="lj" name="lj" required="required">
                                            @foreach ($lj as $listjob)
                                                <option value="{{ $listjob->id }}" @if ($listjob->id == $job->listjob_id)
                                                    selected
                                            @endif
                                            >{{ $listjob->nama }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $job->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Nama Karyawan : </label>
                                        <select class="custom-select" id="kry" name="kry" required="required">
                                            @foreach ($kry as $karyawan)
                                                <option value="{{ $karyawan->id }}" @if ($karyawan->id == $job->karyawan_id)
                                                    selected
                                            @endif
                                            >{{ $karyawan->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>File Bukti : </label>
                                        @if ($job->bukti == null)
                                            -
                                        @else
                                            {{ $job->bukti }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Status Job : </label>
                                        <select class="custom-select" id="hasil" name="hasil" required="required">
                                            <option value="Belum Selesai" @if ($job->status == 'Belum Selesai')
                                                selected
                                                @endif
                                                >Belum Selesai</option>
                                            <option value="Selesai" @if ($job->status == 'Selesai')
                                                selected
                                                @endif
                                                >Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn form-control btn-primary btn-round submit px-3"
                                        value="Simpan Data">Simpan
                                        Data</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('job') }}" class="login-form">
                            <button type="submit" class="btn form-control btn-danger rounded submit px-3">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
