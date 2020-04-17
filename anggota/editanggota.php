<?php  
include '../koneksi.php';
include '../aset/header.php';

$id_anggota = $_GET['id_anggota'];

$query = mysqli_query($kon, "SELECT * FROM anggota WHERE id_anggota=$id_anggota");

$query1 = mysqli_query($kon, "SELECT * FROM level");

if (isset($_POST['simpan']))
{
    $nama           =$_POST['nama'];
    $kelas          =$_POST['kelas'];
    $telp           =$_POST['telp'];
    $username       =$_POST['username'];
    $password       =$_POST['password'];
    $id_level       =$_POST['id_level'];
    
    $sql="UPDATE anggota SET nama='$nama',
                            kelas='$kelas',
                            telp='$telp',
                            username='$username',
                            password='$password',
                            id_level='$id_level'
                            WHERE id_anggota = '$id_anggota'
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
                                <label for="anggota">nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $edit['nama']?>">
                            </div>

                                <div class="form-group">
                                <label for="anggota">kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $edit['kelas']?>">
                            </div>

                                <div class="form-group">
                                <label for="anggota">telp</label>
                                <input type="text" class="form-control" name="telp" id="telp" value="<?= $edit['telp']?>">
                            </div>

                                <div class="form-group">
                                <label for="anggota">username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= $edit['username']?>">
                            </div>
                            
                                <div class="form-group">
                                <label for="anggota">password</label>
                                <input type="text" class="form-control" name="password" id="password" value="<?= $edit['password']?>">
                            </div>
                            
                            <?php
                                endwhile;
                                ?>
                            
                                    <div class="form-group">
                                    <label for="anggota">kategori</label>
                                    <select style="width: 200px" name="id_level" class="form-control" id="id_level">
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php  
                                            while ($id_level = mysqli_fetch_assoc($query1)):
                                        ?>
                                        <option value="<?php echo $id_level['id_level']; ?>"><?php echo $id_level['id_level']; ?></option>
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


