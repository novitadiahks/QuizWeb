<?php
require 'functions.php';

if (isset($_POST["submit"])) {

    if (insert($_POST) > 0) {
        echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'customer.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data gagal ditambahkan!');
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
    <link rel="stylesheet" href="style.css">
    <title>Insert New Customer</title>
</head>

<body>
    <div class="container">
        <img src="1.jpg" alt="">

        <nav>
            <ul>
                <li>
                  <a href="../index.php">Home</a>
                  <a href="../product/product.php">Product</a>
                  <a href="customer.php">Customer</a>
                  <a href="../transaksi/transaction.php">Transaction</a>
                </li>
            </ul>
        </nav>
        <h2 class="judul" >Insert New Customer</h2>

        <form class="insert_php" action="" method="POST">
            <label class="nama" for="nm_pembeli">Nama Pembeli</label>
            <label class="kelamin" for="jenis_kelamin">Jenis Kelamin (L/P)</label>
            <label class="alamat" for="alamat">Alamat</label>
            <label class="kota" for="kota">Kota</label>
            <br>
            <input type="text" name="nm_pembeli" required>
            <input type="text" name="jenis_kelamin" required>
            <input type="text" name="alamat" required>
            <input type="text" name="kota" required>
            <button class="button_tambah" type="submit" name="submit">Tambah Data</button>
        </form>
    </div>


</body>

</html>
