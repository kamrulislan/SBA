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
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <span class="email_error text-danger ml-2"></span>
                            <input type="email" name="email" class="form-control email_id" placeholder="Email" id="email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmpass">Confirm Password</label>
                                    <input type="password" name="confirmpasspassword" class="form-control" placeholder="Confirm Password" id="confirmpass">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="adduser" class="btn btn-primary">Save</button>
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
                        <li class="breadcrumb-item active">Sale Statement</li>
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
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">From Date</label>
                            <input type="date" name="from_date_sales" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">To Date</label>
                            <input type="date" name="to_date_sales" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><br>
                            <input type="submit" class=" mt-2 btn btn-primary form-control" value="Filter">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Bill Number</th>
                        <th>Bill Issue Date</th>
                        <th>Company Name</th>
                        <th>Bill Amount</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $filter_total_sales = 0;
                    if (isset($_GET['from_date_sales']) && isset($_GET['to_date_sales'])) {
                        $from_date_sales = $_GET['from_date_sales'];
                        $to_date_sales = $_GET['to_date_sales'];
                        $filter_data_sales = "SELECT * FROM `sale_statements` WHERE `bil_date` BETWEEN '$from_date_sales' AND '$to_date_sales' ORDER BY 'bil_num' ASC ";
                        $filter_data_sales_run = mysqli_query($conn, $filter_data_sales);

                        if (mysqli_num_rows($filter_data_sales_run) > 0) {
                            foreach ($filter_data_sales_run as $filterdata) {
                                $filter_total_sales = $filter_total_sales
                                    + $filterdata['bil_amount'];
                    ?>


                                <tr>
                                    <td><?php echo $filterdata['bil_num']; ?></td>
                                    <td><?php echo $filterdata['bil_date']; ?></td>
                                    <td><?php echo $filterdata['com_name']; ?></td>

                                    <?php $filterdata_amount = $filterdata['bil_amount']; ?>
                                    <td>
                                        <?php
                                        $filterdata_amount = number_format($filterdata_amount);
                                        echo $filterdata_amount
                                        ?>
                                    </td>
                                </tr>


                    <?php
                            }
                        } else {
                            echo "No record found";
                        }
                    }

                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total:</th>

                        <th><?php echo $filter_total_sales = number_format($filter_total_sales); ?></th>
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
    $(document).ready(function() {
        $('.email_id').keyup(function(e) {
            var email = $('.email_id').val();
            //console.log(email);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'check_emailbtn': 1,
                    'email': email,
                },
                success: function(response) {
                    //console.log(response);
                    $('.email_error').text(response);
                }
            });


        });
    });
</script>

<script>
    function confirmdel() {
        return confirm("Are you sure you want to Delete this user?");
    }
</script>
<?php include('inlclude/footer.php'); ?>