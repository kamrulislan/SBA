<?php
session_start();
include('config/dbcon.php');


if (isset($_POST['login_btn'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginquery = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
    $loginquery_run = mysqli_query($conn, $loginquery);

    if (mysqli_num_rows($loginquery_run) > 0) {
        foreach ($loginquery_run as $row) {
            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_email = $row['email'];
            $user_phone = $row['phpne'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_phone' => $user_phone

        ];
        $_SESSION['status'] = "login Successfully";
        header("location: index.php");
    } else {
        $_SESSION['status'] = "Invalid Email or Password";
        header("location: login.php");
    }
} else {
    $_SESSION['status'] = "Access Denied";
    header("location: login.php");
}

?>






<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>