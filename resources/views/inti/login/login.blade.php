@extends('inti.login.header')
@section('konten')
    <body style="background-image: url('{{ url('images/polinema.png') }}');">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap py-5">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @elseif ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif
                            <h3 class="text-center mb-0">Manajemen Karyawan</h3>
                            <br />
                                <img src="{{url('images/logo.png')}}">
                            <p class="text-center">Login : </p>
                            <form action="{{ route('login') }}" method="POST" class="login-form">
                                @csrf
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-user"></span></div>
                                    <input name="username" type="text" class="form-control"
                                        placeholder="Username"
                                        required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-lock"></span></div>
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Masukan Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="btn form-control btn-primary rounded submit px-3">Login</button>
                                </div>
                            </form>
                        </div>
                        <footer class="bg-light text-center text-lg-start">
                            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                                © 2021 Copyright: Geal Geol Team
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/popper.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/main.js') }}"></script>

    </body>

    </html>
@endsection
