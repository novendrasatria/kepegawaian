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

<div class="modal-header">
    <h4 class="modal-title">Form Edit Usia Pensiun</h4>
</div>
<form role="form" method ="POST" action="index.php?page=proses_edit_usiapensiun">
<div class="card-body">
        <div class="form-group">
            <label for="InputNIP">Usia Pensiun</label>
            <input type="text" class="form-control" name="usia_pensiun" id="usia_pensiun" value="<?php echo $e['usia_pensiun']; ?>"  placeholder="Usia Pensiun" required>
        </div> 
          
      </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
            <a href="index.php?page=pengaturan_pensiun" class="btn btn-danger" >BATAL</a>
        </div>
</form>
