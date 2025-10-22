<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_transaksi = $_POST['kode_transaksi'];
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $status = $_POST['status'];

    $sql = "INSERT INTO transaksi (kode_transaksi, id_buku, id_anggota, tdl_pinjam, tgl_kembali, status) 
            VALUES ('$kode_transaksi', '$id_buku', '$id_anggota', '$tgl_pinjam', '$tgl_kembali', '$status')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ?url=data-transaksi");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    header("Location: ?url=tambah-transaksi");
    exit();
}
