<?php

$username = $_POST['username'];
$password = $_POST['password'];

include 'koneksi.php';
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
if(mysqli_num_rows($query)>0){
    $data = mysqli_fetch_array($query);
    session_start();
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['level'] = $data['level'];
    if($data['level']=='admin'){
        header('Location:admin/admin.php');
    }
    elseif($data['level']=='petugas'){
        header('Location:petugas/petugas.php');
    }
    else{
        echo "<script>
        alert('Maaf Login Gagal, Username atau Password Salah');
        window.location.assign('index2.php');
        </script>";
    }
    
}
?>