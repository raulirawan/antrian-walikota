@extends('layouts.panel')

@section('title','Admin Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pemohon</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pemohon</h6>
                <a href="{{ route('admin.pemohon.create') }}" class="btn btn-primary btn-sm" style="float: right">(+) Tambah Pemohon</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Username</th>
                                <th>NIK</th>
                                <th>Nama Pemohon</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->tanggal_lahir }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>
                                        <a
                                        href="{{ route('admin.pemohon.edit', $item->id) }}"
                                        class="btn btn-info btn-sm"
                                        >Edit</a>
                                        <a href="{{ route('admin.pemohon.delete', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')">Hapus</>
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

    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pemohon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.pemohon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Pemohon</label>
                    <input type="text" class="form-control" name="nama_pemohon" placeholder="Masukan Nama Pemohon" required>
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

      <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Pemohon</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="form-edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Pemohon</label>
                    <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" placeholder="Masukan Nama Pemohon" required>
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
@endpush
