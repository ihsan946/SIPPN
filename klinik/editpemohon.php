<?php
include "../koneksi/koneksi.php";
$halaman = "Data Pemohon";
session_start();
if (!$_SESSION['posisi'] == "klinik") {
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

if ($_POST == null) {
    echo "error";
} else {
    $id_pengguna = $_POST['id_pengguna'];

    $query = mysqli_query($koneksi, "SELECT * FROM `t_pengguna` WHERE `id_pengguna`='$id_pengguna'");
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
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="update_pemohon.php" method="post" class="needs-validation" novalidate>
                                    <?php $data = mysqli_fetch_array($query); ?>
                                    <input type="hidden" name="id_pengguna" value="<?php echo $data['id_pengguna']; ?>">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Text Input -->
                                            <div class="col-12">
                                                <div class="nama mt-3">
                                                    <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                                                    <input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" aria-label=".form-control-sm example" value="<?php echo $data['nama']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Nama tidak boleh kosong !</div>
                                                </div>

                                                <div class="umur mt-3">
                                                    <label for="inputEmail4" class="form-label">Umur</label>
                                                    <input class="form-control form-control-sm" type="text" name="umur" placeholder="Umur" aria-label=".form-control-sm example" value="<?php echo $data['umur']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Umur tidak boleh kosong !</div>
                                                </div>

                                                <div class="tem-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                                                    <input class="form-control form-control-sm" type="text" name="tl" placeholder="Tempat Lahir" aria-label=".form-control-sm example" value="<?php echo $data['tempat_lahir']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Tempat Lahir tidak boleh kosong !</div>
                                                </div>

                                                <div class="tgl-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                                                    <input class="form-control form-control-sm" id="datepicker" type="text" name="tgl" placeholder="Tanggal lahir" aria-label=".form-control-sm example" value="<?php echo $data['tanggal_lahir']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Tanggal Lahir tidak boleh kosong !</div>
                                                </div>

                                                <div class="tem-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">NIK</label>
                                                    <input class="form-control form-control-sm" type="text" name="nik" placeholder="NIK" aria-label=".form-control-sm example" value="<?php echo $data['nik']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, NIK tidak boleh kosong !</div>
                                                </div>

                                                <div class="kelamin mt-3">
                                                    <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                                                    <div class="ml-4">
                                                        <?php
                                                        $jenis_kelamin = $data['jenis_kelamin'];
                                                        ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name='j_kelamin' value='laki-laki' id="flexRadioDefault1" <?php if ($jenis_kelamin == "laki-laki") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "";
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                Laki-Laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name='j_kelamin' value='perempuan' id="flexRadioDefault2" <?php if ($jenis_kelamin == "perempuan") {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } else {
                                                                                                                                                                        echo "";
                                                                                                                                                                    } ?>>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tem-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">Alamat Lengkap</label>
                                                    <input class="form-control form-control-sm" type="text" name="alamat" placeholder="Alamat" aria-label=".form-control-sm example" value="<?php echo $data['alamat_lengkap']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Alamat Lengkap tidak boleh kosong !</div>
                                                    <!-- Tambahan -->

                                                    <div class="row mt-3">
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" placeholder="Desa" name="desa" value="<?php echo $data['desa']; ?>" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" placeholder="Dusun" name="dusun" value="<?php echo $data['dusun']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-3">
                                                            <input type="text" class="form-control" placeholder="RT" name="rt" value="<?php echo $data['rt']; ?>" required>
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="text" class="form-control" placeholder="RW" name="rw" value="<?php echo $data['rw']; ?>" required>
                                                        </div>
                                                        <div class="col-6">
                                                            <input type="text" class="form-control" placeholder="Kecamatan" name="kecamatan" value="<?php echo $data['kecamatan']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <input class="form-control form-control- mt-3" type="text" placeholder="Kabupaten" name="kabupaten" aria-label=".form-control-sm example" value="<?php echo $data['kabupaten']; ?>" required>
                                                </div>

                                                <div class="tem-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">Pekerjaan</label>
                                                    <input class="form-control form-control-sm" type="text" name="pekerjaan" placeholder="Pekerjaan" aria-label=".form-control-sm example" value="<?php echo $data['pekerjaan']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Pekerjaan tidak boleh kosong !</div>
                                                </div>

                                                <div class="tem-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">No. Telp</label>
                                                    <input class="form-control form-control-sm" type="text" name="notelp" placeholder="No. Telp" aria-label=".form-control-sm example" value="<?php echo $data['no_telp']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, No. Telp tidak boleh kosong !</div>
                                                </div>

                                                <div class="tem-lahir mt-3">
                                                    <label for="inputEmail4" class="form-label">Tujuan Pembuatan SKHPN</label>
                                                    <input class="form-control form-control-sm" type="text" name="tujuan" placeholder="Tujuan Pembuatan SKHPN" aria-label=".form-control-sm example" value="<?php echo $data['tujuan_skhpn']; ?>" required>
                                                    <div class="invalid-feedback">Maaf, Tujuan Pembuatan tidak boleh kosong !</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer justify-content-end">
                                        <a href="pemohon.php">
                                            <button type="button" class="btn btn-default">Batal</button>
                                        </a>
                                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal-danger">Simpan</button>
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
        });

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>