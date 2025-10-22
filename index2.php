<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sistem Peminjaman & Pengelolaan Perpustakaan.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h4 class="text-center">LOGIN ADMIN</h4>
            <div class="card">
                <div class="card-header">
                    <img src="logo.jpg" width="100%">
                </div>
                <div class="card-body">
                    <form action="proses-login-admin.php" method="post">
                        <div class="form-group mb-2">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" placeholder="masukan username anda.." required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="masukan Password anda.." required>
                        </div>
                        <div class="form-grup mb-2">
                            <button type="submit" class="btn btn-primary"> LOGIN </button>
                        </div>
                        <a href="index.php"> Login Sebagai user </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootsrap.bundle.min.js"></script>
</body>
</html>