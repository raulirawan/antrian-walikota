@extends('layouts.panel')

@section('title', 'Pemohon Panel')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/form/css/muli-font.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/form/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/form/css/jquery-ui.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/form/css/style.css" />
    <style>
        /* .card {
                    width: 550px;
                } */
        iframe {
            height: 300px !important;
            width: 100% !important;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Antrian Pelayanan Industrial</h1><br>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>
        <p>Pilih Kantor Administrasi</p>

        <!-- Content Row -->
        <div class="wizard-form">

            <form class="form-register" id="form-antrian" action="{{ route('antrian.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="form-total">
                    <!-- SECTION 1 -->
                    <h2>1</h2>
                    <section>
                        <div class="inner">
                            <div class="form-row" id="maps">
                                {{-- <div class="data-maps"> --}}
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15867.555166807104!2d106.82963755!3d-6.14563615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5e564ff6a3f%3A0x864bce87c5ba4501!2sRumah%20Sakit%20Husada!5e0!3m2!1sen!2sid!4v1659607544397!5m2!1sen!2sid"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                {{-- </div> --}}

                            </div>
                            <div class="card mx-auto mt-4" style="width: 550px">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 align-self-center">
                                            <img src="{{ asset('assets/images/logo-dki.png') }}" style="width: 50px">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="nama-kantor">Kantor Administrasi Walikota Jakarta Barat</div>
                                            <div class="alamat">
                                                Jl. Kembangan Raya No.2 RT.5/RW.2, Kembangan Sel, Kec, Kembabngan, Kota
                                                Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <select name="kantor_id" id="kantor" class="form-control mt-4">
                                                <option value="">Pilih Kantor</option>
                                                @foreach (App\Kantor::all() as $kantor)
                                                    <option value="{{ $kantor->id }}">{{ $kantor->nama_kantor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 2 -->
                    <h2>2</h2>
                    <section>
                        <div class="inner">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center mx-auto">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Jumlah Pemohon</label>
                                                        <select name="jumlah_pemohon" id="jumlah_pemohon"
                                                            class="form-control" required>
                                                            <option value="">Jumlah Pemohon</option>
                                                            <option value="1">1 Orang</option>
                                                            <option value="2">2 Orang</option>
                                                            <option value="3">3 Orang</option>
                                                            <option value="4">4 Orang</option>
                                                            <option value="5">5 Orang</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Kedatangan</label>
                                                        <input type="date" name="tanggal_kedatangan" class="form-control"
                                                            required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Layanan</label>
                                                        <select name="layanan_id" id="layanan_id" class="form-control"
                                                            required>
                                                            <option value="">Pilih Layanan</option>
                                                            @foreach (App\Layanan::all() as $layanan)
                                                                <option value="{{ $layanan->id }}">
                                                                    {{ $layanan->nama_layanan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 align-self-center">
                                                    <div class="form-group">
                                                        <label class="mb-3">Pilih Waktu Kedatangan</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="waktu_kedatangan" value="Pagi" checked>
                                                            <label class="form-check-label">
                                                                Pagi (08.00 s/d 12.00)
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="waktu_kedatangan" value="Siang">
                                                            <label class="form-check-label">
                                                                Siang (13.00 s/d 16.00)
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 3 -->
                    <h2>3</h2>
                    <section>
                        <div class="inner">
                            <div class="form-row table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr class="space-row">
                                            <th>Nama Pemohon</th>
                                            <td id="nama_pemohon"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Nama Kantor</th>
                                            <td id="nama_kantor"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Alamat Kantor</th>
                                            <td id="alamat"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Jumlah Pemohon</th>
                                            <td id="jumlah_pemohon"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Tanggal Kedatangan</th>
                                            <td id="tanggal_kedatangan"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Waktu Kedatangan</th>
                                            <td id="waktu_kedatangan"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
                        <button href="#" type="submit" id="buat-antrian" class="btn btn-primary">Buat Antrian</button>
                    </section>
                </div>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection

@push('down-script')
    <script>

        // $('#kantor').change(function() {
        //     alert($(this).val());
        // });
        $(document).ready(function() {
            // $('#form-total ul li').last().remove();
            $('#form-total ul li').next().children().addClass('kamang');
        });

        $("form").submit(function(){
  alert("Submitted");
});
        $('body').on('change', '#kantor', function() {
            var id_kantor = $(this).val();
            $.ajax({
                type: "GET",
                url: `${window.location.origin}/get/kantor/${id_kantor}`,
                success: function(response) {
                    $("#maps").html(response.data.link_maps);
                    $(".nama_kantor").text(response.data.nama_kantor);
                    $(".alamat").text(response.data.alamat);
                }
            });
        });

        $("#form-register").click(function(e) {
            e.preventDefault();

        });
    </script>
@endpush
