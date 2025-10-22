<h5>Halaman Tambah Data User.</h5>
<a href="?url=user" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-tambah-user" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label>Nama User</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Username</label>
        <input type="text" name="username"  class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Email</label>
        <input type="text" name="email"  class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="text" name="password"  class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Level Petugas</label>
        <select name="level" class="form-control" required>
            <option value="">Pilih Level Petugas</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Cover:</label>
        <input type="file" name="gambar" accept="image/*" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="simpan"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> KOSONGKAN </button>
    </div>
</form>