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
                        <li class="breadcrumb-item active">Expense Sub Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Expense Sub-Category</h2>
            <a href="expensesubcat.php" class="btn btn-danger float-right">Back</a>
        </div>
        <!-- /.card-header -->

        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <form action="code.php" method="POST">

                        <?php
                        if (isset($_GET['subcat_id'])) {
                            $subcat_id = $_GET['subcat_id'];
                            $query = "SELECT * FROM exp_subcat WHERE subcat_id='$subcat_id' LIMIT 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                                    <label for="">Expense Category Name</label>

                                    <select name="id" id="" class="form-control">
                                        <?php
                                        $cat_show = "SELECT * FROM exp_cat";
                                        $catshow_run = mysqli_query($conn, $cat_show);
                                        while ($catshow_data = mysqli_fetch_assoc($catshow_run)) {
                                        ?>
                                            <option value=" <?php echo $catshow_data['id'] ?>">
                                                <?php echo $catshow_data['cat_name'] ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>

                                    <input type="text" name="subcat_id" value="<?php echo $row['subcat_id'] ?>">
                                    <div class="form-group">
                                        <label for="">Expense Sub-Category Name</label>
                                        <input type="text" name="subcat_name" value="<?php echo $row['subcat_name'] ?>" class="form-control" placeholder="Expense Sub-Category Name">
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

                            <button type="submit" name="updatexpsubcat" class="btn btn-info">Update
                                Sub-Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>