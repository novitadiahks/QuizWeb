<?php
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: home/login.php");
        exit;
    }
    require 'home/sqlConnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home/style.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <img src="home/img/1.jpg" alt="Banner">
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                    <a href="product/product.php">Product</a>
                    <a href="customer/customer.php">Customer</a>
                    <a href="transaksi/transaction.php">Transaction</a>

                </li>
            </ul>
            <ul style="text-align: right">
                <li>
                    <a>Active user: <?php echo $_SESSION["username"] ?></a>
                    <a href="home/logout.php">Logout</a>
                </li>
            </ul>
        </nav>

        <header style="text-align: center">
            <h1>Home Page</h1>
        </header>
        <center>
            <div>
                <br>
                <h2><?php echo "Selamat Datang, ";
                    echo $_SESSION["username"]; ?></h2>
            </div>
        </center>
        <center>
            <div style="margin-top: 100px">
                <a href="product/product.php">
                    <img style="float:left; width: 200px; margin-left: 150px;" src="home/img/product.png" alt="Product">
                </a>
                <a href="customer/customer.php">
                    <img style="width: 200px" src="home/img/customers.png" alt="Customers">
                </a>
                <a href="transaksi/transaction.php">
                    <img style="float:right;width: 200px; margin-right: 150px;" src="home/img/transaksi.png" alt="Transaksi">
                </a>
            </div>

        </center>

    </div>
</body>

</html>