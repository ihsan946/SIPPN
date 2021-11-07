<?php $halaman = "Test ASSIST";
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}
include "../koneksi/koneksi.php";
$id_pengguna = $_POST['id_pengguna'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPPN BNNK Sumedang</title>
    <link rel="icon" href="../img/logo_bnn.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <script>
        function assistTembakau(){
            var p2 = parseInt(document.form_assist.p2_tembakau.value);
            var p3 = parseInt(document.form_assist.p3_tembakau.value);


            document.hasil_assist.assist_tembakau.value = parseInt(p2 + p3);
        }

    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "component/navbar.php" ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "component/sidebar.php" ?>

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
                            <h2>Dalam kehidupan anda, zat-zat apa saja yang pernah digunakan?</h2>
                            <!-- Default box -->
                            <?php 
                                $queryStatusSkrining = mysqli_query($koneksi,"SELECT t_skrining.id_pengguna, t_skrining.p8 FROM t_pengguna,t_skrining WHERE t_skrining.id_pengguna = t_pengguna.id_pengguna AND t_skrining.id_pengguna = '$id_pengguna' ");
                                $statusSkrining = mysqli_num_rows($queryStatusSkrining);
                                $data = mysqli_fetch_array($queryStatusSkrining);
                                $p8 = $data['p8'];
                                ?>
                            <?php if($statusSkrining > 0 ){ ?>
                            <form action="update_assist.php" name = "form_assist" method="post" class="login100-form validate-form">
                                <?php 
                                    $querySkrining = mysqli_query($koneksi,"SELECT t_skrining.id_skrining FROM t_pengguna,t_skrining WHERE t_skrining.id_pengguna = t_pengguna.id_pengguna AND t_skrining.id_pengguna = '$id_pengguna' ");
                                    $data = mysqli_fetch_array($querySkrining);
                                    $id_skrining = $data['id_skrining'];
                                    $queryTembakau = mysqli_query($koneksi,"SELECT * FROM t_tembakau WHERE id_skrining = '$id_skrining'");
                                ?>
                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Tembakau (Rokok, Cerutu, Kretek, dll.)</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php $data = mysqli_fetch_array($queryTembakau);
                                            $p2_tembakau = $data['p2_tembakau'];
                                            $p3_tembakau = $data['p3_tembakau'];
                                            $p4_tembakau = $data['p4_tembakau'];
                                            $p5_tembakau = $data['p5_tembakau'];
                                            $p6_tembakau = $data['p6_tembakau'];
                                            $p7_tembakau = $data['p7_tembakau'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_tembakau" >
                                                        <option value = "<?php if($p2_tembakau == 0){ echo "0";}
                                                            else if($p2_tembakau == 2){echo "2";}
                                                            else if($p2_tembakau == 3){echo "3";}
                                                            else if($p2_tembakau == 4){echo "4";}
                                                            else if($p2_tembakau == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_tembakau == 0){ echo "Tidak Pernah";}
                                                            else if($p2_tembakau == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_tembakau == 3){echo "Tiap Bulan";}
                                                            else if($p2_tembakau == 4){echo "Tiap Minggu";}
                                                            else if($p2_tembakau == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p2_tembakau == 0){ echo "2";}
                                                            else if($p2_tembakau == 2){echo "3";}
                                                            else if($p2_tembakau == 3){echo "4";}
                                                            else if($p2_tembakau == 4){echo "6";}
                                                            else if($p2_tembakau == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_tembakau == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_tembakau == 2){echo "Tiap Bulan";}
                                                            else if($p2_tembakau == 3){echo "Tiap Minggu";}
                                                            else if($p2_tembakau == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_tembakau == 6){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p2_tembakau == 0){ echo "3";}
                                                            else if($p2_tembakau == 2){echo "4";}
                                                            else if($p2_tembakau == 3){echo "6";}
                                                            else if($p2_tembakau == 4){echo "0";}
                                                            else if($p2_tembakau == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_tembakau == 0){ echo "Tiap Bulan";}
                                                            else if($p2_tembakau == 2){echo "Tiap Minggu";}
                                                            else if($p2_tembakau == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_tembakau == 4){echo "Tidak Pernah";}
                                                            else if($p2_tembakau == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p2_tembakau == 0){ echo "4";}
                                                            else if($p2_tembakau == 2){echo "6";}
                                                            else if($p2_tembakau == 3){echo "0";}
                                                            else if($p2_tembakau == 4){echo "2";}
                                                            else if($p2_tembakau == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_tembakau == 0){ echo "Tiap Minggu";}
                                                            else if($p2_tembakau == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_tembakau == 3){echo "Tidak Pernah";}
                                                            else if($p2_tembakau == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_tembakau == 6){echo "Tiap Bulan";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p2_tembakau == 0){ echo "6";}
                                                            else if($p2_tembakau == 2){echo "0";}
                                                            else if($p2_tembakau == 3){echo "2";}
                                                            else if($p2_tembakau == 4){echo "3";}
                                                            else if($p2_tembakau == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_tembakau == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_tembakau == 2){echo "Tidak Pernah";}
                                                            else if($p2_tembakau == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_tembakau == 4){echo "Tiap Bulan";}
                                                            else if($p2_tembakau == 6){echo "Tiap Minggu";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_tembakau" >
                                                        <option value = "<?php if($p3_tembakau == 0){ echo "0";}
                                                            else if($p3_tembakau == 3){echo "3";}
                                                            else if($p3_tembakau == 4){echo "4";}
                                                            else if($p3_tembakau == 5){echo "5";}
                                                            else if($p3_tembakau == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_tembakau == 0){ echo "Tidak Pernah";}
                                                            else if($p3_tembakau == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_tembakau == 4){echo "Tiap Bulan";}
                                                            else if($p3_tembakau == 5){echo "Tiap Minggu";}
                                                            else if($p3_tembakau == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p3_tembakau == 0){ echo "3";}
                                                            else if($p3_tembakau == 3){echo "4";}
                                                            else if($p3_tembakau == 4){echo "5";}
                                                            else if($p3_tembakau == 5){echo "6";}
                                                            else if($p3_tembakau == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_tembakau == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_tembakau == 3){echo "Tiap Bulan";}
                                                            else if($p3_tembakau == 4){echo "Tiap Minggu";}
                                                            else if($p3_tembakau == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_tembakau == 6){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p3_tembakau == 0){ echo "4";}
                                                            else if($p3_tembakau == 3){echo "5";}
                                                            else if($p3_tembakau == 4){echo "6";}
                                                            else if($p3_tembakau == 5){echo "0";}
                                                            else if($p3_tembakau == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_tembakau == 0){ echo "Tiap Bulan";}
                                                            else if($p3_tembakau == 3){echo "Tiap Minggu";}
                                                            else if($p3_tembakau == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_tembakau == 5){echo "Tidak Pernah";}
                                                            else if($p3_tembakau == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p3_tembakau == 0){ echo "5";}
                                                            else if($p3_tembakau == 3){echo "6";}
                                                            else if($p3_tembakau == 4){echo "0";}
                                                            else if($p3_tembakau == 5){echo "3";}
                                                            else if($p3_tembakau == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_tembakau == 0){ echo "Tiap Minggu";}
                                                            else if($p3_tembakau == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_tembakau == 4){echo "Tidak Pernah";}
                                                            else if($p3_tembakau == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_tembakau == 6){echo "Tiap Bulan";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p3_tembakau == 0){ echo "6";}
                                                            else if($p3_tembakau == 3){echo "0";}
                                                            else if($p3_tembakau == 4){echo "3";}
                                                            else if($p3_tembakau == 5){echo "4";}
                                                            else if($p3_tembakau == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_tembakau == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_tembakau == 3){echo "Tidak Pernah";}
                                                            else if($p3_tembakau == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_tembakau == 5){echo "Tiap Bulan";}
                                                            else if($p3_tembakau == 6){echo "Tiap Minggu";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_tembakau" >
                                                        <option value = "<?php if($p4_tembakau == 0){ echo "0";}
                                                            else if($p4_tembakau == 4){echo "4";}
                                                            else if($p4_tembakau == 5){echo "5";}
                                                            else if($p4_tembakau == 6){echo "6";}
                                                            else if($p4_tembakau == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_tembakau == 0){ echo "Tidak Pernah";}
                                                            else if($p4_tembakau == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_tembakau == 5){echo "Tiap Bulan";}
                                                            else if($p4_tembakau == 6){echo "Tiap Minggu";}
                                                            else if($p4_tembakau == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p4_tembakau == 0){ echo "4";}
                                                            else if($p4_tembakau == 4){echo "5";}
                                                            else if($p4_tembakau == 5){echo "6";}
                                                            else if($p4_tembakau == 6){echo "7";}
                                                            else if($p4_tembakau == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_tembakau == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_tembakau == 4){echo "Tiap Bulan";}
                                                            else if($p4_tembakau == 5){echo "Tiap Minggu";}
                                                            else if($p4_tembakau == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_tembakau == 7){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p4_tembakau == 0){ echo "5";}
                                                            else if($p4_tembakau == 4){echo "6";}
                                                            else if($p4_tembakau == 5){echo "7";}
                                                            else if($p4_tembakau == 6){echo "0";}
                                                            else if($p4_tembakau == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_tembakau == 0){ echo "Tiap Bulan";}
                                                            else if($p4_tembakau == 4){echo "Tiap Minggu";}
                                                            else if($p4_tembakau == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_tembakau == 6){echo "Tidak Pernah";}
                                                            else if($p4_tembakau == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p4_tembakau == 0){ echo "6";}
                                                            else if($p4_tembakau == 4){echo "7";}
                                                            else if($p4_tembakau == 5){echo "0";}
                                                            else if($p4_tembakau == 6){echo "4";}
                                                            else if($p4_tembakau == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_tembakau == 0){ echo "Tiap Minggu";}
                                                            else if($p4_tembakau == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_tembakau == 5){echo "Tidak Pernah";}
                                                            else if($p4_tembakau == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_tembakau == 7){echo "Tiap Bulan";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p4_tembakau == 0){ echo "7";}
                                                            else if($p4_tembakau == 4){echo "0";}
                                                            else if($p4_tembakau == 5){echo "4";}
                                                            else if($p4_tembakau == 6){echo "5";}
                                                            else if($p4_tembakau == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_tembakau == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_tembakau == 4){echo "Tidak Pernah";}
                                                            else if($p4_tembakau == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_tembakau == 6){echo "Tiap Bulan";}
                                                            else if($p4_tembakau == 7){echo "Tiap Minggu";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_tembakau" >
                                                        <option value = "<?php if($p5_tembakau == 0){ echo "0";}
                                                            else if($p5_tembakau == 5){echo "5";}
                                                            else if($p5_tembakau == 6){echo "6";}
                                                            else if($p5_tembakau == 7){echo "7";}
                                                            else if($p5_tembakau == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_tembakau == 0){ echo "Tidak Pernah";}
                                                            else if($p5_tembakau == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_tembakau == 6){echo "Tiap Bulan";}
                                                            else if($p5_tembakau == 7){echo "Tiap Minggu";}
                                                            else if($p5_tembakau == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p5_tembakau == 0){ echo "5";}
                                                            else if($p5_tembakau == 5){echo "6";}
                                                            else if($p5_tembakau == 6){echo "7";}
                                                            else if($p5_tembakau == 7){echo "8";}
                                                            else if($p5_tembakau == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_tembakau == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_tembakau == 5){echo "Tiap Bulan";}
                                                            else if($p5_tembakau == 6){echo "Tiap Minggu";}
                                                            else if($p5_tembakau == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_tembakau == 8){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p5_tembakau == 0){ echo "6";}
                                                            else if($p5_tembakau == 5){echo "7";}
                                                            else if($p5_tembakau == 6){echo "8";}
                                                            else if($p5_tembakau == 7){echo "0";}
                                                            else if($p5_tembakau == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_tembakau == 0){ echo "Tiap Bulan";}
                                                            else if($p5_tembakau == 5){echo "Tiap Minggu";}
                                                            else if($p5_tembakau == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_tembakau == 7){echo "Tidak Pernah";}
                                                            else if($p5_tembakau == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p5_tembakau == 0){ echo "7";}
                                                            else if($p5_tembakau == 5){echo "8";}
                                                            else if($p5_tembakau == 6){echo "0";}
                                                            else if($p5_tembakau == 7){echo "5";}
                                                            else if($p5_tembakau == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_tembakau == 0){ echo "Tiap Minggu";}
                                                            else if($p5_tembakau == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_tembakau == 6){echo "Tidak Pernah";}
                                                            else if($p5_tembakau == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_tembakau == 8){echo "Tiap Bulan";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p5_tembakau == 0){ echo "8";}
                                                            else if($p5_tembakau == 5){echo "0";}
                                                            else if($p5_tembakau == 6){echo "5";}
                                                            else if($p5_tembakau == 7){echo "6";}
                                                            else if($p5_tembakau == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_tembakau == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_tembakau == 5){echo "Tidak Pernah";}
                                                            else if($p5_tembakau == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_tembakau == 7){echo "Tiap Bulan";}
                                                            else if($p5_tembakau == 8){echo "Tiap Minggu";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_tembakau" >
                                                        <option value = "<?php if($p6_tembakau == 0){ echo "0";}
                                                            else if($p6_tembakau == 6){echo "6";}
                                                            else if($p6_tembakau == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_tembakau == 0){ echo "Tidak Pernah";}
                                                            else if($p6_tembakau == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_tembakau == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p6_tembakau == 0){ echo "6";}
                                                            else if($p6_tembakau == 6){echo "3";}
                                                            else if($p6_tembakau == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_tembakau == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_tembakau == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_tembakau == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p6_tembakau == 0){ echo "3";}
                                                            else if($p6_tembakau == 6){echo "0";}
                                                            else if($p6_tembakau == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_tembakau == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_tembakau == 6){echo "Tidak Pernah";}
                                                            else if($p6_tembakau == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_tembakau" >
                                                        <option value = "<?php if($p7_tembakau == 0){ echo "0";}
                                                            else if($p7_tembakau == 6){echo "6";}
                                                            else if($p7_tembakau == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_tembakau == 0){ echo "Tidak Pernah";}
                                                            else if($p7_tembakau == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_tembakau == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_tembakau == 0){ echo "6";}
                                                            else if($p7_tembakau == 6){echo "3";}
                                                            else if($p7_tembakau == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_tembakau == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_tembakau == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_tembakau == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_tembakau == 0){ echo "3";}
                                                            else if($p7_tembakau == 6){echo "0";}
                                                            else if($p7_tembakau == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_tembakau == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_tembakau == 6){echo "Tidak Pernah";}
                                                            else if($p7_tembakau == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Minuman berakohol (Bir, Anggur, Miras, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryAlkohol = mysqli_query($koneksi,"SELECT * FROM t_alkohol WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryAlkohol);
                                    $p2_alkohol = $data['p2_alkohol'];
                                    $p3_alkohol = $data['p3_alkohol'];
                                    $p4_alkohol = $data['p4_alkohol'];
                                    $p5_alkohol = $data['p5_alkohol'];
                                    $p6_alkohol = $data['p6_alkohol'];
                                    $p7_alkohol = $data['p7_alkohol'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_alkohol">
                                                    <option value = "<?php if($p2_alkohol == 0){ echo "0";}
                                                            else if($p2_alkohol == 2){echo "2";}
                                                            else if($p2_alkohol == 3){echo "3";}
                                                            else if($p2_alkohol == 4){echo "4";}
                                                            else if($p2_alkohol == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_alkohol == 0){ echo "Tidak Pernah";}
                                                            else if($p2_alkohol == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_alkohol == 3){echo "Tiap Bulan";}
                                                            else if($p2_alkohol == 4){echo "Tiap Minggu";}
                                                            else if($p2_alkohol == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_alkohol == 0){ echo "2";}
                                                            else if($p2_alkohol == 2){echo "3";}
                                                            else if($p2_alkohol == 3){echo "4";}
                                                            else if($p2_alkohol == 4){echo "6";}
                                                            else if($p2_alkohol == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_alkohol == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_alkohol == 2){echo "Tiap Bulan";}
                                                            else if($p2_alkohol == 3){echo "Tiap Minggu";}
                                                            else if($p2_alkohol == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_alkohol == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_alkohol == 0){ echo "3";}
                                                            else if($p2_alkohol == 2){echo "4";}
                                                            else if($p2_alkohol == 3){echo "6";}
                                                            else if($p2_alkohol == 4){echo "0";}
                                                            else if($p2_alkohol == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_alkohol == 0){ echo "Tiap Bulan";}
                                                            else if($p2_alkohol == 2){echo "Tiap Minggu";}
                                                            else if($p2_alkohol == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_alkohol == 4){echo "Tidak Pernah";}
                                                            else if($p2_alkohol == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_alkohol == 0){ echo "4";}
                                                            else if($p2_alkohol == 2){echo "6";}
                                                            else if($p2_alkohol == 3){echo "0";}
                                                            else if($p2_alkohol == 4){echo "2";}
                                                            else if($p2_alkohol == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_alkohol == 0){ echo "Tiap Minggu";}
                                                            else if($p2_alkohol == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_alkohol == 3){echo "Tidak Pernah";}
                                                            else if($p2_alkohol == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_alkohol == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_alkohol == 0){ echo "6";}
                                                            else if($p2_alkohol == 2){echo "0";}
                                                            else if($p2_alkohol == 3){echo "2";}
                                                            else if($p2_alkohol == 4){echo "3";}
                                                            else if($p2_alkohol == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_alkohol == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_alkohol == 2){echo "Tidak Pernah";}
                                                            else if($p2_alkohol == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_alkohol == 4){echo "Tiap Bulan";}
                                                            else if($p2_alkohol == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_alkohol">
                                                    <option value = "<?php if($p3_alkohol == 0){ echo "0";}
                                                            else if($p3_alkohol == 3){echo "3";}
                                                            else if($p3_alkohol == 4){echo "4";}
                                                            else if($p3_alkohol == 5){echo "5";}
                                                            else if($p3_alkohol == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_alkohol == 0){ echo "Tidak Pernah";}
                                                            else if($p3_alkohol == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_alkohol == 4){echo "Tiap Bulan";}
                                                            else if($p3_alkohol == 5){echo "Tiap Minggu";}
                                                            else if($p3_alkohol == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_alkohol == 0){ echo "3";}
                                                            else if($p3_alkohol == 3){echo "4";}
                                                            else if($p3_alkohol == 4){echo "5";}
                                                            else if($p3_alkohol == 5){echo "6";}
                                                            else if($p3_alkohol == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_alkohol == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_alkohol == 3){echo "Tiap Bulan";}
                                                            else if($p3_alkohol == 4){echo "Tiap Minggu";}
                                                            else if($p3_alkohol == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_alkohol == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_alkohol == 0){ echo "4";}
                                                            else if($p3_alkohol == 3){echo "5";}
                                                            else if($p3_alkohol == 4){echo "6";}
                                                            else if($p3_alkohol == 5){echo "0";}
                                                            else if($p3_alkohol == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_alkohol == 0){ echo "Tiap Bulan";}
                                                            else if($p3_alkohol == 3){echo "Tiap Minggu";}
                                                            else if($p3_alkohol == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_alkohol == 5){echo "Tidak Pernah";}
                                                            else if($p3_alkohol == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_alkohol == 0){ echo "5";}
                                                            else if($p3_alkohol == 3){echo "6";}
                                                            else if($p3_alkohol == 4){echo "0";}
                                                            else if($p3_alkohol == 5){echo "3";}
                                                            else if($p3_alkohol == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_alkohol == 0){ echo "Tiap Minggu";}
                                                            else if($p3_alkohol == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_alkohol == 4){echo "Tidak Pernah";}
                                                            else if($p3_alkohol == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_alkohol == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_alkohol == 0){ echo "6";}
                                                            else if($p3_alkohol == 3){echo "0";}
                                                            else if($p3_alkohol == 4){echo "3";}
                                                            else if($p3_alkohol == 5){echo "4";}
                                                            else if($p3_alkohol == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_alkohol == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_alkohol == 3){echo "Tidak Pernah";}
                                                            else if($p3_alkohol == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_alkohol == 5){echo "Tiap Bulan";}
                                                            else if($p3_alkohol == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_alkohol">
                                                    <option value = "<?php if($p4_alkohol == 0){ echo "0";}
                                                            else if($p4_alkohol == 4){echo "4";}
                                                            else if($p4_alkohol == 5){echo "5";}
                                                            else if($p4_alkohol == 6){echo "6";}
                                                            else if($p4_alkohol == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_alkohol == 0){ echo "Tidak Pernah";}
                                                            else if($p4_alkohol == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_alkohol == 5){echo "Tiap Bulan";}
                                                            else if($p4_alkohol == 6){echo "Tiap Minggu";}
                                                            else if($p4_alkohol == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_alkohol == 0){ echo "4";}
                                                            else if($p4_alkohol == 4){echo "5";}
                                                            else if($p4_alkohol == 5){echo "6";}
                                                            else if($p4_alkohol == 6){echo "7";}
                                                            else if($p4_alkohol == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_alkohol == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_alkohol == 4){echo "Tiap Bulan";}
                                                            else if($p4_alkohol == 5){echo "Tiap Minggu";}
                                                            else if($p4_alkohol == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_alkohol == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_alkohol == 0){ echo "5";}
                                                            else if($p4_alkohol == 4){echo "6";}
                                                            else if($p4_alkohol == 5){echo "7";}
                                                            else if($p4_alkohol == 6){echo "0";}
                                                            else if($p4_alkohol == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_alkohol == 0){ echo "Tiap Bulan";}
                                                            else if($p4_alkohol == 4){echo "Tiap Minggu";}
                                                            else if($p4_alkohol == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_alkohol == 6){echo "Tidak Pernah";}
                                                            else if($p4_alkohol == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_alkohol == 0){ echo "6";}
                                                            else if($p4_alkohol == 4){echo "7";}
                                                            else if($p4_alkohol == 5){echo "0";}
                                                            else if($p4_alkohol == 6){echo "4";}
                                                            else if($p4_alkohol == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_alkohol == 0){ echo "Tiap Minggu";}
                                                            else if($p4_alkohol == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_alkohol == 5){echo "Tidak Pernah";}
                                                            else if($p4_alkohol == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_alkohol == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_alkohol == 0){ echo "7";}
                                                            else if($p4_alkohol == 4){echo "0";}
                                                            else if($p4_alkohol == 5){echo "4";}
                                                            else if($p4_alkohol == 6){echo "5";}
                                                            else if($p4_alkohol == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_alkohol == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_alkohol == 4){echo "Tidak Pernah";}
                                                            else if($p4_alkohol == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_alkohol == 6){echo "Tiap Bulan";}
                                                            else if($p4_alkohol == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_alkohol">
                                                    <option value = "<?php if($p5_alkohol == 0){ echo "0";}
                                                            else if($p5_alkohol == 5){echo "5";}
                                                            else if($p5_alkohol == 6){echo "6";}
                                                            else if($p5_alkohol == 7){echo "7";}
                                                            else if($p5_alkohol == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_alkohol == 0){ echo "Tidak Pernah";}
                                                            else if($p5_alkohol == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_alkohol == 6){echo "Tiap Bulan";}
                                                            else if($p5_alkohol == 7){echo "Tiap Minggu";}
                                                            else if($p5_alkohol == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_alkohol == 0){ echo "5";}
                                                            else if($p5_alkohol == 5){echo "6";}
                                                            else if($p5_alkohol == 6){echo "7";}
                                                            else if($p5_alkohol == 7){echo "8";}
                                                            else if($p5_alkohol == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_alkohol == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_alkohol == 5){echo "Tiap Bulan";}
                                                            else if($p5_alkohol == 6){echo "Tiap Minggu";}
                                                            else if($p5_alkohol == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_alkohol == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_alkohol == 0){ echo "6";}
                                                            else if($p5_alkohol == 5){echo "7";}
                                                            else if($p5_alkohol == 6){echo "8";}
                                                            else if($p5_alkohol == 7){echo "0";}
                                                            else if($p5_alkohol == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_alkohol == 0){ echo "Tiap Bulan";}
                                                            else if($p5_alkohol == 5){echo "Tiap Minggu";}
                                                            else if($p5_alkohol == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_alkohol == 7){echo "Tidak Pernah";}
                                                            else if($p5_alkohol == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_alkohol == 0){ echo "7";}
                                                            else if($p5_alkohol == 5){echo "8";}
                                                            else if($p5_alkohol == 6){echo "0";}
                                                            else if($p5_alkohol == 7){echo "5";}
                                                            else if($p5_alkohol == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_alkohol == 0){ echo "Tiap Minggu";}
                                                            else if($p5_alkohol == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_alkohol == 6){echo "Tidak Pernah";}
                                                            else if($p5_alkohol == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_alkohol == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_alkohol == 0){ echo "8";}
                                                            else if($p5_alkohol == 5){echo "0";}
                                                            else if($p5_alkohol == 6){echo "5";}
                                                            else if($p5_alkohol == 7){echo "6";}
                                                            else if($p5_alkohol == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_alkohol == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_alkohol == 5){echo "Tidak Pernah";}
                                                            else if($p5_alkohol == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_alkohol == 7){echo "Tiap Bulan";}
                                                            else if($p5_alkohol == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_alkohol">
                                                    <option value = "<?php if($p6_alkohol == 0){ echo "0";}
                                                            else if($p6_alkohol == 6){echo "6";}
                                                            else if($p6_alkohol == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_alkohol == 0){ echo "Tidak Pernah";}
                                                            else if($p6_alkohol == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_alkohol == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_alkohol == 0){ echo "6";}
                                                            else if($p6_alkohol == 6){echo "3";}
                                                            else if($p6_alkohol == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_alkohol == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_alkohol == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_alkohol == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_alkohol == 0){ echo "3";}
                                                            else if($p6_alkohol == 6){echo "0";}
                                                            else if($p6_alkohol == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_alkohol == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_alkohol == 6){echo "Tidak Pernah";}
                                                            else if($p6_alkohol == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_alkohol">
                                                        <option value = "<?php if($p7_alkohol == 0){ echo "0";}
                                                            else if($p7_alkohol == 6){echo "6";}
                                                            else if($p7_alkohol == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_alkohol == 0){ echo "Tidak Pernah";}
                                                            else if($p7_alkohol == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_alkohol == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_alkohol == 0){ echo "6";}
                                                            else if($p7_alkohol == 6){echo "3";}
                                                            else if($p7_alkohol == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_alkohol == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_alkohol == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_alkohol == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_alkohol == 0){ echo "3";}
                                                            else if($p7_alkohol == 6){echo "0";}
                                                            else if($p7_alkohol == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_alkohol == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_alkohol == 6){echo "Tidak Pernah";}
                                                            else if($p7_alkohol == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Kanabis (Mariujuana, Ganja, Gelek, Cimeng, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryKanabis = mysqli_query($koneksi,"SELECT * FROM t_kanabis WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryKanabis);
                                    $p2_kanabis = $data['p2_kanabis'];
                                    $p3_kanabis = $data['p3_kanabis'];
                                    $p4_kanabis = $data['p4_kanabis'];
                                    $p5_kanabis = $data['p5_kanabis'];
                                    $p6_kanabis = $data['p6_kanabis'];
                                    $p7_kanabis = $data['p7_kanabis'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_kanabis">
                                                    <option value = "<?php if($p2_kanabis == 0){ echo "0";}
                                                            else if($p2_kanabis == 2){echo "2";}
                                                            else if($p2_kanabis == 3){echo "3";}
                                                            else if($p2_kanabis == 4){echo "4";}
                                                            else if($p2_kanabis == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_kanabis == 0){ echo "Tidak Pernah";}
                                                            else if($p2_kanabis == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_kanabis == 3){echo "Tiap Bulan";}
                                                            else if($p2_kanabis == 4){echo "Tiap Minggu";}
                                                            else if($p2_kanabis == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kanabis == 0){ echo "2";}
                                                            else if($p2_kanabis == 2){echo "3";}
                                                            else if($p2_kanabis == 3){echo "4";}
                                                            else if($p2_kanabis == 4){echo "6";}
                                                            else if($p2_kanabis == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_kanabis == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_kanabis == 2){echo "Tiap Bulan";}
                                                            else if($p2_kanabis == 3){echo "Tiap Minggu";}
                                                            else if($p2_kanabis == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kanabis == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kanabis == 0){ echo "3";}
                                                            else if($p2_kanabis == 2){echo "4";}
                                                            else if($p2_kanabis == 3){echo "6";}
                                                            else if($p2_kanabis == 4){echo "0";}
                                                            else if($p2_kanabis == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_kanabis == 0){ echo "Tiap Bulan";}
                                                            else if($p2_kanabis == 2){echo "Tiap Minggu";}
                                                            else if($p2_kanabis == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kanabis == 4){echo "Tidak Pernah";}
                                                            else if($p2_kanabis == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kanabis == 0){ echo "4";}
                                                            else if($p2_kanabis == 2){echo "6";}
                                                            else if($p2_kanabis == 3){echo "0";}
                                                            else if($p2_kanabis == 4){echo "2";}
                                                            else if($p2_kanabis == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_kanabis == 0){ echo "Tiap Minggu";}
                                                            else if($p2_kanabis == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kanabis == 3){echo "Tidak Pernah";}
                                                            else if($p2_kanabis == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_kanabis == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kanabis == 0){ echo "6";}
                                                            else if($p2_kanabis == 2){echo "0";}
                                                            else if($p2_kanabis == 3){echo "2";}
                                                            else if($p2_kanabis == 4){echo "3";}
                                                            else if($p2_kanabis == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_kanabis == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kanabis == 2){echo "Tidak Pernah";}
                                                            else if($p2_kanabis == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_kanabis == 4){echo "Tiap Bulan";}
                                                            else if($p2_kanabis == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_kanabis">
                                                    <option value = "<?php if($p3_kanabis == 0){ echo "0";}
                                                            else if($p3_kanabis == 3){echo "3";}
                                                            else if($p3_kanabis == 4){echo "4";}
                                                            else if($p3_kanabis == 5){echo "5";}
                                                            else if($p3_kanabis == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_kanabis == 0){ echo "Tidak Pernah";}
                                                            else if($p3_kanabis == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_kanabis == 4){echo "Tiap Bulan";}
                                                            else if($p3_kanabis == 5){echo "Tiap Minggu";}
                                                            else if($p3_kanabis == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kanabis == 0){ echo "3";}
                                                            else if($p3_kanabis == 3){echo "4";}
                                                            else if($p3_kanabis == 4){echo "5";}
                                                            else if($p3_kanabis == 5){echo "6";}
                                                            else if($p3_kanabis == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_kanabis == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_kanabis == 3){echo "Tiap Bulan";}
                                                            else if($p3_kanabis == 4){echo "Tiap Minggu";}
                                                            else if($p3_kanabis == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kanabis == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kanabis == 0){ echo "4";}
                                                            else if($p3_kanabis == 3){echo "5";}
                                                            else if($p3_kanabis == 4){echo "6";}
                                                            else if($p3_kanabis == 5){echo "0";}
                                                            else if($p3_kanabis == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_kanabis == 0){ echo "Tiap Bulan";}
                                                            else if($p3_kanabis == 3){echo "Tiap Minggu";}
                                                            else if($p3_kanabis == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kanabis == 5){echo "Tidak Pernah";}
                                                            else if($p3_kanabis == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kanabis == 0){ echo "5";}
                                                            else if($p3_kanabis == 3){echo "6";}
                                                            else if($p3_kanabis == 4){echo "0";}
                                                            else if($p3_kanabis == 5){echo "3";}
                                                            else if($p3_kanabis == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_kanabis == 0){ echo "Tiap Minggu";}
                                                            else if($p3_kanabis == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kanabis == 4){echo "Tidak Pernah";}
                                                            else if($p3_kanabis == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_kanabis == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kanabis == 0){ echo "6";}
                                                            else if($p3_kanabis == 3){echo "0";}
                                                            else if($p3_kanabis == 4){echo "3";}
                                                            else if($p3_kanabis == 5){echo "4";}
                                                            else if($p3_kanabis == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_kanabis == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kanabis == 3){echo "Tidak Pernah";}
                                                            else if($p3_kanabis == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_kanabis == 5){echo "Tiap Bulan";}
                                                            else if($p3_kanabis == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_kanabis">
                                                    <option value = "<?php if($p4_kanabis == 0){ echo "0";}
                                                            else if($p4_kanabis == 4){echo "4";}
                                                            else if($p4_kanabis == 5){echo "5";}
                                                            else if($p4_kanabis == 6){echo "6";}
                                                            else if($p4_kanabis == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_kanabis == 0){ echo "Tidak Pernah";}
                                                            else if($p4_kanabis == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_kanabis == 5){echo "Tiap Bulan";}
                                                            else if($p4_kanabis == 6){echo "Tiap Minggu";}
                                                            else if($p4_kanabis == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kanabis == 0){ echo "4";}
                                                            else if($p4_kanabis == 4){echo "5";}
                                                            else if($p4_kanabis == 5){echo "6";}
                                                            else if($p4_kanabis == 6){echo "7";}
                                                            else if($p4_kanabis == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_kanabis == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_kanabis == 4){echo "Tiap Bulan";}
                                                            else if($p4_kanabis == 5){echo "Tiap Minggu";}
                                                            else if($p4_kanabis == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kanabis == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kanabis == 0){ echo "5";}
                                                            else if($p4_kanabis == 4){echo "6";}
                                                            else if($p4_kanabis == 5){echo "7";}
                                                            else if($p4_kanabis == 6){echo "0";}
                                                            else if($p4_kanabis == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_kanabis == 0){ echo "Tiap Bulan";}
                                                            else if($p4_kanabis == 4){echo "Tiap Minggu";}
                                                            else if($p4_kanabis == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kanabis == 6){echo "Tidak Pernah";}
                                                            else if($p4_kanabis == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kanabis == 0){ echo "6";}
                                                            else if($p4_kanabis == 4){echo "7";}
                                                            else if($p4_kanabis == 5){echo "0";}
                                                            else if($p4_kanabis == 6){echo "4";}
                                                            else if($p4_kanabis == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_kanabis == 0){ echo "Tiap Minggu";}
                                                            else if($p4_kanabis == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kanabis == 5){echo "Tidak Pernah";}
                                                            else if($p4_kanabis == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_kanabis == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kanabis == 0){ echo "7";}
                                                            else if($p4_kanabis == 4){echo "0";}
                                                            else if($p4_kanabis == 5){echo "4";}
                                                            else if($p4_kanabis == 6){echo "5";}
                                                            else if($p4_kanabis == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_kanabis == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kanabis == 4){echo "Tidak Pernah";}
                                                            else if($p4_kanabis == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_kanabis == 6){echo "Tiap Bulan";}
                                                            else if($p4_kanabis == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_kanabis">
                                                    <option value = "<?php if($p5_kanabis == 0){ echo "0";}
                                                            else if($p5_kanabis == 5){echo "5";}
                                                            else if($p5_kanabis == 6){echo "6";}
                                                            else if($p5_kanabis == 7){echo "7";}
                                                            else if($p5_kanabis == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_kanabis == 0){ echo "Tidak Pernah";}
                                                            else if($p5_kanabis == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_kanabis == 6){echo "Tiap Bulan";}
                                                            else if($p5_kanabis == 7){echo "Tiap Minggu";}
                                                            else if($p5_kanabis == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kanabis == 0){ echo "5";}
                                                            else if($p5_kanabis == 5){echo "6";}
                                                            else if($p5_kanabis == 6){echo "7";}
                                                            else if($p5_kanabis == 7){echo "8";}
                                                            else if($p5_kanabis == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_kanabis == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_kanabis == 5){echo "Tiap Bulan";}
                                                            else if($p5_kanabis == 6){echo "Tiap Minggu";}
                                                            else if($p5_kanabis == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kanabis == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kanabis == 0){ echo "6";}
                                                            else if($p5_kanabis == 5){echo "7";}
                                                            else if($p5_kanabis == 6){echo "8";}
                                                            else if($p5_kanabis == 7){echo "0";}
                                                            else if($p5_kanabis == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_kanabis == 0){ echo "Tiap Bulan";}
                                                            else if($p5_kanabis == 5){echo "Tiap Minggu";}
                                                            else if($p5_kanabis == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kanabis == 7){echo "Tidak Pernah";}
                                                            else if($p5_kanabis == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kanabis == 0){ echo "7";}
                                                            else if($p5_kanabis == 5){echo "8";}
                                                            else if($p5_kanabis == 6){echo "0";}
                                                            else if($p5_kanabis == 7){echo "5";}
                                                            else if($p5_kanabis == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_kanabis == 0){ echo "Tiap Minggu";}
                                                            else if($p5_kanabis == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kanabis == 6){echo "Tidak Pernah";}
                                                            else if($p5_kanabis == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_kanabis == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kanabis == 0){ echo "8";}
                                                            else if($p5_kanabis == 5){echo "0";}
                                                            else if($p5_kanabis == 6){echo "5";}
                                                            else if($p5_kanabis == 7){echo "6";}
                                                            else if($p5_kanabis == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_kanabis == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kanabis == 5){echo "Tidak Pernah";}
                                                            else if($p5_kanabis == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_kanabis == 7){echo "Tiap Bulan";}
                                                            else if($p5_kanabis == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_kanabis">
                                                    <option value = "<?php if($p6_kanabis == 0){ echo "0";}
                                                            else if($p6_kanabis == 6){echo "6";}
                                                            else if($p6_kanabis == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_kanabis == 0){ echo "Tidak Pernah";}
                                                            else if($p6_kanabis == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_kanabis == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_kanabis == 0){ echo "6";}
                                                            else if($p6_kanabis == 6){echo "3";}
                                                            else if($p6_kanabis == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_kanabis == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_kanabis == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_kanabis == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_kanabis == 0){ echo "3";}
                                                            else if($p6_kanabis == 6){echo "0";}
                                                            else if($p6_kanabis == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_kanabis == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_kanabis == 6){echo "Tidak Pernah";}
                                                            else if($p6_kanabis == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_kanabis">
                                                    <option value = "<?php if($p7_kanabis == 0){ echo "0";}
                                                            else if($p7_kanabis == 6){echo "6";}
                                                            else if($p7_kanabis == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_kanabis == 0){ echo "Tidak Pernah";}
                                                            else if($p7_kanabis == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_kanabis == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_kanabis == 0){ echo "6";}
                                                            else if($p7_kanabis == 6){echo "3";}
                                                            else if($p7_kanabis == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_kanabis == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_kanabis == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_kanabis == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_kanabis == 0){ echo "3";}
                                                            else if($p7_kanabis == 6){echo "0";}
                                                            else if($p7_kanabis == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_kanabis == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_kanabis == 6){echo "Tidak Pernah";}
                                                            else if($p7_kanabis == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Kokain (Coke, Crack, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryKokain = mysqli_query($koneksi,"SELECT * FROM t_kokain WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryKokain);
                                    $p2_kokain = $data['p2_kokain'];
                                    $p3_kokain = $data['p3_kokain'];
                                    $p4_kokain = $data['p4_kokain'];
                                    $p5_kokain = $data['p5_kokain'];
                                    $p6_kokain = $data['p6_kokain'];
                                    $p7_kokain = $data['p7_kokain'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_kokain">
                                                    <option value = "<?php if($p2_kokain == 0){ echo "0";}
                                                            else if($p2_kokain == 2){echo "2";}
                                                            else if($p2_kokain == 3){echo "3";}
                                                            else if($p2_kokain == 4){echo "4";}
                                                            else if($p2_kokain == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_kokain == 0){ echo "Tidak Pernah";}
                                                            else if($p2_kokain == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_kokain == 3){echo "Tiap Bulan";}
                                                            else if($p2_kokain == 4){echo "Tiap Minggu";}
                                                            else if($p2_kokain == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kokain == 0){ echo "2";}
                                                            else if($p2_kokain == 2){echo "3";}
                                                            else if($p2_kokain == 3){echo "4";}
                                                            else if($p2_kokain == 4){echo "6";}
                                                            else if($p2_kokain == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_kokain == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_kokain == 2){echo "Tiap Bulan";}
                                                            else if($p2_kokain == 3){echo "Tiap Minggu";}
                                                            else if($p2_kokain == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kokain == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kokain == 0){ echo "3";}
                                                            else if($p2_kokain == 2){echo "4";}
                                                            else if($p2_kokain == 3){echo "6";}
                                                            else if($p2_kokain == 4){echo "0";}
                                                            else if($p2_kokain == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_kokain == 0){ echo "Tiap Bulan";}
                                                            else if($p2_kokain == 2){echo "Tiap Minggu";}
                                                            else if($p2_kokain == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kokain == 4){echo "Tidak Pernah";}
                                                            else if($p2_kokain == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kokain == 0){ echo "4";}
                                                            else if($p2_kokain == 2){echo "6";}
                                                            else if($p2_kokain == 3){echo "0";}
                                                            else if($p2_kokain == 4){echo "2";}
                                                            else if($p2_kokain == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_kokain == 0){ echo "Tiap Minggu";}
                                                            else if($p2_kokain == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kokain == 3){echo "Tidak Pernah";}
                                                            else if($p2_kokain == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_kokain == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_kokain == 0){ echo "6";}
                                                            else if($p2_kokain == 2){echo "0";}
                                                            else if($p2_kokain == 3){echo "2";}
                                                            else if($p2_kokain == 4){echo "3";}
                                                            else if($p2_kokain == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_kokain == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_kokain == 2){echo "Tidak Pernah";}
                                                            else if($p2_kokain == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_kokain == 4){echo "Tiap Bulan";}
                                                            else if($p2_kokain == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_kokain">
                                                    <option value = "<?php if($p3_kokain == 0){ echo "0";}
                                                            else if($p3_kokain == 3){echo "3";}
                                                            else if($p3_kokain == 4){echo "4";}
                                                            else if($p3_kokain == 5){echo "5";}
                                                            else if($p3_kokain == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_kokain == 0){ echo "Tidak Pernah";}
                                                            else if($p3_kokain == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_kokain == 4){echo "Tiap Bulan";}
                                                            else if($p3_kokain == 5){echo "Tiap Minggu";}
                                                            else if($p3_kokain == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kokain == 0){ echo "3";}
                                                            else if($p3_kokain == 3){echo "4";}
                                                            else if($p3_kokain == 4){echo "5";}
                                                            else if($p3_kokain == 5){echo "6";}
                                                            else if($p3_kokain == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_kokain == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_kokain == 3){echo "Tiap Bulan";}
                                                            else if($p3_kokain == 4){echo "Tiap Minggu";}
                                                            else if($p3_kokain == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kokain == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kokain == 0){ echo "4";}
                                                            else if($p3_kokain == 3){echo "5";}
                                                            else if($p3_kokain == 4){echo "6";}
                                                            else if($p3_kokain == 5){echo "0";}
                                                            else if($p3_kokain == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_kokain == 0){ echo "Tiap Bulan";}
                                                            else if($p3_kokain == 3){echo "Tiap Minggu";}
                                                            else if($p3_kokain == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kokain == 5){echo "Tidak Pernah";}
                                                            else if($p3_kokain == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kokain == 0){ echo "5";}
                                                            else if($p3_kokain == 3){echo "6";}
                                                            else if($p3_kokain == 4){echo "0";}
                                                            else if($p3_kokain == 5){echo "3";}
                                                            else if($p3_kokain == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_kokain == 0){ echo "Tiap Minggu";}
                                                            else if($p3_kokain == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kokain == 4){echo "Tidak Pernah";}
                                                            else if($p3_kokain == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_kokain == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_kokain == 0){ echo "6";}
                                                            else if($p3_kokain == 3){echo "0";}
                                                            else if($p3_kokain == 4){echo "3";}
                                                            else if($p3_kokain == 5){echo "4";}
                                                            else if($p3_kokain == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_kokain == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_kokain == 3){echo "Tidak Pernah";}
                                                            else if($p3_kokain == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_kokain == 5){echo "Tiap Bulan";}
                                                            else if($p3_kokain == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_kokain">
                                                    <option value = "<?php if($p4_kokain == 0){ echo "0";}
                                                            else if($p4_kokain == 4){echo "4";}
                                                            else if($p4_kokain == 5){echo "5";}
                                                            else if($p4_kokain == 6){echo "6";}
                                                            else if($p4_kokain == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_kokain == 0){ echo "Tidak Pernah";}
                                                            else if($p4_kokain == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_kokain == 5){echo "Tiap Bulan";}
                                                            else if($p4_kokain == 6){echo "Tiap Minggu";}
                                                            else if($p4_kokain == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kokain == 0){ echo "4";}
                                                            else if($p4_kokain == 4){echo "5";}
                                                            else if($p4_kokain == 5){echo "6";}
                                                            else if($p4_kokain == 6){echo "7";}
                                                            else if($p4_kokain == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_kokain == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_kokain == 4){echo "Tiap Bulan";}
                                                            else if($p4_kokain == 5){echo "Tiap Minggu";}
                                                            else if($p4_kokain == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kokain == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kokain == 0){ echo "5";}
                                                            else if($p4_kokain == 4){echo "6";}
                                                            else if($p4_kokain == 5){echo "7";}
                                                            else if($p4_kokain == 6){echo "0";}
                                                            else if($p4_kokain == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_kokain == 0){ echo "Tiap Bulan";}
                                                            else if($p4_kokain == 4){echo "Tiap Minggu";}
                                                            else if($p4_kokain == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kokain == 6){echo "Tidak Pernah";}
                                                            else if($p4_kokain == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kokain == 0){ echo "6";}
                                                            else if($p4_kokain == 4){echo "7";}
                                                            else if($p4_kokain == 5){echo "0";}
                                                            else if($p4_kokain == 6){echo "4";}
                                                            else if($p4_kokain == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_kokain == 0){ echo "Tiap Minggu";}
                                                            else if($p4_kokain == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kokain == 5){echo "Tidak Pernah";}
                                                            else if($p4_kokain == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_kokain == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_kokain == 0){ echo "7";}
                                                            else if($p4_kokain == 4){echo "0";}
                                                            else if($p4_kokain == 5){echo "4";}
                                                            else if($p4_kokain == 6){echo "5";}
                                                            else if($p4_kokain == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_kokain == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_kokain == 4){echo "Tidak Pernah";}
                                                            else if($p4_kokain == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_kokain == 6){echo "Tiap Bulan";}
                                                            else if($p4_kokain == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_kokain">
                                                    <option value = "<?php if($p5_kokain == 0){ echo "0";}
                                                            else if($p5_kokain == 5){echo "5";}
                                                            else if($p5_kokain == 6){echo "6";}
                                                            else if($p5_kokain == 7){echo "7";}
                                                            else if($p5_kokain == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_kokain == 0){ echo "Tidak Pernah";}
                                                            else if($p5_kokain == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_kokain == 6){echo "Tiap Bulan";}
                                                            else if($p5_kokain == 7){echo "Tiap Minggu";}
                                                            else if($p5_kokain == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kokain == 0){ echo "5";}
                                                            else if($p5_kokain == 5){echo "6";}
                                                            else if($p5_kokain == 6){echo "7";}
                                                            else if($p5_kokain == 7){echo "8";}
                                                            else if($p5_kokain == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_kokain == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_kokain == 5){echo "Tiap Bulan";}
                                                            else if($p5_kokain == 6){echo "Tiap Minggu";}
                                                            else if($p5_kokain == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kokain == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kokain == 0){ echo "6";}
                                                            else if($p5_kokain == 5){echo "7";}
                                                            else if($p5_kokain == 6){echo "8";}
                                                            else if($p5_kokain == 7){echo "0";}
                                                            else if($p5_kokain == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_kokain == 0){ echo "Tiap Bulan";}
                                                            else if($p5_kokain == 5){echo "Tiap Minggu";}
                                                            else if($p5_kokain == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kokain == 7){echo "Tidak Pernah";}
                                                            else if($p5_kokain == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kokain == 0){ echo "7";}
                                                            else if($p5_kokain == 5){echo "8";}
                                                            else if($p5_kokain == 6){echo "0";}
                                                            else if($p5_kokain == 7){echo "5";}
                                                            else if($p5_kokain == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_kokain == 0){ echo "Tiap Minggu";}
                                                            else if($p5_kokain == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kokain == 6){echo "Tidak Pernah";}
                                                            else if($p5_kokain == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_kokain == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_kokain == 0){ echo "8";}
                                                            else if($p5_kokain == 5){echo "0";}
                                                            else if($p5_kokain == 6){echo "5";}
                                                            else if($p5_kokain == 7){echo "6";}
                                                            else if($p5_kokain == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_kokain == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_kokain == 5){echo "Tidak Pernah";}
                                                            else if($p5_kokain == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_kokain == 7){echo "Tiap Bulan";}
                                                            else if($p5_kokain == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_kokain">
                                                    <option value = "<?php if($p6_kokain == 0){ echo "0";}
                                                            else if($p6_kokain == 6){echo "6";}
                                                            else if($p6_kokain == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_kokain == 0){ echo "Tidak Pernah";}
                                                            else if($p6_kokain == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_kokain == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_kokain == 0){ echo "6";}
                                                            else if($p6_kokain == 6){echo "3";}
                                                            else if($p6_kokain == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_kokain == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_kokain == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_kokain == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_kokain == 0){ echo "3";}
                                                            else if($p6_kokain == 6){echo "0";}
                                                            else if($p6_kokain == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_kokain == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_kokain == 6){echo "Tidak Pernah";}
                                                            else if($p6_kokain == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_kokain">
                                                    <option value = "<?php if($p7_kokain == 0){ echo "0";}
                                                            else if($p7_kokain == 6){echo "6";}
                                                            else if($p7_kokain == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_kokain == 0){ echo "Tidak Pernah";}
                                                            else if($p7_kokain == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_kokain == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_kokain == 0){ echo "6";}
                                                            else if($p7_kokain == 6){echo "3";}
                                                            else if($p7_kokain == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_kokain == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_kokain == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_kokain == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_kokain == 0){ echo "3";}
                                                            else if($p7_kokain == 6){echo "0";}
                                                            else if($p7_kokain == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_kokain == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_kokain == 6){echo "Tidak Pernah";}
                                                            else if($p7_kokain == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Stimulan Jenis Amfetamin (Ekstasi, Shabu, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryAmfetamine = mysqli_query($koneksi,"SELECT * FROM t_amfetamine WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryAmfetamine);
                                    $p2_amfetamine = $data['p2_amfetamine'];
                                    $p3_amfetamine = $data['p3_amfetamine'];
                                    $p4_amfetamine = $data['p4_amfetamine'];
                                    $p5_amfetamine = $data['p5_amfetamine'];
                                    $p6_amfetamine = $data['p6_amfetamine'];
                                    $p7_amfetamine = $data['p7_amfetamine'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_amfetamine">
                                                    <option value = "<?php if($p2_amfetamine == 0){ echo "0";}
                                                            else if($p2_amfetamine == 2){echo "2";}
                                                            else if($p2_amfetamine == 3){echo "3";}
                                                            else if($p2_amfetamine == 4){echo "4";}
                                                            else if($p2_amfetamine == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_amfetamine == 0){ echo "Tidak Pernah";}
                                                            else if($p2_amfetamine == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_amfetamine == 3){echo "Tiap Bulan";}
                                                            else if($p2_amfetamine == 4){echo "Tiap Minggu";}
                                                            else if($p2_amfetamine == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_amfetamine == 0){ echo "2";}
                                                            else if($p2_amfetamine == 2){echo "3";}
                                                            else if($p2_amfetamine == 3){echo "4";}
                                                            else if($p2_amfetamine == 4){echo "6";}
                                                            else if($p2_amfetamine == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_amfetamine == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_amfetamine == 2){echo "Tiap Bulan";}
                                                            else if($p2_amfetamine == 3){echo "Tiap Minggu";}
                                                            else if($p2_amfetamine == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_amfetamine == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_amfetamine == 0){ echo "3";}
                                                            else if($p2_amfetamine == 2){echo "4";}
                                                            else if($p2_amfetamine == 3){echo "6";}
                                                            else if($p2_amfetamine == 4){echo "0";}
                                                            else if($p2_amfetamine == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_amfetamine == 0){ echo "Tiap Bulan";}
                                                            else if($p2_amfetamine == 2){echo "Tiap Minggu";}
                                                            else if($p2_amfetamine == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_amfetamine == 4){echo "Tidak Pernah";}
                                                            else if($p2_amfetamine == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_amfetamine == 0){ echo "4";}
                                                            else if($p2_amfetamine == 2){echo "6";}
                                                            else if($p2_amfetamine == 3){echo "0";}
                                                            else if($p2_amfetamine == 4){echo "2";}
                                                            else if($p2_amfetamine == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_amfetamine == 0){ echo "Tiap Minggu";}
                                                            else if($p2_amfetamine == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_amfetamine == 3){echo "Tidak Pernah";}
                                                            else if($p2_amfetamine == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_amfetamine == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_amfetamine == 0){ echo "6";}
                                                            else if($p2_amfetamine == 2){echo "0";}
                                                            else if($p2_amfetamine == 3){echo "2";}
                                                            else if($p2_amfetamine == 4){echo "3";}
                                                            else if($p2_amfetamine == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_amfetamine == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_amfetamine == 2){echo "Tidak Pernah";}
                                                            else if($p2_amfetamine == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_amfetamine == 4){echo "Tiap Bulan";}
                                                            else if($p2_amfetamine == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_amfetamine">
                                                    <option value = "<?php if($p3_amfetamine == 0){ echo "0";}
                                                            else if($p3_amfetamine == 3){echo "3";}
                                                            else if($p3_amfetamine == 4){echo "4";}
                                                            else if($p3_amfetamine == 5){echo "5";}
                                                            else if($p3_amfetamine == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_amfetamine == 0){ echo "Tidak Pernah";}
                                                            else if($p3_amfetamine == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_amfetamine == 4){echo "Tiap Bulan";}
                                                            else if($p3_amfetamine == 5){echo "Tiap Minggu";}
                                                            else if($p3_amfetamine == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_amfetamine == 0){ echo "3";}
                                                            else if($p3_amfetamine == 3){echo "4";}
                                                            else if($p3_amfetamine == 4){echo "5";}
                                                            else if($p3_amfetamine == 5){echo "6";}
                                                            else if($p3_amfetamine == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_amfetamine == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_amfetamine == 3){echo "Tiap Bulan";}
                                                            else if($p3_amfetamine == 4){echo "Tiap Minggu";}
                                                            else if($p3_amfetamine == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_amfetamine == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_amfetamine == 0){ echo "4";}
                                                            else if($p3_amfetamine == 3){echo "5";}
                                                            else if($p3_amfetamine == 4){echo "6";}
                                                            else if($p3_amfetamine == 5){echo "0";}
                                                            else if($p3_amfetamine == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_amfetamine == 0){ echo "Tiap Bulan";}
                                                            else if($p3_amfetamine == 3){echo "Tiap Minggu";}
                                                            else if($p3_amfetamine == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_amfetamine == 5){echo "Tidak Pernah";}
                                                            else if($p3_amfetamine == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_amfetamine == 0){ echo "5";}
                                                            else if($p3_amfetamine == 3){echo "6";}
                                                            else if($p3_amfetamine == 4){echo "0";}
                                                            else if($p3_amfetamine == 5){echo "3";}
                                                            else if($p3_amfetamine == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_amfetamine == 0){ echo "Tiap Minggu";}
                                                            else if($p3_amfetamine == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_amfetamine == 4){echo "Tidak Pernah";}
                                                            else if($p3_amfetamine == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_amfetamine == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_amfetamine == 0){ echo "6";}
                                                            else if($p3_amfetamine == 3){echo "0";}
                                                            else if($p3_amfetamine == 4){echo "3";}
                                                            else if($p3_amfetamine == 5){echo "4";}
                                                            else if($p3_amfetamine == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_amfetamine == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_amfetamine == 3){echo "Tidak Pernah";}
                                                            else if($p3_amfetamine == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_amfetamine == 5){echo "Tiap Bulan";}
                                                            else if($p3_amfetamine == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_amfetamine">
                                                    <option value = "<?php if($p4_amfetamine == 0){ echo "0";}
                                                            else if($p4_amfetamine == 4){echo "4";}
                                                            else if($p4_amfetamine == 5){echo "5";}
                                                            else if($p4_amfetamine == 6){echo "6";}
                                                            else if($p4_amfetamine == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_amfetamine == 0){ echo "Tidak Pernah";}
                                                            else if($p4_amfetamine == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_amfetamine == 5){echo "Tiap Bulan";}
                                                            else if($p4_amfetamine == 6){echo "Tiap Minggu";}
                                                            else if($p4_amfetamine == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_amfetamine == 0){ echo "4";}
                                                            else if($p4_amfetamine == 4){echo "5";}
                                                            else if($p4_amfetamine == 5){echo "6";}
                                                            else if($p4_amfetamine == 6){echo "7";}
                                                            else if($p4_amfetamine == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_amfetamine == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_amfetamine == 4){echo "Tiap Bulan";}
                                                            else if($p4_amfetamine == 5){echo "Tiap Minggu";}
                                                            else if($p4_amfetamine == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_amfetamine == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_amfetamine == 0){ echo "5";}
                                                            else if($p4_amfetamine == 4){echo "6";}
                                                            else if($p4_amfetamine == 5){echo "7";}
                                                            else if($p4_amfetamine == 6){echo "0";}
                                                            else if($p4_amfetamine == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_amfetamine == 0){ echo "Tiap Bulan";}
                                                            else if($p4_amfetamine == 4){echo "Tiap Minggu";}
                                                            else if($p4_amfetamine == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_amfetamine == 6){echo "Tidak Pernah";}
                                                            else if($p4_amfetamine == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_amfetamine == 0){ echo "6";}
                                                            else if($p4_amfetamine == 4){echo "7";}
                                                            else if($p4_amfetamine == 5){echo "0";}
                                                            else if($p4_amfetamine == 6){echo "4";}
                                                            else if($p4_amfetamine == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_amfetamine == 0){ echo "Tiap Minggu";}
                                                            else if($p4_amfetamine == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_amfetamine == 5){echo "Tidak Pernah";}
                                                            else if($p4_amfetamine == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_amfetamine == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_amfetamine == 0){ echo "7";}
                                                            else if($p4_amfetamine == 4){echo "0";}
                                                            else if($p4_amfetamine == 5){echo "4";}
                                                            else if($p4_amfetamine == 6){echo "5";}
                                                            else if($p4_amfetamine == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_amfetamine == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_amfetamine == 4){echo "Tidak Pernah";}
                                                            else if($p4_amfetamine == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_amfetamine == 6){echo "Tiap Bulan";}
                                                            else if($p4_amfetamine == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_amfetamine">
                                                    <option value = "<?php if($p5_amfetamine == 0){ echo "0";}
                                                            else if($p5_amfetamine == 5){echo "5";}
                                                            else if($p5_amfetamine == 6){echo "6";}
                                                            else if($p5_amfetamine == 7){echo "7";}
                                                            else if($p5_amfetamine == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_amfetamine == 0){ echo "Tidak Pernah";}
                                                            else if($p5_amfetamine == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_amfetamine == 6){echo "Tiap Bulan";}
                                                            else if($p5_amfetamine == 7){echo "Tiap Minggu";}
                                                            else if($p5_amfetamine == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_amfetamine == 0){ echo "5";}
                                                            else if($p5_amfetamine == 5){echo "6";}
                                                            else if($p5_amfetamine == 6){echo "7";}
                                                            else if($p5_amfetamine == 7){echo "8";}
                                                            else if($p5_amfetamine == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_amfetamine == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_amfetamine == 5){echo "Tiap Bulan";}
                                                            else if($p5_amfetamine == 6){echo "Tiap Minggu";}
                                                            else if($p5_amfetamine == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_amfetamine == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_amfetamine == 0){ echo "6";}
                                                            else if($p5_amfetamine == 5){echo "7";}
                                                            else if($p5_amfetamine == 6){echo "8";}
                                                            else if($p5_amfetamine == 7){echo "0";}
                                                            else if($p5_amfetamine == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_amfetamine == 0){ echo "Tiap Bulan";}
                                                            else if($p5_amfetamine == 5){echo "Tiap Minggu";}
                                                            else if($p5_amfetamine == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_amfetamine == 7){echo "Tidak Pernah";}
                                                            else if($p5_amfetamine == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_amfetamine == 0){ echo "7";}
                                                            else if($p5_amfetamine == 5){echo "8";}
                                                            else if($p5_amfetamine == 6){echo "0";}
                                                            else if($p5_amfetamine == 7){echo "5";}
                                                            else if($p5_amfetamine == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_amfetamine == 0){ echo "Tiap Minggu";}
                                                            else if($p5_amfetamine == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_amfetamine == 6){echo "Tidak Pernah";}
                                                            else if($p5_amfetamine == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_amfetamine == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_amfetamine == 0){ echo "8";}
                                                            else if($p5_amfetamine == 5){echo "0";}
                                                            else if($p5_amfetamine == 6){echo "5";}
                                                            else if($p5_amfetamine == 7){echo "6";}
                                                            else if($p5_amfetamine == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_amfetamine == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_amfetamine == 5){echo "Tidak Pernah";}
                                                            else if($p5_amfetamine == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_amfetamine == 7){echo "Tiap Bulan";}
                                                            else if($p5_amfetamine == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_amfetamine">
                                                    <option value = "<?php if($p6_amfetamine == 0){ echo "0";}
                                                            else if($p6_amfetamine == 6){echo "6";}
                                                            else if($p6_amfetamine == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_amfetamine == 0){ echo "Tidak Pernah";}
                                                            else if($p6_amfetamine == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_amfetamine == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_amfetamine == 0){ echo "6";}
                                                            else if($p6_amfetamine == 6){echo "3";}
                                                            else if($p6_amfetamine == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_amfetamine == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_amfetamine == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_amfetamine == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_amfetamine == 0){ echo "3";}
                                                            else if($p6_amfetamine == 6){echo "0";}
                                                            else if($p6_amfetamine == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_amfetamine == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_amfetamine == 6){echo "Tidak Pernah";}
                                                            else if($p6_amfetamine == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_amfetamine">
                                                    <option value = "<?php if($p7_amfetamine == 0){ echo "0";}
                                                            else if($p7_amfetamine == 6){echo "6";}
                                                            else if($p7_amfetamine == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_amfetamine == 0){ echo "Tidak Pernah";}
                                                            else if($p7_amfetamine == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_amfetamine == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_amfetamine == 0){ echo "6";}
                                                            else if($p7_amfetamine == 6){echo "3";}
                                                            else if($p7_amfetamine == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_amfetamine == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_amfetamine == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_amfetamine == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_amfetamine == 0){ echo "3";}
                                                            else if($p7_amfetamine == 6){echo "0";}
                                                            else if($p7_amfetamine == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_amfetamine == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_amfetamine == 6){echo "Tidak Pernah";}
                                                            else if($p7_amfetamine == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Inhalansia (Lem, Bensin, Tiner, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <?php 
                                    $queryInhalansia = mysqli_query($koneksi,"SELECT * FROM t_inhalansia WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryInhalansia);
                                    $p2_inhalansia = $data['p2_inhalansia'];
                                    $p3_inhalansia = $data['p3_inhalansia'];
                                    $p4_inhalansia = $data['p4_inhalansia'];
                                    $p5_inhalansia = $data['p5_inhalansia'];
                                    $p6_inhalansia = $data['p6_inhalansia'];
                                    $p7_inhalansia = $data['p7_inhalansia'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_inhalansia">
                                                    <option value = "<?php if($p2_inhalansia == 0){ echo "0";}
                                                            else if($p2_inhalansia == 2){echo "2";}
                                                            else if($p2_inhalansia == 3){echo "3";}
                                                            else if($p2_inhalansia == 4){echo "4";}
                                                            else if($p2_inhalansia == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_inhalansia == 0){ echo "Tidak Pernah";}
                                                            else if($p2_inhalansia == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_inhalansia == 3){echo "Tiap Bulan";}
                                                            else if($p2_inhalansia == 4){echo "Tiap Minggu";}
                                                            else if($p2_inhalansia == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_inhalansia == 0){ echo "2";}
                                                            else if($p2_inhalansia == 2){echo "3";}
                                                            else if($p2_inhalansia == 3){echo "4";}
                                                            else if($p2_inhalansia == 4){echo "6";}
                                                            else if($p2_inhalansia == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_inhalansia == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_inhalansia == 2){echo "Tiap Bulan";}
                                                            else if($p2_inhalansia == 3){echo "Tiap Minggu";}
                                                            else if($p2_inhalansia == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_inhalansia == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_inhalansia == 0){ echo "3";}
                                                            else if($p2_inhalansia == 2){echo "4";}
                                                            else if($p2_inhalansia == 3){echo "6";}
                                                            else if($p2_inhalansia == 4){echo "0";}
                                                            else if($p2_inhalansia == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_inhalansia == 0){ echo "Tiap Bulan";}
                                                            else if($p2_inhalansia == 2){echo "Tiap Minggu";}
                                                            else if($p2_inhalansia == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_inhalansia == 4){echo "Tidak Pernah";}
                                                            else if($p2_inhalansia == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_inhalansia == 0){ echo "4";}
                                                            else if($p2_inhalansia == 2){echo "6";}
                                                            else if($p2_inhalansia == 3){echo "0";}
                                                            else if($p2_inhalansia == 4){echo "2";}
                                                            else if($p2_inhalansia == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_inhalansia == 0){ echo "Tiap Minggu";}
                                                            else if($p2_inhalansia == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_inhalansia == 3){echo "Tidak Pernah";}
                                                            else if($p2_inhalansia == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_inhalansia == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_inhalansia == 0){ echo "6";}
                                                            else if($p2_inhalansia == 2){echo "0";}
                                                            else if($p2_inhalansia == 3){echo "2";}
                                                            else if($p2_inhalansia == 4){echo "3";}
                                                            else if($p2_inhalansia == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_inhalansia == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_inhalansia == 2){echo "Tidak Pernah";}
                                                            else if($p2_inhalansia == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_inhalansia == 4){echo "Tiap Bulan";}
                                                            else if($p2_inhalansia == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_inhalansia">
                                                    <option value = "<?php if($p3_inhalansia == 0){ echo "0";}
                                                            else if($p3_inhalansia == 3){echo "3";}
                                                            else if($p3_inhalansia == 4){echo "4";}
                                                            else if($p3_inhalansia == 5){echo "5";}
                                                            else if($p3_inhalansia == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_inhalansia == 0){ echo "Tidak Pernah";}
                                                            else if($p3_inhalansia == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_inhalansia == 4){echo "Tiap Bulan";}
                                                            else if($p3_inhalansia == 5){echo "Tiap Minggu";}
                                                            else if($p3_inhalansia == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_inhalansia == 0){ echo "3";}
                                                            else if($p3_inhalansia == 3){echo "4";}
                                                            else if($p3_inhalansia == 4){echo "5";}
                                                            else if($p3_inhalansia == 5){echo "6";}
                                                            else if($p3_inhalansia == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_inhalansia == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_inhalansia == 3){echo "Tiap Bulan";}
                                                            else if($p3_inhalansia == 4){echo "Tiap Minggu";}
                                                            else if($p3_inhalansia == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_inhalansia == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_inhalansia == 0){ echo "4";}
                                                            else if($p3_inhalansia == 3){echo "5";}
                                                            else if($p3_inhalansia == 4){echo "6";}
                                                            else if($p3_inhalansia == 5){echo "0";}
                                                            else if($p3_inhalansia == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_inhalansia == 0){ echo "Tiap Bulan";}
                                                            else if($p3_inhalansia == 3){echo "Tiap Minggu";}
                                                            else if($p3_inhalansia == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_inhalansia == 5){echo "Tidak Pernah";}
                                                            else if($p3_inhalansia == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_inhalansia == 0){ echo "5";}
                                                            else if($p3_inhalansia == 3){echo "6";}
                                                            else if($p3_inhalansia == 4){echo "0";}
                                                            else if($p3_inhalansia == 5){echo "3";}
                                                            else if($p3_inhalansia == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_inhalansia == 0){ echo "Tiap Minggu";}
                                                            else if($p3_inhalansia == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_inhalansia == 4){echo "Tidak Pernah";}
                                                            else if($p3_inhalansia == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_inhalansia == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_inhalansia == 0){ echo "6";}
                                                            else if($p3_inhalansia == 3){echo "0";}
                                                            else if($p3_inhalansia == 4){echo "3";}
                                                            else if($p3_inhalansia == 5){echo "4";}
                                                            else if($p3_inhalansia == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_inhalansia == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_inhalansia == 3){echo "Tidak Pernah";}
                                                            else if($p3_inhalansia == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_inhalansia == 5){echo "Tiap Bulan";}
                                                            else if($p3_inhalansia == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_inhalansia">
                                                    <option value = "<?php if($p4_inhalansia == 0){ echo "0";}
                                                            else if($p4_inhalansia == 4){echo "4";}
                                                            else if($p4_inhalansia == 5){echo "5";}
                                                            else if($p4_inhalansia == 6){echo "6";}
                                                            else if($p4_inhalansia == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_inhalansia == 0){ echo "Tidak Pernah";}
                                                            else if($p4_inhalansia == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_inhalansia == 5){echo "Tiap Bulan";}
                                                            else if($p4_inhalansia == 6){echo "Tiap Minggu";}
                                                            else if($p4_inhalansia == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_inhalansia == 0){ echo "4";}
                                                            else if($p4_inhalansia == 4){echo "5";}
                                                            else if($p4_inhalansia == 5){echo "6";}
                                                            else if($p4_inhalansia == 6){echo "7";}
                                                            else if($p4_inhalansia == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_inhalansia == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_inhalansia == 4){echo "Tiap Bulan";}
                                                            else if($p4_inhalansia == 5){echo "Tiap Minggu";}
                                                            else if($p4_inhalansia == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_inhalansia == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_inhalansia == 0){ echo "5";}
                                                            else if($p4_inhalansia == 4){echo "6";}
                                                            else if($p4_inhalansia == 5){echo "7";}
                                                            else if($p4_inhalansia == 6){echo "0";}
                                                            else if($p4_inhalansia == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_inhalansia == 0){ echo "Tiap Bulan";}
                                                            else if($p4_inhalansia == 4){echo "Tiap Minggu";}
                                                            else if($p4_inhalansia == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_inhalansia == 6){echo "Tidak Pernah";}
                                                            else if($p4_inhalansia == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_inhalansia == 0){ echo "6";}
                                                            else if($p4_inhalansia == 4){echo "7";}
                                                            else if($p4_inhalansia == 5){echo "0";}
                                                            else if($p4_inhalansia == 6){echo "4";}
                                                            else if($p4_inhalansia == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_inhalansia == 0){ echo "Tiap Minggu";}
                                                            else if($p4_inhalansia == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_inhalansia == 5){echo "Tidak Pernah";}
                                                            else if($p4_inhalansia == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_inhalansia == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_inhalansia == 0){ echo "7";}
                                                            else if($p4_inhalansia == 4){echo "0";}
                                                            else if($p4_inhalansia == 5){echo "4";}
                                                            else if($p4_inhalansia == 6){echo "5";}
                                                            else if($p4_inhalansia == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_inhalansia == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_inhalansia == 4){echo "Tidak Pernah";}
                                                            else if($p4_inhalansia == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_inhalansia == 6){echo "Tiap Bulan";}
                                                            else if($p4_inhalansia == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_inhalansia">
                                                    <option value = "<?php if($p5_inhalansia == 0){ echo "0";}
                                                            else if($p5_inhalansia == 5){echo "5";}
                                                            else if($p5_inhalansia == 6){echo "6";}
                                                            else if($p5_inhalansia == 7){echo "7";}
                                                            else if($p5_inhalansia == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_inhalansia == 0){ echo "Tidak Pernah";}
                                                            else if($p5_inhalansia == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_inhalansia == 6){echo "Tiap Bulan";}
                                                            else if($p5_inhalansia == 7){echo "Tiap Minggu";}
                                                            else if($p5_inhalansia == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_inhalansia == 0){ echo "5";}
                                                            else if($p5_inhalansia == 5){echo "6";}
                                                            else if($p5_inhalansia == 6){echo "7";}
                                                            else if($p5_inhalansia == 7){echo "8";}
                                                            else if($p5_inhalansia == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_inhalansia == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_inhalansia == 5){echo "Tiap Bulan";}
                                                            else if($p5_inhalansia == 6){echo "Tiap Minggu";}
                                                            else if($p5_inhalansia == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_inhalansia == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_inhalansia == 0){ echo "6";}
                                                            else if($p5_inhalansia == 5){echo "7";}
                                                            else if($p5_inhalansia == 6){echo "8";}
                                                            else if($p5_inhalansia == 7){echo "0";}
                                                            else if($p5_inhalansia == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_inhalansia == 0){ echo "Tiap Bulan";}
                                                            else if($p5_inhalansia == 5){echo "Tiap Minggu";}
                                                            else if($p5_inhalansia == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_inhalansia == 7){echo "Tidak Pernah";}
                                                            else if($p5_inhalansia == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_inhalansia == 0){ echo "7";}
                                                            else if($p5_inhalansia == 5){echo "8";}
                                                            else if($p5_inhalansia == 6){echo "0";}
                                                            else if($p5_inhalansia == 7){echo "5";}
                                                            else if($p5_inhalansia == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_inhalansia == 0){ echo "Tiap Minggu";}
                                                            else if($p5_inhalansia == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_inhalansia == 6){echo "Tidak Pernah";}
                                                            else if($p5_inhalansia == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_inhalansia == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_inhalansia == 0){ echo "8";}
                                                            else if($p5_inhalansia == 5){echo "0";}
                                                            else if($p5_inhalansia == 6){echo "5";}
                                                            else if($p5_inhalansia == 7){echo "6";}
                                                            else if($p5_inhalansia == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_inhalansia == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_inhalansia == 5){echo "Tidak Pernah";}
                                                            else if($p5_inhalansia == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_inhalansia == 7){echo "Tiap Bulan";}
                                                            else if($p5_inhalansia == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_inhalansia">
                                                    <option value = "<?php if($p6_inhalansia == 0){ echo "0";}
                                                            else if($p6_inhalansia == 6){echo "6";}
                                                            else if($p6_inhalansia == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_inhalansia == 0){ echo "Tidak Pernah";}
                                                            else if($p6_inhalansia == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_inhalansia == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_inhalansia == 0){ echo "6";}
                                                            else if($p6_inhalansia == 6){echo "3";}
                                                            else if($p6_inhalansia == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_inhalansia == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_inhalansia == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_inhalansia == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_inhalansia == 0){ echo "3";}
                                                            else if($p6_inhalansia == 6){echo "0";}
                                                            else if($p6_inhalansia == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_inhalansia == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_inhalansia == 6){echo "Tidak Pernah";}
                                                            else if($p6_inhalansia == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_inhalansia">
                                                    <option value = "<?php if($p7_inhalansia == 0){ echo "0";}
                                                            else if($p7_inhalansia == 6){echo "6";}
                                                            else if($p7_inhalansia == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_inhalansia == 0){ echo "Tidak Pernah";}
                                                            else if($p7_inhalansia == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_inhalansia == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_inhalansia == 0){ echo "6";}
                                                            else if($p7_inhalansia == 6){echo "3";}
                                                            else if($p7_inhalansia == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_inhalansia == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_inhalansia == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_inhalansia == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_inhalansia == 0){ echo "3";}
                                                            else if($p7_inhalansia == 6){echo "0";}
                                                            else if($p7_inhalansia == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_inhalansia == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_inhalansia == 6){echo "Tidak Pernah";}
                                                            else if($p7_inhalansia == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                               
                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Sedativa atau obat tidur (Pil Koplo, Valium, Benzodiazepin, Lexotan, Rohypnol, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $querySedativa = mysqli_query($koneksi,"SELECT * FROM t_sedativa WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($querySedativa);
                                    $p2_sedativa = $data['p2_sedativa'];
                                    $p3_sedativa = $data['p3_sedativa'];
                                    $p4_sedativa = $data['p4_sedativa'];
                                    $p5_sedativa = $data['p5_sedativa'];
                                    $p6_sedativa = $data['p6_sedativa'];
                                    $p7_sedativa = $data['p7_sedativa'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_sedativa">
                                                    <option value = "<?php if($p2_sedativa == 0){ echo "0";}
                                                            else if($p2_sedativa == 2){echo "2";}
                                                            else if($p2_sedativa == 3){echo "3";}
                                                            else if($p2_sedativa == 4){echo "4";}
                                                            else if($p2_sedativa == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_sedativa == 0){ echo "Tidak Pernah";}
                                                            else if($p2_sedativa == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_sedativa == 3){echo "Tiap Bulan";}
                                                            else if($p2_sedativa == 4){echo "Tiap Minggu";}
                                                            else if($p2_sedativa == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_sedativa == 0){ echo "2";}
                                                            else if($p2_sedativa == 2){echo "3";}
                                                            else if($p2_sedativa == 3){echo "4";}
                                                            else if($p2_sedativa == 4){echo "6";}
                                                            else if($p2_sedativa == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_sedativa == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_sedativa == 2){echo "Tiap Bulan";}
                                                            else if($p2_sedativa == 3){echo "Tiap Minggu";}
                                                            else if($p2_sedativa == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_sedativa == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_sedativa == 0){ echo "3";}
                                                            else if($p2_sedativa == 2){echo "4";}
                                                            else if($p2_sedativa == 3){echo "6";}
                                                            else if($p2_sedativa == 4){echo "0";}
                                                            else if($p2_sedativa == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_sedativa == 0){ echo "Tiap Bulan";}
                                                            else if($p2_sedativa == 2){echo "Tiap Minggu";}
                                                            else if($p2_sedativa == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_sedativa == 4){echo "Tidak Pernah";}
                                                            else if($p2_sedativa == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_sedativa == 0){ echo "4";}
                                                            else if($p2_sedativa == 2){echo "6";}
                                                            else if($p2_sedativa == 3){echo "0";}
                                                            else if($p2_sedativa == 4){echo "2";}
                                                            else if($p2_sedativa == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_sedativa == 0){ echo "Tiap Minggu";}
                                                            else if($p2_sedativa == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_sedativa == 3){echo "Tidak Pernah";}
                                                            else if($p2_sedativa == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_sedativa == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_sedativa == 0){ echo "6";}
                                                            else if($p2_sedativa == 2){echo "0";}
                                                            else if($p2_sedativa == 3){echo "2";}
                                                            else if($p2_sedativa == 4){echo "3";}
                                                            else if($p2_sedativa == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_sedativa == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_sedativa == 2){echo "Tidak Pernah";}
                                                            else if($p2_sedativa == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_sedativa == 4){echo "Tiap Bulan";}
                                                            else if($p2_sedativa == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_sedativa">
                                                    <option value = "<?php if($p3_sedativa == 0){ echo "0";}
                                                            else if($p3_sedativa == 3){echo "3";}
                                                            else if($p3_sedativa == 4){echo "4";}
                                                            else if($p3_sedativa == 5){echo "5";}
                                                            else if($p3_sedativa == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_sedativa == 0){ echo "Tidak Pernah";}
                                                            else if($p3_sedativa == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_sedativa == 4){echo "Tiap Bulan";}
                                                            else if($p3_sedativa == 5){echo "Tiap Minggu";}
                                                            else if($p3_sedativa == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_sedativa == 0){ echo "3";}
                                                            else if($p3_sedativa == 3){echo "4";}
                                                            else if($p3_sedativa == 4){echo "5";}
                                                            else if($p3_sedativa == 5){echo "6";}
                                                            else if($p3_sedativa == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_sedativa == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_sedativa == 3){echo "Tiap Bulan";}
                                                            else if($p3_sedativa == 4){echo "Tiap Minggu";}
                                                            else if($p3_sedativa == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_sedativa == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_sedativa == 0){ echo "4";}
                                                            else if($p3_sedativa == 3){echo "5";}
                                                            else if($p3_sedativa == 4){echo "6";}
                                                            else if($p3_sedativa == 5){echo "0";}
                                                            else if($p3_sedativa == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_sedativa == 0){ echo "Tiap Bulan";}
                                                            else if($p3_sedativa == 3){echo "Tiap Minggu";}
                                                            else if($p3_sedativa == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_sedativa == 5){echo "Tidak Pernah";}
                                                            else if($p3_sedativa == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_sedativa == 0){ echo "5";}
                                                            else if($p3_sedativa == 3){echo "6";}
                                                            else if($p3_sedativa == 4){echo "0";}
                                                            else if($p3_sedativa == 5){echo "3";}
                                                            else if($p3_sedativa == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_sedativa == 0){ echo "Tiap Minggu";}
                                                            else if($p3_sedativa == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_sedativa == 4){echo "Tidak Pernah";}
                                                            else if($p3_sedativa == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_sedativa == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_sedativa == 0){ echo "6";}
                                                            else if($p3_sedativa == 3){echo "0";}
                                                            else if($p3_sedativa == 4){echo "3";}
                                                            else if($p3_sedativa == 5){echo "4";}
                                                            else if($p3_sedativa == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_sedativa == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_sedativa == 3){echo "Tidak Pernah";}
                                                            else if($p3_sedativa == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_sedativa == 5){echo "Tiap Bulan";}
                                                            else if($p3_sedativa == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_sedativa">
                                                    <option value = "<?php if($p4_sedativa == 0){ echo "0";}
                                                            else if($p4_sedativa == 4){echo "4";}
                                                            else if($p4_sedativa == 5){echo "5";}
                                                            else if($p4_sedativa == 6){echo "6";}
                                                            else if($p4_sedativa == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_sedativa == 0){ echo "Tidak Pernah";}
                                                            else if($p4_sedativa == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_sedativa == 5){echo "Tiap Bulan";}
                                                            else if($p4_sedativa == 6){echo "Tiap Minggu";}
                                                            else if($p4_sedativa == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_sedativa == 0){ echo "4";}
                                                            else if($p4_sedativa == 4){echo "5";}
                                                            else if($p4_sedativa == 5){echo "6";}
                                                            else if($p4_sedativa == 6){echo "7";}
                                                            else if($p4_sedativa == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_sedativa == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_sedativa == 4){echo "Tiap Bulan";}
                                                            else if($p4_sedativa == 5){echo "Tiap Minggu";}
                                                            else if($p4_sedativa == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_sedativa == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_sedativa == 0){ echo "5";}
                                                            else if($p4_sedativa == 4){echo "6";}
                                                            else if($p4_sedativa == 5){echo "7";}
                                                            else if($p4_sedativa == 6){echo "0";}
                                                            else if($p4_sedativa == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_sedativa == 0){ echo "Tiap Bulan";}
                                                            else if($p4_sedativa == 4){echo "Tiap Minggu";}
                                                            else if($p4_sedativa == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_sedativa == 6){echo "Tidak Pernah";}
                                                            else if($p4_sedativa == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_sedativa == 0){ echo "6";}
                                                            else if($p4_sedativa == 4){echo "7";}
                                                            else if($p4_sedativa == 5){echo "0";}
                                                            else if($p4_sedativa == 6){echo "4";}
                                                            else if($p4_sedativa == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_sedativa == 0){ echo "Tiap Minggu";}
                                                            else if($p4_sedativa == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_sedativa == 5){echo "Tidak Pernah";}
                                                            else if($p4_sedativa == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_sedativa == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_sedativa == 0){ echo "7";}
                                                            else if($p4_sedativa == 4){echo "0";}
                                                            else if($p4_sedativa == 5){echo "4";}
                                                            else if($p4_sedativa == 6){echo "5";}
                                                            else if($p4_sedativa == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_sedativa == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_sedativa == 4){echo "Tidak Pernah";}
                                                            else if($p4_sedativa == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_sedativa == 6){echo "Tiap Bulan";}
                                                            else if($p4_sedativa == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_sedativa">
                                                    <option value = "<?php if($p5_sedativa == 0){ echo "0";}
                                                            else if($p5_sedativa == 5){echo "5";}
                                                            else if($p5_sedativa == 6){echo "6";}
                                                            else if($p5_sedativa == 7){echo "7";}
                                                            else if($p5_sedativa == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_sedativa == 0){ echo "Tidak Pernah";}
                                                            else if($p5_sedativa == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_sedativa == 6){echo "Tiap Bulan";}
                                                            else if($p5_sedativa == 7){echo "Tiap Minggu";}
                                                            else if($p5_sedativa == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_sedativa == 0){ echo "5";}
                                                            else if($p5_sedativa == 5){echo "6";}
                                                            else if($p5_sedativa == 6){echo "7";}
                                                            else if($p5_sedativa == 7){echo "8";}
                                                            else if($p5_sedativa == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_sedativa == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_sedativa == 5){echo "Tiap Bulan";}
                                                            else if($p5_sedativa == 6){echo "Tiap Minggu";}
                                                            else if($p5_sedativa == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_sedativa == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_sedativa == 0){ echo "6";}
                                                            else if($p5_sedativa == 5){echo "7";}
                                                            else if($p5_sedativa == 6){echo "8";}
                                                            else if($p5_sedativa == 7){echo "0";}
                                                            else if($p5_sedativa == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_sedativa == 0){ echo "Tiap Bulan";}
                                                            else if($p5_sedativa == 5){echo "Tiap Minggu";}
                                                            else if($p5_sedativa == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_sedativa == 7){echo "Tidak Pernah";}
                                                            else if($p5_sedativa == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_sedativa == 0){ echo "7";}
                                                            else if($p5_sedativa == 5){echo "8";}
                                                            else if($p5_sedativa == 6){echo "0";}
                                                            else if($p5_sedativa == 7){echo "5";}
                                                            else if($p5_sedativa == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_sedativa == 0){ echo "Tiap Minggu";}
                                                            else if($p5_sedativa == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_sedativa == 6){echo "Tidak Pernah";}
                                                            else if($p5_sedativa == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_sedativa == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_sedativa == 0){ echo "8";}
                                                            else if($p5_sedativa == 5){echo "0";}
                                                            else if($p5_sedativa == 6){echo "5";}
                                                            else if($p5_sedativa == 7){echo "6";}
                                                            else if($p5_sedativa == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_sedativa == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_sedativa == 5){echo "Tidak Pernah";}
                                                            else if($p5_sedativa == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_sedativa == 7){echo "Tiap Bulan";}
                                                            else if($p5_sedativa == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_sedativa">
                                                    <option value = "<?php if($p6_sedativa == 0){ echo "0";}
                                                            else if($p6_sedativa == 6){echo "6";}
                                                            else if($p6_sedativa == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_sedativa == 0){ echo "Tidak Pernah";}
                                                            else if($p6_sedativa == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_sedativa == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_sedativa == 0){ echo "6";}
                                                            else if($p6_sedativa == 6){echo "3";}
                                                            else if($p6_sedativa == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_sedativa == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_sedativa == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_sedativa == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_sedativa == 0){ echo "3";}
                                                            else if($p6_sedativa == 6){echo "0";}
                                                            else if($p6_sedativa == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_sedativa == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_sedativa == 6){echo "Tidak Pernah";}
                                                            else if($p6_sedativa == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_sedativa">
                                                    <option value = "<?php if($p7_sedativa == 0){ echo "0";}
                                                            else if($p7_sedativa == 6){echo "6";}
                                                            else if($p7_sedativa == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_sedativa == 0){ echo "Tidak Pernah";}
                                                            else if($p7_sedativa == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_sedativa == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_sedativa == 0){ echo "6";}
                                                            else if($p7_sedativa == 6){echo "3";}
                                                            else if($p7_sedativa == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_sedativa == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_sedativa == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_sedativa == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_sedativa == 0){ echo "3";}
                                                            else if($p7_sedativa == 6){echo "0";}
                                                            else if($p7_sedativa == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_sedativa == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_sedativa == 6){echo "Tidak Pernah";}
                                                            else if($p7_sedativa == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Halusinogen (LSD, Jamur, PCP, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryHalusinogen = mysqli_query($koneksi,"SELECT * FROM t_halusinogen WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryHalusinogen);
                                    $p2_halusinogen = $data['p2_halusinogen'];
                                    $p3_halusinogen = $data['p3_halusinogen'];
                                    $p4_halusinogen = $data['p4_halusinogen'];
                                    $p5_halusinogen = $data['p5_halusinogen'];
                                    $p6_halusinogen = $data['p6_halusinogen'];
                                    $p7_halusinogen = $data['p7_halusinogen'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_halusinogen">
                                                    <option value = "<?php if($p2_halusinogen == 0){ echo "0";}
                                                            else if($p2_halusinogen == 2){echo "2";}
                                                            else if($p2_halusinogen == 3){echo "3";}
                                                            else if($p2_halusinogen == 4){echo "4";}
                                                            else if($p2_halusinogen == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_halusinogen == 0){ echo "Tidak Pernah";}
                                                            else if($p2_halusinogen == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_halusinogen == 3){echo "Tiap Bulan";}
                                                            else if($p2_halusinogen == 4){echo "Tiap Minggu";}
                                                            else if($p2_halusinogen == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_halusinogen == 0){ echo "2";}
                                                            else if($p2_halusinogen == 2){echo "3";}
                                                            else if($p2_halusinogen == 3){echo "4";}
                                                            else if($p2_halusinogen == 4){echo "6";}
                                                            else if($p2_halusinogen == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_halusinogen == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_halusinogen == 2){echo "Tiap Bulan";}
                                                            else if($p2_halusinogen == 3){echo "Tiap Minggu";}
                                                            else if($p2_halusinogen == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_halusinogen == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_halusinogen == 0){ echo "3";}
                                                            else if($p2_halusinogen == 2){echo "4";}
                                                            else if($p2_halusinogen == 3){echo "6";}
                                                            else if($p2_halusinogen == 4){echo "0";}
                                                            else if($p2_halusinogen == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_halusinogen == 0){ echo "Tiap Bulan";}
                                                            else if($p2_halusinogen == 2){echo "Tiap Minggu";}
                                                            else if($p2_halusinogen == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_halusinogen == 4){echo "Tidak Pernah";}
                                                            else if($p2_halusinogen == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_halusinogen == 0){ echo "4";}
                                                            else if($p2_halusinogen == 2){echo "6";}
                                                            else if($p2_halusinogen == 3){echo "0";}
                                                            else if($p2_halusinogen == 4){echo "2";}
                                                            else if($p2_halusinogen == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_halusinogen == 0){ echo "Tiap Minggu";}
                                                            else if($p2_halusinogen == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_halusinogen == 3){echo "Tidak Pernah";}
                                                            else if($p2_halusinogen == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_halusinogen == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_halusinogen == 0){ echo "6";}
                                                            else if($p2_halusinogen == 2){echo "0";}
                                                            else if($p2_halusinogen == 3){echo "2";}
                                                            else if($p2_halusinogen == 4){echo "3";}
                                                            else if($p2_halusinogen == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_halusinogen == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_halusinogen == 2){echo "Tidak Pernah";}
                                                            else if($p2_halusinogen == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_halusinogen == 4){echo "Tiap Bulan";}
                                                            else if($p2_halusinogen == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_halusinogen">
                                                    <option value = "<?php if($p3_halusinogen == 0){ echo "0";}
                                                            else if($p3_halusinogen == 3){echo "3";}
                                                            else if($p3_halusinogen == 4){echo "4";}
                                                            else if($p3_halusinogen == 5){echo "5";}
                                                            else if($p3_halusinogen == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_halusinogen == 0){ echo "Tidak Pernah";}
                                                            else if($p3_halusinogen == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_halusinogen == 4){echo "Tiap Bulan";}
                                                            else if($p3_halusinogen == 5){echo "Tiap Minggu";}
                                                            else if($p3_halusinogen == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_halusinogen == 0){ echo "3";}
                                                            else if($p3_halusinogen == 3){echo "4";}
                                                            else if($p3_halusinogen == 4){echo "5";}
                                                            else if($p3_halusinogen == 5){echo "6";}
                                                            else if($p3_halusinogen == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_halusinogen == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_halusinogen == 3){echo "Tiap Bulan";}
                                                            else if($p3_halusinogen == 4){echo "Tiap Minggu";}
                                                            else if($p3_halusinogen == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_halusinogen == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_halusinogen == 0){ echo "4";}
                                                            else if($p3_halusinogen == 3){echo "5";}
                                                            else if($p3_halusinogen == 4){echo "6";}
                                                            else if($p3_halusinogen == 5){echo "0";}
                                                            else if($p3_halusinogen == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_halusinogen == 0){ echo "Tiap Bulan";}
                                                            else if($p3_halusinogen == 3){echo "Tiap Minggu";}
                                                            else if($p3_halusinogen == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_halusinogen == 5){echo "Tidak Pernah";}
                                                            else if($p3_halusinogen == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_halusinogen == 0){ echo "5";}
                                                            else if($p3_halusinogen == 3){echo "6";}
                                                            else if($p3_halusinogen == 4){echo "0";}
                                                            else if($p3_halusinogen == 5){echo "3";}
                                                            else if($p3_halusinogen == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_halusinogen == 0){ echo "Tiap Minggu";}
                                                            else if($p3_halusinogen == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_halusinogen == 4){echo "Tidak Pernah";}
                                                            else if($p3_halusinogen == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_halusinogen == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_halusinogen == 0){ echo "6";}
                                                            else if($p3_halusinogen == 3){echo "0";}
                                                            else if($p3_halusinogen == 4){echo "3";}
                                                            else if($p3_halusinogen == 5){echo "4";}
                                                            else if($p3_halusinogen == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_halusinogen == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_halusinogen == 3){echo "Tidak Pernah";}
                                                            else if($p3_halusinogen == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_halusinogen == 5){echo "Tiap Bulan";}
                                                            else if($p3_halusinogen == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_halusinogen">
                                                    <option value = "<?php if($p4_halusinogen == 0){ echo "0";}
                                                            else if($p4_halusinogen == 4){echo "4";}
                                                            else if($p4_halusinogen == 5){echo "5";}
                                                            else if($p4_halusinogen == 6){echo "6";}
                                                            else if($p4_halusinogen == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_halusinogen == 0){ echo "Tidak Pernah";}
                                                            else if($p4_halusinogen == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_halusinogen == 5){echo "Tiap Bulan";}
                                                            else if($p4_halusinogen == 6){echo "Tiap Minggu";}
                                                            else if($p4_halusinogen == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_halusinogen == 0){ echo "4";}
                                                            else if($p4_halusinogen == 4){echo "5";}
                                                            else if($p4_halusinogen == 5){echo "6";}
                                                            else if($p4_halusinogen == 6){echo "7";}
                                                            else if($p4_halusinogen == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_halusinogen == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_halusinogen == 4){echo "Tiap Bulan";}
                                                            else if($p4_halusinogen == 5){echo "Tiap Minggu";}
                                                            else if($p4_halusinogen == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_halusinogen == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_halusinogen == 0){ echo "5";}
                                                            else if($p4_halusinogen == 4){echo "6";}
                                                            else if($p4_halusinogen == 5){echo "7";}
                                                            else if($p4_halusinogen == 6){echo "0";}
                                                            else if($p4_halusinogen == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_halusinogen == 0){ echo "Tiap Bulan";}
                                                            else if($p4_halusinogen == 4){echo "Tiap Minggu";}
                                                            else if($p4_halusinogen == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_halusinogen == 6){echo "Tidak Pernah";}
                                                            else if($p4_halusinogen == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_halusinogen == 0){ echo "6";}
                                                            else if($p4_halusinogen == 4){echo "7";}
                                                            else if($p4_halusinogen == 5){echo "0";}
                                                            else if($p4_halusinogen == 6){echo "4";}
                                                            else if($p4_halusinogen == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_halusinogen == 0){ echo "Tiap Minggu";}
                                                            else if($p4_halusinogen == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_halusinogen == 5){echo "Tidak Pernah";}
                                                            else if($p4_halusinogen == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_halusinogen == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_halusinogen == 0){ echo "7";}
                                                            else if($p4_halusinogen == 4){echo "0";}
                                                            else if($p4_halusinogen == 5){echo "4";}
                                                            else if($p4_halusinogen == 6){echo "5";}
                                                            else if($p4_halusinogen == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_halusinogen == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_halusinogen == 4){echo "Tidak Pernah";}
                                                            else if($p4_halusinogen == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_halusinogen == 6){echo "Tiap Bulan";}
                                                            else if($p4_halusinogen == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_halusinogen">
                                                    <option value = "<?php if($p5_halusinogen == 0){ echo "0";}
                                                            else if($p5_halusinogen == 5){echo "5";}
                                                            else if($p5_halusinogen == 6){echo "6";}
                                                            else if($p5_halusinogen == 7){echo "7";}
                                                            else if($p5_halusinogen == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_halusinogen == 0){ echo "Tidak Pernah";}
                                                            else if($p5_halusinogen == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_halusinogen == 6){echo "Tiap Bulan";}
                                                            else if($p5_halusinogen == 7){echo "Tiap Minggu";}
                                                            else if($p5_halusinogen == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_halusinogen == 0){ echo "5";}
                                                            else if($p5_halusinogen == 5){echo "6";}
                                                            else if($p5_halusinogen == 6){echo "7";}
                                                            else if($p5_halusinogen == 7){echo "8";}
                                                            else if($p5_halusinogen == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_halusinogen == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_halusinogen == 5){echo "Tiap Bulan";}
                                                            else if($p5_halusinogen == 6){echo "Tiap Minggu";}
                                                            else if($p5_halusinogen == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_halusinogen == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_halusinogen == 0){ echo "6";}
                                                            else if($p5_halusinogen == 5){echo "7";}
                                                            else if($p5_halusinogen == 6){echo "8";}
                                                            else if($p5_halusinogen == 7){echo "0";}
                                                            else if($p5_halusinogen == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_halusinogen == 0){ echo "Tiap Bulan";}
                                                            else if($p5_halusinogen == 5){echo "Tiap Minggu";}
                                                            else if($p5_halusinogen == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_halusinogen == 7){echo "Tidak Pernah";}
                                                            else if($p5_halusinogen == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_halusinogen == 0){ echo "7";}
                                                            else if($p5_halusinogen == 5){echo "8";}
                                                            else if($p5_halusinogen == 6){echo "0";}
                                                            else if($p5_halusinogen == 7){echo "5";}
                                                            else if($p5_halusinogen == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_halusinogen == 0){ echo "Tiap Minggu";}
                                                            else if($p5_halusinogen == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_halusinogen == 6){echo "Tidak Pernah";}
                                                            else if($p5_halusinogen == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_halusinogen == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_halusinogen == 0){ echo "8";}
                                                            else if($p5_halusinogen == 5){echo "0";}
                                                            else if($p5_halusinogen == 6){echo "5";}
                                                            else if($p5_halusinogen == 7){echo "6";}
                                                            else if($p5_halusinogen == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_halusinogen == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_halusinogen == 5){echo "Tidak Pernah";}
                                                            else if($p5_halusinogen == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_halusinogen == 7){echo "Tiap Bulan";}
                                                            else if($p5_halusinogen == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_halusinogen">
                                                    <option value = "<?php if($p6_halusinogen == 0){ echo "0";}
                                                            else if($p6_halusinogen == 6){echo "6";}
                                                            else if($p6_halusinogen == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_halusinogen == 0){ echo "Tidak Pernah";}
                                                            else if($p6_halusinogen == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_halusinogen == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_halusinogen == 0){ echo "6";}
                                                            else if($p6_halusinogen == 6){echo "3";}
                                                            else if($p6_halusinogen == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_halusinogen == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_halusinogen == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_halusinogen == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_halusinogen == 0){ echo "3";}
                                                            else if($p6_halusinogen == 6){echo "0";}
                                                            else if($p6_halusinogen == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_halusinogen == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_halusinogen == 6){echo "Tidak Pernah";}
                                                            else if($p6_halusinogen == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_halusinogen">
                                                    <option value = "<?php if($p7_halusinogen == 0){ echo "0";}
                                                            else if($p7_halusinogen == 6){echo "6";}
                                                            else if($p7_halusinogen == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_halusinogen == 0){ echo "Tidak Pernah";}
                                                            else if($p7_halusinogen == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_halusinogen == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_halusinogen == 0){ echo "6";}
                                                            else if($p7_halusinogen == 6){echo "3";}
                                                            else if($p7_halusinogen == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_halusinogen == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_halusinogen == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_halusinogen == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_halusinogen == 0){ echo "3";}
                                                            else if($p7_halusinogen == 6){echo "0";}
                                                            else if($p7_halusinogen == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_halusinogen == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_halusinogen == 6){echo "Tidak Pernah";}
                                                            else if($p7_halusinogen == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Opioid (Heroin, Putaw, Morvin, Metadon, Kodein, PCP, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryOpioid = mysqli_query($koneksi,"SELECT * FROM t_opioid WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryOpioid);
                                    $p2_opioid = $data['p2_opioid'];
                                    $p3_opioid = $data['p3_opioid'];
                                    $p4_opioid = $data['p4_opioid'];
                                    $p5_opioid = $data['p5_opioid'];
                                    $p6_opioid = $data['p6_opioid'];
                                    $p7_opioid = $data['p7_opioid'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_opioid">
                                                    <option value = "<?php if($p2_opioid == 0){ echo "0";}
                                                            else if($p2_opioid == 2){echo "2";}
                                                            else if($p2_opioid == 3){echo "3";}
                                                            else if($p2_opioid == 4){echo "4";}
                                                            else if($p2_opioid == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_opioid == 0){ echo "Tidak Pernah";}
                                                            else if($p2_opioid == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_opioid == 3){echo "Tiap Bulan";}
                                                            else if($p2_opioid == 4){echo "Tiap Minggu";}
                                                            else if($p2_opioid == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_opioid == 0){ echo "2";}
                                                            else if($p2_opioid == 2){echo "3";}
                                                            else if($p2_opioid == 3){echo "4";}
                                                            else if($p2_opioid == 4){echo "6";}
                                                            else if($p2_opioid == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_opioid == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_opioid == 2){echo "Tiap Bulan";}
                                                            else if($p2_opioid == 3){echo "Tiap Minggu";}
                                                            else if($p2_opioid == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_opioid == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_opioid == 0){ echo "3";}
                                                            else if($p2_opioid == 2){echo "4";}
                                                            else if($p2_opioid == 3){echo "6";}
                                                            else if($p2_opioid == 4){echo "0";}
                                                            else if($p2_opioid == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_opioid == 0){ echo "Tiap Bulan";}
                                                            else if($p2_opioid == 2){echo "Tiap Minggu";}
                                                            else if($p2_opioid == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_opioid == 4){echo "Tidak Pernah";}
                                                            else if($p2_opioid == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_opioid == 0){ echo "4";}
                                                            else if($p2_opioid == 2){echo "6";}
                                                            else if($p2_opioid == 3){echo "0";}
                                                            else if($p2_opioid == 4){echo "2";}
                                                            else if($p2_opioid == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_opioid == 0){ echo "Tiap Minggu";}
                                                            else if($p2_opioid == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_opioid == 3){echo "Tidak Pernah";}
                                                            else if($p2_opioid == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_opioid == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_opioid == 0){ echo "6";}
                                                            else if($p2_opioid == 2){echo "0";}
                                                            else if($p2_opioid == 3){echo "2";}
                                                            else if($p2_opioid == 4){echo "3";}
                                                            else if($p2_opioid == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_opioid == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_opioid == 2){echo "Tidak Pernah";}
                                                            else if($p2_opioid == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_opioid == 4){echo "Tiap Bulan";}
                                                            else if($p2_opioid == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_opioid">
                                                    <option value = "<?php if($p3_opioid == 0){ echo "0";}
                                                            else if($p3_opioid == 3){echo "3";}
                                                            else if($p3_opioid == 4){echo "4";}
                                                            else if($p3_opioid == 5){echo "5";}
                                                            else if($p3_opioid == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_opioid == 0){ echo "Tidak Pernah";}
                                                            else if($p3_opioid == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_opioid == 4){echo "Tiap Bulan";}
                                                            else if($p3_opioid == 5){echo "Tiap Minggu";}
                                                            else if($p3_opioid == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_opioid == 0){ echo "3";}
                                                            else if($p3_opioid == 3){echo "4";}
                                                            else if($p3_opioid == 4){echo "5";}
                                                            else if($p3_opioid == 5){echo "6";}
                                                            else if($p3_opioid == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_opioid == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_opioid == 3){echo "Tiap Bulan";}
                                                            else if($p3_opioid == 4){echo "Tiap Minggu";}
                                                            else if($p3_opioid == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_opioid == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_opioid == 0){ echo "4";}
                                                            else if($p3_opioid == 3){echo "5";}
                                                            else if($p3_opioid == 4){echo "6";}
                                                            else if($p3_opioid == 5){echo "0";}
                                                            else if($p3_opioid == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_opioid == 0){ echo "Tiap Bulan";}
                                                            else if($p3_opioid == 3){echo "Tiap Minggu";}
                                                            else if($p3_opioid == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_opioid == 5){echo "Tidak Pernah";}
                                                            else if($p3_opioid == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_opioid == 0){ echo "5";}
                                                            else if($p3_opioid == 3){echo "6";}
                                                            else if($p3_opioid == 4){echo "0";}
                                                            else if($p3_opioid == 5){echo "3";}
                                                            else if($p3_opioid == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_opioid == 0){ echo "Tiap Minggu";}
                                                            else if($p3_opioid == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_opioid == 4){echo "Tidak Pernah";}
                                                            else if($p3_opioid == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_opioid == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_opioid == 0){ echo "6";}
                                                            else if($p3_opioid == 3){echo "0";}
                                                            else if($p3_opioid == 4){echo "3";}
                                                            else if($p3_opioid == 5){echo "4";}
                                                            else if($p3_opioid == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_opioid == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_opioid == 3){echo "Tidak Pernah";}
                                                            else if($p3_opioid == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_opioid == 5){echo "Tiap Bulan";}
                                                            else if($p3_opioid == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_opioid">
                                                    <option value = "<?php if($p4_opioid == 0){ echo "0";}
                                                            else if($p4_opioid == 4){echo "4";}
                                                            else if($p4_opioid == 5){echo "5";}
                                                            else if($p4_opioid == 6){echo "6";}
                                                            else if($p4_opioid == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_opioid == 0){ echo "Tidak Pernah";}
                                                            else if($p4_opioid == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_opioid == 5){echo "Tiap Bulan";}
                                                            else if($p4_opioid == 6){echo "Tiap Minggu";}
                                                            else if($p4_opioid == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_opioid == 0){ echo "4";}
                                                            else if($p4_opioid == 4){echo "5";}
                                                            else if($p4_opioid == 5){echo "6";}
                                                            else if($p4_opioid == 6){echo "7";}
                                                            else if($p4_opioid == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_opioid == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_opioid == 4){echo "Tiap Bulan";}
                                                            else if($p4_opioid == 5){echo "Tiap Minggu";}
                                                            else if($p4_opioid == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_opioid == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_opioid == 0){ echo "5";}
                                                            else if($p4_opioid == 4){echo "6";}
                                                            else if($p4_opioid == 5){echo "7";}
                                                            else if($p4_opioid == 6){echo "0";}
                                                            else if($p4_opioid == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_opioid == 0){ echo "Tiap Bulan";}
                                                            else if($p4_opioid == 4){echo "Tiap Minggu";}
                                                            else if($p4_opioid == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_opioid == 6){echo "Tidak Pernah";}
                                                            else if($p4_opioid == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_opioid == 0){ echo "6";}
                                                            else if($p4_opioid == 4){echo "7";}
                                                            else if($p4_opioid == 5){echo "0";}
                                                            else if($p4_opioid == 6){echo "4";}
                                                            else if($p4_opioid == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_opioid == 0){ echo "Tiap Minggu";}
                                                            else if($p4_opioid == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_opioid == 5){echo "Tidak Pernah";}
                                                            else if($p4_opioid == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_opioid == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_opioid == 0){ echo "7";}
                                                            else if($p4_opioid == 4){echo "0";}
                                                            else if($p4_opioid == 5){echo "4";}
                                                            else if($p4_opioid == 6){echo "5";}
                                                            else if($p4_opioid == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_opioid == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_opioid == 4){echo "Tidak Pernah";}
                                                            else if($p4_opioid == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_opioid == 6){echo "Tiap Bulan";}
                                                            else if($p4_opioid == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_opioid">
                                                    <option value = "<?php if($p5_opioid == 0){ echo "0";}
                                                            else if($p5_opioid == 5){echo "5";}
                                                            else if($p5_opioid == 6){echo "6";}
                                                            else if($p5_opioid == 7){echo "7";}
                                                            else if($p5_opioid == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_opioid == 0){ echo "Tidak Pernah";}
                                                            else if($p5_opioid == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_opioid == 6){echo "Tiap Bulan";}
                                                            else if($p5_opioid == 7){echo "Tiap Minggu";}
                                                            else if($p5_opioid == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_opioid == 0){ echo "5";}
                                                            else if($p5_opioid == 5){echo "6";}
                                                            else if($p5_opioid == 6){echo "7";}
                                                            else if($p5_opioid == 7){echo "8";}
                                                            else if($p5_opioid == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_opioid == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_opioid == 5){echo "Tiap Bulan";}
                                                            else if($p5_opioid == 6){echo "Tiap Minggu";}
                                                            else if($p5_opioid == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_opioid == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_opioid == 0){ echo "6";}
                                                            else if($p5_opioid == 5){echo "7";}
                                                            else if($p5_opioid == 6){echo "8";}
                                                            else if($p5_opioid == 7){echo "0";}
                                                            else if($p5_opioid == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_opioid == 0){ echo "Tiap Bulan";}
                                                            else if($p5_opioid == 5){echo "Tiap Minggu";}
                                                            else if($p5_opioid == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_opioid == 7){echo "Tidak Pernah";}
                                                            else if($p5_opioid == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_opioid == 0){ echo "7";}
                                                            else if($p5_opioid == 5){echo "8";}
                                                            else if($p5_opioid == 6){echo "0";}
                                                            else if($p5_opioid == 7){echo "5";}
                                                            else if($p5_opioid == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_opioid == 0){ echo "Tiap Minggu";}
                                                            else if($p5_opioid == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_opioid == 6){echo "Tidak Pernah";}
                                                            else if($p5_opioid == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_opioid == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_opioid == 0){ echo "8";}
                                                            else if($p5_opioid == 5){echo "0";}
                                                            else if($p5_opioid == 6){echo "5";}
                                                            else if($p5_opioid == 7){echo "6";}
                                                            else if($p5_opioid == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_opioid == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_opioid == 5){echo "Tidak Pernah";}
                                                            else if($p5_opioid == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_opioid == 7){echo "Tiap Bulan";}
                                                            else if($p5_opioid == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_opioid">
                                                    <option value = "<?php if($p6_opioid == 0){ echo "0";}
                                                            else if($p6_opioid == 6){echo "6";}
                                                            else if($p6_opioid == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_opioid == 0){ echo "Tidak Pernah";}
                                                            else if($p6_opioid == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_opioid == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_opioid == 0){ echo "6";}
                                                            else if($p6_opioid == 6){echo "3";}
                                                            else if($p6_opioid == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_opioid == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_opioid == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_opioid == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_opioid == 0){ echo "3";}
                                                            else if($p6_opioid == 6){echo "0";}
                                                            else if($p6_opioid == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_opioid == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_opioid == 6){echo "Tidak Pernah";}
                                                            else if($p6_opioid == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_opioid">
                                                    <option value = "<?php if($p7_opioid == 0){ echo "0";}
                                                            else if($p7_opioid == 6){echo "6";}
                                                            else if($p7_opioid == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_opioid == 0){ echo "Tidak Pernah";}
                                                            else if($p7_opioid == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_opioid == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_opioid == 0){ echo "6";}
                                                            else if($p7_opioid == 6){echo "3";}
                                                            else if($p7_opioid == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_opioid == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_opioid == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_opioid == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_opioid == 0){ echo "3";}
                                                            else if($p7_opioid == 6){echo "0";}
                                                            else if($p7_opioid == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_opioid == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_opioid == 6){echo "Tidak Pernah";}
                                                            else if($p7_opioid == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Zat-lain (Dextro, CTM, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <?php 
                                    $queryLainnya = mysqli_query($koneksi,"SELECT * FROM t_lainnya WHERE id_skrining = '$id_skrining'");
                                    $data = mysqli_fetch_array($queryLainnya);
                                    $p2_lainnya = $data['p2_lainnya'];
                                    $p3_lainnya = $data['p3_lainnya'];
                                    $p4_lainnya = $data['p4_lainnya'];
                                    $p5_lainnya = $data['p5_lainnya'];
                                    $p6_lainnya = $data['p6_lainnya'];
                                    $p7_lainnya = $data['p7_lainnya'];
                                    ?>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_lainnya">
                                                    <option value = "<?php if($p2_lainnya == 0){ echo "0";}
                                                            else if($p2_lainnya == 2){echo "2";}
                                                            else if($p2_lainnya == 3){echo "3";}
                                                            else if($p2_lainnya == 4){echo "4";}
                                                            else if($p2_lainnya == 6){echo "6";}
                                                            ?>">

                                                            <?php if($p2_lainnya == 0){ echo "Tidak Pernah";}
                                                            else if($p2_lainnya == 2){echo "Satu atau Dua Kali";}
                                                            else if($p2_lainnya == 3){echo "Tiap Bulan";}
                                                            else if($p2_lainnya == 4){echo "Tiap Minggu";}
                                                            else if($p2_lainnya == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_lainnya == 0){ echo "2";}
                                                            else if($p2_lainnya == 2){echo "3";}
                                                            else if($p2_lainnya == 3){echo "4";}
                                                            else if($p2_lainnya == 4){echo "6";}
                                                            else if($p2_lainnya == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p2_lainnya == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p2_lainnya == 2){echo "Tiap Bulan";}
                                                            else if($p2_lainnya == 3){echo "Tiap Minggu";}
                                                            else if($p2_lainnya == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_lainnya == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_lainnya == 0){ echo "3";}
                                                            else if($p2_lainnya == 2){echo "4";}
                                                            else if($p2_lainnya == 3){echo "6";}
                                                            else if($p2_lainnya == 4){echo "0";}
                                                            else if($p2_lainnya == 6){echo "2";}
                                                            ?>">

                                                            <?php if($p2_lainnya == 0){ echo "Tiap Bulan";}
                                                            else if($p2_lainnya == 2){echo "Tiap Minggu";}
                                                            else if($p2_lainnya == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_lainnya == 4){echo "Tidak Pernah";}
                                                            else if($p2_lainnya == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_lainnya == 0){ echo "4";}
                                                            else if($p2_lainnya == 2){echo "6";}
                                                            else if($p2_lainnya == 3){echo "0";}
                                                            else if($p2_lainnya == 4){echo "2";}
                                                            else if($p2_lainnya == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p2_lainnya == 0){ echo "Tiap Minggu";}
                                                            else if($p2_lainnya == 2){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_lainnya == 3){echo "Tidak Pernah";}
                                                            else if($p2_lainnya == 4){echo "Satu atau Dua Kali";}
                                                            else if($p2_lainnya == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p2_lainnya == 0){ echo "6";}
                                                            else if($p2_lainnya == 2){echo "0";}
                                                            else if($p2_lainnya == 3){echo "2";}
                                                            else if($p2_lainnya == 4){echo "3";}
                                                            else if($p2_lainnya == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p2_lainnya == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p2_lainnya == 2){echo "Tidak Pernah";}
                                                            else if($p2_lainnya == 3){echo "Satu atau Dua Kali";}
                                                            else if($p2_lainnya == 4){echo "Tiap Bulan";}
                                                            else if($p2_lainnya == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_lainnya">
                                                    <option value = "<?php if($p3_lainnya == 0){ echo "0";}
                                                            else if($p3_lainnya == 3){echo "3";}
                                                            else if($p3_lainnya == 4){echo "4";}
                                                            else if($p3_lainnya == 5){echo "5";}
                                                            else if($p3_lainnya == 6){echo "6";}
                                                            ?>">
                                                            
                                                            <?php if($p3_lainnya == 0){ echo "Tidak Pernah";}
                                                            else if($p3_lainnya == 3){echo "Satu atau Dua Kali";}
                                                            else if($p3_lainnya == 4){echo "Tiap Bulan";}
                                                            else if($p3_lainnya == 5){echo "Tiap Minggu";}
                                                            else if($p3_lainnya == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_lainnya == 0){ echo "3";}
                                                            else if($p3_lainnya == 3){echo "4";}
                                                            else if($p3_lainnya == 4){echo "5";}
                                                            else if($p3_lainnya == 5){echo "6";}
                                                            else if($p3_lainnya == 6){echo "0";}
                                                            ?>">

                                                            <?php if($p3_lainnya == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p3_lainnya == 3){echo "Tiap Bulan";}
                                                            else if($p3_lainnya == 4){echo "Tiap Minggu";}
                                                            else if($p3_lainnya == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_lainnya == 6){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_lainnya == 0){ echo "4";}
                                                            else if($p3_lainnya == 3){echo "5";}
                                                            else if($p3_lainnya == 4){echo "6";}
                                                            else if($p3_lainnya == 5){echo "0";}
                                                            else if($p3_lainnya == 6){echo "3";}
                                                            ?>">

                                                            <?php if($p3_lainnya == 0){ echo "Tiap Bulan";}
                                                            else if($p3_lainnya == 3){echo "Tiap Minggu";}
                                                            else if($p3_lainnya == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_lainnya == 5){echo "Tidak Pernah";}
                                                            else if($p3_lainnya == 6){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_lainnya == 0){ echo "5";}
                                                            else if($p3_lainnya == 3){echo "6";}
                                                            else if($p3_lainnya == 4){echo "0";}
                                                            else if($p3_lainnya == 5){echo "3";}
                                                            else if($p3_lainnya == 6){echo "4";}
                                                            ?>">

                                                            <?php if($p3_lainnya == 0){ echo "Tiap Minggu";}
                                                            else if($p3_lainnya == 3){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_lainnya == 4){echo "Tidak Pernah";}
                                                            else if($p3_lainnya == 5){echo "Satu atau Dua Kali";}
                                                            else if($p3_lainnya == 6){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p3_lainnya == 0){ echo "6";}
                                                            else if($p3_lainnya == 3){echo "0";}
                                                            else if($p3_lainnya == 4){echo "3";}
                                                            else if($p3_lainnya == 5){echo "4";}
                                                            else if($p3_lainnya == 6){echo "5";}
                                                            ?>">

                                                            <?php if($p3_lainnya == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p3_lainnya == 3){echo "Tidak Pernah";}
                                                            else if($p3_lainnya == 4){echo "Satu atau Dua Kali";}
                                                            else if($p3_lainnya == 5){echo "Tiap Bulan";}
                                                            else if($p3_lainnya == 6){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_lainnya">
                                                    <option value = "<?php if($p4_lainnya == 0){ echo "0";}
                                                            else if($p4_lainnya == 4){echo "4";}
                                                            else if($p4_lainnya == 5){echo "5";}
                                                            else if($p4_lainnya == 6){echo "6";}
                                                            else if($p4_lainnya == 7){echo "7";}
                                                            ?>">

                                                            <?php if($p4_lainnya == 0){ echo "Tidak Pernah";}
                                                            else if($p4_lainnya == 4){echo "Satu atau Dua Kali";}
                                                            else if($p4_lainnya == 5){echo "Tiap Bulan";}
                                                            else if($p4_lainnya == 6){echo "Tiap Minggu";}
                                                            else if($p4_lainnya == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_lainnya == 0){ echo "4";}
                                                            else if($p4_lainnya == 4){echo "5";}
                                                            else if($p4_lainnya == 5){echo "6";}
                                                            else if($p4_lainnya == 6){echo "7";}
                                                            else if($p4_lainnya == 7){echo "0";}
                                                            ?>">

                                                            <?php if($p4_lainnya == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p4_lainnya == 4){echo "Tiap Bulan";}
                                                            else if($p4_lainnya == 5){echo "Tiap Minggu";}
                                                            else if($p4_lainnya == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_lainnya == 7){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_lainnya == 0){ echo "5";}
                                                            else if($p4_lainnya == 4){echo "6";}
                                                            else if($p4_lainnya == 5){echo "7";}
                                                            else if($p4_lainnya == 6){echo "0";}
                                                            else if($p4_lainnya == 7){echo "4";}
                                                            ?>">

                                                            <?php if($p4_lainnya == 0){ echo "Tiap Bulan";}
                                                            else if($p4_lainnya == 4){echo "Tiap Minggu";}
                                                            else if($p4_lainnya == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_lainnya == 6){echo "Tidak Pernah";}
                                                            else if($p4_lainnya == 7){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_lainnya == 0){ echo "6";}
                                                            else if($p4_lainnya == 4){echo "7";}
                                                            else if($p4_lainnya == 5){echo "0";}
                                                            else if($p4_lainnya == 6){echo "4";}
                                                            else if($p4_lainnya == 7){echo "5";}
                                                            ?>">

                                                            <?php if($p4_lainnya == 0){ echo "Tiap Minggu";}
                                                            else if($p4_lainnya == 4){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_lainnya == 5){echo "Tidak Pernah";}
                                                            else if($p4_lainnya == 6){echo "Satu atau Dua Kali";}
                                                            else if($p4_lainnya == 7){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p4_lainnya == 0){ echo "7";}
                                                            else if($p4_lainnya == 4){echo "0";}
                                                            else if($p4_lainnya == 5){echo "4";}
                                                            else if($p4_lainnya == 6){echo "5";}
                                                            else if($p4_lainnya == 7){echo "6";}
                                                            ?>">

                                                            <?php if($p4_lainnya == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p4_lainnya == 4){echo "Tidak Pernah";}
                                                            else if($p4_lainnya == 5){echo "Satu atau Dua Kali";}
                                                            else if($p4_lainnya == 6){echo "Tiap Bulan";}
                                                            else if($p4_lainnya == 7){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_lainnya">
                                                    <option value = "<?php if($p5_lainnya == 0){ echo "0";}
                                                            else if($p5_lainnya == 5){echo "5";}
                                                            else if($p5_lainnya == 6){echo "6";}
                                                            else if($p5_lainnya == 7){echo "7";}
                                                            else if($p5_lainnya == 8){echo "8";}
                                                            ?>">

                                                            <?php if($p5_lainnya == 0){ echo "Tidak Pernah";}
                                                            else if($p5_lainnya == 5){echo "Satu atau Dua Kali";}
                                                            else if($p5_lainnya == 6){echo "Tiap Bulan";}
                                                            else if($p5_lainnya == 7){echo "Tiap Minggu";}
                                                            else if($p5_lainnya == 8){echo "Harian atau Hampir Tiap Hari";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_lainnya == 0){ echo "5";}
                                                            else if($p5_lainnya == 5){echo "6";}
                                                            else if($p5_lainnya == 6){echo "7";}
                                                            else if($p5_lainnya == 7){echo "8";}
                                                            else if($p5_lainnya == 8){echo "0";}
                                                            ?>">

                                                            <?php if($p5_lainnya == 0){ echo "Satu atau Dua Kali";}
                                                            else if($p5_lainnya == 5){echo "Tiap Bulan";}
                                                            else if($p5_lainnya == 6){echo "Tiap Minggu";}
                                                            else if($p5_lainnya == 7){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_lainnya == 8){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_lainnya == 0){ echo "6";}
                                                            else if($p5_lainnya == 5){echo "7";}
                                                            else if($p5_lainnya == 6){echo "8";}
                                                            else if($p5_lainnya == 7){echo "0";}
                                                            else if($p5_lainnya == 8){echo "5";}
                                                            ?>">

                                                            <?php if($p5_lainnya == 0){ echo "Tiap Bulan";}
                                                            else if($p5_lainnya == 5){echo "Tiap Minggu";}
                                                            else if($p5_lainnya == 6){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_lainnya == 7){echo "Tidak Pernah";}
                                                            else if($p5_lainnya == 8){echo "Satu atau Dua Kali";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_lainnya == 0){ echo "7";}
                                                            else if($p5_lainnya == 5){echo "8";}
                                                            else if($p5_lainnya == 6){echo "0";}
                                                            else if($p5_lainnya == 7){echo "5";}
                                                            else if($p5_lainnya == 8){echo "6";}
                                                            ?>">

                                                            <?php if($p5_lainnya == 0){ echo "Tiap Minggu";}
                                                            else if($p5_lainnya == 5){echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_lainnya == 6){echo "Tidak Pernah";}
                                                            else if($p5_lainnya == 7){echo "Satu atau Dua Kali";}
                                                            else if($p5_lainnya == 8){echo "Tiap Bulan";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p5_lainnya == 0){ echo "8";}
                                                            else if($p5_lainnya == 5){echo "0";}
                                                            else if($p5_lainnya == 6){echo "5";}
                                                            else if($p5_lainnya == 7){echo "6";}
                                                            else if($p5_lainnya == 8){echo "7";}
                                                            ?>">

                                                            <?php if($p5_lainnya == 0){ echo "Harian atau Hampir Tiap Hari";}
                                                            else if($p5_lainnya == 5){echo "Tidak Pernah";}
                                                            else if($p5_lainnya == 6){echo "Satu atau Dua Kali";}
                                                            else if($p5_lainnya == 7){echo "Tiap Bulan";}
                                                            else if($p5_lainnya == 8){echo "Tiap Minggu";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_lainnya">
                                                    <option value = "<?php if($p6_lainnya == 0){ echo "0";}
                                                            else if($p6_lainnya == 6){echo "6";}
                                                            else if($p6_lainnya == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p6_lainnya == 0){ echo "Tidak Pernah";}
                                                            else if($p6_lainnya == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_lainnya == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_lainnya == 0){ echo "6";}
                                                            else if($p6_lainnya == 6){echo "3";}
                                                            else if($p6_lainnya == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p6_lainnya == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p6_lainnya == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_lainnya == 3){echo "Tidak Pernah";}
                                                            ?>
                                                    </option>
                                                    <option value = "<?php if($p6_lainnya == 0){ echo "3";}
                                                            else if($p6_lainnya == 6){echo "0";}
                                                            else if($p6_lainnya == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p6_lainnya == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p6_lainnya == 6){echo "Tidak Pernah";}
                                                            else if($p6_lainnya == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                    </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_lainnya">
                                                    <option value = "<?php if($p7_lainnya == 0){ echo "0";}
                                                            else if($p7_lainnya == 6){echo "6";}
                                                            else if($p7_lainnya == 3){echo "3";}
                                                            ?>">

                                                            <?php if($p7_lainnya == 0){ echo "Tidak Pernah";}
                                                            else if($p7_lainnya == 6){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_lainnya == 3){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_lainnya == 0){ echo "6";}
                                                            else if($p7_lainnya == 6){echo "3";}
                                                            else if($p7_lainnya == 3){echo "0";}
                                                            ?>">

                                                            <?php if($p7_lainnya == 0){ echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p7_lainnya == 6){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_lainnya == 3){echo "Tidak Pernah";}
                                                            ?>
                                                        </option>
                                                        <option value = "<?php if($p7_lainnya == 0){ echo "3";}
                                                            else if($p7_lainnya == 6){echo "0";}
                                                            else if($p7_lainnya == 3){echo "6";}
                                                            ?>">

                                                            <?php if($p7_lainnya == 0){ echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p7_lainnya == 6){echo "Tidak Pernah";}
                                                            else if($p7_lainnya == 3){echo "Ya, dalam 3 bulan terakhir";}
                                                            ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah menggunakan zat dengan cara menyuntik?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p8">
                                                        <option value = "<?php if($p8 == "0"){echo "0";} 
                                                            else if($p8 == "2"){echo "2";}
                                                            else if($p8 == "1"){echo "1";}?>">

                                                            <?php if($p8 == "0"){echo "Tidak Pernah";} 
                                                            else if($p8 == "2"){echo "Ya, dalam 3 bulan terakhir";}
                                                            else if($p8 == "1"){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}?>
                                                        </option>
                                                        <option value = "<?php if($p8 == "0"){echo "2";} 
                                                            else if($p8 == "2"){echo "1";}
                                                            else if($p8 == "1"){echo "0";}?>">

                                                            <?php if($p8 == "0"){echo "Ya, dalam 3 bulan terakhir";} 
                                                            else if($p8 == "2"){echo "Ya, tetapi tidak dalam 3 bulan terakhir";}
                                                            else if($p8 == "1"){echo "Tidak Pernah";}?>
                                                        </option>
                                                        <option value = "<?php if($p8 == "0"){echo "1";} 
                                                            else if($p8 == "2"){echo "0";}
                                                            else if($p8 == "1"){echo "2";}?>">

                                                            <?php if($p8 == "0"){echo "Ya, tetapi tidak dalam 3 bulan terakhir";} 
                                                            else if($p8 == "2"){echo "Tidak Pernah";}
                                                            else if($p8 == "1"){echo "Ya, dalam 3 bulan terakhir";}?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                
                                <div class="card-footer justify-content-end">
                                    <form action="update_assist.php" method = "post">
                                        <input type="hidden" name = "id_pengguna" value = "<?php echo $id_pengguna?>">
                                        <a href="testassist.php">
                                            <button type="button" class="btn btn-default">Batal</button>
                                        </a>
                                        <button type="submit" class="btn btn-success toastrDefaultSuccess">Simpan</button>
                                    </form>
                                        
                                    </div>
                                
                            </form>
                            <?php }else{ ?>
                            <form action="update_assist.php" name = "form_assist" method="post" class="login100-form validate-form">
                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Tembakau (Rokok, Cerutu, Kretek, dll.)</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_tembakau" >
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_tembakau" >
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_tembakau" >
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_tembakau" >
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_tembakau" >
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_tembakau" >
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Minuman berakohol (Bir, Anggur, Miras, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_alkohol">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_alkohol">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_alkohol">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_alkohol">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_alkohol">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_alkohol">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Kanabis (Mariujuana, Ganja, Gelek, Cimeng, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_kanabis">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_kanabis">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_kanabis">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_kanabis">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_kanabis">
                                                    <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_kanabis">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Kokain (Coke, Crack, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_kokain">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_kokain">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_kokain">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_kokain">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_kokain">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_kokain">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Stimulan Jenis Amfetamin (Ekstasi, Shabu, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_amfetamine">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_amfetamine">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_amfetamine">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_amfetamine">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_amfetamine">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_amfetamine">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Inhalansia (Lem, Bensin, Tiner, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_inhalansia">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_inhalansia">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_inhalansia">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_inhalansia">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_inhalansia">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_inhalansia">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Sedativa atau obat tidur (Pil Koplo, Valium, Benzodiazepin, Lexotan, Rohypnol, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_sedativa">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_sedativa">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_sedativa">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_sedativa">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_sedativa">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_sedativa">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Halusinogen (LSD, Jamur, PCP, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_halusinogen">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_halusinogen">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_halusinogen">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_halusinogen">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_halusinogen">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_halusinogen">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Opioid (Heroin, Putaw, Morvin, Metadon, Kodein, PCP, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_opioid">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_opioid">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_opioid">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_opioid">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_opioid">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_opioid">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Zat-lain (Dextro, CTM, dll.)</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Dalam tiga bulan terakhir, seberapa sering anda menggunakan
                                                    zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p2_lainnya">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Satu atau Dua Kali</option>
                                                        <option value = "3">Tiap Bulan</option>
                                                        <option value = "4">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda mempunyai
                                                    keinginan yang kuat untuk menggunakan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p3_lainnya">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "3">Satu atau Dua Kali</option>
                                                        <option value = "4">Tiap Bulan</option>
                                                        <option value = "5">Tiap Minggu</option>
                                                        <option value = "6">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering zat yang anda
                                                    gunakan menimbulkan masalah kesehatan, sosial, hukum dan
                                                    keuangan ?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p4_lainnya">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "4">Satu atau Dua Kali</option>
                                                        <option value = "5">Tiap Bulan</option>
                                                        <option value = "6">Tiap Minggu</option>
                                                        <option value = "7">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Selama tiga bulan terakhir, seberapa sering anda gagal melakukan
                                                    kegiatan harian yang biasa dilakukan (sekolah, pekerjaan, tugas
                                                    sehari-hari) disebabkan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p5_lainnya">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "5">Satu atau Dua Kali</option>
                                                        <option value = "6">Tiap Bulan</option>
                                                        <option value = "7">Tiap Minggu</option>
                                                        <option value = "8">Harian atau Hampir Tiap Hari</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah ada teman, keluarga atau seseorang yang pernah
                                                    memperingatkan / menasehati penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p6_lainnya">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah mencoba dan gagal untuk mengurangi atau
                                                    menghentikan penggunaan zat tersebut?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p7_lainnya">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "6">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "3">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-10 col-form-label">Apakah anda pernah menggunakan zat dengan cara menyuntik?</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control" name = "p8">
                                                        <option value = "0">Tidak Pernah</option>
                                                        <option value = "2">Ya, dalam 3 bulan terakhir</option>
                                                        <option value = "1">Ya, tetapi tidak dalam 3 bulan terakhir</option>
                                                    </select>
                                                </div>
                                            </div>
                                
                                <div class="card-footer justify-content-end">
                                    <form action="update_assist.php" method = "post">
                                        <input type="hidden" name = "id_pengguna" value = "<?php echo $id_pengguna?>">
                                        <a href="testassist.php">
                                            <button type="button" class="btn btn-default">Batal</button>
                                        </a>
                                        <button type="submit" class="btn btn-success toastrDefaultSuccess">Simpan</button>
                                    </form>
                                        
                                    </div>
                                
                            </form>
                               <?php }; ?>
                            
                            <!-- /.card -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Hasil Test ASSIST</h3>
                                </div>
                                <!-- /.card-header -->
                                <?php $queryAssist = mysqli_query($koneksi,"SELECT `assist_tembakau`,`assist_alkohol`,`assist_kanabis`,`assist_kokain`,`assist_amfetamin`,`assist_inhalansia`,`assist_sedativa`,`assist_halusinogen`,`assist_opioid`,`assist_lainnya` FROM `t_skrining` WHERE `id_pengguna` = '$id_pengguna' ");
                                    $cekAssist = mysqli_num_rows($queryAssist);

                                    if($cekAssist > 0){
                                        $dataAssist = mysqli_fetch_array($queryAssist);
                                        $assistTembakau = $dataAssist['assist_tembakau'];
                                        $assistAlkohol = $dataAssist['assist_alkohol'];
                                        $assistKanabis = $dataAssist['assist_kanabis'];
                                        $assistKokain = $dataAssist['assist_kokain'];
                                        $assistAmfetamin = $dataAssist['assist_amfetamin'];
                                        $assistInhalansia = $dataAssist['assist_inhalansia'];
                                        $assistSedativa = $dataAssist['assist_sedativa'];
                                        $assistHalusinogen = $dataAssist['assist_halusinogen'];
                                        $assistOpioid = $dataAssist['assist_opioid'];
                                        $assistLainnya = $dataAssist['assist_lainnya'];
                                    }else{
                                        $assistTembakau = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistAlkohol = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistKanabis = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistKokain = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistAmfetamin = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistInhalansia = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistSedativa = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistHalusinogen = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistOpioid = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                        $assistLainnya = "Silahkan Untuk Diisi Terlebih Dahulu Assist";
                                    }
                                ?>
                                <!-- form start -->
                                <form name = "hasil_assist">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Tembakau (Rokok, Cerutu, Kretek, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Tembakau" value = "<?php echo $assistTembakau;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Minuman berakohol (Bir, Anggur, Miras, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Alkohol" value = "<?php echo $assistAlkohol;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Kanabis (Mariujuana, Ganja, Gelek, Cimeng, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Kanabis" value = "<?php echo $assistKanabis;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Kokain (Coke, Crack, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Kokain" value = "<?php echo $assistKokain;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Stimulan Jenis Amfetamin (Ekstasi, Shabu, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Amfetamin" value = "<?php echo $assistAmfetamin;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Inhalansia (Lem, Bensin, Tiner, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Inhalansia" value = "<?php echo $assistInhalansia;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Sedativa atau obat tidur (Pil Koplo, Valium, Benzodiazepin, Lexotan, Rohypnol, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Sedativa" value = "<?php echo $assistSedativa;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Halusinogen (LSD, Jamur, PCP, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Halusinogen" value = "<?php echo $assistHalusinogen;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Opioid (Heroin, Putaw, Morvin, Metadon, Kodein, PCP, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Opioid" value = "<?php echo $assistOpioid;?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-6 col-form-label">Zat-lain (Dextro, CTM, dll.)</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Hasil Assist Zat Lainnya" value = "<?php echo $assistLainnya;?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    
                                </form>
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

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/demo.js"></script>
</body>

</html>