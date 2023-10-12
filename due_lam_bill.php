<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">



    <!--Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <h1 class="m-0">Lamination Bills</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Lamination Bill</li>
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
            <a href="https://bestprintersltd.com/admin/index.php" class="btn btn-danger float-right">Back</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Lamination Bill Number</th>
                        <th>Laminaton Bill Issued Date</th>
                        <th>Lamination Company Name</th>
                        <th>Laminatino Bill Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                $lam_com_name = $_GET['lam_com_name'];
                $showlaminationbill = "SELECT * FROM lamination_bills_view WHERE lam_com_name = '$lam_com_name' AND lam_paid_bill_date IS NULL ORDER BY lam_bil_num ASC";


                $showlaminationbill_run = mysqli_query($conn, $showlaminationbill);

                //$sumbills = "SELECT sum( bil_amount ) as bil_amount FROM `lamination_bill`";



                $i = 1;
                while ($showlaminationbilldata = mysqli_fetch_assoc($showlaminationbill_run)) {
                    $customdateformat = $showlaminationbilldata['lam_bil_date'];
                ?>
                    <tbody>

                        <tr>
                            <td>
                                <a href="lamination-single.php?lam_bil_id=<?php echo $showlaminationbilldata["lam_bil_id"]; ?>">
                                    <?php echo $showlaminationbilldata['lam_bil_num']; ?>
                                </a>
                            </td>
                            <td><?php echo date('M d,Y', strtotime($customdateformat)) ?></td>
                            <td><?php echo $showlaminationbilldata['lam_com_name']; ?></td>
                            <?php $formated_bill_amount = $showlaminationbilldata['lam_bil_amount']; ?>
                            <td>

                                <?php
                                $formated_bill_amount = number_format($formated_bill_amount);
                                echo $formated_bill_amount ?>
                            </td>

                            <td>
                                <a href="lambillpaid-edit.php?lam_bil_id=<?php echo $showlaminationbilldata['lam_bil_id']; ?>" class="btn btn-primary">Edit</a>
 <!-- /.card-header 
                                <a href="lambilldel.php?lam_bil_id=<?php echo $showlaminationbilldata['lam_bil_id'] ?>"><input type="submit" class="btn btn-danger" value="Delete" onclick="return confirmdel()"></a>
                                -->
                            </td>
                        </tr>



                    </tbody>
                <?php
                }
                ?>


                <tfoot>
                    <tr>
                        <th colspan="3">Total Lamination :</th>

                        <?php
                        $lambillsum = "SELECT sum(lam_bil_amount) FROM lamination_bills_view WHERE lam_com_name = '$lam_com_name' AND lam_paid_bill_date IS NULL" or die(mysqli_error());
                        $lamresults = mysqli_query($conn, $lambillsum);
                        while ($rows = mysqli_fetch_array($lamresults)) { ?>
                            <?php $newvalue = $rows['sum(lam_bil_amount)']; ?>

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