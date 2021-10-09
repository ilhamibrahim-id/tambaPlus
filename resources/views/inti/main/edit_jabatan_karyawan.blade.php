@extends('inti.main.header')
@section('konten')
    <div class="content">
      <div class="row">
            <div class="col-md-12">
          <div class="card card-user">
            <div class="card-header">
              <h5 class="card-title">Edit Jabatan Karyawan</h5>
            </div>
            <div class="card-body">
              <form action="{{ route('updatejabatan',$id) }}" class="login-form" method="POST">
                @csrf
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          Nama
                      </th>
                      <th>
                          Activate
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($kry as $karyawan)
                      <tr>
                        <td>
                          {{ $karyawan->nama }}
                        </td>
                        <td>
                          @if ($karyawan->jabatan_id == null)
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="{{ $karyawan->id }}">
                          @else
                            <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="{{ $karyawan->id }}" checked>
                          @endif
                        @endforeach
                    </tbody>
                  </table>
                  {{ $kry->render("pagination::bootstrap-4") }}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn form-control btn-primary rounded submit px-3" value="Simpan Data">Simpan
                            Data</button>
                    </div>
                </div>
              </form>
              <form action="{{ url('admin/jabatan/detail',$id) }}" class="login-form">
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
