<?php
session_start();

if(empty($_SESSION['npm'])){
    echo"<script>
        alert('Maaf Anda Belum Login');
        window.location.assign('../index.php');
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota - Sistem Peminjaman & Pengelolaan Perpustakaan.</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    
    <h3>Sistem Peminjaman & Pengelolaan Perpustakaan</h3>
        <div class="alert alert-info">
            Anda Login Sebagai Anggota <b><?= $_SESSION['nama']?></b> Sistem Peminjaman & Pengelolaan Perpustakaan..
        </div>
            <a href="anggota.php" class="btn btn-primary"> Anggota</a>
            <a href="anggota.php?url=logout" class="btn btn-primary"> logout</a>

<div class="card mt-2">
    <div class="card-body">
        <!-- ini isi web -->
         <?php
            $file = @$_GET['url'];
            if(empty($file)){
                echo"<h4>Selamat Datang Di Halaman Siswa. </h4>";
                echo"Aplikasi Pembayaran SPP digunakan untuk mempermudah dalam mencatat pembayaran siswa / siswi di sekolah.";
                echo"<hr>";
                include 'transaksi.php';
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