<?php
 session_start();
require 'function.php';

if ( isset($_SESSION["login"]) ) {
    // code...
    header("Location: halamaUtama.php"); 
    exit;
}

// Periksa apakah formulir login telah dikirim
if ( isset($_POST["login"]) ) {
	// apakah tombol login sudah ditekan atau belum
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE 
			username = '$username'");

	// cek username
	if ( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) {
			// setting sesion
			$_SESSION["login"] = true;

			header("Location: halamaUtama.php");
			exit;
		}
	}

	$error = true;

    $error = "
    <script>
      alert('Username dan Password salah!');
      window.location.href = 'login.php';
    </script>
    ";

    echo $error;

	
}

?>

<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">
    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/login.css">
    <style>
        /* Gaya untuk h3 dalam formulir registrasi */
        form[action="login.php"] h3 {
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
                <!-- Tambahkan tautan Kembali di sudut kanan atas -->
                <!-- <a href="javascript:history.go(-1);" class="btn-close btn-close-dark position-absolute" style="top: 10px; right: 10px;" aria-label="Close"></a> -->
                <a href="halamaAwal.php" class="btn-close btn-close-dark position-absolute" style="top: 10px; right: 10px;" aria-label="Close"></a>
                <div class="card-body">
                    <img src="../assets/img/logo.png" width="80px" class="login mx-auto  mt-2" alt="Logo">
                </div>
                <form action="login.php" method="post" class="px-4 text-left">
                    <div class="login"></div>
                    <h3 class="login text-center mb-5">Halaman Login</h3>
                    <div class="form-group mt-5">
                        <label for="username">Nama Pengguna</label>
                        <input type="text" class="form-control form-control-sm" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control form-control-sm" id="password" name="password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary px-4 my-3">Masuk</button>
                </form>
                <small class="mb-3">Belom punya akun? <a href="registrasi.php">Daftar disini!</a></small>
            </div>
        </div>
    </div>
</body>

</html>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
