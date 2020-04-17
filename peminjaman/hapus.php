<?php

include 'koneksi.php';

$id=$_GET['id_pinjam'];

$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjaman.id_pinjam='$id' ");

if($query>0){
    echo "<script> alert('Data Berhasil Dihapus'); document.location.href='index.php';
          </script>";
}else{
    echo "<script> alert('Data Gagal Dihapus'); document.location.href='index.php';
          </script>";
}
    

?>