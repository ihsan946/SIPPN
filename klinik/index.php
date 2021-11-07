<?php $halaman = "Overview";
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}
include "../koneksi/koneksi.php";

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

$tahun = date('Y');
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
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- Isi Kontent -->

                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                        <?php 
                                        $query = mysqli_query($koneksi, "SELECT COUNT(`id_pengguna`)as jumlah FROM `t_pengguna` WHERE `tanggal_pemeriksaan` LIKE '%".$bulan_pemeriksaan."%' ");
                                        $queryTahun = mysqli_query($koneksi, "SELECT COUNT(`id_pengguna`)as jumlah FROM `t_pengguna` WHERE `tanggal_pemeriksaan` LIKE '%".$tahun."%' ");
                                        $data = mysqli_fetch_array($query);
                                        $dataTahun = mysqli_fetch_array($queryTahun);
                                        ?>
                                        <div class="inner">
                                            <h3><?php echo $data['jumlah'];?></h3>

                                            <p>Pemohon Bulan <?php echo $bulan_pemeriksaan;?></p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                               
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?php echo $dataTahun['jumlah'];?></h3>

                                            <p>Total Permohonan Tahun <?php echo $tahun;?></p>
                                        </div>
                                        <div class="icon">
                                            <i class="far fa-file"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
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