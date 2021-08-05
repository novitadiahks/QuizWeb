<?php
require 'functions.php';

$kd_pembeli = $_GET["kd_pembeli"];

$dataUbah = query("SELECT * FROM pembeli WHERE kd_pembeli = $kd_pembeli")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'customer.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'customer.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Customer</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <img src="1.jpg" alt="">

        <nav>
            <ul>
                <li>
                    <a href="">Home</a>
                    <a href="">Product</a>
                    <a href="customer.php">Customer</a>
                    <a href="">Transaction</a>
                </li>
            </ul>
        </nav>
        <h2 class="judul">Ubah Data Pelanggan</h2>

        <form class="ubah_php" action="" method="POST">
            <input type="hidden" name="kd_pembeli" value="<?= $dataUbah["kd_pembeli"]; ?>">
            <label class="nama" for="nm_pembeli">Nama Pembeli</label>
            <label class="kelamin" for="jenis_kelamin">Jenis Kelamin (L/P)</label>
            <label class="alamat" for="alamat">Alamat</label>
            <label class="kota" for="kota">Kota</label>
            <br>

            <input type="text" name="nm_pembeli" required value="<?= $dataUbah["nm_pembeli"]; ?>">
            <input type="text" name="jenis_kelamin" required value="<?= $dataUbah["jenis_kelamin"]; ?>">
            <input type="text" name="alamat" required value="<?= $dataUbah["alamat"]; ?>">
            <input type="text" name="kota" required value="<?= $dataUbah["kota"]; ?>">
            <button class="button_ubah" type="submit" name="submit">Ubah Data</button>

        </form>
    </div>
</body>

</html>