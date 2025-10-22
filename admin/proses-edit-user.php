<?php
$id_user = $_GET['id_user'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];

if (isset($_POST['edit'])) {
    
    $direktori = "../img/";
    $file_name = $_FILES['gambar']['name'];
    
    include '../koneksi.php';

    if (!empty($file_name)) {
        
        move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori . $file_name);
        
        $sql = "UPDATE users SET id_user='$id_user',
                name='$name', 
                username='$username', 
                email='$email', 
                password='$password', 
                gambar='$file_name', 
                level='$level',gambar='$file_name' 
                WHERE id_user='$id_user'";
    } else {

        $sql = "UPDATE users SET id_user='$id_user',
                name='$name', 
                username='$username', 
                email='$email', 
                password='$password', 
                level='$level', 
                WHERE id_user='$id_user'";
    }

    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location:?url=user");
    } else {
        echo "<script>alert('Maaf, data tidak tersimpan'); window.location.assign('?url=user');</script>";
}
}
?>
