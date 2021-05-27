<?php
 
$qtampil="SELECT * FROM  dokumen_filepegawai WHERE id_file='$_GET[id_file]'";
$tampil=mysqli_query($koneksi,$qtampil);
$datatampil = mysqli_fetch_array($tampil);
 

date_default_timezone_set('Asia/Jakarta');
if(ISSET($_POST['submit'])){
	if($_FILES['upload']['name'] != "") {
		$tanggal = date('Y-m-d H:i:s');
		$file = $_FILES['upload'];
		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$name = explode('.', $file_name);
		$path = "../document/filespegawai/".$file_name;
    $nip = 	$_POST['nip'];
    $id_file = $_POST['id_file'];
		
		$query = ("UPDATE dokumen_filepegawai SET nama_file='$name[0]',NIP='$nip',file='$path',tanggal='$tanggal'
                WHERE id_file ='$id_file'");
		move_uploaded_file($file_temp, $path);
		header("location:../../index2.php?page=dok_pegawai2");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='../../index2.php?page=dok_pegawai2'</script>";
	}
}
//http://tekno-sukapedia.blogspot.com/2016/10/membuat-fitur-upload-dan-download-file.html
//https://blog.rosihanari.net/script-proses-edit-file-yang-telah-diupload-ke-database-mysql/
?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h1>Edit File Pegawai</h1>
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
		<form action="index2.php?page=edit_dokumen_pegawai2" method="post" enctype="multipart/form-data">			
			<div class="form-group">
				<label>NIP :</label>
				<input type="text" name="nip" value="<?php echo $datatampil['NIP']; ?>">
				<br>
				<label>File :</label>
				<input type="file" name="upload" required="required"  multiple/>
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