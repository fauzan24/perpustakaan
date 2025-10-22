<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('L', 'A4', 'en', array(8, 8, 8, 8)); 
include '../koneksi.php';
$no = 1;
$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
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
        background-color: #f2f2f2;
    }
</style>

<h5 style="text-align: center;">Laporan Data Buku</h5>
<hr>
<table>
    <thead>
        <tr>
            <th style="width: 5%;">No</th>
            <th style="width: 12%;">Judul</th>
            <th style="width: 7%;">ISBN</th>
            <th style="width: 7%;">Pengarang</th>
            <th style="width: 10%;">Penerbit</th>
            <th style="width: 7%;">Tahun Terbit</th>
            <th style="width: 7%;">Jumlah Buku</th>
            <th style="width: 20%;">Deskripsi</th>
            <th style="width: 7%;">Rak</th>
            <th style="width: 7%;">Cover</th>
        </tr>
    </thead>
    <tbody>';

foreach ($query as $data) {
    $html .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $data['judul'] . '</td>
        <td>' . $data['isbn'] . '</td>
        <td>' . $data['pengarang'] . '</td>
        <td>' . $data['penerbit'] . '</td>
        <td>' . $data['tahun_terbit'] . '</td>
        <td>' . $data['jumlah_buku'] . '</td>
        <td>' . $data['deskripsi'] . '</td>
        <td>' . $data['lokasi'] . '</td>
        <td><img src="../img/' . $data['cover'] . '" alt="Cover" width="60" height="60" style="border-radius:10%;"></td>
    </tr>';
}

$html .= '
    </tbody>
</table>';

$html2pdf->writeHTML($html);

$html2pdf->output('laporan_perpustakaan_bergerak.pdf', 'I');