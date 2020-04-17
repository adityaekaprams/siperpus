<?php

include '../koneksi.php';

$id=$_GET['id_anggota'];
$query = mysqli_query($kon, "DELETE FROM anggota WHERE anggota.id_anggota='$id'");

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