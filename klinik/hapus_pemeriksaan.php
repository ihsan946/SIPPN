<?php 
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}
include "../koneksi/koneksi.php";
if($_POST['id_pengguna'] == null){
    echo "error";

}else{
    $id_pengguna = $_POST['id_pengguna'];
    $cek_kondisi = mysqli_query($koneksi,"SELECT t_kesehatan.id_kesehatan FROM t_kesehatan,t_pengguna WHERE t_kesehatan.id_pengguna = t_pengguna.id_pengguna AND t_kesehatan.id_pengguna = '$id_pengguna'");
    $status = mysqli_num_rows($cek_kondisi);
    if($status > 0){
        $data = mysqli_fetch_array($cek_kondisi);
        $id_kesehatan = $data['id_kesehatan'];
        $query = mysqli_query($koneksi,"DELETE FROM `t_kesehatan` WHERE `t_kesehatan`.`id_kesehatan` = '$id_kesehatan'");
    }else{
        echo "Error";
    }

    header("location:pemeriksaan.php");
    exit();
}



?>