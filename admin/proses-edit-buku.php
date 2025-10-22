<?php
$id_buku = $_GET['id_buku'];
$judul = $_POST['judul'];
$isbn = $_POST['isbn'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$jumlah_buku = $_POST['jumlah_buku'];
$deskripsi = $_POST['deskripsi'];
$lokasi = $_POST['lokasi'];

include '../koneksi.php';
$sql = "SELECT * FROM buku WHERE id_buku='$id_buku'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);

$cover = $data['cover']; 
if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
    $target_dir = "../img/";
    $cover = basename($_FILES["cover"]["name"]);
    $target_file = $target_dir . $cover;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["cover"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    if ($_FILES["cover"]["size"] > 500000) {
        echo "Maaf, file terlalu besar.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG, & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
            if (!empty($data['cover']) && file_exists("uploads/" . $data['cover'])) {
                unlink("../img/" . $data['cover']);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload gambar.";
            $uploadOk = 0;
        }
    }
}

$sql = "UPDATE buku SET judul='$judul', isbn='$isbn', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', jumlah_buku='$jumlah_buku', deskripsi='$deskripsi',
    lokasi='$lokasi', cover='$cover' WHERE id_buku='$id_buku'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("location:?url=buku");
} else {
    echo "<script>alert('Maaf, data tidak tersimpan'); window.location.assign('?url=buku');</script>";
}
?>