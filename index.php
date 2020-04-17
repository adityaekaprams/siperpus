<?php 
    include 'koneksi.php';
    include 'aset/header.php';

    //menghitung jumlah data dari masing masing tabel buku, anggota, peminjaman
    $query_buku    = mysqli_query($kon, "SELECT COUNT(*) AS jumlah FROM buku");
    $query_anggota = mysqli_query($kon, "SELECT COUNT(*) AS jumlah FROM anggota");
    $query_pinjam  = mysqli_query($kon, "SELECT COUNT(*) AS jumlah FROM detail_pinjam");
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-mcd">
            </div>
            </div>

            <div class="row">
                <div class="col-md-4">

            </div>

                <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
            </div>

            </div>

            <div class="container">
                <div class="row mt-4">
                    <div class="col-md">
                    <h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
                    <hr class="bg-light">
            </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                <div class="card bg-danger" style="width: 18rem;">
                <div class="card-body text-white">
                <h5 class="card-title">JUMLAH BUKU</h5>
                <?php while($buku = mysqli_fetch_array($query_buku)):?>
                <!-- memanggil data yang sudah dihitung -->
                <p class="card-text" style="font-size:60px"><?=$buku['jumlah']?></p>
                <?php endwhile;?>
                <a href="detailbuku.php" class="text-white">LEBIH DETAIL<i class="fas fa-angle-double-right"></i></a>
                </div>
                </div>

            </div>
                <div class="col-md-4">
                <div class="card bg-warning" style="width: 18rem;">
                <div class="card-body text-white">
                <h5 class="card-title">JUMLAH ANGGOTA</h5>
                <?php while($anggota = mysqli_fetch_array($query_anggota)):?>
                <!-- memanggil data yang sudah dihitung -->
                <p class="card-text" style="font-size:60px"><?=$anggota['jumlah']?></p>
                <?php endwhile;?>
                <a href="#" class="text-white">LEBIH DETAIL<i class="fas fa-angle-double-right"></i></a>
                </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="col-md-4">
                <div class="card bg-info" style="width: 18rem;">
                <div class="card-body text-white">
                <h5 class="card-title">JUMLAH TRANSAKSI</h5>
                <?php while($pinjam = mysqli_fetch_array($query_pinjam)):?>
                <!-- memanggil data yang sudah dihitung -->
                <p class="card-text" style="font-size:60px"><?=$pinjam['jumlah']?></p>
                <?php endwhile;?>
                <a href="#" class="text-white">LEBIH DETAIL<i class="fas fa-angle-double-right"></i></a>
                </div>
                </div>
            </div>
            </div>

            </div>


<?php 
    include 'aset/footer.php';
?>