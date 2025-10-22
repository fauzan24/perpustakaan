<h5>Halaman Data Transaksi.</h5>
<a href="?url=tambah-transaksi" class="btn btn-primary"> Tambah Transaksi </a>
<a href="cetak-transaksi.php?id_transaksi=<?= $data['id_transaksi'] ?>" class="btn btn-success" target="_blank">Cetak Transaksi Excel</a>
<a href="cetak-kwitansi.php?id_transaksi=<?= $data['id_transaksi'] ?>" class="btn btn-success" target="_blank">Cetak Transaksi PDF</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold text-center">
        <td>No</td>
        <td>Kode</td>
        <td>Buku</td>
        <td>Peminjam</td>
        <td>Tanggal Pinjam</td>
        <td>Tanggal Kembali</td>
        <td>Status</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT t.*, b.judul, a.nama 
            FROM transaksi t
            JOIN buku b ON t.id_buku = b.id_buku
            JOIN anggota a ON t.id_anggota = a.id_anggota 
            ORDER BY t.id_transaksi
    ";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        foreach ($query as $data) {
            $tgl_pinjam = date("Y-m-d", strtotime($data['tgl_pinjam']));
            $tgl_kembali = date("Y-m-d", strtotime($data['tgl_kembali']));
            $status = $data['status'];
            $status_class = $status === 'pinjam' ? 'bg-danger text-white' : 'bg-success text-white'; 
            ?>
            <tr class="text-center"> 
                <td><?= $no++; ?></td>
                <td><?= $data['kode_transaksi'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $tgl_pinjam ?></td>
                <td><?= $tgl_kembali ?></td>
                <td>
                    <span class="badge <?= $status_class ?>"><?= ucfirst($status) ?></span>
                </td> 
                <td>
                    <a href="?url=edit-transaksi&id_transaksi=<?= $data['id_transaksi'] ?>" class='btn btn-warning'>EDIT</a>
                </td>
                <td>
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')" href="?url=hapus-transaksi&id_transaksi=<?= $data['id_transaksi'] ?>" class='btn btn-danger'>HAPUS</a>
                </td>
                
                    
                
            </tr>
        <?php } 
    } else {
        echo "<tr><td colspan='9' class='text-center'>Tidak ada data transaksi.</td></tr>";
    }
    ?>
</table>
