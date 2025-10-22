<?php

$id_transaksi = $_GET['id_transaksi'];

include '../koneksi.php';
$sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:?url=transaksi");
}else{
    echo"<script>alert('Maaf Data Tidak Terhapus'); window.location.assign('?url=transaksi');</script>";
}