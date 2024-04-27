<?php 

require 'function.php';

$Id = $_GET["id"];

if ( hapus($Id) > 0 ) {
    echo "
        <script>
            alert('data berhasil di hapus');
            document.location.href = 'halamaUtama.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal di hapus');
            document.location.href = 'halamaUtama.php';
        </script>
    ";
}

