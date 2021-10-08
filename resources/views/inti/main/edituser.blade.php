@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="image">
                        <img src="../assets/img/damir-bosnjak.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                @if ($data->foto == null)
                                    <img class="avatar border-gray" src="{{ asset('assets/img/logo-small.png') }}">
                                @else
                                    <img class="avatar border-gray" src="{{ asset('storage/' . $data->foto) }}">
                                @endif
                                <h5 class="title">{{ $data->nama }}</h5>
                            </a>
                            <p class="description">
                                @if (auth()->user()->role == 'dosen')
                                    {{ $data->nip }}
                                @elseif(auth()->user()->role == 'mahasiswa')
                                    {{ $data->nim }}
                                @elseif(auth()->user()->role == 'admin')
                                    {{ $data->username }}
                                @endif
                            </p>
                        </div>
                        <p class="description text-center">
                            @if (auth()->user()->role == 'dosen' || auth()->user()->role == 'mahasiswa')
                                {{ $data->alamat }}
                            @elseif(auth()->user()->role == 'admin')
                                {{ $data->jabatan }}
                            @endif
                        </p>
                    </div>
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/main/edituser/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if (auth()->user()->role == 'admin')
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username"
                                                    required="required" name="username" value="{{ $data->username }}">
                                            @elseif(auth()->user()->role == 'dosen')
                                                <label>Nip </label>
                                                <input type="text" class="form-control" placeholder="Nip"
                                                    required="required" name="username" value="{{ $data->nip }}">
                                            @elseif(auth()->user()->role == 'mahasiswa')
                                                <label>Nim</label>
                                                <input type="text" class="form-control" placeholder="Nim"
                                                    required="required" name="username" value="{{ $data->nim }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'dosen' || auth()->user()->role == 'mahasiswa')
                                                <label>Nama</label>
                                                <input type="text" class="form-control" placeholder="username"
                                                    required="required" name="nama" value="{{ $data->nama }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if (auth()->user()->role == 'admin')
                                                <label>Jabatan</label>
                                                <input type="text" class="form-control" placeholder="jabatan"
                                                    required="required" name="jabatan" value="{{ $data->jabatan }}">
                                            @elseif(auth()->user()->role == 'dosen' || auth()->user()->role ==
                                                'mahasiswa')
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" placeholder="Alamat"
                                                    required="required" name="alamat" value="{{ $data->alamat }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="image">Foto</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary btn-round" value="simpan">Update
                                            Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
