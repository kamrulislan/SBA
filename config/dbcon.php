<?php
/*
$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";
*/

$host = "localhost";
$username = "root";
$password = "mysql";
$database = "u974388227_pos_v21";


// Connection

$conn = mysqli_connect($host, $username, $password, $database);

// check connection
if (!$conn) {
    header("location: ../errors/db.php");
    //die(mysqli_connect_errno($conn));
}

// different video for login
else {
}
define('indexurl', "http://localhost/bestprinters/admin/index.php");



//////// Do not Edit below /////////
try {
    $dbo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}