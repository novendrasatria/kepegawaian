
<?php
include "page/koneksi.php";
if($_POST)
{
	$NIP =$_POST['NIP'];
	$Nama =$_POST['Nama'];
    $Tanggal_Lahir =$_POST['Tanggal_Lahir'];
	$TMT_Pangkat =$_POST['TMT_Pangkat'];
	$divisi_id =$_POST['divisi_id'];
	$pangkat_id =$_POST['pangkat_id'];
	
	$query = ("INSERT INTO pegawai(NIP, Nama, Tanggal_Lahir, TMT_Pangkat, divisi_id, pangkat_id) 
			VALUES ('".$NIP."','".$Nama."','".$Tanggal_Lahir."','".$TMT_Pangkat."','".$divisi_id."','".$pangkat_id."')");
	$simpan = mysqli_query($koneksi,$query);

	if($simpan){
		echo "<script> alert('Data berhasil ditambahkan'</script>";
		echo "<script type='text/javascript'> document.location ='index.php?page=upload_pegawai' </script>";
	} else{
		echo $query;
	}
	}
	?>