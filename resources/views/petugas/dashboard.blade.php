@extends('layouts.panel')

@section('title', 'Petugas Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Data Antrian</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Antrian::where('kantor_id', Auth::user()->kantor_id)->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Antrian Pending</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Antrian::where('kantor_id', Auth::user()->kantor_id)->where('status','PENDING')->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Antrian Selesai
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ App\Antrian::where('kantor_id', Auth::user()->kantor_id)->where('status','SELESAI')->count() }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Antrian Batal</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ App\Antrian::where('kantor_id', Auth::user()->kantor_id)->where('status','BATAL')->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Data Antrian</h3>
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
                                        <th style="width: 15%">Aksi</th>
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
                            width: '15%',
                        }
                    ],

                });
            }
        });
    </script>
@endpush
