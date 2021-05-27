<?php
include "page/koneksi.php";
if($_POST)
{
    $nip = $_POST['NIP'];
	$nama = $_POST['Nama'];
	$tgllahir = $_POST['Tanggal_Lahir'];
	$gol = $_POST['Gol'];
    $pangkat = $_POST['Pangkat'];
    $file = $_POST['file'];
    $query = ("UPDATE pegawai SET NIP='$nip',Nama='$nama',Tanggal_Lahir='$tgllahir',Gol='$gol',Pangkat=$pangkat 
                WHERE id_user ='$id_user'");

    if(!mysqli_query($query)){
        die(mysql_error);
    }else{
    echo '<script>alert("Data Berhasil Diubah !!!");
    window.location.href="../../index2.php?page=dok_pegawai2"</script>';
    }
}
?>