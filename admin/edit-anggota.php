<?php
$id_anggota = $_GET['id_anggota'];
include '../koneksi.php';
$sql = "SELECT*FROM anggota WHERE id_anggota='$id_anggota'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data Anggota.</h5>
<a href="?url=anggota" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-edit-anggota&id_anggota=<?= $id_anggota; ?>">
    <div class="form-group mb-2">
        <label>NPM</label>
        <input value="<?= $data['npm']?>" readonly type="number" name="npm" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input value="<?= $data['nama']?>" type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tempat Lahir</label>
        <input value="<?= $data['tempat_lahir']?>" type="text" name="tempat_lahir" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Lahir</label>
        <input value="<?= $data['tgl_lahir']?>" type="date" name="tgl_lahir" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
            <option value="<?= $data['jk']?>"> <?= $data['jk']?></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Prodi</label>
        <input value="<?= $data['prodi']?>" type="text" name="prodi" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> KOSONGKAN </button>
    </div>
</form>