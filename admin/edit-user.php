<?php
$id_user = $_GET['id_user'];
include '../koneksi.php';
$sql = "SELECT*FROM users WHERE id_user='$id_user'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman Edit Data User.</h5>
<a href="?url=user" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-edit-user&id_user=<?= $id_user; ?>" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label>Nama User</label>
        <input value="<?= $data['name']?>"type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Username</label>
        <input value="<?= $data['username']?>"type="text" name="username"  class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Email</label>
        <input value="<?= $data['email']?>"type="text" name="email"  class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input value="<?= $data['password']?>"type="text" name="password"  class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Level User</label>
        <select name="level" class="form-control" required>
            <option value="<?= $data['level']?>"> <?= $data['level']?></option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
    <div>
        <label>Cover Baru</label>
        <input type="file" name="gambar" accept="image/*">
        <img src="../img/<?= $data['gambar'] ?>" alt="Gambar Cover" width="100px" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="edit"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> KOSONGKAN </button>
    </div>
</form>