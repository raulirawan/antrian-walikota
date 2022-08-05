@extends('layouts.panel')

@section('title', 'Admin Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">



        <!-- Content Row -->
        <h1 class="h3 mb-2 text-gray-800">Data Antrian</h1>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row input-daterange ml-2 my-2">
                            <div class="col-md-3">
                                <input type="date" name="from_date" id="from_date"
                                    value="{{ date('Y-m-d', strtotime('-7 days')) }}" class="form-control"
                                    placeholder="From Date" />
                            </div>
                            <div class="col-md-3">
                                <input type="date" name="to_date" id="to_date" value="{{ date('Y-m-d') }}"
                                    class="form-control" placeholder="To Date" />
                            </div>
                            <div class="col-md-3">
                                <select name="status" id="status" class="form-control">
                                    <option value="SEMUA">SEMUA</option>
                                    <option value="SELESAI">SELESAI</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="BATAL">BATAL</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" name="filter" id="filter" class="btn btn-primary">Filter</button>
                                <button type="button" name="refresh" id="refresh"
                                    class="btn btn-default">Refresh</button>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table-data" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">Tanggal Di Buat</th>
                                        <th>Kode Booking</th>
                                        <th>Nama Pemohon</th>
                                        <th>Layanan</th>
                                        <th>Waktu Kedatangan</th>
                                        <th>Status</th>
                                        <th style="width: 25%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach (App\Antrian::where('kantor_id', Auth::user()->kantor_id)->get() as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_booking }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->layanan->nama_layanan }}</td>
                                        <td>
                                            <a
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Yakin ?')"
                                            >Terima</a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')">Tolak</>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
        $(document).ready(function () {
            var status = $('select[name=status] option').filter(':selected').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            load_data(from_date, to_date, status);

            $('#filter').click(function() {
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var status = $('select[name=status] option').filter(':selected').val();
                if (from_date != '' && to_date != '') {
                    $('#table-data').DataTable().destroy();
                    load_data(from_date, to_date, status);
                } else {
                    alert('Silahkan Pilih Tanggal')
                }
            });

            $('#refresh').click(function() {
                var status = $('select[name=status] option').filter(':selected').val();
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                $('#table-data').DataTable().destroy();
                load_data(from_date, to_date, status);
            });


            function load_data(from_date = '', to_date = '', status = '') {
                var datatable = $('#table-data').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    ajax: {
                        url: '{!! url()->current() !!}',
                        type: 'GET',
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            status: status,
                        }
                    },
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'pdfHtml5',
                            orientation: 'potrait',
                            footer: true,
                        },
                        {
                            extend: 'excelHtml5',
                            footer: true,
                        }
                    ],
                    columns: [
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'kode_booking',
                            name: 'kode_booking'
                        },
                        {
                            data: 'user.name',
                            name: 'user.name'
                        },
                        {
                            data: 'layanan.nama_layanan',
                            name: 'layanan.nama_layanan'
                        },
                         {
                            data: 'waktu_kedatangan',
                            name: 'waktu_kedatangan'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searcable: false,
                            width: '20%',
                        }
                    ],

                });
            }
        });
    </script>
@endpush
