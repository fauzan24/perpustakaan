<?php
include '../koneksi.php';

$kode_query = mysqli_query($koneksi, "SELECT kode_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1");
$last_kode = mysqli_fetch_assoc($kode_query);

if ($last_kode) {
    $last_number = intval(substr($last_kode['kode_transaksi'], 1));
    $new_number = $last_number + 1;
} else {
    $new_number = 1;
}
$kode_transaksi_default = 'T' . str_pad($new_number, 3, '0', STR_PAD_LEFT);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_transaksi = $_POST['kode_transaksi'];
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_SESSION['id'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $status = $_POST['status'];

    $cek_peminjaman = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_anggota = '$id_anggota' AND status = 'pinjam'");
    if (mysqli_num_rows($cek_peminjaman) > 0) {
        echo "<script>alert('Peminjam masih memiliki buku yang dipinjam.');</script>";
    } else {
        $buku_query = mysqli_query($koneksi, "SELECT jumlah_buku FROM buku WHERE id_buku = '$id_buku'");
        $buku_data = mysqli_fetch_assoc($buku_query);

        if ($buku_data['jumlah_buku'] <= 0) {
            echo "<script>alert('Jumlah buku sudah habis.');</script>";
        } else {
            $sql = "INSERT INTO transaksi (kode_transaksi, id_buku, id_anggota, tgl_pinjam, tgl_kembali, status) VALUES ('$kode_transaksi', '$id_buku', '$id_anggota', '$tgl_pinjam', '$tgl_kembali', '$status')";
            mysqli_query($koneksi, $sql);

            $new_jumlah = $buku_data['jumlah_buku'] - 1;
            mysqli_query($koneksi, "UPDATE buku SET jumlah_buku = '$new_jumlah' WHERE id_buku = '$id_buku'");

            header("Location: ?url=transaksi");
            exit();
        }
    }
}

$buku_query = mysqli_query($koneksi, "SELECT * FROM buku");
$anggota_query = mysqli_query($koneksi, "SELECT * FROM anggota");

$tgl_pinjam_default = date("Y-m-d");
$tgl_kembali_default = date("Y-m-d", strtotime("+7 days", strtotime($tgl_pinjam_default)));
?>

<h5>Tambah Transaksi</h5>
<a href="?url=transaksi" class="btn btn-primary"> KEMBALI </a>
<form method="POST" action="">
    <div class="mb-3">
        <label for="kode_transaksi" class="form-label">Kode Transaksi</label>
        <input type="text" class="form-control" name="kode_transaksi" value="<?= $kode_transaksi_default ?>" readonly required>
    </div>

    <div class="mb-3">
        <label for="id_buku" class="form-label">Pilih Buku</label>
        <select class="form-select" name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php while ($buku = mysqli_fetch_assoc($buku_query)) { ?>
                <option value="<?= $buku['id_buku'] ?>"><?= $buku['judul'] ?> (Jumlah: <?= $buku['jumlah_buku'] ?>)</option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_anggota" class="form-label">Pilih Peminjam</label>
        <input type="text" class="form-control" name="kode_transaksi" value="<?= $_SESSION['nama'] ?>" readonly required>
    </div>

    <div class="mb-3">
        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
        <input type="date" class="form-control" name="tgl_pinjam" value="<?= $tgl_pinjam_default ?>" required>
    </div>

    <div class="mb-3">
        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
        <input type="date" class="form-control" name="tgl_kembali" value="<?= $tgl_kembali_default ?>" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" name="status" required>
            <option value="pinjam">Dipinjam</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
</form>
