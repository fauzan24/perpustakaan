<?php
include '../koneksi.php';

// Ambil data transaksi
$sql = "SELECT t.*, b.judul, a.nama 
        FROM transaksi t
        JOIN buku b ON t.id_buku = b.id_buku
        JOIN anggota a ON t.id_anggota = a.id_anggota 
        ORDER BY t.id_transaksi";
$query = mysqli_query($koneksi, $sql);

if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

// Cetak header
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Transaksi.xls");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Transaksi</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Buku</th>
            <th>Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
            $tgl_pinjam = date("Y-m-d", strtotime($data['tgl_pinjam']));
            $tgl_kembali = date("Y-m-d", strtotime($data['tgl_kembali']));
            $status = ucfirst($data['status']);
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kode_transaksi'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $tgl_pinjam ?></td>
                <td><?= $tgl_kembali ?></td>
                <td><?= $status ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
