<?php
include "../koneksi/koneksi.php";
session_start();
if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

$id = $_POST['id'];

$query = mysqli_query($koneksi, "DELETE FROM `t_pengesahan` WHERE `t_pengesahan`.`id` = '$id';");
header("location:pengesahan.php?p=hapus");
exit();
