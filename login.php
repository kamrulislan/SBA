<?php
session_start();
include('inlclude/header.php');
include('inlclude/topbar.php');
include('config/dbcon.php');
include('logincode.php');

?>

<!-- Input addon -->






<div class="section">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Welcome to login panel</h4>
            </div>
            <div class="card-body">
                <?php include('message.php'); ?>
                <form action="logincode.php" method="POST">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" name="login_btn" class="btn btn-primary btn-block">login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- /.card-body -->


<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>