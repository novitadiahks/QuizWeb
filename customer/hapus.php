<?php
    require 'functions.php';

    $kd_pembeli = $_GET["kd_pembeli"];

    if(hapus($kd_pembeli) > 0){
        echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'customer.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'customer.php';
            </script>
        ";
    }
?>