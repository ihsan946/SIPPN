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
    } else if ($_GET['p'] == "gagal") {
        echo '<script type="text/javascript">';
        echo 'toastr.error("Data Gagal Dihapus")';
        echo '</script>';
    }
}
