<?php
require_once "../koneksi.php";
date_default_timezone_set('Asia/Jakarta');
if(ISSET($_POST['submit'])){
	if($_FILES['upload']['name'] != "") {
		$tanggal = date('Y-m-d H:i:s');
		$file = $_FILES['upload'];
		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$name = explode('.', $file_name);
		$path = "../document/filespnsiun/".$file_name;
		$nip = 	$_POST['nip'];
		
		
		$mysqli->query("INSERT INTO `pensiun` VALUES('', '$nip','$path','$name[0]','$tanggal')") or die(mysqli_error($mysqli));
		
		move_uploaded_file($file_temp, $path);
		header("location:../../index2.php?page=upload_pensiun2");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='../../index2.php?page=upload_pensiun2'</script>";
	}
}
?>
