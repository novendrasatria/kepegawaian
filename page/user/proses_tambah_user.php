<?php
include "page/koneksi.php";
if($_POST)
{
    $id =$_POST['id_user'];
    $nama =$_POST['nama'];
    $email =$_POST['email'];
    $pass =md5($_POST['password']);
    $divisi =$_POST['divisi_id'];
    $role = $_POST['role'];

$query = ("INSERT INTO db_user (id_user, nama, email, password,  divisi_id, role) 
            VALUES ('".$id."','".$nama."','".$email."','".$pass."','".$divisi."','".$role."')");
   
$simpan = mysqli_query($koneksi,$query);

if($simpan){
    echo "<script> alert('Data berhasil ditambahkan'</script>";
    echo "<script type='text/javascript'> document.location ='index.php?page=data_user'; </script>";
} else{
    echo $query;
}
}
?>

