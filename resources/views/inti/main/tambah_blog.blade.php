@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Data Blog</h5>
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
                        <form action="/admin/blog/store" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Judul : </label>
                                        <input type="text" name="judul" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Isi : </label>
                                        <input type="text" name="isi" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Masukan Gambar : </label>
                                        <input type="file" name="gambar" required="required" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn form-control btn-primary btn-round submit px-3" value="Simpan Data">Simpan
                                        Data</button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('blog') }}" class="login-form">
                            <button type="submit"
                                class="btn form-control btn-danger rounded submit px-3">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inti.main.footer')
@endsection
