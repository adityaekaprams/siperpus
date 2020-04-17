<?php

session_start();

include 'koneksi.php';

include 'fungsi-transaksi.php';

if(isset($_POST['submit'])){


    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_jatuh_tempo = date('Y-m-d',strtotime($tgl_pinjam.'+7 days'));
    $id_petugas = 1;

    $sql = "INSERT INTO peminjaman VALUES('','$id_anggota','$id_buku','$tgl_pinjam','$tgl_jatuh_tempo','0000-00-00','$id_petugas','','dipinjam')";

    $stok = ambilstok($id_buku);

    if(cekpinjam($id_anggota) && $stok > 0){
        $res = mysqli_query($koneksi,$sql);

        $count = mysqli_affected_rows($koneksi);

        $stok_update = $stok - 1;
        if($count == 1){
            updatestok($id_buku,$stok_update);
            header("Location: index.php");
        }else{
            header("Location: form-pinjam.php");
    }
}
}

?>

<?php  
include '../koneksi.php';
include 'fungsi-transaksi.php';

session_start();

if(isset($_POST['btnPinjam'])){
	
	$id_anggota 		= $_POST['id_anggota'];
	$id_buku 			= $_POST['id_buku'];
	$tgl_pinjam 		= $_POST['tgl_pinjam'];
	$tgl_jatuh_tempo 	= date('Y-m-d', strtotime($tgl_pinjam.'+ 7 days'));
	$id_petugas 		= $_SESSION['id_peut'];

	$sql = "INSERT INTO peminjaman(id_anggota, tgl_pinjam, tgl_pinjam_tempo, id_petugas) VALUES('$id_anggota', '$tgl_pinjam', '$tgl_jatuh_tempo', '$id_petugas')";
	
	$stok = ambilStok($kon, $id_buku); //ambil data stok buku

	if(cekPinjam($kon, $id_anggota) && $stok > 0){
		$res = mysqli_query($kon, $sql);
		$querp=mysqli_query($kon,"SELECT id_pinjam FROM peminjaman WHERE tgl_pinjam='$tgl_pinjam' AND id_anggota='$id_anggota' AND tgl_jatuh_tempo='$tgl_jatuh_tempo' AND id_petugas='$id_petugas' ");
		$wd=mysqli_fetch_assoc($querp);
		$idp=$wd['id_pinjam'];
		$sql1 = mysqli_query($kon,"INSERT INTO detail_pinjam(id_pinjam,id_buku) values('$idp','$id_buku')");
		$count = mysqli_affected_rows($kon);
		$stok_update = $stok - 1;
		if($count == 2){
			updateStok($kon, $id_buku, $stok_update);
			header("Location:index.php");
		}
	  
	}
	if(cekPinjam($kon, $id_anggota)==false){
		updateStok($kon, $id_buku, $stok_update);
		header("Location:index.php");
	}
}else{
	header("Location:form-pinjam.php");
}
?>