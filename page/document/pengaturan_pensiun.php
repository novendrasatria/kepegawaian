<?php
  $sql = "SELECT * FROM db_divisi";
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Batas Usia Pensiun</h1>
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
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>USIA PENSIUN</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM pengaturan_pensiun");
                         while ($fetch=$row->fetch_array()){
                        ?>
                      <tr>
                          <td><?php echo $fetch['usia_pensiun']; ?></td>
                          <td>
                            <a class="btn btn-warning" href="index.php?page=edit_usiapensiun&usia_pensiun=<?php echo $fetch['usia_pensiun'];?>">
                          <i class="fa fa-edit"></i> Edit</a>
                          </a>
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
    <?php include('page/koneksi.php'); ?>
		<?php
        if(isset($_GET['usia_pensiun'])){
            $usia_pensiun = $_GET['usia_pensiun'];

            $select = mysqli_query($koneksi, "SELECT * FROM pengaturan_pensiun  WHERE usia_pensiun ='$usia_pensiun'") or die(mysqli_error($koneksi));
            
            if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
            }else{
                $e = mysqli_fetch_assoc($select);
			}
		}
		?>
             
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Edit Batas Usia Pensiun</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="POST" action="index.php?page=proses_edit_usiapensiun">
                <div class="card-body">
                <div class="form-group">
                    <label for="InputUsia">Usia Pensiun</label>
                    <input type="text" class="form-control" name="usia_pensiun" id="usia_pensiun" placeholder="Usia Pensiun" value="<?php echo $e['usia_pensiun']; ?>" >
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="index.php?page=pengaturan_pensiun" class="btn btn-danger" >BATAL</a>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>