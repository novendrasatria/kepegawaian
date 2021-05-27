<?php
	session_start();
    include "page/koneksi.php";
    $NIP = $_GET['NIP'];
	
	$sql= ("DELETE pegawai, pensiun FROM pegawai 
			INNER JOIN pensiun
			WHERE pegawai.NIP = pensiun.NIP and pensiun.NIP = '$NIP'");

	mysqli_query($koneksi, $sql);
		
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index.php?page=dok_pensiun' </script>";
?>
