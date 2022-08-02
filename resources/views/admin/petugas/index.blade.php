@extends('layouts.panel')

@section('title', 'Admin Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Petugas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Petugas</h6>
                <button data-toggle="modal" data-target="#modal-create"class="btn btn-primary btn-sm" style="float: right">(+)
                    Tambah Petugas</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Kantor</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->kantor->nama_kantor }}</td>
                                    <td>
                                        <button id="edit" data-id="{{ $item->id }}"
                                            data-nama_petugas="{{ $item->name }}"
                                            data-kantor_id="{{ $item->kantor_id }}"
                                            data-username="{{ $item->username }}"
                                            data-email="{{ $item->email }}"
                                            class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-edit">Edit</button>
                                        <a href="{{ route('admin.petugas.delete', $item->id) }}"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')">Hapus</>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.petugas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" class="form-control" name="nama_petugas"
                                placeholder="Masukan Nama Petugas" required value="{{ old('nama_petugas') }}">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username"
                                placeholder="Masukan Username Petugas" required  value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukan Email Petugas"
                                required>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Masukan Password Petugas" required>
                        </div>
                        <div class="form-group">
                            <label>Kantor</label>
                            <select name="kantor_id" class="form-control" required>
                                <option value="">Pilih Kantor</option>
                                @foreach (App\Kantor::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kantor }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="form-edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas"
                                placeholder="Masukan Nama Petugas" value="{{ old('nama_petugas') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username_edit" id="username"
                                placeholder="Masukan Nama Petugas" required>
                            @if ($errors->has('username_edit'))
                                <span class="text-danger">{{ $errors->first('username_edit') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_edit" id="email"
                                placeholder="Masukan Nama Petugas" required>
                            @if ($errors->has('email_edit'))
                                <span class="text-danger">{{ $errors->first('email_edit') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Kantor</label>
                            <select name="kantor_id" id="kantor_id" class="form-control" required>
                                @foreach (App\Kantor::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kantor }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            $(document).on('click', '#edit', function() {
                var id = $(this).data('id');
                var nama_petugas = $(this).data('nama_petugas');
                var username = $(this).data('username');
                var email = $(this).data('email');
                var kantor_id = $(this).data('kantor_id');
                $('#nama_petugas').val(nama_petugas);
                $('#kantor_id').val(kantor_id);
                $('#username').val(username);
                $('#email').val(email);

                $('#form-edit').attr('action', '/admin/petugas/update/' + id);
            });
        });
    </script>
    @if ($errors->has('email_edit') || $errors->has('username_edit'))
        <script>
            $("#modal-edit").modal('show');
        </script>
    @endif
    @if ($errors->has('email') || $errors->has('username'))
        <script>
            $("#modal-create").modal('show');
        </script>
    @endif
@endpush
