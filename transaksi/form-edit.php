<?php 
include '../koneksi.php';
include '../aset/header.php';

include 'fungsi-transaksi.php';
$id_pinjam = $_GET['id_pinjam'];

$id_pinjam = ambilPeminjaman($kon, $id_pinjam);
?>

<div class="container">
	<div class="row mt-4">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h3>Edit Peminjaman</h3>
				</div>
				<div class="card-body">
					<form method="post" action="proses-edit.php">
						<div class="form-group">
							<label for="anggota">Nama Anggota</label>
							
							<input type="text" value="<?=$id_pinjam['nama']?>" class="form-control" disabled>
						</div>
						<div class="form-group">
							<label for="datepicker">Tanggal Pinjam</label>
							<input type="date" name="tgl_pinjam" value="<?=$id_pinjam['tgl_pinjam']?>" class="form-control">
						</div>
						<?php  
						if($id_pinjam['status'] == "kembali"){?>
						<div class="form-group">
							<label for="datepicker">Tanggal Kembali</label>
							<input type="date" name="tgl_kembali" value="<?=$id_pinjam['tgl_kembali']?>" class="form-control">
						</div>
						<?php
						}
						?>
						<div class="form-group">
							<input type="hidden" name="id_pinjam" value="<?=$id_pinjam["id_pinjam"]?>">
							<button type="submit" name="btnPinjam" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php  
include '../aset/footer.php';
?>