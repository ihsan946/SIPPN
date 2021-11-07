<?php
include "../koneksi/koneksi.php";
session_start();
if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

$id_user = $_SESSION['id_user'];
$nama = $_POST['nama'];
$nrp = $_POST['nrp'];
$jabatan = $_POST['jabatan'];

echo $id_user;
echo "<br>";
echo $nama;
echo "<br>";
echo $nrp;
echo "<br>";
echo $jabatan;
echo "<br>";

$query = mysqli_query($koneksi, "INSERT INTO `t_pengesahan` (`id`, `id_user`, `nama`, `nrp`, `jabatan`) VALUES (NULL, '$id_user', '$nama', '$nrp', '$jabatan');");

header("location:pengesahan.php?p=sukses");
exit();
