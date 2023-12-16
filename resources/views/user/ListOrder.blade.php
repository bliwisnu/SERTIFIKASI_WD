@extends('layouts.headerBody')
@section('content')

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
                <a href="/listOrder" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>List Order</a>
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
                        <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">
                            {{ Str::length(Auth::user()->username) > 10?
                            Str::substr(Auth:: user()->username,0,10). "...": Auth::user()->username }}
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
        <!-- Header -->
        <div class="container-fluid pt-4 px-4">
            <h4 class="header text-center text-light bg-success">
                <b>LIST ORDER</b>
            </h4>
        </div>
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-5">
                <!-- Table Penyewaan -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0"><b>List Order</b></h6>
                            <a href="">Show All</a>
                        </div>
                        <div class="table-responsive">
                            <!-- Table List Order -->
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Nama Alat</th>
                                        <th scope="col">Harga/Hari</th>
                                        <th scope="colengemb">Tanggal Penyewaan</th>
                                        <th scope="col">Tanggal Pengembalian</th>
                                    </tr>
                                </thead>
                                @foreach ($peminjaman as $sewa)
                                <tbody>
                                    <tr>
                                        <td>{{ $sewa -> table_alat -> nama_alat }}</td>
                                        <td>{{ $sewa -> table_alat -> harga_alat }}</td>
                                        <td>{{ $sewa -> tanggal_sewa  }}</td>
                                        <td>{{ $sewa -> tanggal_pengembalian  }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <!-- Table Total Alat & Harga -->
                            <table class="table text-start table-bordered table-hover mb-0 mt-3">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Total Alat</th>
                                        <th scope="col">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $countAlat }}</td>
                                        <td>{{ $countHarga }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Print PDF -->
                            <button class="btn btn-dark mt-5" type="sewa" id="sewa">
                                Cetak Invoice
                            </button>
                        </div>
                    </div>
                </div>

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
        </div>
    </div>
</div>