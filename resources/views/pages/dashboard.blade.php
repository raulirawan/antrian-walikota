@extends('layouts.panel')

@section('title','Pemohon Panel')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
            <p>
                Hallo {{ Auth::user()->name }} Selamat Datang di Sistem Antrian Pelayanan Industrial, Kantor
                Suku Dinas Transmigrasi dan Energi Kota Administrasi Jakarta Barat.
                Untuk Melihat Informasi dan Panduan Bisa Memilih Menu Yang Ada Di bawah Ini.
            </p>

            <div id="accordion">
                <div class="card mb-4">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Informasi
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        Informasi berguna untuk membantu masyarakat/pelanggan mengatur antrian agar lebih menjadi efektif dan efisien sehingga memungkinkan setiap pelanggan yang datang ke tempat,mendapatkan layanan yang mereka butuhkan dengan mudah dan cepat.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Layanan
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        Layanan ini dibuat agar mempermudah masyarakat/pelanggan untuk mengantri di Wali Kota Jakarta Barat,sehingga tidak ada lagi penumpukan pada antrian
                </div>

              </div>

    </div>
    <!-- /.container-fluid -->
@endsection
