<?php
	session_start();
    include "page/koneksi.php";
    $NIP = $_GET['NIP'];
	
	$sql= ("DELETE pangkat, dokumen_file FROM pangkat 
						INNER JOIN dokumen_file
						WHERE pangkat.NIP = dokumen_file.NIP and dokumen_file.NIP = '$NIP'");

	mysqli_query($koneksi, $sql);
		
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=dok_pangkat' </script>";
?>
