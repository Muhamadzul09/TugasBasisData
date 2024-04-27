<?php
 session_start();
 require 'function.php';
 
if ( isset($_SESSION["login"]) ) {
  // code...
  header("Location: halamaUtama.php"); 
  exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,600;1,600&display=swap" rel="stylesheet" />
    <!-- feather icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <!-- navbar awal -->
    <nav class="navbar navbar-expand-lg bg-body-dark bg-primary navbar-dark shadow">
  <div class="container">
    <a class="navbar-brand navbar-logo" href="#">Sayur <span>Mayur</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 pe-3 ps-5">
        <li class="nav-item">
          <a class="nav-link active pe-3" aria-current="page" href="#">Halaman Awal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pe-3" href="halamaUtama.php">Menu utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inputData.php">Input data</a>
        </li>
      </ul>
      <div class="dropdown">  
          <ul class="dropdown-menu dropdown-menu-right mr-3">
              <li><a class="dropdown-item" href="login.php">Login</a></li>
          </ul>
          <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../assets/img/logo.png" width="50px">
          </a>
      </div>
    </div>
  </div>
</nav>
    <!-- navbar akhir -->

<!-- card awal -->
<div class="row mt-5 justify-content-center">
  <div class="col-md-6">
    <div class="card text-center shadow">
      <div class="card-body">
        <img src="../assets/img/logo.png" width="100px" class="mx-auto">
      </div>
      <div class="card-body">
        <h5 class="card-title">Kelompok 6</h5>
        <p class="card-text">Hai semuanya, berikut adalah anggota di kelompok 6</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between align-items-center ms-5">Ahmad Rafli Oktavianto <span class="me-5">221011402693</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center ms-5">Lutfi Fadhillah Putra <span class="me-5">221011402546</span></li>
        <li class="list-group-item d-flex justify-content-between align-items-center ms-5">Muhamad Zul Sa'ban <span class="me-5">221011402716</span></li>
      </ul>
      <div class="card-body">
      <button class="btn btn-primary border-radius"><a href="login.php" class="card-link text-white text-decoration-none px-3">Login Now</a></button>
      </div>
    </div>
  </div>
</div>
<!-- card akhir -->





    <!-- javascript feather icon -->
    <script>
      feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>