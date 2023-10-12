<?php

include('config/dbcon.php');



//Delete lamination bill number
$lam_bil_id = $_GET['lam_bil_id'];
$deletebilnum = "DELETE FROM lamination_bill WHERE lam_bil_id='$lam_bil_id' ";
$deletebilnum_run = mysqli_query($conn, $deletebilnum);
if ($deletebilnum_run) {
    echo "<script>alert('Lamination Bill number Deleted successfully')</script>";
    header("location: lambilladd.php");
} else {
    echo "<script>alert('Lamination Bill number Deleted Failed')</script>";
    header("location: lambilladd.php");
}
