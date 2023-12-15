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
                <div class="bg-light rounded p-4">
                    <div class=" mb-4">
                        <form action="/tambahKategori/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label text-start">Tambah Kategori</label>
                                <input class="form-control" name="jenis_alat" id="exampleInput"
                                    aria-describedby="kategori">
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <button type="submit" class="btn btn-success w-25">Tambah</button>
                                <a class="btn btn-dark w-25" href="/daftarKategori">Back</a>
                            </div>
                        </form>
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
