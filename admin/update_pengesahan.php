<?php
include "../koneksi/koneksi.php";
session_start();

if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}


if ($_POST == null) {
    echo "error";
} else {

    $id = $_POST['id'];
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $nrp = $_POST['nrp'];
    $jabatan = $_POST['jabatan'];

    echo $id;
    echo "<br>";
    echo $nama;
    echo "<br>";
    echo $nrp;
    echo "<br>";
    echo $jabatan;
    echo "<br>";
    echo $id_user;

    $query = mysqli_query($koneksi, "UPDATE `t_pengesahan` SET `id_user` = '$id_user', `nama` = '$nama', `nrp` = '$nrp', `jabatan` = '$jabatan' WHERE `t_pengesahan`.`id` = '$id';");

    header("location:pengesahan.php?p=edit");
    exit();
}
