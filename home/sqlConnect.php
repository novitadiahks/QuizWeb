<?php
    $conn = mysqli_connect("localhost", "root", "", "quizweb");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    function registrasi($data){
        global $conn;
        $username = strtolower($data["username"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)){
            echo "<script> alert ('WARNING!!! Username sudah terdaftar!');</script>";
            return false;
        }

        if( $password !== $password2 ){
            echo "<script> alert ('WARNING!!! Password tidak sesuai!');</script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
        return mysqli_affected_rows($conn);

    }

?>