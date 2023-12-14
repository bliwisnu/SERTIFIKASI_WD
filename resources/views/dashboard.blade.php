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

            <!-- Total User & Admin -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="text-center bg-light rounded align-items-center justify-content-between p-2">
                            <p class="text-dark">Total User
                            </p>
                            <span class="text-success fw-bold fs-1">{{ $countMember }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="text-center bg-light rounded align-items-center justify-content-between p-2">
                            <p class="text-dark">Total Admin
                            </p>
                            <span class="text-success fw-bold fs-1">{{ $countAdmin }}</span>
                        </div>
                    </div>
                    <!-- Total User & Admin end -->

                    <!-- Recent Sales Start -->
                    <div class="container-fluid pt-4 px-4">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h3 class="mb-0">Semua User</h3>
                                <a class="btn btn-success" href="/tambah/user">Tambah User</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-start align-middle table-bordered table-hover mb-0" id="myTable">
                                    <thead>
                                        <tr class="text-dark">
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allUsers as $users)
                                            <tr>
                                                <td>{{ $users->username }}</td>
                                                <td>{{ $users->email }}</td>
                                                @if ($users->role_user === 0)
                                                    <td>Member</td>
                                                @else($users -> role_user === 1)
                                                    <td>Admin</td>
                                                @endif
                                                <td><a class="btn btn-sm btn-primary" href="/EditUser/{{ $users->id }}">Edit</a>
                                                    <a class="btn btn-sm btn-danger"
                                                        href="/delete/{{ $users->id }}">Delete</a>
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
            </div>
        </div>
    </div>
    <!-- Content End -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


    <script>
        var $j = jQuery.noConflict();

        $j(document).ready(function() {
            $j('#myTable').DataTable();
        });
    </script>
