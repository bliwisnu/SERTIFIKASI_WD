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
                                <td><a class="btn btn-sm btn-warning" href="/editKategori/{{ $semuaKategori->id }}">Edit</a>
                                    <!-- <a class="btn btn-sm btn-danger" href="/hapusKategori/{{ $semuaKategori->id }}">Delete</a> -->
                                    <!-- Konfirmasi Delete Modal -->
                                    <!-- Tombol Konfirmasi Delete -->
                                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal{{ $semuaKategori->id }}">
                                        Delete
                                    </a>

                                    <!-- Modal Konfirmasi Delete -->
                                    <div class="modal" id="deleteConfirmationModal{{ $semuaKategori->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi Delete</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin ingin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                                    <a href="/hapusKategori/{{ $semuaKategori->id }}" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
<!-- Modal Library -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">