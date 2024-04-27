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

// jika nama dicari maka timpakan data nyah
if ( isset($_POST["cari"]) ) {
	// code...
	$sayuran = cari($_POST["keyword"]);
}

if (isset($_POST["submit"])) {
  if (tambah($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href = 'inputData.php';
    </script>
    ";
  }else {
    echo "
    <script>
      alert('data gagal ditambahkan!');
      document.location.href = 'inputData.php';
    </script>
    ";
  }
}

// Tentukan berapa banyak item yang ingin ditampilkan per halaman
$itemsPerPage = 10;

// Tentukan halaman saat ini, defaultnya adalah 1
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung jumlah total halaman berdasarkan jumlah item dan item per halaman
$totalPages = ceil(count($sayuran) / $itemsPerPage);

// Hitung indeks awal dan akhir item untuk halaman saat ini
$startIndex = ($currentPage - 1) * $itemsPerPage;
$endIndex = $startIndex + $itemsPerPage;


// UBAH DATA
// mengambil data dari url

// mengambil data dari database berdasarkan id

if (isset($_POST["submite"])) {

    // cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'halamaUtama.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'halamaUtama.php';
            </script>
        ";
    }

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
              <a class="nav-link pe-3" href="halamaUtama.php">Menu utama</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Input data</a>
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
        <h3 class="menu">Selamat Datang Admin</h3>
        <form action="" method="post">
        <div class="input-group my-3 shadow">
            <input type="text" name="keyword" class="form-control" placeholder="Cari barang...">
            <button class="btn btn-outline-warning btn-primary text-white" type="submit" name="cari" id="tombol-cari">Cari</button>
        </div>
    </form>
    </div>
<!-- cari akhir -->



<!-- footer -->
<div class="container mt-3 d-flex justify-content-between align-items-center mb-3">
    <div>
        <button type="button" class="btn btn-white text-primary border-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Sayur
        </button>
    </div>
    <nav aria-label="Page navigation example ">
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

<!-- list data awal -->
<div class="container mb-5">
    <div class="row shadow-lg justify-content-center py-4">
      <?php 
        // Hitung nomor awal untuk setiap halaman
        $startNumber = ($currentPage - 1) * $itemsPerPage + 1;
        // Loop untuk menampilkan data buah
        for($i = $startIndex; $i < $endIndex && $i < count($sayuran); $i++) : ?>
        <div class="col-md-9 ">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center shadow mb-1">
                <div class="d-flex p-3">
                  <!-- Tampilkan nomor dinamis sesuai dengan nomor awal untuk setiap halaman -->
                  <span class="mx-2"><?php echo $startNumber; ?>.</span>
                  <span><?php echo $sayuran[$i]["nama"]; ?></span>
                </div>
                <div class="d-flex gap-2">
                    <span class="badge text-dark px-5 ms-5">Rp. 10.000 -,</span>
                    <span class="badge text-bg-primary rounded-pill"><a href="view.php" class="text-decoration-none text-white">view</a></span>
                    <span class="badge text-bg-success rounded-pill"><a href="edit.php?id=<?php echo $sayuran[$i]["id"]; ?>" class="text-decoration-none text-white" onclick="return confirm('Apakah anda yakin ingin mengedit data ini?')">edit</a></span>
                    <span class="badge text-bg-danger rounded-pill"><a href="hapus.php?id=<?php echo $sayuran[$i]["id"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="text-decoration-none text-white">hapus</a></span>
                </div>
              </li>
            </ul>
        </div>
        <?php 
            // Tambahkan 1 ke nomor setiap kali loop
            $startNumber++;
        ?>
        <?php endfor; ?>
    </div>
</div>
<!-- list data akhir -->


<!-- modal tambah data awal -->
<div class="modal fade mt-5" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Sayur Mayur</h1>
        <button type="button" class="btn-close tombolTambahData" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">       
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" class="form-control" id="gambar" name="gambar" onchange="previwImage()">
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal tambah data akhir -->


<!-- javascript feather icon -->
    <script>
      feather.replace();
    </script>
    <!-- scrip preview gambar -->
    <script>
      function previwImage(){
      const gambar = document.querySelector('#gambar');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(gambar.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>