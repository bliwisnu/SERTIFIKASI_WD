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
                    <h6 class="mb-0">Semua Alat</h6>
                    <a class="btn btn-md btn-success" href="/tambahBarang">Tambah Alat</a>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Kategori Alat</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaBarang as $barang)
                            <tr>
                                <td>{{ $barang->nama_alat}}</td>
                                <td>{{ implode(',', $barang->categories->pluck("jenis_alat")->toArray())}}</td>
                                <td>{{ $barang->harga_alat }}</td>
                                <td>{{ $barang->input_gambar }}</td>
                                <td><a class="btn btn-sm btn-warning" href="/editBarang/{{ $barang->id }}">Edit</a>
                                    <!-- <a class="btn btn-sm btn-danger" href="/hapusBarang/{{ $barang->id }}">Delete</a> -->

                                    <!-- Konfirmasi Delete Modal -->
                                    <!-- Tombol Konfirmasi Delete -->
                                    <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirmationModal{{ $barang->id }}">
                                        Delete
                                    </a>

                                    <!-- Modal Konfirmasi Delete -->
                                    <div class="modal" id="deleteConfirmationModal{{ $barang->id }}">
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
                                                    <a href="/hapusBarang/{{ $barang->id }}" class="btn btn-danger">Hapus</a>
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