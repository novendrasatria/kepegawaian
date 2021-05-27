<?php
  $sql = "SELECT * FROM pangkat";
  $che = mysqli_query($koneksi, $sql);
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pangkat</h1>
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
              
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                  Tambah Pangkat 
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA PEGAWAI</th>
                    <th>PANGKAT</th>
                    <th>TMT PANGKAT</th>
                    <th>FILE</th>
                    <th>TANGGAL UPLOAD</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM pangkat, dokumen_file WHERE pangkat.NIP=dokumen_file.NIP
                                            ORDER BY Nama ASC");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <?php $name = explode('/', $fetch['file'])?>
                          <td><?php echo $fetch['NIP']; ?></td>
                          <td><?php echo $fetch['Nama']; ?></td>
                          <td><?php echo $fetch['Pangkat']; ?></td>
                          <td><?php echo $fetch['TMT_Pangkat']; ?></td>
                          <td><?php echo $fetch['nama_file']; ?></td>
                          <td><?php echo $fetch['tanggal']; ?></td>
                          <td>
                          <a class="btn btn-warning" href="index2.php?page=edit_pangkat2&kode=<?php echo $fetch['NIP'];?>">
                          <i class="fa fa-edit"></i> Edit</a>
                          </a>
                          <a class="btn btn-danger" href="index2.php?page=dok_pangkat2&kode=<?php echo $fetch['NIP'];?>" 
                          onclick="return confirm('Yakin akan menghapus data? ')">
                          <i class="fa fa-trash"></i> Hapus</a>
                          </a>
                          <a class="btn btn-primary" href="page/userpage/proses_unduh_fpangkat2.php?file=<?php echo $name[1]?>">
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Tambah Pangkat</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index2.php?page=proses_tambah_pangkat2">
                <div class="card-body">
                <div class="form-group">
                    <label for="InputNIP">NIP</label>
                    <input type="text" class="form-control" name="NIP" id="NIP" placeholder="NIP">
                  </div> 
                <div class="form-group">
                    <label for="InputNama">Nama</label>
                    <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama">
                  </div>   
                <div class="form-group">
                    <label for="InputPangkat">Pangkat</label>
                    <input type="text" class="form-control" name="Pangkat" id="Pangkat" placeholder="Pangkat">
                  </div>
                  <div class="form-group">
                    <label for="InputTMT">TMT Pangkat</label>
                    <input type="date" class="form-control" name="TMT_Pangkat" id="TMT_Pangkat" placeholder="TMT Pangkat">
                  </div> 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function() {
  $('#example').DataTable( {
    dom: 'Bfrtip',
    buttons: [
    'colvis'
    ]
  } );
} );
</script>