<?php
session_start();
if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

include "../koneksi/koneksi.php";
if ($_POST == null) {
    echo "tidak ada data yang diubah";
} else {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $posisi = $_POST['posisi'];


    $query = mysqli_query($koneksi, "UPDATE `t_user` SET `username` = '$username', `password` = '$password', `posisi` = '$posisi' WHERE `t_user`.`id_user` = $id_user;");

    header("location:user.php?p=edit");
    exit();
}
