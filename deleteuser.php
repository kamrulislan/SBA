<?php

include('config/dbcon.php');


//Delete user info
$user_id = $_GET['id'];
$deletequery = "DELETE FROM users WHERE id='$user_id' ";
$deletequery_run = mysqli_query($conn, $deletequery);
if ($updatequery_run) {
    echo "<script>alert('User Deleted successfully')</script>";
    header("location: registered.php");
} else {
    echo "<script>alert('User Deleted Failed')</script>";
    header("location: registered.php");
}



//Delete expense category info
$user_id = $_GET['id'];
$deletexpcaquery = "DELETE FROM exp_cat WHERE id='$user_id' ";
$deletexpcaquery_run = mysqli_query($conn, $deletexpcaquery);
if ($deletexpcaquery_run) {
    echo "<script>alert('Category Deleted successfully')</script>";
    header("location: expenseadd.php");
} else {
    echo "<script>alert('Category Deleted Failed')</script>";
    header("location: expenseadd.php");
}

//Delete company name
$com_id = $_GET['com_id'];
$deletecomaquery = "DELETE FROM sales WHERE com_id='$com_id' ";
$deletecomaquery_run = mysqli_query($conn, $deletecomaquery);
if ($deletecomaquery_run) {
    echo "<script>alert('Company name Deleted successfully')</script>";
    header("location: salecomadd.php");
} else {
    echo "<script>alert('Company name Deleted Failed')</script>";
    header("location: salecomadd.php");
}