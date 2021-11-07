<?php
session_start();
include "../koneksi/koneksi.php";

// inisialisasi
$username = $_POST['username'];
$password = $_POST['password'];

//validasi hak akses
$query = mysqli_query($koneksi, "SELECT id_user,username,password,posisi FROM t_user WHERE username ='$username' AND password ='$password'");
$data = mysqli_fetch_array($query);
if ($data['posisi'] == "admin" || $data['posisi'] == "klinik") {
    echo "Hello ini sudah pindah";
    echo "<br>";
    echo "<br>";

    //validasi akun dengan database
    $query = mysqli_query($koneksi, "SELECT username,password,posisi FROM t_user WHERE username ='$username' AND password ='$password'");
    $jumlah_data_user = mysqli_num_rows($query);
    if ($jumlah_data_user > 0) {

        if ($data['posisi'] == "admin") {
            $_SESSION['posisi'] = "admin";
            $_SESSION['id_user'] = $data['id_user'];
            header("location:../admin/index.php");
            exit();
        } else
            if ($data['posisi'] == "klinik") {
            $_SESSION['posisi'] = "klinik";
            $_SESSION['id_user'] = $data['id_user'];
            if ($_SESSION['status_awal_bulan'] == null) {
                $_SESSION['status_awal_bulan'] = true;
            }
            header("location:../klinik/index.php");
            exit();
        }
    } else {
        echo "gagal";
    }
} else {
    header("location:../pages/login.php?pesan=gagal");
}
