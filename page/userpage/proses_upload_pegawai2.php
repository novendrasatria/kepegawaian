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
		$path = "../document/filespegawai/".$file_name;
		$nip = 	$_POST['nip'];
		
		$koneksi->query("INSERT INTO `dokumen_filepegawai` VALUES('', '$name[0]', '$nip','$path','$tanggal')") or die(mysqli_error());
		
		move_uploaded_file($file_temp, $path);
		header("location:../../index2.php?page=dok_pegawai2");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='../../index2.php?page=dok_pegawai2'</script>";
	}
}
//http://tekno-sukapedia.blogspot.com/2016/10/membuat-fitur-upload-dan-download-file.html
?>