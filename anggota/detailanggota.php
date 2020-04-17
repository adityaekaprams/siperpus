<?php  
include '../aset/header.php';
include '../koneksi.php';

$id_anggota = $_GET['id_anggota'];

$sql = "SELECT * FROM anggota a INNER JOIN level l ON a.id_level=l.id_level WHERE id_anggota=$id_anggota";
$res = mysqli_query($kon, $sql);
$detail = mysqli_fetch_assoc($res);
// var_dump($detail);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail anggota</title>
</head>
<body>
<div class="container">
	<div class="row mt-4">
		<div class="col-md-7">
			<h2>Detail anggota</h2>
			<hr class="bg-ligth">
			<table class="table table-bordered">
				<tr>
					<td><strong>nama</strong></td>
					<td><?=$detail['nama'];?></td>
				</tr>
				<tr>
					<td><strong>kelas</strong></td>
					<td><?=$detail['kelas'];?></td>
				</tr>
				<tr>
					<td><strong>telp</strong></td>
					<td><?=$detail['telp'];?></td>
				</tr>
				<tr>
					<td><strong>username</strong></td>
					<td><?=$detail['username'];?></td>
				</tr>
				<tr>
					<td><strong>password</strong></td>
					<td><?=$detail['password'];?></td>
				</tr>
				<tr>
					<td><strong>id level</strong></td>
					<td><?=$detail['id_level'];?></td>
				</tr>
				<tr>
					<td class="text-rigth" colspan="2">
						<a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>

					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>
<?php  
include '../aset/footer.php';
?>