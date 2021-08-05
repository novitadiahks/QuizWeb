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

        $nm_pembeli = htmlspecialchars($data["nm_pembeli"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);

        $query = "INSERT INTO pembeli VALUES ('', '$nm_pembeli', '$jenis_kelamin',
                    '$alamat', '$kota')";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function hapus($kd_pembeli){
        global $conn;
        mysqli_query($conn, "DELETE FROM pembeli WHERE kd_pembeli = $kd_pembeli");
        return mysqli_affected_rows($conn);
    }

    function ubah ($data){
        global $conn;

        $kd_pembeli = $data["kd_pembeli"];
        $nm_pembeli = htmlspecialchars($data["nm_pembeli"]);
        $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);

        $query = "UPDATE pembeli SET
                    nm_pembeli = '$nm_pembeli',
                    jenis_kelamin = '$jenis_kelamin',
                    alamat  = '$alamat',
                    kota = '$kota'
                    WHERE kd_pembeli = $kd_pembeli";
        
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function cari($kataKunci,$isiField){
        $query = "SELECT * FROM pembeli WHERE $isiField LIKE '%$kataKunci%'";
        return query($query);  
    }

?>