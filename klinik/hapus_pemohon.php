<?php 
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}
include "../koneksi/koneksi.php";

if($_POST == null){
    echo "error";
}else{
    $id_pengguna = $_POST['id_pengguna'];
    $query = mysqli_query($koneksi, "DELETE FROM `t_pengguna` WHERE `t_pengguna`.`id_pengguna` = '$id_pengguna'");
    header("location:pemohon.php");
    exit();
}
?>