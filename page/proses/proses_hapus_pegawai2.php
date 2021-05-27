<?php
    include "page/koneksi.php";
    $id = $_GET['nip'];
	
	mysqli_query($koneksi,"DELETE nip, nip FROM pegawai, dokumen_filepegawai WHERE nip. = '$id'");

	
	echo "<script> alert('Data berhasil dihapus'</script>";
	echo "<script type='text/javascript'> document.location='index2.php?page=dok_pegawai2'</script>";
?>

<?php
