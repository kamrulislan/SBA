<?php
session_destroy();
header('location: login.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/code.php');
include("config/dbcon.php");


?>

<!-- Input addon -->








<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>