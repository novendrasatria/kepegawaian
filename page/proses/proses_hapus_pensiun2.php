<?php
    include "page/koneksi.php";
    $id = $_GET['nip'];
	
	mysqli_query($koneksi,"DELETE FROM pegawai WHERE nip = '$id'");

	
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index2.php?page=dok_pensiun2' </script>";
?>
