<?php

$id_anggota = $_GET['id_anggota'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$jk = $_POST['jk'];
$prodi = $_POST['prodi'];

include '../koneksi.php';
$sql = "UPDATE anggota SET id_anggota='$id_anggota',npm='$npm',nama='$nama',tempat_lahir='$tempat_lahir',jk='$jk',prodi='$prodi' WHERE id_anggota='$id_anggota'";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:?url=anggota");
}else{
    echo"<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=anggota');</script>";
}