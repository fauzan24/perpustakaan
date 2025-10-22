<?php

$judul = $_POST['judul'];
$isbn = $_POST['isbn'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$jumlah_buku = $_POST['jumlah_buku'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];

if(isset($_POST['simpan'])){
    $direktori = "../img/";
    $nama_file = $_FILES['cover']['name'];
    move_uploaded_file($_FILES['cover']['tmp_name'],$direktori.$nama_file);
    include '../koneksi.php';
    $sql = "INSERT INTO buku(judul,isbn,pengarang,penerbit,tahun_terbit,jumlah_buku,lokasi,deskripsi,cover) VALUES('$judul','$isbn','$pengarang','$penerbit','$tahun_terbit','$jumlah_buku','$lokasi','$deskripsi','$nama_file')";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("Location:?url=buku");
    }else{
        echo"<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=spp');</script>";
    }
}
