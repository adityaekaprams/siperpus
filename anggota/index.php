<?php

include '../koneksi.php';

$sql="SELECT * FROM anggota ORDER BY nama";
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
<h2 class="card-title"><i class="far fa-edit"></i>data anggota</h2>
  <div class="card-header">
  <center>
  <a href="tambah.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">tambahdata</a>
  </center>
  <div class="card-body">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">no</th>
      <th scope="col">nama</th>
      <th scope="col">kelas</th>
      <th scope="col">telp</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">aksi</th>
    </tr>
    <?php
        $no=1;
        foreach($pinjam as $p){?>

        </tr>
            <td scope="row"><?=$no?></td>
            <td><?=$p['nama']?></th>
            <td><?=$p['kelas']?></th>
            <td><?=$p['telp']?></th>
            <td><?=$p['username']?></th>
            <td><?=$p['password']?></th>
            <td>

   
<a href="detailanggota.php?id_anggota=<?= $p["id_anggota"];?>" class="badge badge-success">detail</a>
<a href="editanggota.php?id_anggota=<?= $p["id_anggota"];?>" class="badge badge-danger">edit</a>
<a href="hapusanggota.php?id_anggota=<?= $p["id_anggota"];?>" class="badge badge-warning">hapus</a>

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
