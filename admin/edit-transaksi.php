<?php
$id_transaksi = $_GET['id_transaksi'];
include'../koneksi.php';
$sql = "SELECT transaksi.*, anggota.nama, buku.judul FROM transaksi 
        JOIN anggota ON transaksi.id_anggota = anggota.id_anggota
        JOIN buku ON transaksi.id_buku = buku.id_buku
        WHERE transaksi.id_transaksi = '$id_transaksi'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Transaksi</h5>
<a href="?url=transaksi" class="btn btn-primary">Kembali</a>
<hr>
<form action="?url=proses-edit-transaksi&id_transaksi=<?= $id_transaksi; ?>" method="post">
<div class="form-group mb-2">
    <label>Kode Transaksi</label>
    <input value="<?= $data['kode_transaksi'] ?>" readonly type="text" name="kode_transaksi" class="form-control" required>
</div>
    <div class="form-group mb-2">
        <label>Nama Peminjam</label>
        <select name="id_anggota" class="form-control" required>
            <option value="<?= $data['id_anggota'] ?>"><?= $data['nama'] ?></option>
            <?php 
                include'../koneksi.php';
                $anggota = mysqli_query($koneksi,"SELECT * FROM anggota ORDER BY id_anggota ASC");
                foreach($anggota as $data_anggota){ ?>
                <option value="<?= $data_anggota['id_anggota']?>"><?= $data_anggota['nama'];?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Judul Buku</label>
        <select name="id_buku" class="form-control" required>
        <option value="<?= $data['id_buku'] ?>"><?= $data['judul'] ?></option>
            <?php 
                include'../koneksi.php';
                $buku = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY id_buku ASC");
                foreach($buku as $data_buku){ ?>
                <option value="<?= $data_buku['id_buku']?>"><?= $data_buku['judul'];?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-2">
    <label>Tanggal Pinjam</label>
        <input value=<?= $data['tgl_pinjam'] ?> readonly type="date" name="tgl_pinjam" class="form-control" required>
    </div>
    <div class="form-group mb-2">
    <label>Tanggal Kembali</label>
        <input value=<?= $data['tgl_kembali'] ?> readonly type="date" name="tgl_kembali" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Status</label>
        <select name="status" class="form-control" required>
        <option value="<?= $data['status'] ?>" selected><?= ucfirst($data['status']) ?></option>
            <option value="pinjam">Pinjam</option>
            <option value="kembali">Kembali</option>
        </select>
    </div>
    <div class="form-group mb-2">
    <label>Keterangan</label>
        <input value="<?= $data['ket'] ?>" type="text" name="ket" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>