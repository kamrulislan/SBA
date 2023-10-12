<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!--User Modal -->
    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub-category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">

                            <label for="">Expense Category Name</label>

                            <select name="id" id="" class="form-control">
                                <?php
                                $cat_show = "SELECT * FROM exp_cat";
                                $catshow_run = mysqli_query($conn, $cat_show);
                                while ($catshow_data = mysqli_fetch_assoc($catshow_run)) {
                                ?>
                                    <option value="<?php echo $catshow_data['id'] ?>">
                                        <?php echo $catshow_data['cat_name'] ?></option>

                                <?php
                                }
                                ?>

                            </select>


                        </div>
                        <div class="form-group">
                            <label for="">Expense Sub-category Name</label>
                            <input type="text" name="subcat_name" class="form-control" placeholder="Sub category name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addexpsubcat" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="delete_id" class="delete_user_id">
                        <p>Are you sure? you want to delete the data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="deletebtn" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

    <?php
    if (isset($_SESSION['status'])) {
        echo "<h2>" . $_SESSION['status'] . "</h2>";
        unset($_SESSION['status']);
    }
    ?>


    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Expense Sub-category</h2>
            <a href="#" data-toggle="modal" data-target="#addusermodal" class="btn btn-primary float-right">Add
                Sub-category</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sub Cat-ID</th>
                        <th>Expense Category Name</th>
                        <th>Expense Sub-category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                $showsubcat = "SELECT * FROM exp_cat JOIN exp_subcat ON exp_cat.id=exp_subcat.id ORDER BY cat_name ASC";
                $showsubcat_run = mysqli_query($conn, $showsubcat);

                $i = 1;
                while ($showsubcatdata = mysqli_fetch_assoc($showsubcat_run)) {
                ?>
                    <tbody>

                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $showsubcatdata['cat_name']; ?></td>
                            <td><?php echo $showsubcatdata['subcat_name']; ?></td>

                            <td>
                                <a href="expensesubcat-edit.php?subcat_id=<?php echo $showsubcatdata['subcat_id']; ?>&cat_name=<?php echo $showsubcatdata['cat_name']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>



                    </tbody>
                <?php
                }
                ?>

                <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Platform(s)</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>

<?php include('inlclude/script.php'); ?>



<script>
    function confirmdel() {
        return confirm("Are you sure you want to Delete this user?");
    }
</script>
<?php include('inlclude/footer.php'); ?>