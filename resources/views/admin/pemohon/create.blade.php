@extends('layouts.panel')

@section('title', 'Admin Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pemohon</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pemohon</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pemohon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan</label>
                                <input type="number" class="form-control" name="nik" value="{{ old('nik') }}" required placeholder="Nomor Induk Kependudukan">
                                @if ($errors->has('nik'))
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" required placeholder="Username">
                                @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password Konfirmasi</label>
                                <input type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmai Password">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', date('Y-m-d')) }}" required placeholder="Tanggal Lahir">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input type="number" class="form-control" name="nomor_handphone" value="{{ old('nomor_handphone') }}" required placeholder="Nomor Handphone">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin') }}" required >
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" id="provinces" class="form-control" value="{{ old('provinsi') }}" required>
                                    <option value="" disable="true" selected="true">Pilih Provinsi<option>
                                    @foreach (App\Models\Province::all() as $provincy)
                                        <option value="{{$provincy->id}}">{{ $provincy->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <select class="form-control" name="kota" value="{{ old('kota') }}" id="regencies">
                                    <option value="" disable="true" selected="true"> Pilih Kota </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan" value="{{ old('kecamatan') }}" id="districts">
                                    <option value="" disable="true" selected="true"> Pilih Kecamatan </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select class="form-control" name="kelurahan" value="{{ old('kelurahan') }}" id="villages">
                                    <option value="" disable="true" selected="true"> Pilih Kelurahan </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sesuai KTP</label>
                                <textarea name="alamat" class="form-control"  required placeholder="Alamat Sesuai KTP">{{ old('alamat') }}</textarea>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                </form>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection

@push('down-script')
    <!-- Bootstrap core JavaScript-->

    <!-- Custom scripts for all pages-->
    <!-- Page level plugins -->
    <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script>

    <script>
        $('#provinces').on('change', function (e) {
        var province_id = e.target.value;
        $.get('/regencies?province_id=' + province_id, function (data) {
            $('#regencies').empty();
            $('#regencies').append('<option value="0" disable="true" selected="true"> Pilih Kota </option>');
            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true"> Pilih Kecamatan </option>');
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true"> Pilih Kelurahan</option>');
            $.each(data, function (index, regenciesObj) {
                $('#regencies').append('<option value="' + regenciesObj.id + '">' + regenciesObj.name + '</option>');
            })
        });
    });
    $('#regencies').on('change', function (e) {
        var regencies_id = e.target.value;
        $.get('/districts?regencies_id=' + regencies_id, function (data) {
            $('#districts').empty();
            $('#districts').append('<option value="0" disable="true" selected="true"> Pilih Kecamatan </option>');
            $.each(data, function (index, districtsObj) {
                $('#districts').append('<option value="' + districtsObj.id + '">' + districtsObj.name + '</option>');
            })
        });
    });
    $('#districts').on('change', function (e) {
        var districts_id = e.target.value;
        $.get('/village?districts_id=' + districts_id, function (data) {
            $('#villages').empty();
            $('#villages').append('<option value="0" disable="true" selected="true"> Pilih Kelurahan</option>');
            $.each(data, function (index, villagesObj) {
                $('#villages').append('<option value="' + villagesObj.id + '">' + villagesObj.name + '</option>');
                console.log("|" + villagesObj.id + "|" + villagesObj.district_id + "|" + villagesObj.name);
            })
        });
    });
    </script>
@endpush
