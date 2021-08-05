<?php 
session_start(); //memulai session
session_destroy(); //menghapus semua yang disimpan di session saat ini
?>

<!DOCTYPE html>
<html>
    <head>
    <title>
        Kalkulator Sederhana
    </title>
    </head>
    <body>
        <center>
            <?php
            if(isset($_POST['submit'])):
            //membuat session array dengan variabel - variabel POST
                $_SESSION['pos']=$_POST;
            endif;
            if(isset($_SESSION['pos'])):
                $a =$_SESSION['pos']['a'];
                $b =$_SESSION['pos']['b'];
            else:
                $a   ='';
                $b ='';
            endif;
            ?>
            <form action="" method="post">
                <h4>Kalkulator Sederhana</h4>
                Inputan 1 <input type="text"  name="a" value="<?php echo $a; ?>"><br><br>
                Inputan 2 <input type="text"  name="b" value="<?php echo $b; ?>"><br><br>
                Operasi:
                <input type="radio" name="operasi" value="tambah" >Penjumlahan
                <input type="radio" name="operasi" value="kurang" >Pengurangan<br><br>
                <input type="submit" name="submit" value="Hitung" ><br><br>
            </form>
            <?php require 'operasi.php'?>
        </center>
    </body>
</html>