<?php
include "../koneksi/koneksi.php";
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

if($_POST == null){
    echo "data tidak ada yang berubah";
}else{
    $id_pengguna = $_POST['id_pengguna'];
    $id_user = $_SESSION['id_user'];
    $nama = strtoupper($_POST['nama']);
    $umur = $_POST['umur'];
    $tempat_lahir = strtoupper($_POST['tl']);
    $tanggal_lahir = $_POST['tgl'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['j_kelamin'];
    $alamat = strtoupper($_POST['alamat']);
    $desa = strtoupper($_POST['desa']);
    $dusun = strtoupper($_POST['dusun']);
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $kecamatan = strtoupper($_POST['kecamatan']);
    $kabupaten = strtoupper($_POST['kabupaten']);
    $pekerjaan = strtoupper($_POST['pekerjaan']);
    $no_telp = $_POST['notelp'];
    $tujuan_skhpn = strtoupper($_POST['tujuan']);
    
    $query = mysqli_query($koneksi,
    "UPDATE `t_pengguna` SET `id_user` = '$id_user', `nama` = '$nama', `umur` = '$umur', `tempat_lahir` = '$tempat_lahir', `tanggal_lahir` = '$tanggal_lahir', `nik` = '$nik', `jenis_kelamin` = '$jenis_kelamin', `dusun` = '$dusun', `desa` = '$desa', `rt` = '$rt', `rw` = '$rw', `kecamatan` = '$kecamatan', `kabupaten` = '$kabupaten', `alamat_lengkap` = '$alamat', `pekerjaan` = '$pekerjaan', `no_telp` = '$no_telp', `tujuan_skhpn` = '$tujuan_skhpn' WHERE `t_pengguna`.`id_pengguna` = '$id_pengguna'; ");

    
    header("location:pemohon.php");
    exit();

}


?>