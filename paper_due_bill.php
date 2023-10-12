<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');

//$p_id = $_GET['p_id'];
$paper_com_name = $_GET['paper_com_name'];

    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
$query = "select * from paper_bills_view where paper_com_name='$paper_com_name'";
$data = mysqli_query($con, $query);

$result = mysqli_fetch_assoc($data);


?>


<!-- Add the DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

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
                        <li class="breadcrumb-item"><a href="https://bestprintersltd.com/admin/index.php">Home</a></li>
                        
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
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Bill Number</th>
                        <th>Bill Issued Date</th>
                        <th>Company Name</th>
                        <th>Bill Amount</th>
                        

                    </tr>
                </thead>

                <?php

                $showpapersbill = "SELECT * FROM paper_bills_view WHERE paper_com_name = '$paper_com_name' AND paper_paid_bill_date IS NULL";
                $showpapersbill_run = mysqli_query($conn, $showpapersbill);

                
                while ($showpapersbilldata = mysqli_fetch_assoc($showpapersbill_run)) {
                    $customdateformat = $showpapersbilldata['paper_bil_num'];
                    $customdateformatee = $showpapersbilldata['paper_bil_date'];


                ?>
                    <tbody>

                        <tr>
                            <td><?php echo $showpapersbilldata['paper_bil_num']; ?></td>
                            <td><?php echo date('M d,Y', strtotime($customdateformatee)) ?></td>
                            <td><?php echo $showpapersbilldata['paper_com_name']; ?></td>
                            <?php $formated_bill_amount = $showpapersbilldata['paper_bil_amount']; ?>
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
                        $billsum = "SELECT sum(paper_bil_amount) FROM paper_bills_view WHERE paper_com_name = '$paper_com_name' AND paper_paid_bill_date IS NULL" or die(mysqli_error());
                        $results = mysqli_query($conn, $billsum);
                        while ($rows = mysqli_fetch_array($results)) { ?>
                            <?php $newvalue = $rows['sum(paper_bil_amount)']; ?>

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


<!-- Add the DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#example1').DataTable();
});
</script>

<?php include('inlclude/script.php'); ?>


<?php include('inlclude/footer.php'); ?>