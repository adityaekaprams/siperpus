<?php

include '../koneksi.php';

$sql="SELECT * FROM buku ORDER BY judul";
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
<h2 class="card-title"><i class="far fa-edit"></i>data buku</h2>
  <div class="card-header">
  <center>
  <a href="tambah.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">tambahdata</a>
  </center>
  <div class="card-body">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">no</th>
      <th scope="col">judul</th>
      <th scope="col">penerbit</th>
      <th scope="col">pengarang</th>
      <th scope="col">cover</th>
      <th scope="col">stok</th>
      <th scope="col">id_kategori</th>
      <th scope="col">aksi</th>
    </tr>
    <?php
        $no=1;
        foreach($pinjam as $p){?>

        </tr>
            <td scope="row"><?=$no?></td>
            <td><?=$p['judul']?></th>
            <td><?=$p['penerbit']?></th>
            <td><?=$p['pengarang']?></th>
            <td><?=$p['cover']?></th>
            <td><?=$p['stok']?></td>
            <td><?=$p['id_kategori']?></th>
            <td>

   
<a href="detailbuku.php?id_buku=<?= $p["id_buku"];?>" class="badge badge-success">detail</a>
<a href="editbuku.php?id_buku=<?= $p["id_buku"];?>" class="badge badge-danger">edit</a>
<a href="hapusbuku.php?id_buku=<?= $p["id_buku"];?>" class="badge badge-warning">hapus</a>

        </td>
        </tr>
        <?php
            $no++;
    }
    ?>
  </thead>
   

    
  </div>
</div>
</div>
<?php
include '../aset/footer.php';
?>
