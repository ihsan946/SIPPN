<?php 
$halaman = "Data Pemeriksaan";
include "../koneksi/koneksi.php";
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}




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
                            <h1><?php echo $halaman; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                    </h3>
                                    <div class="card-tools">
                                        <form action="" method = "GET">
                                            <div class="input-group input-group-md" style="width: 150px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No Dokumen</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($_GET['table_search'])){
                                                $cari = strtoupper($_GET['table_search']);
                                                $query = mysqli_query($koneksi,"SELECT * FROM t_pengguna WHERE nama LIKE '%".$cari."%' ;");
                                            }else{
                                                $query = mysqli_query($koneksi,"SELECT `id_pengguna`,`nama`,`nik`,`alamat_lengkap` FROM `t_pengguna`");
                                            }
                                            $no = 0;
                                            while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <?php $id_pengguna = $data['id_pengguna'];
                                                  $queryStatusKesehatan = mysqli_query($koneksi,"SELECT t_kesehatan.id_pengguna FROM t_pengguna,t_kesehatan WHERE t_kesehatan.id_pengguna = t_pengguna.id_pengguna AND t_kesehatan.id_pengguna = '$id_pengguna' ");
                                                  $statusKesehatan = mysqli_num_rows($queryStatusKesehatan); 
                                                  $queryKesehatan = mysqli_query($koneksi,"SELECT no_dokumen FROM t_kesehatan WHERE id_pengguna = '$id_pengguna'");
                                                  $dataKesehatan = mysqli_fetch_array($queryKesehatan);
                                                  $no_dokumen = $dataKesehatan['no_dokumen'];
                                                ?>
                                                <td><?php $no++; echo $no_dokumen ; ?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nik'];?></td>
                                                <td><?php echo $data['alamat_lengkap'];?></td>
                                                <?php 
                                                  if($statusKesehatan > 0 ){
                                                    $hasil_status = "Sudah Melakukan Tes Kesehatan";
                                                  }else{
                                                    $hasil_status = "Belum Melakukan Tes Kesehatan"; 
                                                  }
                                                  
                                                ?>
                                                <td><span class="badge rounded-pill bg-success"><?php echo $hasil_status;?></span></td>
                                                <td>
                                                <div class ="d-flex justify-content-start" >
                                                    <form action="editpemeriksaan.php" method = "post" class="mx-2">
                                                        <input type="hidden" name = "id_pengguna" value = "<?php echo $data['id_pengguna'];?>">
                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            <i class="far fa-edit"></i> Edit
                                                        </button>
                                                    </form>
                                                    <form action="hapus_pemeriksaan.php" method = "post" class="mx-2">
                                                        <input type="hidden" name = "id_pengguna" value = "<?php echo $data['id_pengguna'];?>">
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                    </form>
                                                    <form action="#" class="mx-2">
                                                        <button type="button" class="btn btn-sm btn-success"><i class="fas fa-print"></i> Print</button>
                                                    </form>
                                                </div>   
                                                </td>
                                            </tr>
                                            <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
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