<?php

include('config/dbcon.php');



//Delete bill number
$bil_id = $_GET['bil_id'];
$deletebilnum = "DELETE FROM sales_bill WHERE bil_id='$bil_id' ";
$deletebilnum_run = mysqli_query($conn, $deletebilnum);
if ($deletebilnum_run) {
    echo "<script>alert('Bill number Deleted successfully')</script>";
    header("location: salebilladd.php");
} else {
    echo "<script>alert('Bill number Deleted Failed')</script>";
    header("location: salebilladd.php");
}