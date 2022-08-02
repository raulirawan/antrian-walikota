@extends('layouts.panel')

@section('title','Admin Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kantor</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kantor</h6>
                <button data-toggle="modal" data-target="#modal-create"class="btn btn-primary btn-sm" style="float: right">(+) Tambah Kantor</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Kantor</th>
                                <th>Alamat</th>
                                <th>Link Maps</th>
                                <th style="width: 15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_kantor }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->link_maps }}</td>
                                    <td>
                                        <button
                                        id="edit"
                                        data-id="{{ $item->id }}"
                                        data-nama_kantor="{{ $item->nama_kantor }}"
                                        data-alamat="{{ $item->alamat }}"
                                        data-link_maps="{{ $item->link_maps }}"
                                        class="btn btn-info btn-sm"
                                        data-toggle="modal" data-target="#modal-edit"
                                        >Edit</button>
                                        <a href="{{ route('admin.kantor.delete', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')">Hapus</>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kantor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.kantor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Kantor</label>
                    <input type="text" class="form-control" name="nama_kantor" placeholder="Masukan Nama Kantor" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label>Link Maps</label>
                    <textarea name="link_maps" class="form-control" placeholder="Masukan Link Maps" required></textarea>
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
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Kantor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="form-edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama Kantor</label>
                    <input type="text" class="form-control" id="nama_kantor" name="nama_kantor" placeholder="Masukan Nama Kantor">
                </div>
                 <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>
                </div>
                <div class="form-group">
                    <label>Link Maps</label>
                    <textarea name="link_maps" id="link_maps" class="form-control" placeholder="Masukan Link Maps" required></textarea>
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
                var nama_kantor = $(this).data('nama_kantor');
                var alamat = $(this).data('alamat');
                var link_maps = $(this).data('link_maps');
                $('#nama_kantor').val(nama_kantor);
                $('#alamat').val(alamat);
                $('#link_maps').val(link_maps);

                $('#form-edit').attr('action','/admin/kantor/update/' + id);
            });
        });
    </script>
@endpush
