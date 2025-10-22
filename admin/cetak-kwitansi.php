<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'A4', 'en', array(8, 8, 8, 8));

include '../koneksi.php';
$no = 1;
$sql = "SELECT transaksi.*, anggota.nama AS nama, buku.judul AS judul FROM transaksi 
JOIN anggota ON transaksi.id_anggota = anggota.id_anggota 
JOIN buku ON transaksi.id_buku = buku.id_buku 
ORDER BY transaksi.id_transaksi DESC";
$query = mysqli_query($koneksi, $sql);

$html = '
<style>
    table {
        width: 100%;
        max-width: 100%; /* Membatasi lebar maksimal tabel */
        border-collapse: collapse;
        font-size: 10px; /* Mengecilkan ukuran font */
    }
    th, td {
        padding: 5px 8px; /* Mengurangi padding */
        text-align: left;
        border: 1px solid black;
    }
    th {
        background-color: #F3C623;
    }
</style>

<h5 style="text-align: center;">Laporan Transaksi Buku</h5>
<hr>
<table>
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 7%;">Kode Transaksi</th>
            <th style="width: 10%;">Anggota</th>
            <th style="width: 10%;">Buku</th>
            <th style="width: 12%;">Tanggal Pinjam</th>
            <th style="width: 12%;">Tanggal Kembali</th>
            <th style="width: 7%;">Status</th>
        </tr>
    </thead>
    <tbody>';

foreach ($query as $data) {
    $html .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $data['kode_transaksi'] . '</td>
        <td>' . $data['nama'] . '</td>
        <td>' . $data['judul'] . '</td>
        <td>' . $data['tgl_pinjam'] . '</td>
        <td>' . $data['tgl_kembali'] . '</td>
        <td>' . ($data['status'] == "pinjam"
        ? "<span style='background-color: crimson;'>Pinjam</span>"
        : "<span style='background-color: lime;'>Kembali</span>") . '</td>
    </tr>';
}

$html .= '
    </tbody>
</table>';

$html2pdf->writeHTML($html);

$html2pdf->output('laporan_perpustakaan_bergerak.pdf', 'I');