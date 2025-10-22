<h5>Halaman Tambah Data Anggota.</h5>
<a href="?url=anggota" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-tambah-anggota">
    <div class="form-group mb-2">
        <label>Id User</label>
        <select name="id_user" class="form-control" required>
            <option value="">Pilih id User</option>
            <?php
            include '../koneksi.php';
            $user = mysqli_query($koneksi,"SELECT * FROM users ORDER BY name ASC");
            foreach($user as $data_user) {
            ?>
            <option value="<?= $data_user['id_user']; ?>"> <?=$data_user['name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>NPM</label>
        <input type="number" name="npm" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
            <option value="">Pilih Kelamin</option>
            <option value="Laki-Laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Prodi</label>
        <input type="text" name="prodi" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> KOSONGKAN </button>
    </div>
</form>
