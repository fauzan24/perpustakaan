<?php
$id_buku = $_GET['id_buku'];
include '../koneksi.php';
$sql = "SELECT*FROM buku WHERE id_buku='$id_buku'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data Buku.</h5>
<a href="?url=buku" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-edit-buku&id_buku=<?= $id_buku; ?>" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label>Judul</label>
        <input value="<?= $data['judul'] ?>" type="text" name="judul" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>ISBN</label>
        <input value="<?= $data['isbn'] ?>" type="number" name="isbn" maxlength="13" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Pengarang</label>
        <input value="<?= $data['pengarang'] ?>" type="text" name="pengarang" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Penerbit</label>
        <input value="<?= $data['penerbit'] ?>" type="text" name="penerbit" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input value="<?= $data['tahun_terbit'] ?>" type="number" name="tahun_terbit" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Jumlah</label>
        <input value="<?= $data['jumlah_buku'] ?>" type="number" name="jumlah_buku" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Deskripsi</label>
        <input value="<?= $data['deskripsi'] ?>" type="text" name="deskripsi" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Lokasi</label>
        <select name="lokasi" class="form-control" required>
            <option value="<?= $data['lokasi']?>"> <?= $data['lokasi']?></option>
            <option value="rak1">Rak 1</option>
            <option value="rak2">Rak 2</option>
            <option value="rak3">Rak 3</option>
        </select>
    </div>
    <div>
        <label>Cover</label>
        <img src="../img/<?= $data['cover'] ?>" alt="Gambar Cover" width="100px" required>
    </div>
    <div>
        <label>Cover Baru</label>
        <input type="file" name="cover" accept="image/*">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="edit"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> KOSONGKAN </button>
    </div>
</form>