<?php

include '../koneksi.php';

$id=$_GET['id_buku'];
$query = mysqli_query($kon, "DELETE FROM buku WHERE buku.id_buku='$id'");

if($query>0);
{
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
    </script>
    ";
}


?>