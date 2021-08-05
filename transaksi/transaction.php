<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ../home/login.php");
        exit;
    }
    require 'functions.php';
    $trans = query("SELECT t.kd_trx, t.tgl_beli, concat(concat(p.nm_pembeli, ' - '), p.kota) AS pembeli,
             concat(concat(b.nm_brg, ' - '), b.type) AS barang, b.harga FROM transaksi t
             INNER JOIN barang b ON t.kd_brg=b.kd_brg INNER JOIN pembeli p ON t.kd_pembeli=p.kd_pembeli");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Transaction</title>
</head>
<body>
    <div class="container">

        <img src="1.jpg" alt="">

        <nav>
            <ul>
                <li>
                  <a href="../index.php">Home</a>
                  <a href="../product/product.php">Product</a>
                  <a href="../Customer/customer.php">Customer</a>
                  <a href="transaction.php">Transaction</a>
                </li>
            </ul>
            <ul style="text-align: right">
                <li>
                    <a>Active user: <?php echo $_SESSION["username"] ?></a>
                    <a href="../home/logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <header>
            <h1>Transaction Page</h1>
        </header>

        <a class="newTran" href="insert.php">Tambah Transaksi</a>
        <div class="clear"></div>

        <div class="tabel">
            <table >
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Detail Pembeli</th>
                    <th>Detail Barang</th>
                    <th>Harga Barang</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach($trans as $row) : ?>
                <tr>
                    <td class="kd_trx"><?= $row["kd_trx"]; ?></td>
                    <td><?= $row["tgl_beli"]; ?></td>
                    <td><?= $row["pembeli"]; ?></td>
                    <td><?= $row["barang"]; ?></td>
                    <td><?= $row["harga"]; ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>
