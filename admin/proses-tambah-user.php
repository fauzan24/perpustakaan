<?php

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];

if(isset($_POST['simpan'])){
    $direktori = "../img/";
    $nama_file = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'],$direktori.$nama_file);
    include '../koneksi.php';
    $sql = "INSERT INTO users(name,username,email,password,level,gambar) VALUES('$name','$username','$email','$password','$level','$nama_file')";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        header("Location:?url=user");
    }else{
        echo"<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=user');</script>";
    }
}
