<?php

$npm = $_POST['npm'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$jk = $_POST['jk'];
$prodi = $_POST['prodi'];
$id_user = $_POST['id_user'];

include '../koneksi.php';

$sql_check_user = "SELECT * FROM users WHERE id_user = '$id_user'";
$result_check_user = mysqli_query($koneksi, $sql_check_user);

if (mysqli_num_rows($result_check_user) > 0) {
    $sql = "INSERT INTO anggota(npm, nama, tempat_lahir, tgl_lahir, jk, prodi, id_user) 
            VALUES('$npm', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$prodi', '$id_user')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location:?url=anggota");
    } else {
        echo "<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=anggota');</script>";
    }
} else {
    echo "<script>alert('User tidak ditemukan'); window.location.assign('?url=anggota');</script>";
}
?>
