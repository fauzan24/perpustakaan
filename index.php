<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota - Sistem Peminjaman & Pengelolaan Perpustakaan.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h4 class="text-center">LOGIN ANGGOTA</h4>
            <div class="card">
                <div class="card-header">
                    <img src="logo.jpg" width="100%">
                </div>
                <div class="card-body">
                    <form action="proses-login-anggota.php" method="post">
                        <div class="form-group mb-2">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="masukan nama anda.." required>
                        </div>
                        <div class="form-group mb-2">
                            <label>NPM</label>
                            <input type="numer" name="npm" class="form-control" placeholder="masukan npm anda.." required>
                        </div>
                        <div class="form-grup mb-2">
                            <button type="submit" class="btn btn-primary"> LOGIN </button>
                        </div>
                        <a href="index2.php"> Login Sebagai Administrator / petugas </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootsrap.bundle.min.js"></script>
</body>
</html>