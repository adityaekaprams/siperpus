ini index
<?php

include '../koneksi.php';

$sql="SELECT * FROM peminjaman INNER JOIN anggota
    ON peminjaman.id_anggota=anggota.id_anggota
    INNER JOIN detail_pinjam dp USING(id_pinjam) INNER JOIN
    petugas ON peminjaman.id_petugas=petugas.id_petugas ORDER BY
    peminjaman.tgl_pinjam";

    $res = mysqli_query($kon,$sql);

    $pinjam = array();

    while($data = mysqli_fetch_assoc($res)){
        $pinjam[]=$data;
    }
include '../aset/header.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
        </div>
    </div>
</div>
<div class="card">
<h2 class="card-title"><i class="far fa-edit"></i>data peminjaman</h2>
  <div class="card-header">
  <center>
  <a href="form-pinjam.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">tambahdata</a>
  </center>
  <div class="card-body">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">nama pinjam</th>
      <th scope="col">tanggal pinjam</th>
      <th scope="col">tanggal jatuh tempo</th>
      <th scope="col">petugas</th>
      <th scope="col">status</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>
    <?php
        $no=1;
        foreach($pinjam as $p){?>

        </tr>
            <th scope="row"><?=$no?></th>
            <td><?=$p['nama']?></th>
            <td><?=date('d F Y', strtotime($p['tgl_pinjam']))?></th>
            <td><?=date('d F Y', strtotime($p['tgl_jatuh_tempo']))?></th>
            <td><?=$p['nama_petugas']?></td>
            <td>

    <?php
        if($p['status']=="dipinjam")
        {
            echo '<h5><span class="badge badge-info">dipinjam</span></h5>';
        }
        if($p['status']=="kembali")
        {
            echo '<h5><span class="badge badge-secondary">kembali</span></h5>';
        }
        ?>
        </td>
        <td>
<a href="detail.php?id_pinjam=<?=$p['id_pinjam']?>&nama=<?=$p['nama']?>" class="badge badge-success">detail</a>
<a href="form-edit.php?id_pinjam=<?=$p['id_pinjam']?>" class="badge badge-danger">edit</a>
<a href="hapuspinjam.php?id_pinjam=<?=$p['id_pinjam']?>" class="badge badge-warning">hapus</a>

        </td>
        </tr>
        <?php
            $no++;
    }
    ?>

    
  </div>
</div>
</div>
<?php
include '../aset/footer.php';
?>

ini form pinjam

<?php  
include '../koneksi.php';
include 'fungsi-transaksi.php';

$buku 		= ambilBuku($kon);
$anggota 	= ambilAnggota($kon);

include '../aset/header.php';

