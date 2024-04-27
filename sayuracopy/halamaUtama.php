<?php 

session_start();

if ( !isset($_SESSION["login"])) {
	// code...
    echo "
        <script>
        alert('Silahkan login terlebih dahulu');
        document.location.href = 'login.php';
        </script>
    ";
	// header("Location: login.php");
	exit;
}

require 'function.php';
$sayuran = query("SELECT * FROM sayuran ORDER BY id DESC");

if ( isset($_POST["cari"]) ) {
	// code...
	$sayuran = cari($_POST["keyword"]);
}

// Tentukan berapa banyak item yang ingin ditampilkan per halaman
$itemsPerPage = 5;

// Tentukan halaman saat ini, defaultnya adalah 1
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung jumlah total halaman berdasarkan jumlah item dan item per halaman
$totalPages = ceil(count($sayuran) / $itemsPerPage);

// Hitung indeks awal dan akhir item untuk halaman saat ini
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage;


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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
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
          <a class="nav-link pe-3" aria-current="page" href="halamaAwal.php">Halaman Awal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active pe-3" href="#">Menu utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inputData.php">Input data</a>
        </li>
      </ul>
      <div class="dropdown">  
          <ul class="dropdown-menu dropdown-menu-right mr-3">
              <li><a class="dropdown-item" href="profil.php">Profile</a></li>
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

    <!-- cari awal -->
    <div class="container col-md-6 mt-4 text-center mb-3">
        <h3 class="menu">Selamat berbelanja</h3>
        <form action="" method="post">
        <div class="input-group my-3 shadow">
            <input type="text" name="keyword" class="form-control" placeholder="Cari barang...">
            <button class="btn btn-outline-warning btn-primary text-white" type="submit" name="cari" id="tombol-cari">Cari</button>
        </div>
    </form>
    </div>
<!-- cari akhir -->

<!-- card awal -->

<div class="container">
    <div class="row justify-content-center mb-3">
    <?php for ($i = $startIndex; $i < $endIndex && $i < count($sayuran); $i++) : ?>
    <div class="col-md-4">
        <div class="card mb-3 shadow">
            <img src="../assets/img/<?php echo $sayuran[$i]["gambar"]; ?>" class="card-img-top" width="400px" height="250px">
            <div class="card-body">
                <h5 class="card-title"><?= $sayuran[$i]["nama"] ?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <span class="text-primary">Rp. 10.000-.</span>
                <a href="pembayaran.php" class="btn btn-primary ms-3">Beli sekarang!</a>
            </div>
        </div>
    </div>
<?php endfor; ?>
    </div> 
</div>
<!-- card akhir -->

<!-- footer -->
<!-- footer -->
<div class="container mt-3 d-flex justify-content-between align-items-center mb-3">
    <div>
        <i class="text-primary" data-feather="arrow-left"></i>  
        <a href="halamaAwal.php" class="text-decoration-none ">
            Kembali ke halaman awal
        </a>
    </div>
    
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php if ($currentPage > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            
            <?php if ($currentPage < $totalPages) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<!-- footer akhir -->
<!-- footer -->
<footer class="bg-dark text-white text-center py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Informasi</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor velit euismod, aliquam metus ut, fermentum nisi.</p>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                <p>Alamat: Jalan Lorem Ipsum Dolor Sit Amet, Consectetur, 12345</p>
                <p>Email: info@example.com</p>
                <p>Telepon: 123-456-7890</p>
            </div>
            <div class="col-md-4">
                <h5>Ikuti Kami</h5>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- footer akhir -->

<!-- footer akhir -->

<!-- javascript feather icon -->
    <script>
      feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>