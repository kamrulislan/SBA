<?php

include('config/dbcon.php');


include('code.php');



if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginquery = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $loginquery_run = mysqli_query($conn, $loginquery);

    if ($loginquery_run) {
        $_SESSION["loginuser"] = 'loginuser';
    } else {
        echo ("<script>alert('username & password are not corrected')</script>");
    }


    if (isset($_SESSION["loginuser"])) {
        header('location: index.php');
    } else {
        echo "error cz session is not set in the page";
    }
}
?>






<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>