@extends('main.header')
@section('konten')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @if (request()->is('karyawan/job'))
                                List Job
                            @elseif ((request()->is('karyawan/laporan')))
                                Laporan
                            @endif
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Jabatan
                                    </th>
                                    <th>
                                        Job
                                    </th>
                                    <th>
                                        action
                                    </th>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                            {{-- {{ $kelas->render('pagination::bootstrap-4') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('main.footer')
@endsection
