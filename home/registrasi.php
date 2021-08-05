<?php
require 'sqlConnect.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script> alert ('user berhasil ditambahkan');</script>";
        header("Location: login.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registrasi</title>
</head>

<body>
    <div class="container">
        <img src="img/1.jpg" alt="Banner">
        <nav></nav>
        <center>
            <header>
                <h1>Registrasi Page</h1><br><br>
            </header>
            <form action="" method="POST">
                <table style="width:50%; margin-top: 35px;">
                    <div class="form">
                        <tr>
                            <td><label for="username">Username :</label></td>
                            <td><input type="text" name="username" id="username"></td>
                        </tr>
                    </div>
                    <tr>
                        <td><label for="password">Password :</label></td>
                        <td><input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Konfirmasi Password :</label></td>
                        <td><input type="password" name="password2" id="password2"></td>
                    </tr>
                </table><br><br>
                <div class="btn">
                    <input type="submit" name="register" value="REGISTER">
                </div>
                <div>
                    <a href="login.php" style="text-decoration:none; font-family: sans-serif;">
                    Sudah punya akun? Ayo Login Sekarang!!!</a>
                </div>
            </form>
        </center>
    </div>
</body>

</html>