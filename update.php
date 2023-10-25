<!DOCTYPE html>
<html>
<head>
	<title>Update Mahasiswa-2062</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<?php include("config.php");?>
</head>
<body>
	<div id="container">
		<ul class="nav nav-pills nav-stacked sidebar">
			 <li role="presentation"><a href="index.php">Tambah Mahasiswa</a></li>
			 <li role="presentation"><a href="buku.php">Tambah Buku</a></li>
			 <li role="presentation"><a href="pinjam.php">Peminjaman Buku</a></li>
			 <li role="presentation"><a href="hapusmhs.php">Hapus Mahasiswa</a></li>
			 <li role="presentation"><a href="hapusbuku.php">Hapus Buku</a></li>
			 <li role="presentation"><a href="lihatdata.php">Lihat Data</a></li>
			 <li role="presentation"><a href="cari.php">Cari Buku</a></li>
			 <li role="presentation" class="active"><a href="update.php">Update Buku</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">ID BUKU</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="ID Buku" name="Id_buku">
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="submit">Cari Buku</button>
					</div>
  				</div>
			</form>

			
			<?php
				if (isset($_POST['submit'])) {
					$id_buku=$_POST['Id_buku'];
					$query="Select * from buku where Id_buku='$id_buku'";
					$hasil=$conn->query($query);
					if($hasil==true){
						foreach ($hasil as $value) {
							$id_buku=$value['Id_buku'];
							$nama_buku=$value['Nama_buku'];
							?>
							<form class="form-horizontal" method="post">
								<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">ID BUKU</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" value="<?php echo "$id_buku";?>" placeholder="ID Buku" name="Id_buku">
								    </div>
								</div>
								<div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Judul Buku</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" value="<?php echo "$nama_buku";?>" placeholder="Nama Buku" name="Nama_buku">
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-success" name="update">Update</button>
									</div>
				  				</div>
			  				</form>
							<?php
						}
					}
				}
			?>
			
		</div>
	</div>
	<?php
		if (isset($_POST['update'])) {
			$id_buku_update=$_POST['Id_buku'];
			$nama_buku_update=$_POST['Nama_buku'];
			$query="update buku set Nama_buku='$nama_buku_update' where Id_buku='$id_buku_update'";
			$update=$conn->query($query);
			if($update==true){
				?>
				<script type="text/javascript">alert('Data berhasil diupdate!');</script>
				<?php
			}
		}
	?>
</body>
</html>