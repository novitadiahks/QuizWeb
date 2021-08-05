<?php
    require 'functions.php';

    $kd_brg = $_GET["kd_brg"];

    if(hapus($kd_brg) > 0){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'product.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'product.php';
            </script>
        ";
    }
?>
