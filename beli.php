<?php 
	session_start();
	$kode = addslashes(trim($_GET['kode']));
	$sesi = session_id();
	
	include "admin/pages/koneksi.php";
	
	$sql = "SELECT * FROM tbl_keranjang WHERE kodebrg = '$kode' AND session = '$sesi'";
	$query = mysqli_query($koneksi, $sql);
	if(mysqli_num_rows($query) > 0){
		$sql = "UPDATE tbl_keranjang SET jumlah=jumlah+1 WHERE kodebrg = '$kode' AND session = '$sesi'";
	}else{
		$sql = "INSERT INTO tbl_keranjang(session,kodebrg,jumlah) VALUES('$sesi','$kode','$byk')";
	}
	$query = mysqli_query($koneksi, $sql);
	if($query){
		echo "<script>
				alert('Produk sudah masuk keranjang');
				location.href = 'index.php';
			  </script>";
	}else{
		echo mysqli_error($koneksi);
	}
?>