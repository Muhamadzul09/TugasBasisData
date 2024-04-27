<?php 

session_start();

if ( !isset($_SESSION["login"])) {
	// code...
	header("Location: login.php");
	exit;
}

require 'function.php';

// mengambil data dari url
$Id = $_GET["id"];

// mengambil data dari database berdasarkan id
$data = query("SELECT * FROM sayuran WHERE id = $Id")[0];

if (isset($_POST["submit"])) {

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
        <div class="input-group my-3 shadow">
            <input type="text" class="form-control" placeholder="Cari barang...">
            <button class="btn btn-outline-warning btn-primary text-white" type="button" id="button-addon2">Button</button>
        </div>
    </div>
<!-- cari akhir -->



<!-- footer -->
<div class="container mt-3 d-flex justify-content-between align-items-center mb-3">
    <div>
        <button type="button" class="btn btn-white text-primary border-primary" data-bs-toggle="modal" data-bs-target="#formModal">
            Tambah Data Sayur
        </button>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div>
<!-- footer akhir -->



<!-- modal tambah data awal -->
  <!-- Modal -->
  <div class="modal fade mt-5 show" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Ubah Data Sayur Mayur</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?php echo $data["gambar"]; ?>">
          <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo isset($data["nama"]) ? $data["nama"] : ''; ?>">
          </div>
          <div class="form-group">
            <label for="gambar">Gambar:</label>
            <br>
            <?php if(!empty($data["gambar"])): ?>
            <img class="img-preview img-fluid mb-3 col-sm-5" src="../assets/img/<?php echo $data["gambar"]; ?>" alt="Preview Gambar">
            <?php endif; ?>
            <input type="file" class="form-control" id="gambar" name="gambar" onchange="previwImage()" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal"><a href="inputData.php" class="text-decoration-none text-white">Close</a></button>
        <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

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