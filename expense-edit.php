<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registered Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Registered users</h2>
            <a href="expense.php" class="btn btn-danger float-right">Back</a>
        </div>
        <!-- /.card-header -->

        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <form action="code.php" method="POST">

                        <?php
                        if (isset($_GET['user_id'])) {
                            $user_id = $_GET['user_id'];
                            $query = "SELECT * FROM exp_cat WHERE id='$user_id' LIMIT 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>

                        <input type="text" name="user_id" value="<?php echo $row['id'] ?>">
                        <div class="form-group">
                            <label for="">Exp. Category Name</label>
                            <input type="text" name="cat_name" value="<?php echo $row['cat_name'] ?>"
                                class="form-control" placeholder="Exp. Category Name">
                        </div>


                        <?php
                                }
                            } else {
                                echo "<h4>No Record Found!</h4>";
                            }
                        }
                        ?>



                        <div class="modal-body">


                        </div>
                        <div class="modal-footer">

                            <button type="submit" name="updatexpcat" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>