@extends('layouts.panel')

@section('title', 'Pemohon Panel')
@section('content')

    <style>
        /* .card {
                            width: 550px;
                        } */
        iframe {
            height: 300px !important;
            width: 100% !important;
        }

        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #4E73DF;
        }

        .f1-step {
            position: relative;
            float: left;
            width: 25%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #4E73DF;
            color: #4E73DF;
            line-height: 38px;
        }

        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #4E73DF;
            font-size: 22px;
            line-height: 48px;
        }

        .f1-step p {
            color: #ccc;
        }

        .f1-step.activated p {
            color: #4E73DF;
        }

        .f1-step.active p {
            color: #4E73DF;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('antrian.store') }}" method="post" class="f1" enctype="multipart/form-data">
                    @csrf
                    <h3>Antrian Pelayanan Industrial</h3>
                    <p>Silahkan Isi Form Antrian</p>
                    <div class="f1-steps">
                        <div class="f1-progress">
                            <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;">
                            </div>
                        </div>
                        <div class="f1-step active">
                            <div class="f1-step-icon text-center">1</div>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon text-center">2</i></div>
                        </div>
                        <div class="f1-step">
                            <div class="f1-step-icon text-center">3</div>
                        </div>

                    </div>
                    <!-- step 1 -->
                    @php
                    $kantorPertama = App\Kantor::first();
                    @endphp

                    <fieldset class="mt-3">
                        <div id="maps">
                            {!! $kantorPertama->link_maps !!}
                        </div>

                        <div class="card mx-auto mt-4 mb-5" style="width: 550px">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 align-self-center">
                                        <img src="{{ asset('assets/images/logo-dki.png') }}" style="width: 50px">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="nama-kantor">{{ $kantorPertama->nama_kantor }}</div>
                                        <div class="alamat">
                                            {{ $kantorPertama->alamat }}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <select name="kantor_id" id="kantor" class="form-control mt-4">
                                            <option value="{{ $kantorPertama->id }}">{{ $kantorPertama->nama_kantor }}</option>
                                            @foreach (App\Kantor::skip(1)->take(20)->get() as $kantor)
                                                <option value="{{ $kantor->id }}">{{ $kantor->nama_kantor }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="f1-buttons">
                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-block mt-3 btn-next">Pilih
                                                Kantor</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 2 -->
                    <fieldset class="mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-center mx-auto">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Pemohon</label>
                                                    <select name="jumlah_pemohon" id="jumlah_pemohon" class="form-control"
                                                        required>
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
                                                    <input type="date" name="tanggal_kedatangan" id="tanggal_kedatangan" class="form-control"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Layanan</label>
                                                    <select name="layanan_id" id="layanan_id" class="form-control" required>
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

                                            <div class="col-md-12 mt-3">
                                                <div class="f1-buttons">
                                                    <button type="button"
                                                        class="btn btn-sm btn-block btn-warning btn-previous">Sebelumnya</button>
                                                    <button type="button" class="btn btn-sm btn-block btn-primary btn-next"
                                                        id="next-btn">Selanjutnya</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 3 -->
                    <fieldset class="mt-3">
                        <div class="card">
                            <div class="card-body">
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
                                            <td id="alamat_kantor"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Jumlah Pemohon</th>
                                            <td id="jumlah_pemohon_data"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Tanggal Kedatangan</th>
                                            <td id="tanggal_kedatangan_data"></td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Waktu Kedatangan</th>
                                            <td id="waktu_kedatangan_data"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button"
                                    class="btn btn-warning btn-sm btn-block btn-previous">Sebelumnya</button>
                                <button type="submit" class="btn btn-primary btn-sm btn-block">
                                    Buat Antrian</button>
                            </div>
                        </div>
                    </fieldset>
                    <!-- step 4 -->

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


@endsection

@push('down-script')
    <script>
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

        $("#next-btn").click(function(e) {
                var nama_pemohon = "{{ Auth::user()->name }}";
                var nama_kantor = $(".nama-kantor").text();
                var alamat = $(".alamat").text();
                var jumlah_pemohon = $('#jumlah_pemohon option:selected').text();
                var tanggal_kedatangan = $('#tanggal_kedatangan').val();
                var waktu_kedatangan = $("input[name='waktu_kedatangan']:checked").val();;


                $("#nama_pemohon").text(nama_pemohon);
                $("#nama_kantor").text(nama_kantor);
                $("#alamat_kantor").text(alamat);
                $("#jumlah_pemohon_data").text(jumlah_pemohon);
                $("#tanggal_kedatangan_data").text(tanggal_kedatangan);
                $("#waktu_kedatangan_data").text(waktu_kedatangan);
        });
    </script>
    <script>
        function scroll_to_class(element_class, removed_height) {
            var scroll_to = $(element_class).offset().top - removed_height;
            if ($(window).scrollTop() != scroll_to) {
                $('html, body').stop().animate({
                    scrollTop: scroll_to
                }, 0);
            }
        }

        function bar_progress(progress_line_object, direction) {
            var number_of_steps = progress_line_object.data('number-of-steps');
            var now_value = progress_line_object.data('now-value');
            var new_value = 0;
            if (direction == 'right') {
                new_value = now_value + (100 / number_of_steps);
            } else if (direction == 'left') {
                new_value = now_value - (100 / number_of_steps);
            }
            progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
        }

        $(document).ready(function() {
            // Form
            $('.f1 fieldset:first').fadeIn('slow');

            $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
                $(this).removeClass('input-error');
            });

            // step selanjutnya (ketika klik tombol selanjutnya)
            $('.f1 .btn-next').on('click', function() {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                // validasi form
                parent_fieldset.find(
                    'input[type="text"], :selected, input[type="password"], input[type="date"], textarea'
                    ).each(
                    function() {
                        if ($(this).val() == "") {
                            $(this).addClass('input-error');
                            next_step = false;
                        } else {
                            $(this).removeClass('input-error');
                        }
                    });

                if (next_step) {
                    parent_fieldset.fadeOut(400, function() {
                        // change icons
                        current_active_step.removeClass('active').addClass('activated').next()
                            .addClass('active');
                        // progress bar
                        bar_progress(progress_line, 'right');
                        // show next step
                        $(this).next().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class($('.f1'), 20);
                    });
                }
            });

            // step sbelumnya (ketika klik tombol sebelumnya)
            $('.f1 .btn-previous').on('click', function() {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                $(this).parents('fieldset').fadeOut(400, function() {
                    // change icons
                    current_active_step.removeClass('active').prev().removeClass('activated')
                        .addClass('active');
                    // progress bar
                    bar_progress(progress_line, 'left');
                    // show previous step
                    $(this).prev().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.f1'), 20);
                });
            });

            // submit (ketika klik tombol submit diakhir wizard)
            $('.f1').on('submit', function(e) {
                // validasi form
                $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
                    if ($(this).val() == "") {
                        e.preventDefault();
                        $(this).addClass('input-error');
                    } else {
                        $(this).removeClass('input-error');
                    }
                });
            });
        });
    </script>
@endpush
