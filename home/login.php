<?php
session_start();
require 'sqlConnect.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["pass"])) {
            header("Location: ../index.php");
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <img src="img/1.jpg" alt="Banner">
        <nav>

        </nav>
        <center>
            <header>
                <h1>Login Page</h1><br><br>
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
                </table>
                <br><br>
                <?php if (isset($error)) : ?>
                    <script> alert ('WARNING!!! Username atau Password Salah!')</script>;
                   <p style=" color: red; font-style: italic;">Username atau Password Salah</p>
                <?php endif; ?>
                <div class="btn">
                    <input type="submit" name="login" value="LOGIN">
                </div>
                <div>
                    <a href="registrasi.php" style="text-decoration:none; font-family: sans-serif;">
                    Belum punya akun? Ayo Register Sekarang!!!</a>
                </div>
            </form>

        </center>
    </div>
</body>

</html>