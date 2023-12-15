@extends('layouts.headerBody')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('layouts.sidebar')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.navbarAdmin')
            <!-- Navbar End -->

            <!-- Main -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class=" mb-4">
                        <form action="/tambahBarang/store" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInput" class="form-label text-start">Nama Alat</label>
                                <input class="form-control" name="nama_alat" id="exampleInput" aria-describedby="kategori">
                            </div>

                            <div class="mb-3">
                                <label class="mb-3">Kategori Alat</label>
                                <select class="form-control multiple-category" name="category[]" multiple="multiple">
                                    @foreach ($semuaKategori as $category)
                                        <option value="{{ $category->id }}">{{ $category->jenis_alat }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInput" class="form-label text-start">Harga</label>
                                <input class="form-control" name="harga_alat" id="exampleInput" aria-describedby="kategori">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar</label>
                                <input class="form-control" type="file" name="input_gambar" id="formFile">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Main End -->

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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function($) {
            $('.multiple-category').select2();
        });
    </script>
