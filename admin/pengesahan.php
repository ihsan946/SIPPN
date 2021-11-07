<?php $halaman = "Data Pengesahan";
session_start();
if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

include "../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM t_pengesahan");
$a = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPPN BNNK Sumedang</title>

    <?php include "component/listcss.php" ?>

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
                            <h1><?php echo $halaman ?></h1>
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
                                        <a href="tambahpengesahan.php">
                                            <button type="button" class="btn btn-success">
                                                <i class="fas fa-plus"></i> Tambah <?php echo $halaman ?>
                                            </button>
                                        </a>
                                    </h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-md" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>NAMA</th>
                                                <th>NRP</th>
                                                <th>JABATAN</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($data = mysqli_fetch_array($query)) { ?>
                                                <tr>
                                                    <td><?php echo $a++ ?></td>
                                                    <td><?php echo $data['nama'] ?></td>
                                                    <td><?php echo $data['nrp'] ?></td>
                                                    <td><span class="tag tag-success"><?php echo $data['jabatan'] ?></span></td>
                                                    <td>
                                                        <div class="d-flex justify-content-start">
                                                            <form action="editpengesahan.php" method="post" class="mx-2">
                                                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                                <input type="hidden" name="nama" value="<?php echo $data['nama']; ?>">
                                                                <input type="hidden" name="nrp" value="<?php echo $data['nrp']; ?>">
                                                                <input type="hidden" name="jabatan" value="<?php echo $data['jabatan']; ?>">
                                                                <button type="submit" class="btn btn-warning">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </button>
                                                            </form>
                                                            <form action="hapus_pengesahan.php" method="post" class="mx-2">
                                                                <input type="hidden" name="id" value=" <?php echo $data['id']; ?>">
                                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }; ?>
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

    <?php include "component/listjs.php" ?>

    <?php
    if (isset($_GET['p'])) {
        if ($_GET['p'] == "sukses") {
            echo '<script type="text/javascript">';
            echo 'toastr.success("Data Berhasil Ditambahkan")';
            echo '</script>';
        } else if ($_GET['p'] == "edit") {
            echo '<script type="text/javascript">';
            echo 'toastr.success("Data Berhasil Diubah")';
            echo '</script>';
        } else if ($_GET['p'] == "hapus") {
            echo '<script type="text/javascript">';
            echo 'toastr.success("Data Berhasil Dihapus")';
            echo '</script>';
        }
    }
    ?>
</body>

</html>