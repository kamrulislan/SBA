<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');
?>

<!-- Add the DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- ... Your existing code ... -->

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
                        <th>Checked Amount</th>
                        <th>Save Amount</th>
                        <th>Paid Bill Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $showlamsbill = "SELECT * FROM lamination_bills_view ORDER BY lam_bil_num asc";
                    $showlamsbill_run = mysqli_query($conn, $showlamsbill);
                    $totalSales = 0; // Variable to store total sales
                    $totalsaveamount = 0; // Variable to store total sales


                    while ($showlamsbilldata = mysqli_fetch_assoc($showlamsbill_run)) {
                        $customdateformat = $showlamsbilldata['lam_bil_date'];
                        $customdateformatee = $showlamsbilldata['lam_paid_bill_date'];
                        $formated_bill_amount = number_format($showlamsbilldata['lam_bil_amount'], 2);
                        $formated_checked_bill_amount = number_format($showlamsbilldata['lam_chcecked_bill_amount'], 2);

                        // Add the bill amount to total sales
                        $totalSales += $showlamsbilldata['lam_bil_amount'];
                        $totalsaveamount += $showlamsbilldata['lam_chcecked_bill_amount'];
                    ?>
                        <tr>
                            <td><?php echo $showlamsbilldata['lam_bil_num']; ?></td>
                            <td><?php echo date('M d,Y', strtotime($customdateformat)); ?></td>
                            <td><?php echo $showlamsbilldata['lam_com_name']; ?></td>
                            <td><?php echo $formated_bill_amount; ?></td>
                            <td><?php echo $showlamsbilldata['lam_chcecked_bill_amount']; ?></td>
                            <td><?php echo number_format($showlamsbilldata['lam_bil_amount'] - $showlamsbilldata['lam_chcecked_bill_amount'], 2); ?></td>

                            <td><?php echo $customdateformatee ? date('M d,Y', strtotime($customdateformatee)) : "Not applicable"; ?></td>
                            
                            
                            <td>
                                <a href="lambillpaid-edit.php?lam_bil_id=<?php echo $showlamsbilldata['lam_bil_id']; ?>" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

                <tfoot>
                <tr>
                    <th colspan="3">Total Amount:</th>
                    <th colspan="1"><?php echo number_format($totalSales, 2); ?></th>
                    <th colspan="1"><?php echo number_format($totalsaveamount, 2); ?></th>
                    <th><?php echo number_format($totalSales - $totalsaveamount, 2); ?></th>
                </tr>
                </tfoot>
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
    $('#example1').DataTable();
});
</script>


<script>
    function confirmdel() {
        return confirm("Are you sure you want to Delete this Bill Number?");
    }
</script>

<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>
