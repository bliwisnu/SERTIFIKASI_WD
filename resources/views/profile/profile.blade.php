<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Link to CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

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
    .container-custom {
      height: 800px;
      background-color: #FFFFFF;
    }

    .profile-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    form {
      margin-top: 20px;
      text-align: left;
    }

    button {
      margin-top: 20px;
    }

  </style>
</head>
<body>
  <div class="container-fluid container-custom">
    <div class="profile-container">
      <h2>Profile</h2>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3 text-center">
          <img src="./alexandre-lallemand-JE8vJ-sk1K4-unsplash.jpg" alt="img" class="rounded-circle mt-3" style="width: 170px; height: 170px;">
        </div>
        <div class="mb-3">
          <label for="file" class="form-label">Change Photo Profile</label>
          <input type="file" class="form-control" name="inputImage" id="file">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <!-- <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}"> -->
          <input type="email" class="form-control" id="email" name="email" value="input here">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <!-- <input type="name" class="form-control" id="name" name="name" value="{{$user['name']}}"> -->
          <input type="name" class="form-control" id="name" name="name" value="input here">
        </div>
        <button type="submit" class="btn btn-success submit-button">Update</button>
        <!-- <a href="{{ route('logout') }}"><button type="button" class="btn btn-dark mt-3">Logout</button></a> -->
        <a href="{{ route('logout') }}"><button type="button" class="btn btn-dark mt-3">Logout</button></a>
      </form>
    </div>
    <!-- <a href="{{ route('home') }}"> -->
    <a href="./dashboard-user.html">
      <i class="fa-solid fa-arrow-left fa-lg mt-5 mx-4"></i>
    </a>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>