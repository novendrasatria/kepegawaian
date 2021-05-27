<?php

if(isset($_POST['submit'])){
   $NIP =$_POST['NIP'];
	$Nama =$_POST['Nama'];
   $Tanggal_Lahir =$_POST['Tanggal_Lahir'];
	$TMT_Pangkat =$_POST['TMT_Pangkat'];
	$divisi_id =$_POST['divisi_id'];
	$pangkat_id =$_POST['pangkat_id'];

   $sql = mysqli_query($koneksi, "UPDATE pegawai SET NIP='$NIP', Nama='$Nama' ,Tanggal_Lahir='$Tanggal_Lahir' ,TMT_Pangkat='$TMT_Pangkat' ,divisi_id='$divisi_id',pangkat_id='$pangkat_id' 
                         WHERE NIP ='$NIP'")or die(mysqli_error($koneksi));

        
if($sql){
   echo "<script type='text/javascript'> document.location ='index.php?page=dok_pegawai' </script>";
}else{
   echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
}
}
?>