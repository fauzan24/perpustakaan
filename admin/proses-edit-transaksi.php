<?php

$id_transaksi = $_GET['id_transaksi'];
$id_anggota = $_POST['id_anggota'];
$kode_transaksi = $_POST['kode_transaksi'];
$id_buku = $_POST['id_buku'];
$tanggal_pinjam = $_POST['tgl_pinjam'];
$tanggal_kembali = $_POST['tgl_kembali'];
$status = $_POST['status'];
$ket = $_POST['ket'];

include '../koneksi.php';
$sql_transaksi = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
$query_transaksi = mysqli_query($koneksi, $sql_transaksi);
$data_transaksi = mysqli_fetch_assoc($query_transaksi);

if ($data_transaksi['status'] == 'kembali') {
    echo "<script>alert('Data tidak dapat diedit karena statusnya sudah kembali.'); window.location.assign('?url=transaksi');</script>";
    exit();
}

$sql_update = "UPDATE transaksi SET 
    id_anggota='$id_anggota', 
    kode_transaksi='$kode_transaksi', 
    id_buku='$id_buku', 
    tgl_pinjam='$tanggal_pinjam', 
    tgl_kembali='$tanggal_kembali', 
    status='$status', 
    ket='$ket' 
    WHERE id_transaksi = '$id_transaksi'";
$query = mysqli_query($koneksi, $sql_update);

if ($query) {
    if ($data_transaksi['status'] == 'pinjam' && $status == 'kembali') {
        $sql_buku = "UPDATE buku SET jumlah_buku = jumlah_buku + 1 WHERE id_buku = '$id_buku'";
        mysqli_query($koneksi, $sql_buku);
    }
    header("Location:?url=transaksi");
} else {
    echo "<script>alert('Maaf, data tidak tersimpan'); window.location.assign('?url=transaksi');</script>";
}
?>
