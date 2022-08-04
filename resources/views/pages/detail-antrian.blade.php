@extends('layouts.panel')

@section('title','Pemohon Panel')
@section('content')
    <!-- Begin Page Content -->
    <style>
        .card {
            padding: 60px
        }
    </style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jadwal Antrian</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center align-item-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tanggal">{{ $antrian->tanggal_kedatangan->isoFormat('dddd, D MMMM Y') }}
                                </div>
                                <hr>
                                <table>
                                    <tr class="mb-3">
                                        <td style="width: 60%">NIK</td>
                                        <td style="width: 10%">:</td>
                                        <td>{{ $antrian->user->nik }}</td>
                                    </tr>
                                      <tr class="mb-3">
                                        <td style="width: 60%">Nama</td>
                                        <td style="width: 10%">:</td>
                                        <td>{{ $antrian->user->name }}</td>
                                    </tr>

                                    <tr class="mb-3">
                                        <td style="width: 60%">Tempat</td>
                                        <td style="width: 10%">:</td>
                                        <td>{{ $antrian->kantor->nama_kantor }}</td>
                                    </tr>

                                    <tr class="mb-3">
                                        <td style="width: 60%">Waktu</td>
                                        <td style="width: 10%">:</td>
                                        <td>
                                            @if ($antrian->waktu_kedatangan == 'Pagi')
                                            08:00 - 12:00 WIB
                                        @else
                                            13:00 - 16:00 WIB
                                        @endif
                                        </td>
                                    </tr>



                                </table>
                                <div class="kode-booking">
                                    Kode Booking
                                    <div class="btn btn-primary btn-sm btn-block mt-3">{{ $antrian->kode_booking }}</div>
                                    <a href="{{ url()->previous() }}" class="btn btn-info btn-sm btn-block mt-3">Kembali</a>
                                </div>

                            </div>
                            <div class="col-md-6 align-self-center text-center">
                                {!! QrCode::size(200)->generate($antrian->kode_booking); !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
