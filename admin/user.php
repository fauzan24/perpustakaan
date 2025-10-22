<h5>Halaman Data User.</h5>
<a href="?url=tambah-user" class="btn btn-primary"> Tambah User </a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Foto</td>
        <td>Nama</td>
        <td>Username</td>
        <td>Email</td>
        <td>Password</td>
        <td>Level</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
    include '../koneksi.php';
    $no = 1;
    $sql = "SELECT*FROM users ORDER BY id_user DESC";
    $query = mysqli_query($koneksi, $sql);
    foreach($query as $data){ ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>
                <img src="../img/<?= $data['gambar'] ?>" alt="<?= $data['gambar'] ?>" style="width: 130px; height: auto;">
            </td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['username'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['password'] ?></td>
            <td><?= $data['level'] ?></td>
            <td>
                <a href="?url=edit-user&id_user=<?= $data['id_user'] ?>" class='btn btn-warning'>EDIT</a>
            </td>
            <td>
                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data')" href="?url=hapus-user&id_user=<?= $data['id_user'] ?>" class='btn btn-danger'>HAPUS</a>
            </td>
        </tr>
    <?php } ?>
</table>