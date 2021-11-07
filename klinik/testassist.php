<?php 
$halaman = "Test ASSIST"; 
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

include "../koneksi/koneksi.php";

$query = mysqli_query($koneksi, "SELECT id_pengguna,nama,nik,alamat_lengkap FROM t_pengguna");

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
                            <h1><?php echo $halaman;?></h1>
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
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 0;
                                            while($data = mysqli_fetch_array($query)){?>
                                            <tr>
                                                <?php $id_pengguna = $data['id_pengguna'];?>
                                                <td><?php $no++; echo $no;?></td>
                                                <td><?php echo $data['nama'];?></td>
                                                <td><?php echo $data['nik'];?></td>
                                                <td><?php echo $data['alamat_lengkap'];?></td>
                                                <?php 
                                                    $queryStatusSkrining = mysqli_query($koneksi,"SELECT t_skrining.id_pengguna FROM t_pengguna,t_skrining WHERE t_skrining.id_pengguna = t_pengguna.id_pengguna AND t_skrining.id_pengguna = '$id_pengguna' ");
                                                    $statusSkrining = mysqli_num_rows($queryStatusSkrining);
                                                    if($statusSkrining > 0 ){
                                                    $hasil_skrining = "Sudah Melakukan Skrining";
                                                    }else {
                                                    $hasil_skrining = "Belum Melakukan Skrining";
                                                    }
                                                ?>
                                                <td><span class="badge rounded-pill bg-success"><?php echo $hasil_skrining;?></span></td>
                                                <td>
                                                    <div class ="d-flex justify-content-start" >
                                                    <form action="edittestassist.php" method = "post" class="mx-2">
                                                        <input type="hidden" name = "id_pengguna" value = "<?php echo $data['id_pengguna'];?>">
                                                        <button type="submit" class="btn btn-sm btn-warning">
                                                            <i class="far fa-edit"></i> Edit
                                                        </button>
                                                    </form>
                                                    <form action="hapus_assist.php" method = "post" class="mx-2">
                                                        <input type="hidden" name = "id_pengguna" value = "<?php echo $data['id_pengguna'];?>">
                                                        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
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
    <!-- DataTables  & Plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../vendor/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendor/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../vendor/jszip/jszip.min.js"></script>
    <script src="../vendor/pdfmake/pdfmake.min.js"></script>
    <script src="../vendor/pdfmake/vfs_fonts.js"></script>
    <script src="../vendor/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendor/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../vendor/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/demo.js"></script>

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
        });
    </script>
</body>

</html>