<?php
if($_POST){
	if(!isset($_POST['operasi']) || !$_POST['operasi']){
		echo 'Pilih Jenis Operasi';
	}else if(!isset($_POST['a']) || !$_POST['a']){
		echo 'Input Bilangan Pertama';
	}else if(!isset($_POST['b']) || !$_POST['b']){
		echo 'Input Bilangan Kedua';
	}else if(!is_numeric($_POST['a']) || !$_POST['a']){
		echo 'Input Bilangan Pertama dengan Angka';
	}else if(!is_numeric($_POST['b']) || !$_POST['b']){
		echo 'Input Bilangan Kedua dengan Angka';
	}else if(isset($_POST['a'])){
		$a=$_POST['a'];
		$b=$_POST['b'];
		$operasi=$_POST['operasi'];
		if($operasi=="tambah"){
			$c=$a+$b;
			echo "Hasil penjumlahan $a + $b = $c";
		}else{
			$c=$a-$b;
			echo "Hasil Pengurangan $a - $b = $c";
		}
	}
}
?> 