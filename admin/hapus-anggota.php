<?php

$id_anggota = $_GET['id_anggota'];

include '../koneksi.php';
$sql = "DELETE FROM anggota WHERE id_anggota='$id_anggota'";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:?url=anggota");
}else{
    echo"<script>alert('Maaf Data Tidak Terhapus'); window.location.assign('?url=anggota');</script>";
}