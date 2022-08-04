@extends('layouts.panel')

@section('title','Pemohon Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jadwal Antrian</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row">
            @foreach (App\Antrian::where('user_id',Auth::user()->id)->get() as $antrian)

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            {{ $antrian->layanan->nama_layanan }}
                        </div>
                        <div class="row">
                            <div class="col-md-8">

                                <div class="nik">{{ $antrian->user->nik }}</div>
                                <div class="nama">{{ $antrian->user->name }}</div>
                                <div class="waktu-kedatangan">{{ $antrian->tanggal_kedatangan->isoFormat('dddd, D MMMM Y') }}</div>
                                <div class="nama-kantor">{{ $antrian->kantor->nama_kantor }}</div>
                                <div class="waktu">
                                    @if ($antrian->waktu_kedatangan == 'Pagi')
                                        08:00 - 12:00 WIB
                                    @else
                                        13:00 - 16:00 WIB
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 align-self-center text-center">
                                <a href="{{ route('antrian.detail', $antrian->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                @if($antrian->status == 'PENDING')
                                <span class="badge badge-warning">
                                    PENDING
                                </span>
                                @elseif($antrian->status == 'SELESAI')
                                <span class="badge badge-success">
                                    SELESAI
                                </span>
                                @else
                                <span class="badge badge-danger">
                                    BATAL
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
