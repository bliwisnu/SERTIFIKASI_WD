@extends('layouts.headerBody')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<div class="container-xxl position-relative bg-white d-flex p-0">

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-success"></i>AGRORENT</h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="/dashboard" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>Dashboard</a>
                <a href="/sewaAlat" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>Sewa Alat</a>
                <a href="/dataPenyewaan" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>Data Penyewaan</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->

    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-success navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars text-success"></i>
            </a>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        @auth
                        <img class="rounded-circle me-lg-2" src="/img/{{ Auth::user()->profile_picture }}" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex text-light">
                            {{ Str::length(Auth::user()->username) > 10
                            ? Str::substr(Auth::user()->username, 0, 10) . '...'
                            : Auth::user()->username }}
                        </span>
                        @endauth
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="/profile" class="dropdown-item">My Profile</a>
                        <a href="/logout" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Recent Sales Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded p-4">
                <h3 class="text-dark mb-5">Sewa Alat</h3>
                <form action="/peminjaman/{{ $detailAlat -> id }}" method="POST">
                    @csrf
                    <input value="{{ $detailAlat ->id }}" name="alat_id" type="text">
                    <input value="{{ Auth::user()->id }}" name="user_id" type="text">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Alat</label>
                        <input value="{{ $detailAlat -> nama_alat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga Alat</label>
                        <input value="{{ $detailAlat -> harga_alat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Sewa</label>
                        <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" value="{{ $detailAlat -> tanggal_sewa }}">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal Pengembalian</label>
                        <div class="input-group date" id="datepicker1">
                            <input type="text" class="form-control" value="{{ $detailAlat -> tanggal_pengembalian }}">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="button-group d-flex justify-content-between">
                        <button type="submit" class="btn w-25 btn-success mt-3">Sewa</button>
                        <a href="/dashboard" class="btn btn-dark w-25 mt-3">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Recent Sales End -->

        <!-- Footer Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a class="text-success" href="#">AgroRent</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
</div>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script>
    var $j = jQuery.noConflict();

    $j(document).ready(function() {
        $j('#myTable').DataTable();
    });
</script>
<script type="text/javascript">
    (function($) {
        $(document).ready(function() {
            $('#datepicker, #datepicker1').datepicker();
        });
    })(jQuery);
</script>