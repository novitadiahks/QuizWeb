<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ../login.php");
        exit;
    }
    require 'functions.php';
    $customer = query("SELECT * FROM pembeli");

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
    <title>Customer</title>
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
            <ul style="text-align: right">
                <li>
                    <a>Active user: <?php echo $_SESSION["username"] ?></a>
                    <a href="../home/logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <header>            
            <h1>Customer Page</h1>
        </header>

        <a class="newCustomer" href="insert.php">Tambah Pelanggan</a>
        <div class="clear"></div>

        <div class="input"> 
            <form action="" method="POST">
                <label for="selectionFiled">Cari Berdasarkan</label>
                <label for="kataKunci">Pencarian</label>
                <br>
                <select class="selectionField" name="selectionField" id="selectionField">
                    <option value="nm_pembeli">Nama</option>
                    <option value="jenis_kelamin">Jenis Kelamin</option>
                    <option value="alamat">Alamat</option>
                    <option value="kota">Kota</option>
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
                    <th>Nama Pembeli</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Edit?</th>
                    <th>Hapus?</th>
                </tr>

                <?php $i = 1; ?>
                <?php foreach($customer as $row) : ?>
                <tr>
                    <td class="nomor"><?= $i; ?></td>
                    <td class="kd_pembeli"><?= $row["kd_pembeli"]; ?></td>
                    <td class="nm_pembeli"><?= $row["nm_pembeli"]; ?></td>
                    <td><?= $row["jenis_kelamin"]; ?></td>
                    <td class="alamat"><?= $row["alamat"]; ?></td>
                    <td><?= $row["kota"]; ?></td>
                    <td>
                        <a class="ubah" href="ubah.php?kd_pembeli=<?= $row["kd_pembeli"]; ?>">ubah</a>
                    </td>
                    <td>
                        <a class="hapus" href="hapus.php?kd_pembeli=<?= $row["kd_pembeli"]; ?>"
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
