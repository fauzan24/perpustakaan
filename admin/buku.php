<h5>Halaman Data</h5>
<a href="?url=tambah-buku" class="btn btn-primary"> Tambah Buku </a>
<a href="export_buku.php" class="btn btn-success">Unduh Laporan Buku</a>
<a href="cetak-buku.php?id_transaksi=<?= $data['id_buku'] ?>" class="btn btn-success" target="_blank">Cetak Buku PDF</a>
<hr>
<hr>
<table class="table table-striped table-bordered text-center">
    <tr class="fw-bold">
        <td>No</td>
        <td>Cover</td>
        <td>Judul</td>
        <td>ISBN</td>
        <td>Pengarang</td>
        <td>Penerbit</td>
        <td>Tahun</td>
        <td>Jumlah</td>
        <td>Deskripsi</td>
        <td>Lokasi</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT * FROM buku ORDER BY id_buku DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ ?>
        <tr>
            <td><?= $no++; ?></td> 
            <td>
                <img src="../img/<?= $data['cover'] ?>" alt="<?= $data['cover'] ?>" style="width: 130px; height: auto;">
            </td>
            <td><?= $data['judul'] ?></td>
            <td><?= $data['isbn'] ?></td>
            <td><?= $data['pengarang'] ?></td>
            <td><?= $data['penerbit'] ?></td>
            <td><?= $data['tahun_terbit'] ?></td>
            <td><?= $data['jumlah_buku'] ?></td>
            <td><?= $data['deskripsi'] ?></td>
            <td><?= $data['lokasi'] ?></td>
            <td>
                <a href="?url=edit-buku&id_buku=<?= $data['id_buku'] ?>" class='btn btn-warning'>EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-buku&id_buku=<?= $data['id_buku'] ?>" class='btn btn-danger'>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>
