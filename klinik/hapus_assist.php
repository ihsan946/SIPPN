<?php 
include "../koneksi/koneksi.php";
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

if($_POST== null){
    echo "error";
}
else{
    $id_pengguna = $_POST['id_pengguna'];
    $query = mysqli_query($koneksi,"SELECT id_skrining FROM `t_skrining` WHERE id_pengguna = '$id_pengguna'");
    while($data = mysqli_fetch_array($query)){
        $id_skrining = $data['id_skrining'];
    } 
    $queryHapus = mysqli_query($koneksi,"DELETE FROM `t_skrining` WHERE `t_skrining`.`id_skrining` = '$id_skrining'");
    header("location:testassist.php");
    exit();
}
?>