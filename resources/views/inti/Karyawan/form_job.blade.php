@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan Job</h4>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('karyawan.faststore') }}" class="login-form" method="POST">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Job
                                        </th>
                                        <th>
                                            File
                                        </th>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                @csrf
                                <button type="submit"
                                    class="btn form-control btn-primary rounded submit px-3">Simpan</button>
                            </form>
                            <form action="{{ route('karyawan.laporan') }}" class="login-form">
                                <button type="submit"
                                    class="btn form-control btn-primary rounded submit px-3">Kembali</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
