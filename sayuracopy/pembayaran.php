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
    <style>
    .star-full:before {
        font-size: 1rem;
        content: "\2605"; /* Menambahkan bintang penuh menggunakan karakter Unicode */
       /* Warna untuk bintang penuh */
    }
</style>
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
          <a class="nav-link pe-3" aria-current="page" href="#">Halaman Awal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active pe-3" href="halamaUtama.php">Menu utama</a>
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
                            <a class="nav-link" href="profil.php">Biodata Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">View Sayur</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="#">Pembayaran</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
            <div class="row">
                    <div div class="col-sm-5">
                        <div class="card-body text-start">
                            <h5 class="card-title fw-bold mb-3 btn" style="padding: 1px; font-style: italic; color: white; background-color: yellow;">Sayur Mayur</h5>
                            <p class="card-text" style="letter-spacing: 1px;">Kami memastikan setiap produk sayuran dilengkapi dengan informasi yang lengkap dan jelas. Setiap sayuran disertai dengan gambar yang menarik perhatian, memungkinkan Anda melihat dengan jelas kualitas dan kondisi sayuran yang Anda pilih.</p>
                            <p>Nama Produk: <span class="fw-bold">Terong</p>
                            <p>Total Harga: <span class="fw-bold">Rp. 10.000</span></p>
                            <div class="product-stars justify-content-left" style="text-align: left; margin-top: 20px;">
                                <i class="star-full" style="color: yellow"></i>
                                <i class="star-full" style="color: yellow"></i>
                                <i class="star-full" style="color: yellow"></i>
                                <i class="star-full"></i>
                                <i class="star-full"></i>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-7 mb-3 mb-sm-0 mx-auto">
                    <div class="card ms-3" style="width: 38rem;">
                    <img src="../assets/img/terong.jpg" class="card-img-top">
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="card text-center">
                <div class="card-footer">
                <ul class="nav nav-pills card-footer-pills justify-content-center">
                    <li class="nav-item ">
                        <a class="nav-link active pt-2 fs-6" href="halamaUtama.php" style="width: 300px; height:40px;">Kembali & beli sekarang!</a>
                    </li>
                </ul>
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