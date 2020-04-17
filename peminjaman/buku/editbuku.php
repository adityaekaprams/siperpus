<?php  
include '../koneksi.php';
include '../aset/header.php';

$id_buku = $_GET['id_buku'];
$query = mysqli_query($kon, "SELECT * FROM buku WHERE id_buku=$id_buku");
$query1 = mysqli_query($kon, "SELECT * FROM kategori");

if (isset($_POST['simpan']))
{
    $judul          =$_POST['judul'];
    $penerbit       =$_POST['penerbit'];
    $pengarang      =$_POST['pengarang'];
    $ringkasan      =$_POST['ringkasan'];
    $cover          =$_POST['cover'];
    $stok           =$_POST['stok'];
    $kategori       =$_POST['id_kategori'];
    
    $sql="UPDATE buku SET judul='$judul',
                          penerbit='$penerbit',
                        pengarang='$pengarang',
                        ringkasan='$ringkasan',
                        cover='$cover',
                        stok='$stok',
                        id_kategori='$kategori'
                        WHERE id_buku = '$id_buku'
                        ";                            

    $res = mysqli_query($kon, $sql);
    $count = mysqli_affected_rows($kon);
    var_dump($count);
    
    if ($count>0){
        echo "
        <script>
            alert('data berhasil diedit');
            document.location.href='index.php';
            </script>
            ";
    }
}
    ?>
    <div class="container">
    <div class="row mt-4">
    <div class="col-md-9">
    <div class="card">
    <div class="card-header">
        <h2><i class="fas fa-user-plus"></i>Edit Data Buku</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            
                            <?php while($edit = mysqli_fetch_assoc($query)): ?>
                                <div class="form-group">
                                <label for="buku">judul</label>
                                <input type="text" class="form-control" name="judul" id="judul" value="<?= $edit['judul']?>">
                            </div>

                                <div class="form-group">
                                <label for="buku">penerbit</label>
                                <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $edit['penerbit']?>">
                            </div>

                                <div class="form-group">
                                <label for="buku">pengarang</label>
                                <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $edit['pengarang']?>">
                            </div>

                                <div class="form-group">
                                <label for="buku">ringkasan</label>
                                <textarea name="ringkasan" id="ringkasan" class="form-control" placeholder="<?= $edit['ringkasan']?>"></textarea>
                            </div>
                            
                                <div class="form-group">
                                <label for="buku">cover</label>
                                <input type="file" name="cover" id="cover" value="<?= $edit['cover']?>">
                            </div>
                            
                                <div class="form-group">
                                <label for="buku">stok</label>
                                <input type="number" class="form-control" name="stok" id="stok" value="<?= $edit['stok']?>">
                            </div>

                            <?php
                                endwhile;
                                ?>
                                    <div class="form-group">
                                    <label for="buku">kategori</label>
                                    <select style="width: 200px" name="id_kategori" class="form-control" id="id_kategori">
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php  
                                            while ($kategori = mysqli_fetch_assoc($query1)):
                                        ?>
                                        <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                        <?php  
                                            endwhile;
                                        ?>
                                    </select>
                                </div>
                                <button type="submit"class="btn btn-primary" name="simpan">simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


