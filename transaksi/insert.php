<?php
    require 'functions.php';

    if(isset($_POST["submit"])){

        if(insert($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'transaction.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan!');
                    document.location.href = 'transaction.php';
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
    <title>Insert New Product</title>
</head>
<body>
    <div class="container">
        <img src="1.jpg" alt="">

        <nav>
            <ul>
                <li>
                    <a href="../index.php">Home</a>
                    <a href="../product/product.php">Product</a>
                    <a href="../customer/customer.php">Customer</a>
                    <a href="transaction.php">Transaction</a>
                </li>
            </ul>
        </nav>
        <h2 class="judul" >Insert New Transaction</h2>

        <form class="insert_php" action="" method="POST">
            <label style="margin-right: 132px;" for="kr_brg">Kode Barang</label>
            <label for="kd_pembeli">Kode Pembeli</label>
            <br>
            <input style="width: 200px;" type="text" name="kd_brg" required>
            <input style="width: 200px;" type="text" name="kd_pembeli" required>
            <button class="button_tambah" type="submit" name="submit">Tambah Data</button>
        </form>
    </div>
</body>
</html>
