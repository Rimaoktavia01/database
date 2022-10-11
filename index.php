<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	
	<title>FORM PENGISIAN DATA MAHASISWA</title>
</head>
<body>
	<div class="container mt-5 ">
		<center class="mb-5" ><h2>FORM PENGISIAN DATA MAHASISWA</h2></center>
		<hr>
		<?php if (isset($_GET['pesan'])) { ?>
			<?php if ($_GET['pesan'] == "berhasil") { ?>
				<div class="alert alert-primary" role="alert">
					Berhasil Mengubah Data Mahasiswa
				</div>
			<?php }elseif ($_GET['pesan'] == "gagal") { ?>
				<div class="alert alert-danger" role="alert">
					Gagal Mengubah Data Mahasiswa
				</div>
			<?php }elseif ($_GET['pesan'] == "ekstensi") { ?>
				<div class="alert alert-warning" role="alert">
					Ekstensi File Harus PNG Dan JPG
				</div>
			<?php }elseif ($_GET['pesan'] == "size") { ?>
				<div class="alert alert-warning" role="alert">
					Size File Tidak Boleh Lebih Dari 2 MB
				</div>
			<?php }elseif ($_GET['pesan'] == "hapus") { ?>
				<div class="alert alert-primary" role="alert">
					Berhasil Menghapus Data Mahasiswa
				</div>
			<?php }elseif ($_GET['pesan'] == "gagalhapus") { ?>
				<div class="alert alert-danger" role="alert">
					Gagal Menghapus Data Mahasiswa
				</div>
			<?php } ?>
		<?php } ?>
		<br>
		<a href="insert.php" class="btn btn-primary mb-2">Tambah Data</a>
		<table class="table table-bordered mt-4" id="myTable">
			<thead>
				<tr>
					<th scope="col" width="1%">no</th>
					<th scope="col">NIM</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Jurusan</th>
					<th scope="col">Fakultas</th>
					<th scope="col" width="15%">Foto</th>
					<th scope="col" width="15%">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include 'koneksi.php';

				$no = 1;
				$get_data = mysqli_query($koneksi,"SELECT * FROM mahasiswa");
				while ($data = mysqli_fetch_array($get_data)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nim']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['jurusan']; ?></td>
						<td><?php echo $data['fakultas']; ?></td>
						<td>
							<?php 
							if ($data['gambar'] == "") { ?>
								<img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" style="width:100px;height:100px;">
							<?php }else{ ?>
								<img src="img/<?php echo $data['gambar']; ?>" style="width:100px;height:100px;">
							<?php } ?>
						</td>
						<td>
							<a href="edit.php?id=<?php echo $data['nim'] ?>" class="btn btn-warning text-white">Edit</a>
							<a href="delete.php?id=<?php echo $data['nim'] ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>