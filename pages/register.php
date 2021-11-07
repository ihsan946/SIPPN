<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pusat Pelayanan Terpadu BNNK Sumedang</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../img/logo_bnn.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--===============================================================================================-->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <!--===============================================================================================-->
</head>

<body>
                <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "sukses") {
                            echo '<div class="modal" tabindex="-1">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>';
                        }
                    }
                ?>
    <!-- navbar -->
    <?php include "../component/header.php" ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt align-items-center" data-tilt>
                    <div class="d-flex justify-content-center ">
                        <img src="../img/logo_bnn.png" alt="IMG">
                    </div>
                </div>

                <form action="../pendaftaran/insert_register.php" method="post" class="login100-form needs-validation" novalidate>
                    <span class="login100-form-title">
                        Form Permononan Pembuatan SKHPN
                    </span>

                    <div class="nama mt-3">
                        <label for="inputEmail4" class="form-label" id="nama">Nama Lengkap</label>
                        <input class="form-control form-control-sm" type="text" name="nama" placeholder="Nama" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, Nama tidak boleh kosong !</div>
                    </div>

                    <div class="umur mt-3">
                        <label for="inputEmail4" class="form-label">Umur</label>
                        <input class="form-control form-control-sm" type="text" name="umur" placeholder="Umur" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, Umur tidak boleh kosong !</div>
                    </div>

                    <div class="tem-lahir mt-3">
                        <label for="inputEmail4" class="form-label">Tempat Lahir</label>
                        <input class="form-control form-control-sm" type="text" name="tl" placeholder="Tempat Lahir" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, tempat Lahir tidak boleh kosong !</div>
                    </div>

                    <div class="tgl-lahir mt-3">
                        <label for="inputEmail4" class="form-label">Tanggal Lahir</label>
                        <input class="form-control form-control-sm" id="datepicker" type="text" name="tgl" placeholder="Tanggal lahir" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, Tanggal Lahir tidak boleh kosong !</div>
                    </div>

                    <div class="tem-lahir mt-3">
                        <label for="inputEmail4" class="form-label">NIK</label>
                        <input class="form-control form-control-sm" type="text" name="nik" placeholder="NIK" maxlength="16" aria-label=".form-control-sm example" onkeypress="return hanyaAngka(event)" required>
                        <div class="invalid-feedback">Maaf, NIK tidak boleh kosong !</div>
                    </div>

                    <div class="kelamin mt-3">
                        <label for="inputEmail4" class="form-label">Jenis Kelamin</label>
                        <div class="ml-4" required >
                            <div class="form-check" >
                                <input class="form-check-input" type="radio" name='j_kelamin' value='laki-laki' id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name='j_kelamin' value='perempuan' id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                            <div class="invalid-feedback">Maaf, Jenis Kelamin tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="tem-lahir mt-3">
                        <label for="inputEmail4" class="form-label">Alamat Lengkap</label>
                        <input class="form-control form-control-sm" type="text" name="alamat" placeholder="Nama Jalan" aria-label=".form-control-sm example" required>

                        <!-- Tambahan -->

                        <div class="row mt-3">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Desa" name = "desa" required>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Dusun" name = "dusun" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="RT" name = "rt" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="RW" name = "rw" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Kecamatan" name = "kecamatan" required>
                            </div>
                        </div>
                        <input class="form-control form-control- mt-3" type="text" name = "kabupaten" placeholder="Kabupaten / Kelurahan" aria-label=".form-control-sm example" required>
                    </div>
                    <div class="invalid-feedback">Maaf, Username tidak boleh kosong !</div>

                    <div class="tem-lahir mt-3">
                        <label for="inputEmail4" class="form-label">Pekerjaan</label>
                        <input class="form-control form-control-sm" type="text" name="pekerjaan" placeholder="Pekerjaan" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, Pekerjaan tidak boleh kosong !</div>
                    </div>

                    <div class="tem-lahir mt-3">
                        <label for="inputEmail4" class="form-label">No. Telp</label>
                        <input class="form-control form-control-sm" type="text" name="notelp" placeholder="No. Telp" onkeypress="return hanyaAngka(event)" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, No. Telp tidak boleh kosong !</div>
                    </div>

                    <div class="tem-lahir mt-3">
                        <label for="inputEmail4" class="form-label">Tujuan Pembuatan SKHPN</label>
                        <input class="form-control form-control-sm" type="text" name="tujuan" placeholder="Tujuan Pembuatan SKHPN" aria-label=".form-control-sm example" required>
                        <div class="invalid-feedback">Maaf, Tujuan Pembuatan tidak boleh kosong !</div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Daftar
                        </button>
                        <div class="text-center pt-3">
                            <a class="txt2 font-weight-bold" href="../index.php">
                                Halaman Utama
                            </a>
                        </div>
                    </div>
                </form>


                <!-- Modal -->
               
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.min.js" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <!-- jquery-validation -->
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../vendor/jquery-validation/additional-methods.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });

        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
    <!--===============================================================================================-->
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }

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