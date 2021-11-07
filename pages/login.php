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
</head>

<body>
    <!-- navbar -->
    <?php include "../component/header.php" ?>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="container mb-3">
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Login Gagal!</strong> Username atau Password anda Salah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        } else if ($_GET['pesan'] == "logout") {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Anda Telah Berhasil Logout !</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        } else if ($_GET['pesan'] == "belum_login") {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Anda harus <strong>Login </strong>terlebih dahulu
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                        }
                    }
                    ?>
                </div>
                <div class="login100-pic js-tilt align-items-center" data-tilt>
                    <div class="d-flex justify-content-center ">
                        <img src="../img/logo_bnn.png" alt="IMG">
                    </div>
                </div>

                <form action="../login/cek_login.php" method="post" class="login100-form validate-form">
                    <span class="login100-form-title">
                        Manage Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Masukan Username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password dibutuhkan">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            LOGIN
                        </button>
                        <div class="text-center pt-3">
                            <a class="txt2 font-weight-bold" href="../pages/register.php">
                                Form Pendaftaran
                            </a>
                        </div>
                    </div>
                </form>
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
    <script src="vendor/bootstrap/js/popper.min.js" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!--===============================================================================================-->
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>