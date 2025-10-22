<?php

$id_buku = $_GET['id_buku'];

include '../koneksi.php';
$sql = "DELETE FROM buku WHERE id_buku='$id_buku'";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:?url=buku");
}else{
    echo"<script>alert('Maaf Data Tidak Terhapus'); window.location.assign('?url=buku');</script>";
}