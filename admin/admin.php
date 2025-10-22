<?php
session_start();

if(empty($_SESSION['id_user'])){
    echo"<script>
        alert('Maaf Anda Belum Login');
        window.location.assign('../index2.php');
        </script>";
}
if($_SESSION['level']!='admin'){
    echo"<script>
        alert('Maaf Anda Bukan Sesi Admin');
        window.location.assign('../index2.php');
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Peminjaman & Pengelolaan Perpustakaan.</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    
    <h3>Sistem Peminjaman & Pengelolaan Perpustakaan</h3>
        <div class="alert alert-info">
            Anda Login Sebagai <b>ADMINISTRATOR</b> Sistem Peminjaman & Pengelolaan Perpustakaan.
        </div>
            <a href="admin.php" class="btn btn-primary"> Administrator</a>
            <a href="admin.php?url=buku" class="btn btn-primary"> Buku</a>
            <a href="admin.php?url=user" class="btn btn-primary"> User</a>
            <a href="admin.php?url=anggota" class="btn btn-primary"> Anggota</a>
            <a href="admin.php?url=transaksi" class="btn btn-primary"> transaksi</a>
            <a href="admin.php?url=logout" class="btn btn-primary"> logout</a>

<div class="card mt-2">
    <div class="card-body">
        <!-- ini isi web -->
         <?php
            $file = @$_GET['url'];
            if(empty($file)){
                echo"<h4>Selamat Datang Di Halaman Administrator. </h4>";
                echo"Aplikasi Pembayaran SPP digunakan untuk mempermudah dalam mencatat pembayaran siswa / siswi di sekolah.";
            }else{
                include $file.'.php';
            }
         ?>

</div>
</div>

</div>

<script src="../js/bootsrap.bundle.min.js"></script>
</body>
</html>