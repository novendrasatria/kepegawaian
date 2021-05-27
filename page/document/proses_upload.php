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
		$path = "filespangkat/".$file_name;
		$nip = 	$_POST['nip'];
		
		$koneksi->query("INSERT INTO `dokumen_file` VALUES('', '$name[0]', '$nip','$path','$tanggal')") or die(mysqli_error($mysqli));
		
		move_uploaded_file($file_temp, $path);
		header("location:../../index.php?page=dok_pangkat");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='../../index.php?page=upload_pangkat'</script>";
	}
}
?>
