<?php
    include '../aset/header.php';
    ?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <h2>tambah data anggota</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="proses_tambah.php">
                    <div class="form-group">
                        <label for="anggota">nama lengkap</label>
                        <input type="text" class="form-control" name="nama" id="anggota" placeholder="masukkan nama lengkap">
                    </div>
                    <div class="form-group">
                        <label for="kelas">kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas" placeholder="masukkan nama kelas">
                        <small class="form-text text-muted">contoh:XRPL2</small>
                    </div>
                    <div class="form-group">
                        <label for="telp">nomor telepon</label>
                        <input type="text" class="form-control" name="telp" id="telp" placeholder="masukkan nomor telepon">
                        <small class="form-text text-muted">contoh : 111-222-3333</small>
                    </div>
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include '../aset/footer.php';
    ?>