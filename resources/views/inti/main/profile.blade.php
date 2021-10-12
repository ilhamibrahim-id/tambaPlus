@extends('inti.main.header')
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
                            <p class="description">{{ $data->username }}</p>
                        </div>
                        <p class="description text-center">
                            {{ auth()->user()->role == 'admin' ? $data->jabatan : $data->jabatan->nama }}</p>
                    </div>
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/public/profile/update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="Username"
                                                required="required" name="username" value="{{ $data->username }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="username"
                                                required="required" name="nama" value="{{ $data->nama }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" placeholder="jabatan"
                                                required="required" name="jabatan"
                                                value="{{ auth()->user()->role == 'admin' ? $data->jabatan : $data->jabatan->nama }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="gambar">Foto</label>
                                        <input type="file" class="form-control" name="gambar">
                                    </div>
                                </div>
                                @if (auth()->user()->role != 'admin')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nik</label>
                                                <input type="text" class="form-control" placeholder="username"
                                                    required="required" name="nik" value="{{ $data->nik }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>No.Tlpn</label>
                                                <input type="text" class="form-control" placeholder="username"
                                                    required="required" name="tlpn" value="{{ $data->tlpn }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" placeholder="username"
                                                    required="required" name="alamat" value="{{ $data->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" placeholder="username"
                                                    required="required" name="email" value="{{ $data->email }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn form-control btn-primary btn-round submit px-3" value="simpan">Update
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
    @include('inti.main.footer')
@endsection
