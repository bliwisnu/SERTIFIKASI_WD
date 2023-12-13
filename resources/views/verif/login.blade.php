@extends('layouts.headerBody')

@section('content')
    @include('layouts.loading')
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-success"></i>AGRORENT</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <form action="/login/store" method="post">
                        @csrf
                        <div class="form-floating mb-4">
                            <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input name="password" type="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a class="text-success" href="/forgetPassword">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-success py-3 w-100 mb-4">Sign In</button>
                    </form>
                    <p class="text-center mb-0">Don't have an Account? <a class="text-success" href="/register">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
    </div>
@endsection
