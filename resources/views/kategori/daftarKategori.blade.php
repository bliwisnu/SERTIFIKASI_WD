@extends('layouts.headerBody')
@section('content')

    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('layouts.loading')
        @include('layouts.sidebar')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.navbarAdmin')
            <!-- Navbar End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0">Semua Kategori</h3>
                        <a class="btn btn-success" href="/tambahKategori">Tambah Kategori</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaKategori as $semuaKategori )
                                <tr>
                                    <td>{{ $semuaKategori-> jenis_alat }}</td>
                                    <td><a class="btn btn-sm btn-warning" href="/editKategori/{{ $semuaKategori-> id }}">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="/hapusKategori/{{ $semuaKategori->id }}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
