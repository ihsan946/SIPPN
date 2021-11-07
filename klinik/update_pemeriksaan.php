<?php 
include "../koneksi/koneksi.php";
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

if($_POST == null){
    echo "error";
}else{

    $id_user = $_SESSION['id_user'];
    $id_pengguna = $_POST['id_pengguna'];
    echo $parameter_uji = $_POST['parameter_uji'];
    echo "<br>";
    echo $tekanan_darah1 = $_POST['tekanan_darah_1'];
    echo "<br>";
    echo $tekanan_darah2 = $_POST['tekanan_darah_2'];
    echo "<br>";
    echo $nadi = $_POST['nadi'];
    echo "<br>";
    echo $pernapasan = $_POST['pernapasan'];
    echo "<br>";
    echo $penggunaan_obat = $_POST['penggunaan_obat'];
    echo "<br>";
    echo $_POST['asal_obat'];

    if($_POST['penggunaan obat'] = null){
        $penggunaan_obat = "tidak";
        $jenis_obat = "-";
        $asal_obat = "-";
        $terakhir_minum = "-";
    }else{
        if($_POST['jenis_obat'] == null){
            $jenis_obat = "-";
        }else{
            $jenis_obat = $_POST['jenis_obat'];
        }

        if($_POST['asal_obat'] == null){
            $asal_obat = "-";
        }else{
            $asal_obat = $_POST['asal_obat'];
        }
        
        if($_POST['terakhir_minum'] == null){
            $terakhir_minum = "-";
        }else{
            $terakhir_minum = $_POST['terakhir_minum'];
        }
        
        
    }
    $pemeriksaan_fisik = $_POST['pemeriksaan_fisik'];
    $amphetamine = $_POST['amphetamine'];
    $methamphetamine = $_POST['methamphetamine'];
    $morfin = $_POST['morfin'];
    $thc = $_POST['thc'];
    
    $benzodiazepine = $_POST['benzodiazepine'];
    

    $query_status = mysqli_query($koneksi,"SELECT t_kesehatan.id_pengguna FROM t_pengguna,t_kesehatan WHERE t_kesehatan.id_pengguna = t_pengguna.id_pengguna AND t_kesehatan.id_pengguna = '$id_pengguna'");
    $status = mysqli_num_rows($query_status);

    $query = mysqli_query($koneksi, "SELECT MAX(no_dokumen) as no_dokumen,bulan FROM `no_dokumen`;");
    while($data = mysqli_fetch_array($query)){
        $no_dokumen = $data['no_dokumen'];
        $bulan_terakhir =  $data['bulan'];
    }

    if($_SESSION['status_awal_bulan'] == true){
        $_SESSION['status_awal_bulan'] = false;
        $bulan = date('F');
        
        if((date('d') + 0) == 1 && $no_dokumen == null){    
            $no_dokumen = 1;
            $bulan = date('F');
            $queryTruncate = mysqli_query($koneksi, "TRUNCATE TABLE no_dokumen"); 
            $query = mysqli_query($koneksi, "INSERT INTO `no_dokumen` (`no_dokumen`, `bulan`) VALUES ('$no_dokumen', '$bulan');");
        }else{
            $no_dokumen++;
            $query = mysqli_query($koneksi, "INSERT INTO `no_dokumen` (`no_dokumen`, `bulan`) VALUES ('$no_dokumen', '$bulan');");
        }
        
    }else if($_SESSION['status_awal_bulan'] == false){
        $bulan = date('F');

        if($no_dokumen == null){
            $no_dokumen = 1;
        }else{
            if((date('d') + 0) == 1 && !($bulan_terakhir == $bulan)){
                $_SESSION['status_awal_bulan'] = true;
                $bulan_baru = date('F');
                $no_dokumen = 1;
                $queryTruncate = mysqli_query($koneksi, "TRUNCATE TABLE no_dokumen");
                $query = mysqli_query($koneksi, "INSERT INTO `no_dokumen` (`no_dokumen`, `bulan`) VALUES ('$no_dokumen', '$bulan_baru');");
            }else{ 
                $no_dokumen++; 
                $query = mysqli_query($koneksi, "INSERT INTO `no_dokumen` (`no_dokumen`, `bulan`) VALUES ('$no_dokumen', '$bulan');");
            }
        }

        
        if($_POST['hasil_akhir'] == null || $_POST['hasil_akhir'] == ""){
            $hasil_akhir = "TIDAK TERINDIKASI";
        }else{
            $hasil_akhir = ($_POST['hasil_akhir']);
            if($hasil_akhir == 0){
                $hasil_akhir = "TIDAK TERINDIKASI";
            }else if($hasil_akhir == 1){
                $hasil_akhir = "TERINDIKASI";
            }
        }
    
        $kokain = $_POST['kokain'];
        $soma = $_POST['soma'];
        $k2 = $_POST['k2'];
        $hasil_akhir;
        $keterangan =  strtoupper($_POST['keterangan']);


    }else{
        echo "error";
    }

    
    if($status == null){
        $id_user = $_SESSION['id_user'];

        if($_POST['tampilkokain'] == "tidak"){
            $query = mysqli_query($koneksi,"INSERT INTO `t_kesehatan` (`id_user`, `id_pengguna`, `id_kesehatan`, `no_dokumen`, `parameter_uji`, `tekanan_darah_1`, `tekanan_darah_2`, `nadi`, `pernafasan`, `konsumsi_obat`, `jenis_obat`, `asal_obat`, `terakhir_minum`, `pemeriksaan_fisik`, `amphetamine`, `methamphetamine`, `morphine`, `thc`, `coccaine`, `benzodiazepine`, `k2`, `soma`, `hasil_akhir`, `keterangan`) VALUES ('$id_user', '$id_pengguna', NULL, '$no_dokumen', '$parameter_uji', '$tekanan_darah1', '$tekanan_darah2', '$nadi', '$pernapasan', '$penggunaan_obat', '$jenis_obat', '$asal_obat', '$terakhir_minum', '$pemeriksaan_fisik', '$amphetamine', '$methamphetamine', '$morfin', '$thc', NULL, '$benzodiazepine', '$k2','$soma', '$hasil_akhir', '$keterangan'); ");
        
        }else if($_POST['tampilsoma'] == "tidak"){
            $query = mysqli_query($koneksi,"INSERT INTO `t_kesehatan` (`id_user`, `id_pengguna`, `id_kesehatan`, `no_dokumen`, `parameter_uji`, `tekanan_darah_1`, `tekanan_darah_2`, `nadi`, `pernafasan`, `konsumsi_obat`, `jenis_obat`, `asal_obat`, `terakhir_minum`, `pemeriksaan_fisik`, `amphetamine`, `methamphetamine`, `morphine`, `thc`, `coccaine`, `benzodiazepine`, `k2`, `soma`, `hasil_akhir`, `keterangan`) VALUES ('$id_user', '$id_pengguna', NULL, '$no_dokumen', '$parameter_uji', '$tekanan_darah1', '$tekanan_darah2', '$nadi', '$pernapasan', '$penggunaan_obat', '$jenis_obat', '$asal_obat', '$terakhir_minum', '$pemeriksaan_fisik', '$amphetamine', '$methamphetamine', '$morfin', '$thc', '$kokain', '$benzodiazepine', '$k2',NULL, '$hasil_akhir', '$keterangan'); ");
        }else if($_POST['tampilk2'] == "tidak"){
            $query = mysqli_query($koneksi,"INSERT INTO `t_kesehatan` (`id_user`, `id_pengguna`, `id_kesehatan`, `no_dokumen`, `parameter_uji`, `tekanan_darah_1`, `tekanan_darah_2`, `nadi`, `pernafasan`, `konsumsi_obat`, `jenis_obat`, `asal_obat`, `terakhir_minum`, `pemeriksaan_fisik`, `amphetamine`, `methamphetamine`, `morphine`, `thc`, `coccaine`, `benzodiazepine`, `k2`, `soma`, `hasil_akhir`, `keterangan`) VALUES ('$id_user', '$id_pengguna', NULL, '$no_dokumen', '$parameter_uji', '$tekanan_darah1', '$tekanan_darah2', '$nadi', '$pernapasan', '$penggunaan_obat', '$jenis_obat', '$asal_obat', '$terakhir_minum', '$pemeriksaan_fisik', '$amphetamine', '$methamphetamine', '$morfin', '$thc', '$kokain', '$benzodiazepine', NULL, $soma, '$hasil_akhir', '$keterangan'); ");
        }else{
            $query = mysqli_query($koneksi,"INSERT INTO `t_kesehatan` (`id_user`, `id_pengguna`, `id_kesehatan`, `no_dokumen`, `parameter_uji`, `tekanan_darah_1`, `tekanan_darah_2`, `nadi`, `pernafasan`, `konsumsi_obat`, `jenis_obat`, `asal_obat`, `terakhir_minum`, `pemeriksaan_fisik`, `amphetamine`, `methamphetamine`, `morphine`, `thc`, `coccaine`, `benzodiazepine`, `k2`, `soma`, `hasil_akhir`, `keterangan`) VALUES ('$id_user', '$id_pengguna', NULL, '$no_dokumen', '$parameter_uji', '$tekanan_darah1', '$tekanan_darah2', '$nadi', '$pernapasan', '$penggunaan_obat', '$jenis_obat', '$asal_obat', '$terakhir_minum', '$pemeriksaan_fisik', '$amphetamine', '$methamphetamine', '$morfin', '$thc', '$kokain', '$benzodiazepine', '$k2','$soma', '$hasil_akhir', '$keterangan'); ");
        }
    
    }else if($status > 0){
        $cek_kondisi = mysqli_query($koneksi,"SELECT t_kesehatan.id_kesehatan FROM t_kesehatan,t_pengguna WHERE t_kesehatan.id_pengguna = t_pengguna.id_pengguna AND t_kesehatan.id_pengguna = '$id_pengguna'");
        $data = mysqli_fetch_array($cek_kondisi);
        $id_kesehatan = $data['id_kesehatan'];
        
        if($_POST['tampilkokain'] == "tidak"){
            $query = mysqli_query($koneksi,"UPDATE `t_kesehatan` SET `parameter_uji` = '$parameter_uji', `tekanan_darah_1` = '$tekanan_darah1', `tekanan_darah_2` = '$tekanan_darah2', `nadi` = '$nadi', `pernafasan` = '$pernapasan', `konsumsi_obat` = '$penggunaan_obat', `jenis_obat` = '$jenis_obat', `asal_obat` = '$asal_obat', `terakhir_minum` = '$terakhir_minum', `pemeriksaan_fisik` = '$pemeriksaan_fisik', `amphetamine` = '$amphetamine', `methamphetamine` = '$methamphetamine', `morphine` = '$morfin', `thc` = '$thc', `coccaine` = NULL, `benzodiazepine` = '$benzodiazepine', `k2` = '$k2',`soma` = '$soma', `hasil_akhir` = '$hasil_akhir', `keterangan` = '$keterangan' WHERE `t_kesehatan`.`id_kesehatan` = '$id_kesehatan'; ");
        }else if($_POST['tampilsoma'] == "tidak"){
            $query = mysqli_query($koneksi,"UPDATE `t_kesehatan` SET `parameter_uji` = '$parameter_uji', `tekanan_darah_1` = '$tekanan_darah1', `tekanan_darah_2` = '$tekanan_darah2', `nadi` = '$nadi', `pernafasan` = '$pernapasan', `konsumsi_obat` = '$penggunaan_obat', `jenis_obat` = '$jenis_obat', `asal_obat` = '$asal_obat', `terakhir_minum` = '$terakhir_minum', `pemeriksaan_fisik` = '$pemeriksaan_fisik', `amphetamine` = '$amphetamine', `methamphetamine` = '$methamphetamine', `morphine` = '$morfin', `thc` = '$thc', `coccaine` = '$kokain', `benzodiazepine` = '$benzodiazepine', `k2` = '$k2',`soma` = NULL, `hasil_akhir` = '$hasil_akhir', `keterangan` = '$keterangan'WHERE `t_kesehatan`.`id_kesehatan` = '$id_kesehatan'; ");
        }else if($_POST['tampilk2'] == "tidak"){
            $query = mysqli_query($koneksi,"UPDATE `t_kesehatan` SET `parameter_uji` = '$parameter_uji', `tekanan_darah_1` = '$tekanan_darah1', `tekanan_darah_2` = '$tekanan_darah2', `nadi` = '$nadi', `pernafasan` = '$pernapasan', `konsumsi_obat` = '$penggunaan_obat', `jenis_obat` = '$jenis_obat', `asal_obat` = '$asal_obat', `terakhir_minum` = '$terakhir_minum', `pemeriksaan_fisik` = '$pemeriksaan_fisik', `amphetamine` = '$amphetamine', `methamphetamine` = '$methamphetamine', `morphine` = '$morfin', `thc` = '$thc', `coccaine` = '$kokain', `benzodiazepine` = '$benzodiazepine', `k2` = NULL,`soma` = '$soma', `hasil_akhir` = '$hasil_akhir', `keterangan` = '$keterangan' WHERE `t_kesehatan`.`id_kesehatan` = '$id_kesehatan'; ");
        }else{
            $query = mysqli_query($koneksi,"UPDATE `t_kesehatan` SET `parameter_uji` = '$parameter_uji', `tekanan_darah_1` = '$tekanan_darah1', `tekanan_darah_2` = '$tekanan_darah2', `nadi` = '$nadi', `pernafasan` = '$pernapasan', `konsumsi_obat` = '$penggunaan_obat', `jenis_obat` = '$jenis_obat', `asal_obat` = '$asal_obat', `terakhir_minum` = '$terakhir_minum', `pemeriksaan_fisik` = '$pemeriksaan_fisik', `amphetamine` = '$amphetamine', `methamphetamine` = '$methamphetamine', `morphine` = '$morfin', `thc` = '$thc', `coccaine` = '$kokain', `benzodiazepine` = '$benzodiazepine', `k2` = '$k2', `soma` = '$soma', `hasil_akhir` = '$hasil_akhir', `keterangan` = '$keterangan' WHERE `t_kesehatan`.`id_kesehatan` = '$id_kesehatan'; ");
        }  
    }else{
        echo "Error";
    }

    //
    header("location:pemeriksaan.php");
    exit();

}
?>