<?php
include "../koneksi/koneksi.php";
session_start();
if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}
$id_user = $_POST['id_user'];

$query = mysqli_query($koneksi, "DELETE FROM `t_user` WHERE `t_user`.`id_user` = '$id_user';");

if ($query) {
    # code...
    header("location:user.php?p=hapus");
    exit();
} else {
    header("location:user.php?p=gagal");
    exit();
}
