<?php include('page/koneksi.php'); ?>
		<?php
        //jika sudah mendapatkan parameter GET nip dari URL
        if(isset($_GET['NIP'])){
            //membuat variabel $nip untuk menyimpan nip dari GET id di URL
            $NIP = $_GET['NIP'];

            //query ke database SELECT tabel pegawai berdasarkan nip = $nip
            $select = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN tb_pangkat ON tb_pangkat.id_pangkat = pegawai.pangkat_id  WHERE pegawai.NIP ='$NIP'") or die(mysqli_error($koneksi));
            
            //jika hasil query = 0 maka muncul pesan error
            if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
            //jika hasil query > 0
            }else{
                //membuat variabel $data dan menyimpan data row dari query
                $e = mysqli_fetch_assoc($select);
			}
		}
		?>
<?php
  $sql1 = "SELECT * FROM db_divisi";
  $che1 = mysqli_query($koneksi, $sql1);
?>
<?php
  $sql2 = "SELECT * FROM tb_pangkat";
  $che2 = mysqli_query($koneksi, $sql2);
?>

<div class="modal-header">
    <h4 class="modal-title">Form Edit Data Pegawai</h4>
</div>
<form role="form" method ="POST" action="index.php?page=proses_edit_pegawai">
<div class="card-body">
        <div class="form-group">
            <label for="InputNIP">NIP</label>
            <input type="text" class="form-control" name="NIP" id="NIP" value="<?php echo $e['NIP']; ?>"  placeholder="NIP" readonly required>
        </div> 
        <div class="form-group">
            <label for="InputNama">Nama</label>
            <input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $e['Nama']; ?>" placeholder="Nama" required>
        </div>
         <div class="form-group">
              <label for="InputTanggal">Tanggal Lahir</label>
              <input type="date" class="form-control" name="Tanggal_Lahir" id="Tanggal_Lahir" value="<?php echo $e['Tanggal_Lahir']; ?>" placeholder="Tanggal_Lahir" required>
          </div>     
         
                <div class="form-group">
                    <label for="InputPangkat">Pangkat</label>
                    <select name="pangkat_id" id="pangkat_id" class="form-control" required>
                        <option value="">-Pilih Pangkat-</option>
                <?php while($row2 = mysqli_fetch_assoc($che2)) { ?>
              
                <option <?php echo ($row2['id_pangkat'] == $e['pangkat_id'] ? 'selected' : ''); ?> value="<?php echo $row2['id_pangkat']; ?>"><?php echo $row2['pangkat']; ?></option>
                <?php } ?>                        
            </select>
                   </select>
                </div>
                <div class="form-group">
                <label for="InputDivisi">Divisi Pengunggah</label>
                    <select name="divisi_id" id="divisi_id" class="form-control" required>
                    <option value="">-Pilih Divisi-</option>
                <?php while($row1 = mysqli_fetch_assoc($che1)) { ?>
              
                <option <?php echo ($row1['id_divisi'] == $e['divisi_id'] ? 'selected' : ''); ?> value="<?php echo $row1['id_divisi']; ?>"><?php echo $row1['nama_divisi']; ?></option>
                <?php } ?>                        
            </select>
        </div>
        <div class="form-group">
                    <label for="InputTMT">TMT Pangkat</label>
                    <input type="date" class="form-control" name="TMT_Pangkat" id="TMT_Pangkat" value="<?php echo $e['TMT_Pangkat']; ?>" placeholder="TMT Pangkat">
                    <p style="color: red">*NB: TMT PANGKAT diisi hanya ketika ada kenaikan pangkat pegawai</p>
        </div>  
          
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index.php?page=dok_pegawai" class="btn btn-danger" >BATAL</a>
        </div>
</form>
