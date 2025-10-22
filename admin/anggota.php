<h5>Halaman Data Anggota.</h5>
<a href="?url=tambah-anggota" class="btn btn-primary"> Tambah Anggota </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>User</td>
        <td>NPM</td>
        <td>Nama</td>
        <td>Tempat Lahir</td>
        <td>Tanggal Lahir</td>
        <td>Jenis Kelamin</td>
        <td>Prodi</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM anggota ORDER BY id_anggota";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['id_user'] ?></td>
            <td><?= $data['npm'] ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['tempat_lahir'] ?></td>
            <td><?= $data['tgl_lahir'] ?></td>
            <td><?= $data['jk'] ?></td>
            <td><?= $data['prodi'] ?></td>
            <td>
                <a href="?url=edit-anggota&id_anggota=<?= $data['id_anggota'] ?>" class='btn btn-warning'>EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-anggota&id_anggota=<?= $data['id_anggota'] ?>" class='btn btn-danger'>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>