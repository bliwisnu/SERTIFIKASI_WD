@extends('layouts.headerBody')

@section('content')
@include('layouts.loading')

<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="align-items-center justify-content-center text-center mb-3">
                    <a href="index.html" class="">
                        <h3 class="text-success"></i>AGRORENT</h3>
                    </a>
                    <p>Lupa Password</p>
                </div>
                <form action="/login/store" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password baru</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Masukan ulang password</label>
                    </div>
                    <button type="submit" class="btn btn-success py-3 w-100 mb-4">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->
</div>

@endsection
