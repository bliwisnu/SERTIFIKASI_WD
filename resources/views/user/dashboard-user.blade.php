<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AGRORENT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./style.css" rel="stylesheet">
</head>

<body>

    <!-- @yield('content') -->
    <!-- @extends('layouts.headerBody')
    @section('content') -->

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- @include('layouts.loading')
    @include('layouts.sidebar') -->
    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3 class="text-success"></i>AGRORENT</h3>
            </a>
            <div class="navbar-nav w-100">
                <a href="/" class="nav-item nav-link active text-success mb-3"><i class="fa fa-tachometer-alt me-2 text-success"></i>Dashboard</a>
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown"><i class="fa fa-tools me-2 text-success"></i>Auth</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="/login" class="dropdown-item">Log Out</a>
                    </div>
                </div> -->
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars text-success"></i>
            </a>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <!-- @auth -->
                        <img class="rounded-circle me-lg-2" src="./alexandre-lallemand-JE8vJ-sk1K4-unsplash.jpg" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">
                            <!-- {{ Str::length(Auth::user()->username) > 10?
                            Str::substr(Auth:: user()->username,0,10). "...": Auth::user()->username }} -->
                            Example
                        </span>
                        <!-- @endauth -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="./profile.html" class="dropdown-item">My Profile</a>
                        <a href="/login" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="container-fluid pt-4 px-4">
            <h2 class="header text-center text-light bg-success">
                User Dashboard
            </h2>
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
                        <div class="col">
                            <div class="card">
                                <img src="./pacul.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">cangkul</h5>
                                    <p class="card-text">200.000</p>
                                    <a href="#" class="btn btn-dark">Sewa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./pacul.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">cangkul</h5>
                                    <p class="card-text">200.000</p>
                                    <a href="#" class="btn btn-dark">Sewa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./pacul.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">cangkul</h5>
                                    <p class="card-text">200.000</p>
                                    <a href="#" class="btn btn-dark">Sewa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./pacul.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">cangkul</h5>
                                    <p class="card-text">200.000</p>
                                    <a href="#" class="btn btn-dark">Sewa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./pacul.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">cangkul</h5>
                                    <p class="card-text">200.000</p>
                                    <a href="#" class="btn btn-dark">Sewa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="./pacul.webp" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">cangkul</h5>
                                    <p class="card-text">200.000</p>
                                    <a href="#" class="btn btn-dark">Sewa</a>
                                </div>
                            </div>
                        </div>
                        <!-- Tambahkan card lainnya di sini sesuai kebutuhan -->
                    </div>
                </div>

                <!-- Recent Sales Start -->
                <div class="container-fluid pt-4 px-4">
                    <div class="bg-light text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Sewa Alat</h6>
                            <a href="">Show All</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">Nama Alat</th>
                                        <th scope="col">Harga/hari</th>
                                        <th scope="col">Durasi/hari</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>cangkul</td>
                                        <td>200.000</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Masukkan Jumlah Hari" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        </td>
                                        <td>
                                            <button class="btn btn-dark" type="sewa" id="sewa">Sewa</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>cangkul</td>
                                        <td>200.000</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Masukkan Jumlah Hari" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        </td>
                                        <td>
                                            <button class="btn btn-dark" type="sewa" id="sewa">Sewa</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>cangkul</td>
                                        <td>200.000</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Masukkan Jumlah Hari" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        </td>
                                        <td>
                                            <button class="btn btn-dark" type="sewa" id="sewa">Sewa</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>cangkul</td>
                                        <td>200.000</td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Masukkan Jumlah Hari" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        </td>
                                        <td>
                                            <button class="btn btn-dark" type="sewa" id="sewa">Sewa</button>
                                        </td>
                                    </tr>
                                    <!-- @foreach ( $allUsers as $users )
                                    <tr>
                                        <td>{{ $users -> username }}</td>
                                        <td>{{ $users -> email }}</td>
                                        @if ($users -> role_user === 1)
                                        <td>Member</td>
                                        @else($users -> role_user === 0)
                                        <td>Admin</td>
                                        @endif
                                        <td><a class="btn btn-sm btn-primary" href="">Detail</a>
                                            <a class="btn btn-sm btn-danger" href="">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach -->
                                </tbody>
                            </table>
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
