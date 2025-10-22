<h5>Halaman Tambah Buku.</h5>
<a href="?url=buku" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-tambah-buku" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label>judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>ISBN</label>
        <input type="number" name="isbn" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Pengarang</label>
        <input type="text" name="pengarang" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" maxlength="4" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Jumlah Buku</label>
        <input type="number" name="jumlah_buku" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Lokasi</label>
        <select name="lokasi" class="form-control" required>
            <option value="">Pilih lokasi</option>
            <option value="rak1">Rak 1</option>
            <option value="rak2">Rak 2</option>
            <option value="rak3">Rak 3</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Cover:</label>
        <input type="file" name="cover" accept="image/*" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="simpan"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> KOSONGKAN </button>
    </div>
</form>