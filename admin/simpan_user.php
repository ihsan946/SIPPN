<?php
include "../koneksi/koneksi.php";
session_start();

if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

$username = $_POST['username'];
$password = $_POST['password'];
$posisi = $_POST['posisi'];
$query = mysqli_query($koneksi, "INSERT INTO `t_user` (`id_user`, `username`, `password`, `posisi`) VALUES (NULL, '$username', '$password', '$posisi');");
header("location:user.php?p=sukses");
exit();
