<?php

$nama = $_POST['nama'];
$npm = $_POST['npm'];

include 'koneksi.php';
$sql = "SELECT*FROM anggota WHERE nama='$nama' AND npm='$npm'";
$query = mysqli_query($koneksi,$sql);
if(mysqli_num_rows($query)>0){
    session_start();
    $data = mysqli_fetch_array($query);
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['id'] = $data['id_anggota'];
    $_SESSION['npm'] = $data['npm'];

    header('location:anggota/anggota.php');
}else{
    echo"<script>
    alert('Maaf Anda Gagal Login, Silahkan Ulangi Lagi');
    window.Location.assign('index.php')
    </script>";
}
?>