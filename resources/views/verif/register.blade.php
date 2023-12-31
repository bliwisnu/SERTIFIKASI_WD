@extends('layouts.headerBody')

@section('content')
    @include('layouts.loading')

    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="/" class="">
                            <h3 class="text-success"></i>AGRORENT</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <form action="/register/store" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="floatingText"
                                placeholder="jhondoe">
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        @if (session('error'))
                            <small>
                                <strong class="text-danger mb-5">{{ session('error') }}</strong>
                                <br><br>
                            </small>
                        @endif
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <i class="@error('password') is-invalid @enderror"></i>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a class="text-success" href="/forgetPassword">Forgot Password</a>
                        </div>

                        <button type="submit" class="btn btn-success py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a class="text-success" href="/login">Sign
                                In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
    </div>
@endsection
