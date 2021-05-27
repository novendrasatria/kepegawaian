<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Upload File Pegawai</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
		<?php
		if(isset($_GET['alert'])){
			if($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ukuran File Terlalu Besar
				</div>
				<?php
			}elseif ($_GET['alert']=="gagal_ektensi") {
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ekstensi File Tidak Diperbolehkan
				</div>
				<?php
			}elseif ($_GET['alert']=="simpan") {
				?>
				<div class="alert alert-success">
					<strong>Success!</strong> File Berhasil Disimpan
				</div>
				<?php
			}				
		}
		?>
		<form action="page/userpage/proses_upload_pegawai2.php" method="post" enctype="multipart/form-data">			
			<div class="form-group">
				<label>NIP :</label>
				<input type="text" name="nip">
				<br>
				<label>File :</label>
				<input type="file" name="upload" required="required"  multiple />
				<p style="color: red">Ekstensi yang diperbolehkan : docx', 'doc', 'pdf', 'dotx', 'pptx'</p>
			</div>			
			<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
		</form>

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>              