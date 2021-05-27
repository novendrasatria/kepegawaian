<?php
  $sql = "SELECT tb_user.id_user, tb_user.nama, pegawai.id_user FROM tb_user 
  INNER JOIN pegawai ON tb_user.id_user = pegawai.user_id";
$hasil = mysqli_query($koneksi, $sql);

?>
<?php
  $sql1 = "SELECT * FROM db_divisi";
  $che1 = mysqli_query($koneksi, $sql1);
?>
<?php
  $sql2 = "SELECT * FROM tb_pangkat";
  $che2 = mysqli_query($koneksi, $sql2);
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
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
                  Tambah Data Pegawai
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
                    <th>TANGGAL LAHIR</th>
                    <th>GOL.</th>
                    <th>PANGKAT</th>
                    <th>TMT PANGKAT</th>
                    <th>USIA PEGAWAI</th>
                    <th>SISA WAKTU KERJA</th>
                    <th>STATUS PEGAWAI</th>
                     <th></th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        $n = 0;
                        require 'page/koneksi.php';
                        $row=$koneksi->query("SELECT * FROM pegawai JOIN tb_pangkat ON tb_pangkat.id_pangkat = pegawai.pangkat_id");
                        while ($fetch=$row->fetch_array()){
                        $n++;
                        ?>
                      <tr>
                          <td><?php echo $n ; ?></td>
                          <?php $name = explode('/', $fetch['file'])?>
                          <td><?php echo $fetch['NIP']; ?></td>
                          <td><?php echo $fetch['Nama']; ?></td>
                          <?php $fetch['Tanggal_Lahir']; ?>
                          <?php $tgl = $fetch['Tanggal_Lahir']; ?>
                          <td><?php echo strftime("%d %B %Y", strtotime($tgl)); ?></td>
                          <td><?php echo $fetch['gol']; ?></td>
                          <td><?php echo $fetch['pangkat']; ?></td>
                          <?php $fetch['TMT_Pangkat']; ?>
                          <?php $tmt = $fetch['TMT_Pangkat']; ?>
                          <td><?php echo strftime("%d %B %Y", strtotime($tmt)); ?></td>
                          <td><?php echo $fetch['Usia Pegawai'];?>
                                <?php $lahir  =new DateTime($fetch['Tanggal_Lahir']);
                                      $today  =new DateTime();
                                      $umur   =date_diff($today,$lahir);
                                      echo $umur->y; echo " Tahun, "; 
                                      echo $umur->m; echo " Bulan, dan "; 
                                      echo $umur->d; echo " Hari";
                                  ?>  
                                  </td>
                          <td><?php echo $fetch['Sisa Waktu'];?>
                           <?php
                          require 'page/koneksi.php';
                           $sqlA=$koneksi->query("SELECT * FROM pengaturan_pensiun");
                           $usiaA=$sqlA->fetch_array()
                          ?>
                                <?php $lahir  =new DateTime($fetch['Tanggal_Lahir']);
                                      $today  =new DateTime();
                                      $umur   =date_diff($today,$lahir);
                                      $hasil = $umur->y;
                                      $pensiun  = $usiaA['usia_pensiun'];
                                      $sisa   =$pensiun - $hasil;
                                      echo $sisa; echo " Tahun "; 
                                  ?>  
                                  </td>
                          <td>
                          
                          <?php
                          require 'page/koneksi.php';
                           $sqlB=$koneksi->query("SELECT * FROM pengaturan_pensiun");
                           $usiaB=$sqlB->fetch_array()
                          ?>
                            <?php $lahir2  =new DateTime($fetch['Tanggal_Lahir']);
                                          $today2  =new DateTime();
                                          $umur2 =date_diff($today2,$lahir2);
                                          $hasil = $umur2->y;                                         
                                          if ($hasil >= $usiaB['usia_pensiun']) {
                                            echo '
                                            <a href="index.php?page=pdf_pensiun&NIP='.$fetch['NIP'].'"> <strong>Pensiun</strong></a>
                                            ';
                                          }
                                          else{
                                            echo "Pegawai Aktif";
                                          }
                                      ?> 
                                      </td>
                           <td>
                            <a class="btn btn-primary" href="index.php?page=rekap_pegawai&NIP=<?php echo $fetch['NIP'];?>">
                          <i class="fa fa-download"></i>Rekap</a>
                           </td>
                          <td>
                          <a class="btn btn-warning" href="index.php?page=edit_pegawai&NIP=<?php echo $fetch['NIP'];?>" >
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method ="post" action="index.php?page=proses_tambah_pegawai">
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
                    <label for="InputDivisi">Divisi Pengunggah</label>
                    <select name="divisi_id" id="divisi_id" class="form-control">
                    <option value="">-Pilih Divisi-</option>
                    <?php while($row1 = mysqli_fetch_assoc($che1)) { ?>
                      <option value="<?php echo $row1['id_divisi']; ?>"><?php echo $row1['nama_divisi']; ?></option>
                      <?php } ?>
                   </select>
                  </div>
                  <div class="form-group">
                    <label for="InputTanggal">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" placeholder="Tanggal Lahir ">
                  </div> 
                  <div class="form-group">
                    <label for="InputDivisi">Pangkat</label>
                    <select name="pangkat_id" id="pangkat_id" class="form-control">
                    <option value="">-Pilih Pangkat-</option>
                    <?php while($row2 = mysqli_fetch_assoc($che2)) { ?>
                      <option value="<?php echo $row2['id_pangkat']; ?>"><?php echo $row2['pangkat']; ?></option>
                      <?php } ?>
                   </select>
                  </div>
                    <div class="form-group">
                    <label for="InputTMT">TMT Pangkat</label>
                    <input type="date" class="form-control" name="TMT_Pangkat" id="TMT_Pangkat" placeholder="TMT Pangkat">
                    <p style="color: red">*NB: TMT PANGKAT diisi hanya ketika ada kenaikan pangkat pegawai</p>
                  </div>   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">SIMPAN</button>
                  <a href="index.php?page=dok_pegawai" class="btn btn-danger" >BATAL</a>
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