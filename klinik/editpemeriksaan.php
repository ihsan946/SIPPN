<?php $halaman = "Data Pemeriksaan";
session_start();
if (!$_SESSION['posisi'] == "klinik") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}
if ($_POST == null) {
    echo "error";
} else {
    $id_pengguna = $_POST['id_pengguna'];
}
include "../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM t_kesehatan WHERE id_pengguna = '$id_pengguna'");
$cek = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPPN BNNK Sumedang</title>
    <?php include "component/listcss.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "component/navbar.php"; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "component/sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit <?php echo $halaman; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Silahkan diisi</h3>
                                </div>
                                <!-- /.card-header -->
                                <?php if ($cek > 0) { ?>
                                    <?php while ($data = mysqli_fetch_array($query)) {
                                        $parameter_uji = $data['parameter_uji'];
                                        $tekanan_darah1 = $data['tekanan_darah_1'];
                                        $tekanan_darah2 = $data['tekanan_darah_2'];
                                        $nadi = $data['nadi'];
                                        $pernapasan = $data['pernafasan'];
                                        $konsumsi_obat = $data['konsumsi_obat'];
                                        $jenis_obat = $data['jenis_obat'];
                                        $asal_obat = $data['asal_obat'];
                                        $terakhir_minum = $data['terakhir_minum'];
                                        $pemeriksaan_fisik = $data['pemeriksaan_fisik'];
                                        $amphetamine = $data['amphetamine'];
                                        $methamphetamine = $data['methamphetamine'];
                                        $morphine = $data['morphine'];
                                        $thc = $data['thc'];
                                        $coccaine = $data['coccaine'];
                                        $benzodiazepine = $data['benzodiazepine'];
                                        $k2 = $data['k2'];
                                        $soma = $data['soma'];
                                        $hasil_akhir = $data['hasil_akhir'];
                                        $keterangan = $data['keterangan'];
                                    } ?>
                                    <form action="update_pemeriksaan.php" method="post">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                                                    <h2>Hasil Pemeriksaan</h2>
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Jenis Narkoba Yang Diuji</label>
                                                        <select class="form-control" name="parameter_uji">
                                                            <option value="<?php if ($parameter_uji == "5 Parameter") {
                                                                                echo "5 Parameter";
                                                                            } else if ($parameter_uji == "6 Parameter") {
                                                                                echo "6 Parameter";
                                                                            } else if ($parameter_uji == "7 Parameter") {
                                                                                echo "7 Parameter";
                                                                            }
                                                                            ?>">
                                                                <?php if ($parameter_uji == "5 Parameter") {
                                                                    echo "5 Parameter";
                                                                } else if ($parameter_uji == "6 Parameter") {
                                                                    echo "6 Parameter";
                                                                } else if ($parameter_uji == "7 Parameter") {
                                                                    echo "7 Parameter";
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="<?php if ($parameter_uji == "5 Parameter") {
                                                                                echo "6 Parameter";
                                                                            } else if ($parameter_uji == "6 Parameter") {
                                                                                echo "7 Parameter";
                                                                            } else if ($parameter_uji == "7 Parameter") {
                                                                                echo "5 Parameter";
                                                                            }
                                                                            ?>">
                                                                <?php if ($parameter_uji == "5 Parameter") {
                                                                    echo "6 Parameter";
                                                                } else if ($parameter_uji == "6 Parameter") {
                                                                    echo "7 Parameter";
                                                                } else if ($parameter_uji == "7 Parameter") {
                                                                    echo "5 Parameter";
                                                                }
                                                                ?>
                                                            </option>
                                                            <option value="<?php if ($parameter_uji == "5 Parameter") {
                                                                                echo "7 Parameter";
                                                                            } else if ($parameter_uji == "6 Parameter") {
                                                                                echo "5 Parameter";
                                                                            } else if ($parameter_uji == "7 Parameter") {
                                                                                echo "6 Parameter";
                                                                            }
                                                                            ?>">
                                                                <?php if ($parameter_uji == "5 Parameter") {
                                                                    echo "7 Parameter";
                                                                } else if ($parameter_uji == "6 Parameter") {
                                                                    echo "5 Parameter";
                                                                } else if ($parameter_uji == "7 Parameter") {
                                                                    echo "6 Parameter";
                                                                }
                                                                ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tekanan Darah</label>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <input type="text" class="form-control" placeholder="Enter ..." name="tekanan_darah_1" value="<?php echo $tekanan_darah1; ?>">
                                                            </div>
                                                            <h4>/</h4>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" placeholder="Enter ..." name="tekanan_darah_2" value="<?php echo $tekanan_darah2; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nadi</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="nadi" value="<?php echo $nadi; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pernapasan</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="pernapasan" value="<?php echo $pernapasan; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Penggunaan Obat Seminggu Ini</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-radio form-check-inline">
                                                                <input class="custom-control-input" type="radio" id="customRadio1" name="penggunaan_obat" value="ada" <?php if ($konsumsi_obat == "ada") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>
                                                                <label for="customRadio1" class="custom-control-label">Ada</label>
                                                            </div>
                                                            <div class="custom-control custom-radio form-check-inline">
                                                                <input class="custom-control-input" type="radio" id="customRadio2" name="penggunaan_obat" value="tidak" <?php if ($konsumsi_obat == "tidak") {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        }
                                                                                                                                                                        ?>>
                                                                <label for="customRadio2" class="custom-control-label">Tidak</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Obat</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="jenis_obat" value="<?php echo $jenis_obat; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asal Obat</label>
                                                        <select class="form-control" name="asal_obat">
                                                            <option value="<?php if ($asal_obat == "-") {
                                                                                echo "-";
                                                                            } else if ($asal_obat == "Resep Dokter") {
                                                                                echo "Resep Dokter";
                                                                            } else if ($asal_obat == "Beli Bebas") {
                                                                                echo "Beli Bebas";
                                                                            } else if ($asal_obat == "Pemberian") {
                                                                                echo "Pemberian";
                                                                            } ?>">

                                                                <?php if ($asal_obat == "-") {
                                                                    echo "Tidak Ada";
                                                                } else if ($asal_obat == "Resep Dokter") {
                                                                    echo "Resep Dokter";
                                                                } else if ($asal_obat == "Beli Bebas") {
                                                                    echo "Beli Bebas";
                                                                } else if ($asal_obat == "Pemberian") {
                                                                    echo "Pemberian";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($asal_obat == "-") {
                                                                                echo "Resep Dokter";
                                                                            } else if ($asal_obat == "Resep Dokter") {
                                                                                echo "Beli Bebas";
                                                                            } else if ($asal_obat == "Beli Bebas") {
                                                                                echo "Pemberian";
                                                                            } else if ($asal_obat == "Pemberian") {
                                                                                echo "-";
                                                                            } ?>">

                                                                <?php if ($asal_obat == "-") {
                                                                    echo "Resep Dokter";
                                                                } else if ($asal_obat == "Resep Dokter") {
                                                                    echo "Beli Bebas";
                                                                } else if ($asal_obat == "Beli Bebas") {
                                                                    echo "Pemberian";
                                                                } else if ($asal_obat == "Pemberian") {
                                                                    echo "Tidak Ada";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($asal_obat == "-") {
                                                                                echo "Beli Bebas";
                                                                            } else if ($asal_obat == "Resep Dokter") {
                                                                                echo "Pemberian";
                                                                            } else if ($asal_obat == "Beli Bebas") {
                                                                                echo "-";
                                                                            } else if ($asal_obat == "Pemberian") {
                                                                                echo "Resep Dokter";
                                                                            } ?>">

                                                                <?php if ($asal_obat == "-") {
                                                                    echo "Beli Bebas";
                                                                } else if ($asal_obat == "Resep Dokter") {
                                                                    echo "Pemberian";
                                                                } else if ($asal_obat == "Beli Bebas") {
                                                                    echo "Tidak Ada";
                                                                } else if ($asal_obat == "Pemberian") {
                                                                    echo "Resep Dokter";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($asal_obat == "-") {
                                                                                echo "Pemberian";
                                                                            } else if ($asal_obat == "Resep Dokter") {
                                                                                echo "-";
                                                                            } else if ($asal_obat == "Beli Bebas") {
                                                                                echo "Resep Dokter";
                                                                            } else if ($asal_obat == "Pemberian") {
                                                                                echo "Beli Bebas";
                                                                            } ?>">

                                                                <?php if ($asal_obat == "-") {
                                                                    echo "Pemberian";
                                                                } else if ($asal_obat == "Resep Dokter") {
                                                                    echo "Tidak Ada";
                                                                } else if ($asal_obat == "Beli Bebas") {
                                                                    echo "Resep Dokter";
                                                                } else if ($asal_obat == "Pemberian") {
                                                                    echo "Beli Bebas";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Terakhir Minum</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="terakhir_minum" value="<?php echo $terakhir_minum; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pemeriksaan Fisik</label>
                                                        <select class="form-control" name="pemeriksaan_fisik">
                                                            <option value="<?php if ($pemeriksaan_fisik == 1) {
                                                                                echo "1";
                                                                            } else if ($pemeriksaan_fisik == 0) {
                                                                                echo "0";
                                                                            } ?>">

                                                                <?php if ($pemeriksaan_fisik == 1) {
                                                                    echo "Ditemukan";
                                                                } else if ($pemeriksaan_fisik == 0) {
                                                                    echo "Tidak Ditemukan";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($pemeriksaan_fisik == 1) {
                                                                                echo "0";
                                                                            } else if ($pemeriksaan_fisik == 0) {
                                                                                echo "1";
                                                                            } ?>">

                                                                <?php if ($pemeriksaan_fisik == 1) {
                                                                    echo "Tidak Ditemukan";
                                                                } else if ($pemeriksaan_fisik == 0) {
                                                                    echo "Ditemukan";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h2>Hasil Test Urine</h2>
                                                    <div class="form-group">
                                                        <label>Amphetamine</label>
                                                        <select class="form-control" name="amphetamine">
                                                            <option value="<?php if ($amphetamine == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($amphetamine == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($amphetamine == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($amphetamine == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Methapetamine</label>
                                                        <select class="form-control" name="methamphetamine">
                                                            <option value="<?php if ($methamphetamine == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($methamphetamine == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($methamphetamine == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($methamphetamine == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Morphine</label>
                                                        <select class="form-control" name="morfin">
                                                            <option value="<?php if ($morphine == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($morphine == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($morphine == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($morphine == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>THC</label>
                                                        <select class="form-control" name="thc">
                                                            <option value="<?php if ($thc == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($thc == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($thc == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($thc == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Coccaine</label>
                                                        <select class="form-control" name="kokain">
                                                            <option value="<?php if ($coccaine == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($coccaine == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($coccaine == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($coccaine == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value = "tidak" <?php if($coccaine == null){echo "checked";}else{echo "";}?> name = "tampilkokain" >
                                                            <label class="form-check-label">Tidak Ditampilkan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Benzodiazepine</label>
                                                        <select class="form-control" name="benzodiazepine">
                                                            <option value="<?php if ($benzodiazepine == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($benzodiazepine == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($benzodiazepine == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($benzodiazepine == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>K2</label>
                                                        <select class="form-control" name="k2">
                                                            <option value="<?php if ($k2 == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($k2 == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($k2 == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($k2 == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value = "tidak" <?php if($k2 == null){echo "checked";}else{echo "";} ?> name = "tampilk2">
                                                            <label class="form-check-label">Tidak Ditampilkan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>SOMA</label>
                                                        <select class="form-control" name="soma">
                                                            <option value="<?php if ($soma == 1) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($soma == 1) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($soma == 0) {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($soma == 0) {
                                                                    echo "Positif";
                                                                } else {
                                                                    echo "Negatif";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value = "tidak" <?php if($soma == null){echo "checked";}else{echo "";} ?> name = "tampilsoma">
                                                            <label class="form-check-label">Tidak Ditampilkan</label>
                                                        </div>
                                                    </div>

                                                    <!-- Tambahan -->
                                                    <div class="form-group">
                                                        <label>Hasil Akhir</label>
                                                        <select class="form-control" name="hasil_akhir">
                                                            <option value="<?php if ($hasil_akhir == "TERINDIKASI") {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($hasil_akhir == "TERINDIKASI") {
                                                                    echo "Terindikasi";
                                                                } else {
                                                                    echo "Tidak Terindikasi";
                                                                } ?>
                                                            </option>
                                                            <option value="<?php if ($hasil_akhir == "TIDAK TERINDIKASI") {
                                                                                echo "1";
                                                                            } else {
                                                                                echo "0";
                                                                            } ?>">
                                                                <?php if ($hasil_akhir == "TIDAK TERINDIKASI") {
                                                                    echo "Terindikasi";
                                                                } else {
                                                                    echo "Tidak Terindikasi";
                                                                } ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!-- Tambahan -->
                                                    
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="keterangan" value = "<?php echo $keterangan;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-body -->

                                        <div class="card-footer justify-content-end">
                                            <button type="reset" class="btn btn-default">Batal</button>
                                            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-danger">Simpan</button>
                                        </div>
                                    </form>

                                <?php } else { ?>
                                    <form action="update_pemeriksaan.php" method="post">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">
                                                    <h2>Hasil Pemeriksaan</h2>
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Jenis Narkoba Yang Diuji</label>
                                                        <select class="form-control" name="parameter_uji">
                                                            <option value="5 Parameter">5 Parameter</option>
                                                            <option value="6 Parameter">6 Parameter</option>
                                                            <option value="7 Parameter">7 Parameter</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tekanan Darah</label>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <input type="text" class="form-control" placeholder="Enter ..." name="tekanan_darah_1">
                                                            </div>
                                                            <h4>/</h4>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" placeholder="Enter ..." name="tekanan_darah_2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nadi</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="nadi">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pernapasan</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="pernapasan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Penggunaan Obat Seminggu Ini</label>
                                                        <div class="form-group">
                                                            <div class="custom-control custom-radio form-check-inline">
                                                                <input class="custom-control-input" type="radio" id="customRadio1" name="penggunaan_obat" value="ada">
                                                                <label for="customRadio1" class="custom-control-label">Ada</label>
                                                            </div>
                                                            <div class="custom-control custom-radio form-check-inline">
                                                                <input class="custom-control-input" type="radio" id="customRadio2" name="penggunaan_obat" value="tidak">
                                                                <label for="customRadio2" class="custom-control-label">Tidak</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Obat</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="jenis_obat">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asal Obat</label>
                                                        <select class="form-control" name="asal_obat">
                                                            <option value="-">Tidak ada</option>
                                                            <option value="Resep Dokter">Resep Dokter</option>
                                                            <option value="Beli Bebas">Beli Bebas</option>
                                                            <option value="Pemberian">Pemberian</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Terakhir Minum</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name="terakhir_minum">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pemeriksaan Fisik</label>
                                                        <select class="form-control" name="pemeriksaan_fisik">
                                                            <option value="0">Tidak Ditemukan</option>
                                                            <option value="1">Ditemukan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h2>Hasil Test Urine</h2>
                                                    <div class="form-group">
                                                        <label>Amphetamine</label>
                                                        <select class="form-control" name="amphetamine">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Methapetamine</label>
                                                        <select class="form-control" name="methamphetamine">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Morphine</label>
                                                        <select class="form-control" name="morfin">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>THC</label>
                                                        <select class="form-control" name="thc">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Coccaine</label>
                                                        <select class="form-control" name="kokain">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value = "tidak" name ="tampilkokain">
                                                            <label class="form-check-label">Tidak Ditampilkan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Benzodiazepine</label>
                                                        <select class="form-control" name="benzodiazepine">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>K2</label>
                                                        <select class="form-control" name="k2">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value = "tidak" name = "tampilk2">
                                                            <label class="form-check-label">Tidak Ditampilkan</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>SOMA</label>
                                                        <select class="form-control" name="soma">
                                                            <option value="0">Negatif</option>
                                                            <option value="1">Positif</option>
                                                        </select>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value = "tidak" name = "tampilsoma">
                                                            <label class="form-check-label">Tidak Ditampilkan</label>
                                                        </div>
                                                    </div>

                                                    <!-- Tambahan -->
                                                    <div class="form-group">
                                                        <label>Hasil Akhir</label>
                                                        <select class="form-control" name="hasil_akhir">
                                                            <option value="0">Tidak Terindikasi</option>
                                                            <option value="1">Terindikasi</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" class="form-control" placeholder="Enter ..." name = "keterangan"></input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-body -->

                                        <div class="card-footer justify-content-end">
                                            <a href="pemeriksaan.php">
                                                <button type="button" class="btn btn-default">Batal</button>
                                            </a>
                                            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-danger">Simpan</button>
                                        </div>
                                    </form>

                                <?php }; ?>
                                <!-- form start -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "component/footer.php" ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal Verivy Delete -->
    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Peringatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus data ini ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-outline-light">Hapus</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <?php include "component/listjs.php" ?>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            // triger success
            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Data Berhasil Diubah')
            });
        });
    </script>
</body>

</html>