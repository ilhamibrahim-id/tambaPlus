@extends('inti.main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail {{ $lj->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Job</th>
                                    <th>Deskripsi</th>
                                    <th>File Pendukung</th>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                {{ $lj->nama }}
                                            </td>
                                            <td>
                                                {{ $lj->deskripsi }}
                                            </td>
                                            <td>
                                                {{ $lj->file }}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                            <form action="{{ route('listjobkry') }}" class="login-form">
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
