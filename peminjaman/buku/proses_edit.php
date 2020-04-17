<?php

include '../koneksi.php';

if (isset($_POST['simpan']))
{
    $judul          =$_POST['judul'];
    $penerbit       =$_POST['penerbit'];
    $pengarang      =$_POST['pengarang'];
    $ringkasan      =$_POST['ringkasan'];
    $cover          =$_POST['cover'];
    $stok           =$_POST['stok'];
    $kategori       =$_POST['id_kategori'];
    
    $query=mysqli_query($kon,"INSERT INTO buku (judul, penerbit, pengarang, ringkasan, cover, stok, id_kategori)
            VALUES ('$judul','$penerbit','$pengarang','$ringkasan','$cover','$stok','$kategori')");

    $kategori=mysqli_fetch_assoc($query);
    
    if ($query>0){
        echo "
        <script>
            alert('data berhasil diedit');
            document.location.href='index.php';
            </script>
            ";
    }
}
    ?>