@extends('layouts.panel')

@section('title','Admin Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Layanan</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Layanan</h6>
                <button data-toggle="modal" data-target="#modal-create"class="btn btn-primary btn-sm" style="float: right">(+) Tambah Layanan</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Layanan</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_layanan }}</td>
                                    <td>
                                        <button
                                        id="edit"
                                        data-id="{{ $item->id }}"
                                        data-nama_layanan="{{ $item->nama_layanan }}"
                                        class="btn btn-info btn-sm"
                                        data-toggle="modal" data-target="#modal-edit"
                                        >Edit</button>
                                        <a href="{{ route('admin.layanan.delete', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')">Hapus</>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Layanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input type="text" class="form-control" name="nama_layanan" placeholder="Masukan Nama Layanan" required>
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
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Layanan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="form-edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Layanan</label>
                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Masukan Nama Layanan" required>
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
                var nama_layanan = $(this).data('nama_layanan');
                $('#nama_layanan').val(nama_layanan);

                $('#form-edit').attr('action','/admin/layanan/update/' + id);
            });
        });
    </script>
@endpush
