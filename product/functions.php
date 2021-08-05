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

        $kode = ($data["kd_brg"]);
        $nama = htmlspecialchars($data["nm_brg"]);
        $merk = htmlspecialchars($data["merk"]);
        $type = htmlspecialchars($data["type"]);
        $harga = htmlspecialchars($data["harga"]);
        $stok = htmlspecialchars($data["stok"]);

        $query = "INSERT INTO barang VALUES ('$kode', '$nama', '$merk','$type', '$harga', '$stok')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($kd_brg){
        global $conn;
        mysqli_query($conn, "DELETE FROM barang WHERE kd_brg = $kd_brg");
        return mysqli_affected_rows($conn);
    }

    function ubah($data){
        global $conn;

        $kode = ($data["kd_brg"]);
        $nama = htmlspecialchars($data["nm_brg"]);
        $merk = htmlspecialchars($data["merk"]);
        $type = htmlspecialchars($data["type"]);
        $harga = htmlspecialchars($data["harga"]);
        $stok = htmlspecialchars($data["stok"]);

        $query = "UPDATE barang SET
                    nm_brg = '$nama',
                    merk  = '$merk',
                    type = '$type',
                    harga  = '$harga',
                    stok = '$stok'
                    WHERE kd_brg = $kode";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function cari($kataKunci,$isiField){
        $query = "SELECT * FROM barang WHERE $isiField LIKE '%$kataKunci%'";
        return query($query);
    }

?>
