<?php
$conn = mysqli_connect("localhost", "root", "", "tugas");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah
function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);

    // jalankan fungsi gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO sayuran VALUES
                ('', '$nama', '$gambar')";
    mysqli_query($conn, "$query");
    return mysqli_affected_rows($conn);
}
// fungsi upload
function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }
    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG','JPEG','PNG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
              </script>";
        return false;
    }
    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }
    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
    return $namaFileBaru;
}

// fungsi hapus dataa
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM sayuran WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// fungsi hapus data
function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE sayuran SET
                nama = '$nama',
                gambar = '$gambar'
                WHERE id = $id";
    mysqli_query($conn, "$query");
    return mysqli_affected_rows($conn);
}
// function cari data awal
function cari($keyword) {
    $query = "SELECT * FROM sayuran 
                            WHERE
                        nama LIKE '%$keyword%' 
                        ";
    return query($query);
    
}
// function cari data akhir

// fungsi registrasi awal
function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username udah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result) ) {
		// code...
		echo "<script>
						alert('username sudah terdaftar')
					</script>";
					return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2) {
		// jika passwor tidak sesuai dengan password salah maka konfirmasi dibawah ini
		echo "<script>
						alert('password tidak sesuai')
					</script>";
					return false;
	}

	//enkripsi password / mengamankan password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru kedatabase
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}
// funsi registrasi akhir   