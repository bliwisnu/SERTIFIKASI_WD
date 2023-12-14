@extends('layouts.headerBody')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('layouts.sidebar')
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.navbarAdmin')
            <!-- Navbar End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <h3 class="text-dark mb-5">Update User</h3>
                    <form action="/update-user/{{ $userData->id }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="username" name="username" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $userData->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $userData->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mobile</label>
                            <input type="mobile" name="no_hp" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $userData->no_hp }}">
                        </div>
                        <div class="form mb-3">
                            <label for="exampleInputEmail1" class="form-label">Gender</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input type="alamat" name="alamat" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $userData->alamat }}">
                        </div>
                        <div class="form">
                            <label for="exampleInputEmail1" class="form-label">Role</label>
                            <select class="form-select" name="role_user" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option value="1">Admin</option>
                                <option value="0">Member</option>
                            </select>
                        </div>
                        <div class="button-group d-flex justify-content-between">
                            <button type="submit" class="btn w-25 btn-success mt-3">Update</button>
                            <a href="/dashboard" class="btn btn-dark w-25 mt-3">Back</a>
                        </div>
                    </form>
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