?>
<div class="container">
	<div class="row mt-4">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h3>Form Tambah Peminjaman</h3>
				</div>
				<div class="card-body">
					<form method="post" action="proses-pinjam.php">
						<div class="form-group">
							<label for="anggota">Nama Anggota</label>
							<select name="id_anggota" class="form-control">
								<?php  
								foreach ($anggota as $a) { ?>
									<option value="<?=$a['id_anggota']?>"><?=$a['nama']?></option>
								<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="buku">Judul Buku</label>
							<select name="id_buku" class="form-control">
								<?php  
								foreach ($buku as $b) {?>
									<option value="<?=$b['id_buku']?>"><?=$b['judul']?></option>
								<?php }
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="datepicker">Tanggal Pinjam</label>
							<input type="date" name="tgl_pinjam" class="form-control" require>
						</div>

						<div class="form-group">
							<button type="submit" name="btnPinjam" class="btn btn-primary mt-auto">Simpan</button>
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

ini fungsi transaksi

<?php  
function ambilBuku($kon){
	$sql = "SELECT id_buku, judul FROM buku";
	$res = mysqli_query($kon, $sql);

	$data_buku = array();

	while ($data = mysqli_fetch_assoc($res)) {
		$data_buku[] = $data;
	}
	return $data_buku;
}
?>

<?php  
function ambilAnggota($kon){
	$sql = "SELECT id_anggota, nama FROM anggota";
	$res = mysqli_query($kon, $sql);

	$data_anggota = array();

	while ($data = mysqli_fetch_assoc($res)) {
		$data_anggota[] = $data;
	}
	return $data_anggota;
}
?>

<?php  
function ambilPeminjaman($kon, $id_pinjam){
	$sql = "SELECT * FROM peminjaman p INNER JOIN anggota a ON p.id_anggota=a.id_anggota INNER JOIN detail_pinjam dp USING(id_pinjam) INNER JOIN buku b ON dp.id_buku=b.id_buku where id_pinjam='$id_pinjam'" ;
	$res = mysqli_query($kon, $sql);
	$data = mysqli_fetch_assoc($res);

	return $data;
}
?>

<?php  
function ambilStok($kon, $id_buku){
	$sql = "SELECT stok FROM buku WHERE id_buku=$id_buku";
	$res = mysqli_query($kon, $sql);

	$data = mysqli_fetch_assoc($res);
	return $data['stok'];
}
?>

<?php  
function cekPinjam($kon, $id_anggota){
	$sql = "SELECT * FROM peminjaman inner join detail_pinjam using(id_pinjam)  WHERE id_anggota=$id_anggota AND status='Dipinjam'";
	$res = mysqli_query($kon, $sql);

	$pinjam = mysqli_affected_rows($kon);

	if($pinjam == 0){
		return true;
	}else{
		return false;
	}
}
?>

<?php  
function updateStok($kon, $id_buku, $stok_update){
	$sql = "UPDATE buku SET stok=$stok_update WHERE id_buku=$id_buku";
	$res = mysqli_query($kon, $sql);
}
?>

<?php  
function hitungDenda($kon, $id_pinjam, $tgl_kembali){
	$denda=0;

	$sql = "SELECT tgl_jatuh_tempo FROM peminjaman WHERE id_pinjam=$id_pinjam";
	$res = mysqli_query($kon, $sql);

	$data = mysqli_fetch_assoc($res);
	$tgl_jatuh_tempo = $data['tgl_jatuh_tempo'];

	$hari_denda = (strtotime($tgl_kembali)-strtotime($tgl_jatuh_tempo))/60/60/24;

	if($hari_denda >= 0){
		$denda = $hari_denda*1000;
	}

	return $denda;
}
?>

ini proses pinjam

<?php  
include '../koneksi.php';
include 'fungsi-transaksi.php';
session_start();

if(isset($_POST['btnPinjam'])){
	$id_anggota = $_POST['id_anggota'];
	$id_buku = $_POST['id_buku'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_jatuh_tempo = date('Y-m-d', strtotime($tgl_pinjam.'+ 7 days'));
	$id_petugas = 1;//var dump en kabeh

$sql = "INSERT INTO peminjaman (id_anggota, tgl_pinjam, tgl_jatuh_tempo, id_petugas) VALUES ('$id_anggota', '$tgl_pinjam', '$tgl_jatuh_tempo', '$id_petugas')";

	$stok = ambilStok($kon, $id_buku); //ambil data stok buku

	if(cekPinjam($kon, $id_anggota) && $stok > 0){
		$res = mysqli_query($kon, $sql);
		// var_dump($res);
		$query = mysqli_query($kon, "SELECT id_pinjam FROM peminjaman WHERE tgl_pinjam='$tgl_pinjam' AND id_anggota='$id_anggota' AND tgl_jatuh_tempo='$tgl_jatuh_tempo' AND id_petugas='$id_petugas'");
		$wd = mysqli_fetch_assoc($query);
		$idp = $wd["id_pinjam"];
		$sql1 = mysqli_query($kon, "INSERT INTO detail_pinjam (id_pinjam, id_buku) VALUES ('$idp', '$id_buku')");
		$count = mysqli_affected_rows($kon);
		// var_dump($count);
		$stok_update = $stok - 1;
		if($sql1>0){
			updateStok($kon, $id_buku, $stok_update);
			// echo "
			// <script>
			// alert('Data Berhasil Di tambah !!!');
			// document.location.href='index.php';
			// </script>
			// ";
		}
		echo "
			<script>
			alert('Data Berhasil Di tambah !!!');
			document.location.href='index.php';
			</script>
			";
	}if(cekPinjam($kon, $id_anggota)==false){
		updateStok($kon, $id_buku, $stok_update);
		echo "
			<script>
			alert('Data gagal Di tambah !!!');
			document.location.href='index.php';
			</script>
		";
	}
}else{
	// echo 'Data gagal di tambahkan! ';
	// header("Location:index.php");
	echo "
			<script>
			alert('Data Berhasil Di tambah !!!');
			document.location.href='index.php';
			</script>
		";
}
?>