<?php 
 session_start();
 require 'function.php';
 
 if ( isset($_SESSION["login"]) ) {
     // code...
        header("Location: halamaUtama.php"); 
     exit;
 }

if ( isset($_POST["register"]) ) {
		// jika register di pencet, maka jalankan halaman register nyah
	if ( registrasi($_POST) > 0 ) {
		// jika benar tampilkan dibawah ini
		echo "<script>
        alert('user baru berhasil ditambahkan!, silahkan login');
        document.location.href = 'login.php';
			</script>";
	}else {
		echo mysqli_error($conn);
	}   
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/login.css">
    <style>
        /* Gaya untuk h3 dalam formulir registrasi */
        form[action="registrasi.php"] h3 {
            font-family: "Caveat", cursive;
            font-size: 2rem;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="col-md-6 mx-auto">
            <div class="card text-center shadow">
                <div class="card-body">
                    <img src="../assets/img/logo.png" width="80px" class="login mx-auto  mt-2" alt="Logo">
                </div>
                <form action="registrasi.php" method="post" class="px-4 text-left">
                    <h3 class="judul-registrasi text-center mb-5">Halaman Registrasi</h3>
                    <div class="form-group mt-5">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control form-control-sm" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password2">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" id="password2" name="password2">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary px-4 my-3">Daftar</button>
                </form>
                <small class="mb-3">Sudah punya akun? <a href="login.php">Login sekarang!</a></small>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
