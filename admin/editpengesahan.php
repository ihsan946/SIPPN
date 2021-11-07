<?php
include "../koneksi/koneksi.php";
$halaman = "Data Pengesahan";
session_start();
if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$nrp = $_POST['nrp'];
$jabatan = $_POST['jabatan'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPPN BNNK Sumedang</title>

    <?php include "component/listcss.php" ?>
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
                            <h1>Edit <?php echo $halaman ?></h1>
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
                                    
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="update_pengesahan.php" method="post">
                                    <div class="card-body">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">NAMA</label>
                                            <input type="text" class="form-control" name="id" id="exampleInputEmail1" hidden>
                                            <input type="text" class="form-control" name="nama" id="exampleInputEmail1" value="<?php echo $nama; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">NRP</label>
                                            <input type="text" class="form-control" name="nrp" id="exampleInputPassword1" value="<?php echo $nrp; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">JABATAN</label>
                                            <select class="form-control" name="jabatan">
                                                <option value="<?php echo $jabatan ?>">
                                                    <?php if ($jabatan == "KEPALA") {
                                                        echo "KEPALA";
                                                    } else if ($jabatan == "DOKTER") {
                                                        echo "DOKTER";
                                                    } else if ($jabatan == "PEMERIKSA") {
                                                        echo "PEMERIKSA";
                                                    }; ?>
                                                </option>
                                                <option value="<?php if ($jabatan == "KEPALA") {
                                                                    echo "DOKTER";
                                                                } else if ($jabatan == "DOKTER") {
                                                                    echo "PEMERIKSA";
                                                                } else if ($jabatan == "PEMERIKSA") {
                                                                    echo "KEPALA";
                                                                }; ?>">
                                                    <?php if ($jabatan == "KEPALA") {
                                                        echo "DOKTER";
                                                    } else if ($jabatan == "DOKTER") {
                                                        echo "PEMERIKSA";
                                                    } else if ($jabatan == "PEMERIKSA") {
                                                        echo "KEPALA";
                                                    }; ?>
                                                </option>
                                                <option value="<?php if ($jabatan == "KEPALA") {
                                                                    echo "PEMERIKSA";
                                                                } else if ($jabatan == "DOKTER") {
                                                                    echo "KEPALA";
                                                                } else if ($jabatan == "PEMERIKSA") {
                                                                    echo "DOKTER";
                                                                }; ?>">
                                                    <?php if ($jabatan == "KEPALA") {
                                                        echo "PEMERIKSA";
                                                    } else if ($jabatan == "DOKTER") {
                                                        echo "KEPALA";
                                                    } else if ($jabatan == "PEMERIKSA") {
                                                        echo "DOKTER";
                                                    }; ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer justify-content-end">
                                        <a href="pengesahan.php"><button type="button" class="btn btn-default">Batal</button></a>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
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

    <?php include "component/listjs.php" ?>

    <script>
        $(document).ready(function() {
            $("#test").validate({
                rules: {
                    nama: "required",
                    nrp: "required"
                },
                messages: {
                    nama: {
                        required: 'Nama Tidak Boleh Kosong'
                    },
                    nrp: {
                        required: 'NRP Tidak Boleh Kosong'
                    }
                }
            });
        });
    </script>
</body>

</html>