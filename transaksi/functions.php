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

    function insert($data){
        global $conn;
        $kd_brg = htmlspecialchars($data["kd_brg"]);
        $kd_pembeli = htmlspecialchars($data["kd_pembeli"]);
        $tgl_beli = date("Y-m-d H:i:s");
        //query insert data
        $query = "INSERT INTO transaksi
                    VALUES ('','$kd_brg','$kd_pembeli','$tgl_beli')
                ";
        mysqli_query($conn, $query );

        return mysqli_affected_rows($conn);
    }
?>
