@extends('layouts.panel')

@section('title','Pemohon Panel')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/form/css/muli-font.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/form/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
<!-- datepicker -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/form/css/jquery-ui.min.css">
<!-- Main Style Css -->
<link rel="stylesheet" href="{{ asset('assets') }}/form/css/style.css"/>
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

            <form class="form-register" action="#" method="post">
                <div id="form-total">
                    <!-- SECTION 1 -->
                    <h2>1</h2>
                    <section>
                        <div class="inner">
                            {{-- <div class="form-row">
                                <div class="form-holder">
                                    <input type="text" placeholder="First Name" class="form-control" id="first_name">
                                </div>
                                <div class="form-holder">
                                    <input type="text" placeholder="Last Name" class="form-control" id="last_name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder">
                                    <input type="text" placeholder="Phone Number" class="form-control" id="phone">
                                </div>
                                <div class="form-holder">
                                    <input type="email" placeholder="Email" class="form-control" id="email">
                                </div>
                            </div> --}}
                            <div class="form-row">
                            {{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Kantor%20Walikota&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">how to add google maps to wordpress</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div> --}}
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15867.636136103003!2d106.8054342269897!3d-6.142920246346955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f60794af519f%3A0xe79dcb4569eb7d7f!2sGlodok%20Chinatown%20Market!5e0!3m2!1sen!2sid!4v1659538789062!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </section>
                    <!-- SECTION 2 -->
                    <h2>2</h2>
                    <section>
                        <div class="inner">
                            <div class="form-row">
                                <div class="form-holder form-holder-2">
                                    <select name="location" id="location" class="form-control">
                                        <option value="" disabled selected>Choose A Location</option>
                                        <option value="united states">United States</option>
                                        <option value="united kingdom">United Kingdom</option>
                                        <option value="viet nam">Viet Nam</option>
                                    </select>
                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-holder">
                                    <input type="text" name="date" class="date" id="date" placeholder="15 / Jan / 2018">
                                </div>
                                <div class="form-holder">
                                    <select name="" id="time" class="form-control">
                                        <option value="7:00am - 18:00pm" selected>7:00am - 18:00pm</option>
                                        <option value="9:00am - 21:00pm">9:00am - 21:00pm</option>
                                        <option value="10:00am - 22:00pm">10:00am - 22:00pm</option>
                                        <option value="12:00am - 24:00pm">12:00am - 24:00pm</option>
                                    </select>
                                    <span class="select-btn">
                                        <i class="zmdi zmdi-chevron-down"></i>
                                    </span>
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
                                            <th>Full Name:</th>
                                            <td id="fullname-val">Benjamin Harrison</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Phone:</th>
                                            <td id="phone-val">+1 888-999-2222</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Email:</th>
                                            <td id="email-val">allison.long@example.com</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Travel Location:</th>
                                            <td id="location-val">Tokyo Japan</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Date:</th>
                                            <td id="date-val">15 Jan, 2018</td>
                                        </tr>
                                        <tr class="space-row">
                                            <th>Time:</th>
                                            <td id="time-val">7:00am - 18:00pm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
