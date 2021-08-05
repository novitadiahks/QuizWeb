<?php
require 'functions.php';

$kd_brg = $_GET["kd_brg"];

$dataUbah = query("SELECT * FROM barang WHERE kd_brg = $kd_brg")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
                <script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'product.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal diubah!');
                    document.location.href = 'product.php';
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
        </nav>
        <h2 class="judul">Ubah Data Barang</h2>

        <form class="ubah_php" action="" method="POST">
            <input type="hidden" name="kd_brg" value="<?= $dataUbah["kd_brg"]; ?>">
            <label style="margin-right: 127px;" for="nm_brg">Nama Barang</label>
            <label style="margin-right: 190px;" for="merk">Merk</label>
            <label style="margin-right: 191px;" for="type">Tipe</label>
            <label style="margin-right: 91px;" for="harga">Harga</label>
            <label for="stok">Stok</label>
            <br>

            <input style="width: 200px;" type="text" name="nm_brg" required value="<?= $dataUbah["nm_brg"]; ?>">
            <input style="width: 200px;" type="text" name="merk" required value="<?= $dataUbah["merk"]; ?>">
            <input style="width: 200px;" type="text" name="type" required value="<?= $dataUbah["type"]; ?>">
            <input style="width: 110px;" type="text" name="harga" required value="<?= $dataUbah["harga"]; ?>">
            <input style="width: 100px;" type="text" name="stok" required value="<?= $dataUbah["stok"]; ?>">
            <button class="button_ubah" type="submit" name="submit">Ubah Data</button>

        </form>
    </div>
</body>

</html>
