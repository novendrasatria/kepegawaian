<?php 
session_start();
?>

<div class="banner banner1">
          <img src="dist/img/bannerlogo.png" alt="Banner" width="1100" height="350">
</div>

  <?php  ?>
  
  <div class="col-xs-12 col-md-12">
    <div class="box box-primary">
    <!-- /.box-header -->
      <div class="box-body">
      <h4>Last Uploaded</h4>
        <table class="table table-hover">
          <tbody>
          <h>Dokumen Pegawai</h>
            <?php
            $i = 0;
            require 'page/koneksi.php';
            $datauser = mysqli_query($koneksi,"SELECT * FROM db_user WHERE nama = '$_SESSION[nama]'");
            $user1 = mysqli_fetch_assoc($datauser);
            $row = $koneksi->query("SELECT * FROM  pegawai, dokumen_filepegawai, db_user 
                                  WHERE pegawai.nip = dokumen_filepegawai.nip
                                  ORDER BY '$user1'[nama']' DESC");
            while ($fetch = $row->fetch_array()){
              $i++;
            ?>
              <tr>  
                <td><?php echo $i; ?></td>
                <td>Telah Terupload </td>
                <td><?php echo $fetch['nama_file']; ?></td>
                <td><?php echo "Oleh Divisi ".$fetch['divisi_pengunggah']; ?></td>
                <td><small class="btn btn-success pull-right">Pada <?php echo $fetch['tanggal']; ?></small></td>
              </tr>
            <?php } ?>          
          
          <table class="table table-hover">
          <h>Dokumen Pangkat</h>
            <?php
            $p = 0;
            require 'page/koneksi.php';
            $row = $koneksi->query("SELECT * FROM  pegawai, dokumen_file 
                                  WHERE pegawai.nip = dokumen_file.nip
                                  ORDER BY tanggal DESC");
            while ($fetch = $row->fetch_array()){
              $p++;
            ?>
              <tr>  
                <td><?php echo $p; ?></td>
                <td>Telah Terupload </td>
                <td><?php echo $fetch['nama_file']; ?></td>
                <td><?php echo "Oleh Divisi ".$fetch['divisi_pengunggah']; ?></td>
                <td><small class="btn btn-success pull-right">Pada <?php echo $fetch['tanggal']; ?></small></td>
              </tr>
            <?php } ?>

          
          <table class="table table-hover">
          <h>Dokumen Pensiun</h>
            <?php
            $e = 0;
            require 'page/koneksi.php';
            $row = $koneksi->query("SELECT * FROM  pensiun , pegawai 
                                  WHERE pensiun.nip = pegawai.nip
                                  ORDER BY tanggal DESC");
            while ($fetch = $row->fetch_array()){
              $e++;
            ?>
              <tr>  
                <td><?php echo $e; ?></td>
                <td>Telah Terupload </td>
                <td><?php echo $fetch['nama_file']; ?></td>
                <td><?php echo "Oleh Divisi ".$fetch['divisi_pengunggah']; ?></td>
                <td><small class="btn btn-success pull-right">Pada <?php echo $fetch['tanggal']; ?></small></td>
              </tr>
            <?php } ?>
        </tbody>
    </table>
  </div>

  <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.box -->
