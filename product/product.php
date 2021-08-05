<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ../home/login.php");
        exit;
    }
    require 'functions.php';
    $customer = query("SELECT * FROM barang");

    if(isset($_POST["cari"])){
        $customer = cari($_POST["kataKunci"],$_POST["selectionField"]);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Product</title>
</head>
<body>
    <div class="container">
        <img src="1.jpg" alt="">

        <nav>
            <ul>
                <li>
                    <a href="../index.php">Home</a>
                    <a href="product.php">Product</a>
                    <a href="../customer/customer.php">Customer</a>
                    <a href="../transaksi/transaction.php">Transaction</a>
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
            <h1>Product Page</h1>
        </header>

        <a class="newCustomer" href="insert.php">Tambah Produk</a>
        <div class="clear"></div>

        <div class="input">
            <form action="" method="POST">
                <label for="selectionFiled">Cari Berdasarkan</label>
                <label for="kataKunci">Pencarian</label>
                <br>
                <select class="selectionField" name="selectionField" id="selectionField">
                    <option value="kd_brg">Kode</option>
                    <option value="nm_brg">Nama Barang</option>
                    <option value="merk">Merk</option>
                    <option value="type">Type</option>
                    <option value="harga">Harga</option>
                    <option value="stok">Stok</option>
                </select>

                <input type="search" name="kataKunci" id="kataKunci" placeholder="Masukkan kata kunci" autocomplete="off">
                <button class="button_cari" type="submit" name="cari">Cari</button>

            </form>

        </div>

        <div class="tabel">
            <table >
                <tr>
                    <th>Nomor</th>
                    <th>Kode</th>
                    <th>Nama barang</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Edit?</th>
                    <th>Hapus?</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach($customer as $row) : ?>
                <tr>
                    <td class="nomor"><?= $i; ?></td>
                    <td class="kd_pembeli"><?= $row["kd_brg"]; ?></td>
                    <td class="nm_pembeli"><?= $row["nm_brg"]; ?></td>
                    <td><?= $row["merk"]; ?></td>
                    <td><?= $row["type"]; ?></td>
                    <td><?= $row["harga"]; ?></td>
                    <td><?= $row["stok"]; ?></td>
                    <td>
                        <a class="ubah" href="ubah.php?kd_brg=<?= $row["kd_brg"]; ?>">ubah</a>
                    </td>
                    <td>
                        <a class="hapus" href="hapus.php?kd_brg=<?= $row["kd_brg"]; ?>"
                            onclick="return confirm('Apakah data yang dipilih sudah benar?');">hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>
