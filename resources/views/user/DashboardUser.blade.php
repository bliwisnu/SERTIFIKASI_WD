@extends('layouts.headerBody')
@section('content')

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-success"></i><b>AGRORENT</b></h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="/dashboard" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>Dashboard</a>
                <a href="/dashboard" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>Sewa Alat</a>
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
        <!-- Header -->
        <div class="container-fluid pt-4 px-4">
            <h4 class="header text-center text-light bg-success">
                <b>USER DASHBOARD</b>
            </h4>
            <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Cari alat..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-dark" type="search" id="search">Search</button>
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="category" id="category" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Kategori -->
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-5">
                <!-- Card Item -->
                <div class="container pt-4">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($allAlat as $alat)
                        <div class="col">
                            <div class="card">
                                <img src="img/alat/{{ $alat -> input_gambar }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $alat -> nama_alat }}</h5>
                                    <p class="card-text">{{ $alat -> harga_alat }}</p>
                                    <a href="/sewaAlat/{{ $alat -> id }}" class="btn btn-dark">sewa</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Tambahkan card lainnya di sini sesuai kebutuhan -->
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