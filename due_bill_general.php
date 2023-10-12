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
                    <h5 class="modal-title" id="exampleModalLabel">Add Bill number</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">

                        <!-- Bill Number -->
                        <div class="form-group">

                            <label for="">Bill Number</label>
                            <input type="number" name="bil_num" class="form-control" placeholder="Bill Number">
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label>Bill Issue Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control" data-target="#reservationdate"
                                    name="bil_date" />

                            </div>
                        </div>
                        <!-- Company Name -->
                        <div class="form-group">

                            <label for="">Company Name</label>

                            <select name="com_id" id="" class="form-control">
                                <?php
                                $bil_show = "SELECT * FROM sales";
                                $bilshow_run = mysqli_query($conn, $bil_show);
                                while ($bilshow_data = mysqli_fetch_assoc($bilshow_run)) {
                                ?>
                                <option value="<?php echo $bilshow_data['com_id'] ?>">
                                    <?php echo $bilshow_data['com_name'] ?></option>

                                <?php
                                }
                                ?>

                            </select>


                        </div>
                        <!-- Bill Amount -->
                        <div class="form-group">
                            <label for="">Bill Amount</label>
                            <input type="text" name="bil_amount" class="form-control" placeholder="Bill Amount">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="bil_save" class="btn btn-primary">Save</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="delete_id" class="delete_user_id">
                        <p>Are you sure? you want to delete the bill number?</p>
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
                        <li class="breadcrumb-item active">Add Bill</li>
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
            <h2 class="card-title">Bill Entry</h2>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Bill Number</th>
                        <th>Bill Issued Date</th>
                        <th>Company Name</th>
                        <th>Bill Amount</th>
                  

                    </tr>
                </thead>

                <?php

                $showsalesbill = "SELECT bil_num, bil_date,com_name,bil_amount,paid_bill_date FROM sale_statements WHERE com_name = 'GENERAL' AND paid_bill_date IS NULL ORDER BY bil_num ASC";
                //$showsalesbill = "SELECT * FROM sale_statements";

                $showsalesbill_run = mysqli_query($conn, $showsalesbill);

                //$sumbills = "SELECT sum( bil_amount ) as bil_amount FROM `sales_bill`";



                $i = 1;
                while ($showsalesbilldata = mysqli_fetch_assoc($showsalesbill_run)) {
                    $customdateformat = $showsalesbilldata['bil_date'];
                    $customdateformatee = $showsalesbilldata['paid_bill_date'];


                ?>
                <tbody>

                    <tr>
                        <td><?php echo $showsalesbilldata['bil_num']; ?></td>
                        <td><?php echo date('M d,Y', strtotime($customdateformat)) ?></td>
                        <td><?php echo $showsalesbilldata['com_name']; ?></td>
                        <?php $formated_bill_amount = $showsalesbilldata['bil_amount']; ?>
                        <td>

                            <?php
                                $formated_bill_amount = number_format($formated_bill_amount);
                                echo $formated_bill_amount ?>
                        </td>

                 


                    </tr>



                </tbody>
                <?php
                }
                ?>


                <tfoot>
                    <tr>
                        <th colspan="3">Total Sales:</th>

                        <?php
                        $billsum = "SELECT sum(bil_amount) FROM sale_statements WHERE com_name = 'GENERAL' AND paid_bill_date IS NULL" or die(mysqli_error());
                        $results = mysqli_query($conn, $billsum);
                        while ($rows = mysqli_fetch_array($results)) { ?>
                        <?php $newvalue = $rows['sum(bil_amount)']; ?>

                        <?php
                        }
                        ?>
                        <th>

                            <?php
                            $format_value = number_format($newvalue);
                            echo $format_value ?>

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
    return confirm("Are you sure you want to Delete this Bill Number?");
}
</script>
<?php include('inlclude/footer.php'); ?>