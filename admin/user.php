<?php $halaman = "Data User";
session_start();

if (!$_SESSION['posisi'] == "admin") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

include "../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM t_user");

$a = 1;
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
                                        <a href="tambahuser.php">
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
                                                <th>ID</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php while ($data = mysqli_fetch_array($query)) { ?>
                                                    <td><?php echo $a++; ?></td>
                                                    <td><?php echo $data['username']; ?></td>
                                                    <td><?php echo $data['password']; ?></td>
                                                    <td><span class="tag tag-success"><?php echo $data['posisi']; ?></span></td>
                                                    <td>
                                                    <div class="d-flex justify-content-start">
                                                       
                                                            <form action="edituser.php" method="post" class="mx-2">
                                                                <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                                                                <input type="hidden" name="username" value="<?php echo $data['username']; ?>">
                                                                <input type="hidden" name="password" value="<?php echo $data['password']; ?>">
                                                                <input type="hidden" name="posisi" value="<?php echo $data['posisi']; ?>">
                                                                <button type="submit" class="btn btn-warning">
                                                                    <i class="far fa-edit"></i> Edit
                                                                </button>
                                                            </form>
                                                            
                                                            <form action="hapus_user.php" method="post" class="mx-2">
                                                                <input type="hidden" name="id_user" value="<?php echo $data['id_user'];?>">
                                                                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-danger"><i class="far fa-trash-alt"></i> Hapus</button>
                                                                <button type="button" class="btn btn-success open-AddBookDialog"><i class="far fa-trash-alt"></i> Delete</button>
                                                            </form> 
                                                            
                                                    </div>
                                                        
                                                    </td>
                                            </tr>
                                            <?php } ?>
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
        
        <div class="modal fade" id="addBookDialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title">Peringatan</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-danger">
                        <p>Apakah anda yakin akan menghapus data ini &hellip; ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                            <input type="text" name="id_user" value="<?php echo $data['id_user']; ?>">
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Ya</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <?php include "component/footer.php" ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- modal -->
    
    <div class="modal fade">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h3>Modal header</h3>
        </div>
        <div class="modal-body">
            <p>some content</p>
            <input type="text" name="bookId" id="bookId" value="" />
        </div>
    </div>
    
    <!-- /.modal -->

    <?php include "component/listjs.php" ?>

    <script>
        $(document).on("click", ".open-AddBookDialog", function() {
            var myBookId = $(this).data('id');
            $(".modal-body #bookId").val(myBookId);
            // As pointed out in comments, 
            // it is unnecessary to have to manually call the modal.
            $('#addBookDialog').modal('show');
        });
    </script>

    <?php include "../Component/pesan.php" ?>
</body>

</html>