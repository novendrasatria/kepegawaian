<?php 
session_start();
?>
<?php 
include "page/koneksi.php";
 ?>
<?php
$user1=$_SESSION["db_user"]["id_user"];
$edit = mysqli_query($koneksi,"SELECT * FROM db_user WHERE nama = '$_SESSION[nama]'");
$e=mysqli_fetch_assoc($edit);
    ?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-xs-4 col-lg-6">
    <div class="box box-primary">
    <div class="box-body box-profile">
      <image class="profile-user-img img-responsive img-circle" src="assets/dist/img/Kabupaten_Wonosobo.png"
                  alt="User Profile Pict">
        <h3 class="profile-username text-left"><?php echo"Nama : ".$e['nama'];?></h3>
        <h3 class="profile-username text-left"><?php echo"id divisi : ".$e['divisi_id'];?></h3>
         <h3 class="profile-username text-left"><?php echo"id user : ".$e['id_user'];?></h3>
        <h3 class="profile-username text-left"><?php echo"Divisi : ";
        $divisi = $e['divisi_id'];
        if($divisi == 1){
          echo "Pemerintahan";
        }elseif ($divisi == 2){
          echo "Kesejahteraan Rakyat";
        }elseif ($divisi == 3){
          echo "Hukum";
        }elseif ($divisi == 4){
          echo "Perekonimian dan Sumber Daya Alam";
        }elseif ($divisi == 5){
          echo "Administrasi Pembangunan";
        }elseif ($divisi == 6){
          echo "Pengadaan Barang dan Jasa";
        }elseif ($divisi == 7){
          echo "Umum";
        }elseif ($divisi == 8){
          echo "Organisasi";
        }else{
          echo "Protokol dan Komunikasi Pimpinan";
        }  
        ?></h3>
        <h3 class="profile-username text-left"><?php echo"Status Pengguna : ".$_SESSION['role'];?></h3>
    </div>
    
      <td>
        <a href="index2.php?page=edit_user2&id_user=<?php echo $e['id_user'];?>">
        <button type="button" class="btn btn-warning">Edit</button>
        </a>
      </td>
      </tr>
   
    </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal form tambah user -->                  
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              
            </div>
            <div class="modal-footer justify-content-between">
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>