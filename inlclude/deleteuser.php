<?php
session_start();
include('config/dbcon.php');


$user_id = $_GET['id'];
$deletequery = "DELETE FROM users WHERE id='$user_id' ";
$deletequery_run = mysqli_query($conn, $deletequery);
if ($updatequery_run) {
    $_SESSION['status'] = "User updated successfully";
    header("location: registered.php");
} else {
    $_SESSION['status'] = "User updating failed";
    header("location: registered.php");
}