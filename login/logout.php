<?php
session_start();
$_SESSION['id_user'] = "";
$_SESSION['posisi'] = "";
header("location:../index.php");
?>
