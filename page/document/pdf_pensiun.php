<!DOCTYPE html>
<html>
<head>
	<title>Sekretariat Daerah Kabupaten Wonosobo</title>
</head>
<body>
 
	<center>
 
		<h2>Berkas Pensiun Pegawai</h2>
 
	</center>
 
	<?php 
	include 'page/koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>NIP</th>
			<th>Nama </th>
			<th >Pangkat</th>
            <th >Tanggal Lahir</th>
		</tr>
		<?php 
		$no = 1;
        $NIP = $_GET['NIP'];
        $pensiun = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN tb_pangkat ON tb_pangkat.id_pangkat = pegawai.pangkat_id WHERE pegawai.NIP ='$NIP'");
		while($data = mysqli_fetch_array($pensiun)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['NIP']; ?></td>
			<td><?php echo $data['Nama']; ?></td>
			<td><?php echo $data['pangkat']; ?></td>
            <td><?php echo $data['Tanggal_Lahir']; ?></td>
			
		</tr>
		<?php 
		}
		?>
	</table>
	<table border="0" style="width: 100%">
		<tr></tr>
		<tr>
		<th>Mengetahui,</th>
		</tr>
		<tr><th></th></tr>
		<tr><th></th></tr>
		<tr><th></th></tr>
		<tr>
		<td>Administrasi Kepegawaian</td>
		</tr>
		</table>
	<script>
		window.print();
	</script>
 
</body>
</html>