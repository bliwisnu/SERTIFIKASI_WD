@extends('layouts.headerBody')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
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
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="myTable">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Nama Alat</th>
                                    <th scope="col">Harga Alat</th>
                                    <th scope="col">Tanggal Sewa</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">in status</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($totPeminjaman as $pinjam)
                                    <tr>
                                        <td scope="col">{{ $pinjam->table_alat->nama_alat }}</td>
                                        <td scope="col">{{ $pinjam->table_alat->harga_alat }}</td>
                                        <td scope="col">{{ $pinjam->tanggal_sewa }}</td>
                                        <td scope="col">{{ $pinjam->tanggal_pengembalian }}</td>
                                        <td scope="col">{{ $pinjam->status }}</td>
                                        <form action="/ubahStatus/{{ $pinjam->id }}" method="post">
                                            @csrf
                                            <td scope="col">
                                                <select name="status" class="form-control">
                                                    <option value="in stock" {{ $pinjam->status === "in stock" ? "selected" : "" }}>
                                                        In Stock
                                                    </option>
                                                    <option value="terpinjam" {{ $pinjam->status === "terpinjam" ? "selected" : "" }}>
                                                        Terpinjam
                                                    </option>
                                                    <option value="kembali" {{ $pinjam->status === "kembali" ? "selected" : "" }}>
                                                        Kembali
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-success mt-4">Simpan</button>
                                            </td>
                                            {{-- <td scope="col">
                                            </td> --}}
                                        </form>
                                    </tr>
                                @endforeach
                                <!-- {{-- @foreach ($totPeminjaman as $pinjam)
                                    <tr>
                                        <form action="/ubahStatus/{{ $pinjam->id }}" method="post">
                                            @csrf
                                            <td scope="col">{{ $pinjam->table_alat->nama_alat }}</td>
                                            <td scope="col">{{ $pinjam->table_alat->harga_alat }}</td>
                                            <td scope="col">{{ $pinjam->tanggal_sewa }}</td>
                                            <td scope="col">{{ $pinjam->tanggal_pengembalian }}</td>
                                            <td scope="col">{{ $pinjam->status }}</td>

                                            <td scope="col">
                                                <select name="status" class="form-control">
                                                    <option value="in stock">In Stock</option>
                                                    <option value="terpinjam">Terpinjam</option>
                                                    <option value="kembali">Kembali</option>
                                                </select>
                                            </td>
                                            <td scope="col">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach --}} -->
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


    <script>
        var $j = jQuery.noConflict();

        $j(document).ready(function() {
            $j('#myTable').DataTable();
        });
    </script>