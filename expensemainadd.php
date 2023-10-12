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
    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method=post action="code.php">

                    <div class="modal-body">
                        <div class="form-group">


                            <!--
                            <select name="id" id="category" class="form-control">
                                <option value="" selected>Select</option>
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

                            <select name=sub-category id=sub-category>
                            </select>


                            -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Expense Date</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" class="form-control" name="exp_date" />
                                </div>
                            </div>

                            <!-- Expense Category Name -->
                            <label for="">Expense Category Name</label>
                            <select name="exp_cat_id" id=category class="form-control">
                                <option value='' selected>Select</option>
                                <?Php
                                require "config/dbcon.php"; // connection to database 
                                $sql = "SELECT  * from exp_cat "; // Query to collect data 

                                foreach ($dbo->query($sql) as $row) {
                                    echo "<option value=$row[id]>$row[cat_name]</option>";
                                }
                                ?>
                            </select>
                            <select name="exp_subcat_id" id=sub-category class="form-control mt-3">
                                <option value="" selected>Select</option>
                            </select>

                        </div>

                        <!-- Expense Amount -->
                        <div class="form-group">
                            <label for="">Expense Amount</label>
                            <input type="text" name="exp_amount" class="form-control" placeholder="Bill Amount">
                        </div>


                        <div class="form-group">
                            <input type=submit name="expense_save" value=Submit class="btn btn-primary btn-block">

                        </div>



                        <!--Getting Category & Subcategory with AJAX -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                        $(document).ready(function() {
                            ////////////
                            $('#category').change(function() {
                                //var st=$('#category option:selected').text();
                                var id = $('#category').val();
                                $('#sub-category').empty(); //remove all existing options
                                ///////
                                $.get('ddck.php', {
                                    'id': id
                                }, function(return_data) {
                                    $.each(return_data.data, function(key, value) {
                                        $("#sub-category").append("<option value=" +
                                            value
                                            .subcat_id + ">" + value.subcat_name +
                                            "</option>");
                                    });
                                }, "json");
                                ///////
                            });
                            /////////////////////
                        });
                        </script>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
            <h2 class="card-title">Expenses</h2>
            <a href="#" data-toggle="modal" data-target="#addusermodal" class="btn btn-primary float-right">Add
                Expense</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Date</th>
                        <th>Expense Category</th>
                        <th>Expense Sub-category</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                //$showexpense = "SELECT * FROM exp_cat JOIN exp_subcat ON exp_cat.id=exp_subcat.id ORDER BY cat_name desc";
                $showexpense = "SELECT * FROM `exp_all` ORDER BY exp_date DESC";
                $showexpense_run = mysqli_query($conn, $showexpense);

                $i = 1;
                while ($showexpensedata = mysqli_fetch_assoc($showexpense_run)) {
                    $customdateformat = $showexpensedata['exp_date'];
                ?>

                <tbody>

                    <tr>
                        <!-- <td><?php echo $i++ ?></td>-->
                        <td><?php echo date('M d,Y', strtotime($customdateformat)) ?></td>
                        <td><?php echo $showexpensedata['cat_name']; ?></td>
                        <td><?php echo $showexpensedata['subcat_name']; ?></td>
                        <?php $formated_expense_amount = $showexpensedata['exp_amount']; ?>
                        <td><?php
                                $formated_expense_amount = number_format($formated_expense_amount);
                                echo $formated_expense_amount ?></td>
                        <td><?php echo $showexpensedata['']; ?></td>
                    </tr>



                </tbody>
                <?php
                }
                ?>


                <tfoot>
                    <tr>
                        <th colspan="4">Total Expense:</th>

                        <?php
                        $expensesum = "SELECT sum(exp_amount) FROM expense" or die(mysqli_error());
                        $expensesumresults = mysqli_query($conn, $expensesum);
                        while ($rows = mysqli_fetch_array($expensesumresults)) { ?>
                        <?php $expensesumvalue = $rows['sum(exp_amount)']; ?>

                        <?php
                        }
                        ?>
                        <th>

                            <?php
                            $format_expensesum = number_format($expensesumvalue);
                            echo $format_expensesum ?>

                        </th>
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