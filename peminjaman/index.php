<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

     include 'koneksi.php';

     $sql = "SELECT * FROM peminjaman INNER JOIN anggota 
             ON peminjaman.id_anggota = anggota.id_anggota
             INNER JOIN petugas on peminjaman.id_petugas = petugas.id_petugas
             ORDER BY peminjaman.tgl_pinjam";
     
     $res = mysqli_query($koneksi,$sql);
 
     $pinjam = array();
 
     while($data = mysqli_fetch_assoc($res)){
         $pinjam[] = $data;
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
                     <div class="card-header">
                       <h2 class="card-title"><i class="far fa-edit"></i>Data Peminjaman</h2>
                     </div>
                     <a href="form-pinjam.php"><button type="button" class="btn btn-outline-primary" style="width:100%; height:40px">+ Tambah</button></a>
                    <div class="card-body">

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Peminjaman</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Jatuh Tempo</th>
                    <th scope="col">Petugas</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach($pinjam as $p){?>

                    <tr>
                        <th scope="row"><?=$no ?></th>
                        <td><?= $p['nama']?></td>
                        <td><?= date('d F Y',strtotime($p['tgl_pinjam']))?></th>
                        <td><?= date('d F Y',strtotime($p['tgl_jatuh_tempo']))?></th>
                        <td><?= $p['nama_petugas']?></td>
                        <td>
                            <?php
                            if($p['status'] == "dipinjam")
                            {
                                echo '<h5><span class="badge badge-info">dipinjam</span></h5>';
                            }else{
                                echo '<h5><span class="badge badge-secondary">kembali</span></h5>';
                            }
                            ?>
                         </td>
                         <td>
                           <a href="detail.php?id_pinjam=<?= $p['id_pinjam'] ?>&nama=<?= $p['nama']?>" class="badge badge-success">Detail</a>
                           <a href="form-edit.php?id_pinjam=<?= $p['id_pinjam']?>" class="badge badge-warning">Edit</a>
                           <a href="hapus.php?id_pinjam=<?= $p['id_pinjam']?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                         </td>
                     </tr>
                 <?php
                    $no++;
                        }
                 ?>
                </tbody>             
                </table>
            </div>
        </div>

        
    <?php 
    include '../aset/footer.php';
    ?>
 
</body>
</html>