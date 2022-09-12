{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Akun</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        form label {
            font-size: .8rem;

        }

        .size-font {
            font-size: .8rem;

        }

        .form-control {
            font-size: .8rem;
            border-radius: 10px;
        }

        .bg-register-image {
            background: url('https://i.ibb.co/yXHVvbX/logo-dki.png');
            background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-size: 350px;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 text-left">Pendaftaran!</h1>
                            </div>
                            <form class="user" action="{{ route('custom.register') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="col-md-12"> --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Nomor Induk Kependudukan</label>
                                        <input type="number" name="nik" class="form-control"
                                            placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}" required>
                                        @if ($errors->has('nik'))
                                            <span class="text-danger size-font">{{ $errors->first('nik') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Nomor Handphone</label>
                                        <input type="number" name="nomor_handphone"
                                            value="{{ old('nomor_handphone') }}" class="form-control"
                                            placeholder="Nomor Handphone" required>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama" value="{{ old('nama') }}"
                                            class="form-control" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                            value="{{ old('jenis_kelamin') }}" required>
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Username</label>
                                        <input type="text" name="username" value="{{ old('username') }}"
                                            class="form-control" placeholder="Username" required>
                                        @if ($errors->has('username'))
                                            <span class="text-danger size-font">{{ $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Provinsi</label>
                                        <select name="provinsi" id="provinces" class="form-control"
                                            value="{{ old('provinsi') }}" required>
                                            <option value="" disable="true" selected="true">Pilih Provinsi
                                            <option>
                                                @foreach (App\Models\Province::all() as $provincy)
                                            <option value="{{ $provincy->id }}">{{ $provincy->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Email</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" placeholder="Email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger size-font">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Kota</label>
                                        <select class="form-control" name="kota" value="{{ old('kota') }}"
                                            id="regencies">
                                            <option value="" disable="true" selected="true"> Pilih Kota </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger size-font">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Kecamatan</label>
                                        <select class="form-control" name="kecamatan" value="{{ old('kecamatan') }}"
                                            id="districts">
                                            <option value="" disable="true" selected="true"> Pilih Kecamatan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Konfirmasi Password" required>
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Kelurahan</label>
                                        <select class="form-control" name="kelurahan" value="{{ old('kelurahan') }}"
                                            id="villages">
                                            <option value="" disable="true" selected="true"> Pilih Kelurahan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                {{-- </div> --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', date('Y-m-d')) }}" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat">{{ old('alamat') }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Daftar
                                </button>
                                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center mt-2">
                                <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Silahkan Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>
    @include('sweetalert::alert')
    <script>
        $('#provinces').on('change', function(e) {
            var province_id = e.target.value;
            $.get('/regencies?province_id=' + province_id, function(data) {
                $('#regencies').empty();
                $('#regencies').append(
                    '<option value="0" disable="true" selected="true"> Pilih Kota </option>');
                $('#districts').empty();
                $('#districts').append(
                    '<option value="0" disable="true" selected="true"> Pilih Kecamatan </option>');
                $('#villages').empty();
                $('#villages').append(
                    '<option value="0" disable="true" selected="true"> Pilih Kelurahan</option>');
                $.each(data, function(index, regenciesObj) {
                    $('#regencies').append('<option value="' + regenciesObj.id + '">' + regenciesObj
                        .name + '</option>');
                })
            });
        });
        $('#regencies').on('change', function(e) {
            var regencies_id = e.target.value;
            $.get('/districts?regencies_id=' + regencies_id, function(data) {
                $('#districts').empty();
                $('#districts').append(
                    '<option value="0" disable="true" selected="true"> Pilih Kecamatan </option>');
                $.each(data, function(index, districtsObj) {
                    $('#districts').append('<option value="' + districtsObj.id + '">' + districtsObj
                        .name + '</option>');
                })
            });
        });
        $('#districts').on('change', function(e) {
            var districts_id = e.target.value;
            $.get('/village?districts_id=' + districts_id, function(data) {
                $('#villages').empty();
                $('#villages').append(
                    '<option value="0" disable="true" selected="true"> Pilih Kelurahan</option>');
                $.each(data, function(index, villagesObj) {
                    $('#villages').append('<option value="' + villagesObj.id + '">' + villagesObj
                        .name + '</option>');
                    console.log("|" + villagesObj.id + "|" + villagesObj.district_id + "|" +
                        villagesObj.name);
                })
            });
        });
    </script>
</body>

</html>
