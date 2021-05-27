<?php
    $edit = $koneksi->query("SELECT * FROM pangkat WHERE NIP= '$_GET[kode]'");
    $e = mysqli_fetch_array($edit);
?>
<?php
  $sql = "SELECT * FROM pangkat";
  $che = mysqli_query($koneksi, $sql);
?>
<form role="form" method ="post" action="index2.php?page=dok_pangkat2">
    <div class="card-body">
        <div class="form-group">
            <label for="InputNIP">NIP</label>
            <input type="text" class="form-control" name="NIP" value="<?php echo $e['NIP']; ?>"  placeholder="NIP">
        </div> 
        <div class="form-group">
            <label for="InputNama">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $e['nama']; ?>" placeholder="Nama">
        </div>   
        <div class="form-group">
            <label for="InputPangkat">Pangkat</label>
                <input type="email" class="form-control" name="Pagkat" placeholder="Pangkat">
        </div>
        <div class="form-group">
            <label for="InputTMT">TMT Pangkat</label>
            <input type="date" class="form-control" name="TMT Pangkat" placeholder="TMT Pangkat">
        </div> 
        <div class="form-group">
            <label for="InputFile">File</label>
            <p class="text-danger"><strong>*Maximum size is 10 MB</strong></p>
            <p class="text-danger"><strong>*File extention allowed (*.docx, *.doc, *.pdf, *.dotx, *.pptx)</strong></p>
            <input type="file" name="File" placeholder="File">
        </div> 
    </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
</form>
