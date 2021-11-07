<?php $halaman = "Data User"; 
session_start();
if (!$_SESSION['posisi'] == "admin") {
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
                            <h1>Tambah <?php echo $halaman ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="simpan_user.php" method="post" id="test">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" name="id" id="exampleInputEmail1" hidden>
                                            <input type="text" class="form-control" name="username" id="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Status</label>
                                            <select class="form-control" name="posisi">
                                                <option value="admin">admin</option>
                                                <option value="klinik">klinik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer justify-content-end">
                                        <a href="user.php"><button type="button" class="btn btn-default">Batal</button></a>
                                        <button type="submit" class="btn btn-success toastrDefaultSuccess">Simpan</button>
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
                    username: "required",
                    password: "required"
                },
                messages: {
                    username: {
                        required: 'Username Tidak Boleh Kosong'
                    },
                    password: {
                        required: 'Password Tidak Boleh Kosong'
                    }
                }
            });
        });
    </script>
</body>

</html>