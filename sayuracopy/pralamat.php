<?php 

session_start();

if ( !isset($_SESSION["login"])) {
  // code...
	header("Location: login.php");
	exit;
}

require 'function.php';

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
              <li><a class="dropdown-item" href="halamaUtama.php">Kembali</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
<div class="container my-5 ">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center shadow">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link " href="profil.php">Biodata Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Daftar Alamat</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link " href="pembayaran.php">Pembayaran</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-sm-5 mb-3 mb-sm-0 ms-5">
                <div class="card" style="width: 25rem;">
                 <img src="../assets/img/zul.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary px-5" style="width: 15rem;">Pilih foto</a>
                    </div>
                </div>
                <div class="card mt-3 shadow" style="width: 25rem;">
                <a href="#" class="btn ">Buat kata sandi</a>
                </div>
                <div class="card mt-3 shadow" style="width: 25rem;">
                <a href="#" class="btn ">Pin sayur mayur</a>
                </div>
                <div class="card mt-3 shadow" style="width: 25rem;">
                <a href="#" class="btn ">Verifikasi instan</a>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="card-body text-start">
                        <h5 class="card-title fw-bold mb-3">Ubah data diri</h5>
                        <p class="card-text">Nama: <span class="ms-3">Muhamad zul Sa'ban</span></p>
                        <p class="card-text">Tanggal Lahir: <span class="ms-3">09-09-04</span></p>
                        <p class="card-text mb-5">Jenis Kelamin: <span class="ms-3">Laki-laki</span></p>
                        <h5 class="card-title fw-bold mb-3">Ubah Kontak</h5>
                        <p class="card-text">email: <span class="ms-3">Muhamad zul Sa'ban</span></p>
                        <p class="card-text">No Hp<span class="ms-3">0812 5897 7482</span></p>
                    </div>
                </div>
                </div>
            </div>
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