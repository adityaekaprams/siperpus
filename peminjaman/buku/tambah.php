<?php
    include '../koneksi.php';
    include '../aset/header.php';

    $query = mysqli_query($kon, "SELECT * FROM kategori");
    ?>
     <!DOCTYPE html>
     <html>
     <head>
        <title>tambah data buku</title>
        </head>
        <body>
<div class="container">
    <div class="row mt-4">
        <div class="col-md">
            <center>
            <div class="card" style="width: 100%;">
                <div class="card-header" style="width: 100%">
                    <h2 class="card-title"><i class="fas fas fa-book"></i> tambah data buku</h2>
                    </div>
                    <div class="card-body">
                    <form action="proses_tambah.php" method="post">
                    <table class="table">
                        <tr>
                            <td>judul buku</td>
                            <td><input type="text" name="judul"></td>
                        </tr>
                        <tr>
                            <td>penerbit</td>
                            <td><input type="text" name="penerbit"></td>
                        </tr>
                        <tr>
                            <td>pengarang</td>
                            <td><input type="text" name="pengarang"></td>
                        </tr>
                        <tr>
                            <td>ringkasan</td>
                            <td>
                                <textarea name="ringkasan">
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>cover</td>
                            <td><input type="file" name="cover"></td>
                        </tr>
                        <tr>
                            <td>stok</td>
                            <td><input type="number" name="stok"></td>                                   
                        </tr>
                        <tr>
                            <td>kategori</td>
                            <td><select style="width: 200px" name="id_kategori">
                                <option value="">-- pilih kategori --</option>
                                <?php
                                    while($kategori = mysqli_fetch_assoc($query)):
                                ?>
                                <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                    <?php
                                       endwhile;
                                    ?>
                                </select>
                                </td>
                                </tr>
                        </tr>
                        <tr>
                            <th></th>
                            <th><input type="submit" name="simpan" value="simpan"></th>
                        </tr>
                    </table>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
            </body>
        <html>
        <?php
    include '../aset/footer.php';
    ?>

