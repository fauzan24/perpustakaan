<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['npm'])) {
    echo "<script>
        alert('Maaf Anda Belum Login');
        window.location.assign('../index.php');
        </script>";
    exit();
}

$npm = $_SESSION['npm'];
?>
<h5>Halaman Data Transaksi.</h5>
<a href="?url=tambah-transaksi" class="btn btn-primary">Tambah Transaksi</a>
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
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;

    $sql = "SELECT t.*, b.judul, a.nama 
            FROM transaksi t
            JOIN buku b ON t.id_buku = b.id_buku
            JOIN anggota a ON t.id_anggota = a.id_anggota 
            WHERE a.npm = ? 
            ORDER BY t.id_transaksi";
    
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $npm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        foreach ($result as $data) {
            $tgl_pinjam = date("Y-m-d", strtotime($data['tgl_pinjam']));
            $tgl_kembali = date("Y-m-d", strtotime($data['tgl_kembali']));
            $status = $data['status'];
            $status_class = $status === 'pinjam' ? 'bg-danger text-white' : 'bg-success text-white'; 
            ?>
            <tr class="text-center"> 
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['kode_transaksi']) ?></td>
                <td><?= htmlspecialchars($data['judul']) ?></td>
                <td><?= htmlspecialchars($data['nama']) ?></td>
                <td><?= $tgl_pinjam ?></td>
                <td><?= $tgl_kembali ?></td>
                <td>
                    <span class="badge <?= $status_class ?>"><?= ucfirst($status) ?></span>
                </td> 
            </tr>
        <?php 
        } 
    } else {
        echo "<tr><td colspan='7' class='text-center'>Tidak ada data transaksi.</td></tr>";
    }
    
    $stmt->close();
    $koneksi->close();
    ?>
</table>
