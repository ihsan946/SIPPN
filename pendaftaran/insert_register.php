<?php
include "../koneksi/koneksi.php";

if($_POST == null){
    echo "Error";
}else{
    $nama = strtoupper($_POST['nama']);
    $umur = $_POST['umur'];
    $tempat_lahir = strtoupper($_POST['tl']);
    $tanggal_lahir = $_POST['tgl'];
    $nik = $_POST['nik'];
    $jenisKelamin = strtoupper($_POST['j_kelamin']);
    $alamat = strtoupper($_POST['alamat']);
    $desa = strtoupper($_POST['desa']);
    $dusun = strtoupper($_POST['dusun']);
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $kecamatan = strtoupper($_POST['kecamatan']);
    $kabupaten = strtoupper($_POST['kabupaten']);
    $pekerjaan = strtoupper($_POST['pekerjaan']);
    $notelp = $_POST['notelp'];
    $tujuan = strtoupper($_POST['tujuan']);

// konversi bulan lahir
    $pecah_tl = explode("/",$tanggal_lahir);

    if($pecah_tl[0] == "01"){
        $bulan_lahir = "JANUARI";
    } else
    if($pecah_tl[0] == "02"){
        $bulan_lahir = "FEBRUARI";
    }else
    if($pecah_tl[0] == "03"){
        $bulan_lahir = "MARET";
    }else 
    if($pecah_tl[0] == "04"){
        $bulan_lahir = "APRIL";
    }else
    if($pecah_tl[0] == "05"){
        $bulan_lahir = "MEI";
    }else
    if($pecah_tl[0] == "06"){
        $bulan_lahir = "JUNI";
    }else
    if($pecah_tl[0] == "07"){
        $bulan_lahir = "JULI";
    }else
    if($pecah_tl[0] == "08"){
        $bulan_lahir = "AGUSTUS";
    }else
    if($pecah_tl[0] == "09"){
        $bulan_lahir = "SEPTEMBER";
    }else
    if($pecah_tl[0] == "10"){
        $bulan_lahir = "OKTOBER";
    }else
    if($pecah_tl[0] == "11"){
        $bulan_lahir = "NOVEMBER";
    }else
    if($pecah_tl[0] == "12"){
        $bulan_lahir = "DESEMBER";
    }

    $hasil_tanggal_lahir = $pecah_tl[1]." ". $bulan_lahir ." ". $pecah_tl[2];
// echo $hasil_tanggal_lahir;

// echo"<br>";
// echo $nik;
// echo"<br>";
// echo $jenisKelamin;
// echo"<br>";
// echo $alamat;
// echo"<br>";
// echo $pekerjaan;
// echo"<br>";
// echo $notelp;
// echo"<br>";
// echo $tujuan;
// echo"<br>";

    $query = mysqli_query($koneksi,"SELECT id_user FROM t_user WHERE posisi = 'pengguna'");
    $data = mysqli_fetch_array($query);
    $id_user = $data['id_user'];
    $tanggal_pendaftaran = date('d-m-Y');

    echo "<br>";
    echo "<br>";
    echo date('d');

// konversi bulan pemeriksaan
    if(date('m') == "01"){
        $bulan_pemeriksaan = "Januari";
    } else
    if(date('m') == "02"){
        $bulan_pemeriksaan = "Februari";
    }else
    if(date('m') == "03"){
        $bulan_pemeriksaan = "Maret";
    }else 
    if(date('m') == "04"){
        $bulan_pemeriksaan = "April";
    }else
    if(date('m') == "05"){
        $bulan_pemeriksaan = "Mei";
    }else
    if(date('m') == "06"){
        $bulan_pemeriksaan = "Juni";
    }else
    if(date('m') == "07"){
        $bulan_pemeriksaan = "Juli";
    }else
    if(date('m') == "08"){
        $bulan_pemeriksaan = "Agustus";
    }else
    if(date('m') == "09"){
        $bulan_pemeriksaan = "September";
    }else
    if(date('m') == "10"){
        $bulan_pemeriksaan = "Oktober";
    }else
    if(date('m') == "11"){
        $bulan_pemeriksaan = "November";
    }else
    if(date('m') == "12"){
        $bulan_pemeriksaan = "Desember";
    }
    echo"<br>";
    echo"<br>";
// echo $bulan_pemeriksaan;

    $hasil_tanggal_pemeriksaan = date('d') . " " . $bulan_pemeriksaan . " " . date('Y');

    $query1 = mysqli_query($koneksi,"INSERT INTO `t_pengguna` (`id_pengguna`, `id_user`, `nama`, `umur`, `tempat_lahir`, `tanggal_lahir`, `nik`, `jenis_kelamin`, `dusun`, `desa`, `rt`, `rw`, `kecamatan`, `kabupaten`, `alamat_lengkap`, `pekerjaan`, `tempat_pemeriksaan`, `tanggal_pemeriksaan`, `no_telp`, `tujuan_skhpn`) VALUES (NULL, '3', '$nama', '$umur', '$tempat_lahir', '$hasil_tanggal_lahir', '$nik', '$jenisKelamin', '$dusun', '$desa', '$rt', '$rw', '$kecamatan', '$kabupaten', '$alamat', '$pekerjaan', 'BNN Kabupaten Sumedang', '$hasil_tanggal_pemeriksaan', '$notelp', '$tujuan');");
    
    header("location:../pages/sukses.php");
    exit();
}

?>