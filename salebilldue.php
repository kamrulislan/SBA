<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');
?>

<!-- Add the DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">


<style>
    /* Hide the default pagination elements */
    .dataTables_paginate {
        display: none;
    }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- ... Your existing code ... -->

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Bill Entry</h2>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" data-page-length="-1">
                <thead>
                    <tr>
                        <th>Bill Number</th>
                        <th>Bill Issued Date</th>
                        <th>Company Name</th>
                        <th>Bill Amount</th>
                        <th>Paid Bill Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $showsalesbill = "SELECT * FROM sale_statements WHERE paid_bill_date IS NULL;";
                    $showsalesbill_run = mysqli_query($conn, $showsalesbill);
                    $totalSales = 0; // Variable to store total sales
                    $totalsaveamount = 0; // Variable to store total sales


                    while ($showsalesbilldata = mysqli_fetch_assoc($showsalesbill_run)) {
                        $customdateformat = $showsalesbilldata['bil_date'];
                        $customdateformatee = $showsalesbilldata['paid_bill_date'];
                        $formated_bill_amount = number_format($showsalesbilldata['bil_amount'], 2);

                    ?>
                        <tr>
                            <td><?php echo $showsalesbilldata['bil_num']; ?></td>
                            <td><?php echo date('M d,Y', strtotime($customdateformat)); ?></td>
                            <td><?php echo $showsalesbilldata['com_name']; ?></td>
                            <td><?php echo $formated_bill_amount; ?></td>

                            <td><?php echo $customdateformatee ? date('M d,Y', strtotime($customdateformatee)) : "Not applicable"; ?></td>
                            
                            
                            <td>
                                <a href="salebillpaid-edit.php?bil_id=<?php echo $showsalesbilldata['bil_id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

                




            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Your existing HTML and PHP code -->

<!-- Your existing HTML and PHP code -->

<!-- Add the DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTables -->
<script>
$(document).ready(function() {
    $('#example1').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "your_server_side_processing_file.php", // Replace with your server-side processing file URL
            "type": "POST" // Adjust the HTTP method if needed (POST or GET)
        },
        "columns": [
            // Define your column configurations here
            // For example: { "data": "column_name" }
        ]
    });
});
</script>





<script>
    function confirmdel() {
        return confirm("Are you sure you want to Delete this Bill Number?");
    }
</script>

<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>
