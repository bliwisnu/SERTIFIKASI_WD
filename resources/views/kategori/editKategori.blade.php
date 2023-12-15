@extends('layouts.headerBody')
@section('content')

    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('layouts.sidebar')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.navbarAdmin')
            <!-- Navbar End -->

            <!-- Content -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class=" mb-4">
                        <div class="mb-3">
                            <form action="/update-kategori/{{ $editKategori->id }}" method="POST">
                                @csrf
                                @method('put')
                                <label for="exampleInput" class="form-label text-start">Edit Kategori</label>
                                <input class="form-control" name="jenis_alat" id="exampleInput" aria-describedby="kategori"
                                    value="{{ $editKategori->jenis_alat }}">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Content End -->

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
