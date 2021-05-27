<?php
include "config/koneksi.php";
$query = "INSERT INTO pensiun ('$nip','$nama','$tgl','$jatuhtempo','$file')
    VALUES(
    $nip =$_POST['NIP'];
    $nama =$_POST['Nama'];
    $tgl =$_POST['Tanggal Lahir'];
    $jatuhtempo =$_POST['Tanggal Jatuh Tempo'];
    $file =$_POST['File'];
    )

$simpan = mysqli_query($koneksi,$query);

if($simpan){
    echo "<script> alert('Data berhasil ditambahkan'</script>";
    echo "<script type='text/javascript'> document.location ='index.php?page=dok_pensiun'; </script>";
} else{
    echo $query;
}
?>