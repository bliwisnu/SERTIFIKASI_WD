<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap 5.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Poppins Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/85206701c2.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css">
    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #f6d365;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right bottom, rgb(101, 246, 137), rgb(10, 9, 9));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right bottom, rgb(27, 245, 147), rgb(95, 94, 94))
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <a href="./dashboard">
            <i class="fa-solid fa-arrow-left fa-lg mt-5 mx-4 text-success fs-3"></i>
        </a>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <form action="/update-profile/{{ Auth::user()->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <img src="/img/{{ Auth::user()->profile_picture }}" alt="Avatar"
                                        class="img-fluid my-5" style="width: 150px;" />
                                    <div class="button-group">
                                        <label for="profile_pic" class="btn btn-dark"><i class="fa-solid fa-upload"></i>
                                            Pilih gambar</label>
                                        <input type="file" name="profile_picture" class="form-control"
                                            id="profile_pic" style="display: none;">
                                        <button type="submit" class="btn btn-dark">Update</button>
                                    </div>
                                </form>
                                <hr>
                                <h5>{{ Auth::user()->username }}</h5>
                                <p>{{ Auth::user()->gender }}</p>
                            </div>

                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h4>Edit Profile</h4>
                                    <hr>
                                    <form action="/update-profile/{{ Auth::user()->id }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Username</label>
                                            <input type="name" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="username"
                                                value="{{ Auth::user()->username }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Mobile</label>
                                            <input type="nohp" class="form-control" placeholder="Catumkan no hp anda"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" name="no_hp"
                                                value="{{ Auth::user()->no_hp }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2" for="floatingTextarea">Alamat</label>
                                            <input type="alamat" class="form-control" placeholder="Catumkan no hp anda"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" name="alamat"
                                                value="{{ Auth::user()->alamat }}">
                                        </div>
                                        <button type="submit" class="btn w-25 btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
