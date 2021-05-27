<?php include('page/koneksi.php'); ?>
		<?php
        if(isset($_GET['NIP'])){
            $NIP = $_GET['NIP'];
            $select = mysqli_query($koneksi, "SELECT * FROM pegawai  WHERE NIP ='$NIP'") or die(mysqli_error($koneksi));
            if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
            }else{
                $fetch = mysqli_fetch_assoc($select);
			}
		}
		?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rekap Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

          <div class="card">
          <div class="form">
            <label for="NIP">NIP</label>
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $fetch['NIP']; ?>"  placeholder="NIP" readonly required>
        </div> 
        <div class="form">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $fetch['Nama']; ?>" placeholder="Nama" readonly required>
        </div>
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>JENIS DOKUMEN</th>
                    <th>DOKUMEN</th>
                    <th>DESKRIPSI</th>
                    <th>TANGGAL UPLOAD</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                       $NIP = $_GET['NIP'];
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM dokumen_file JOIN jenis_dokumen ON jenis_dokumen.id_jenisdokumen = dokumen_file.jenisdokumen_id WHERE dokumen_file.NIP ='$NIP';");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <?php $name = explode('/', $fetch['file'])?>
                          <td><?php echo $fetch['jenis_dokumen']; ?></td>
                          <td><?php echo $fetch['id_file']; ?></td>
                          <td> <a href="page/document/preview.php?file=<?php echo $name[1]?>"> <?php echo $fetch['nama_file']; ?></a></td>
                          <td><?php echo $fetch['keterangan']; ?></td>
                          <td><?php echo $fetch['tanggal']; ?></td>
                           <td>
                          <a class="btn btn-warning" href="index.php?page=edit_rekap&id_file=<?php echo $fetch['id_file'];?>" >
                          <i class="fa fa-edit"></i> Edit</a>
                          </a>
                          <a class="btn btn-danger" href="index.php?page=proses_hapus_dokumen_pegawai&id_file=<?php echo $fetch['id_file'];?>"
                          onclick="return confirm('Yakin akan menghapus data? ')">
                          <i class="fa fa-trash"></i> Hapus Dokumen</a>
                          </a>
                          <a class="btn btn-primary" href="page/document/proses_unduh_fpegawai.php?file=<?php echo $name[1]?>">
                          <i class="fa fa-download"></i>Download</a>
                          </td>
                      </tr>
                      <?php } ?>
  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal form tambah user -->  