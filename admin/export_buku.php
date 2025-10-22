<?php
include '../koneksi.php';

$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
$query = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($query) > 0) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan_buku.xls"');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo "<table border='1'>
            <tr>
                <th>No</th>
                <th>Cover</th>
                <th>Judul</th>
                <th>ISBN</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
            </tr>";

    $no = 1;
    foreach ($query as $data) {
        echo "<tr>
                <td>{$no}</td>
                <td><img src='../img/{$data['cover']}' alt='{$data['cover']}' style='width: 130px; height: auto;'></td>
                <td>{$data['judul']}</td>
                <td>{$data['isbn']}</td>
                <td>{$data['pengarang']}</td>
                <td>{$data['penerbit']}</td>
                <td>{$data['tahun_terbit']}</td>
                <td>{$data['jumlah_buku']}</td>
                <td>{$data['deskripsi']}</td>
                <td>{$data['lokasi']}</td>
              </tr>";
        $no++;
    }
    echo "</table>";
} else {
    echo "Tidak ada data buku.";
}

mysqli_close($koneksi);
?>
