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

    <!--User Modal -->
    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Paper Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <!-- Bill Number -->
                        <div class="form-group">

                            <label for="">Paper Bill Number</label>
                            <input type="number" name="paper_bil_num" class="form-control" placeholder="Bill Number">
                        </div>

                        <!-- Date -->
                        <div class="form-group">
                            <label>Bill Issue Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control" data-target="#reservationdate" name="paper_bil_date" />

                            </div>
                        </div>
                        <!-- Company Name -->
                        <div class="form-group">

                            <label for="">Paper Company Name</label>

                            <select name="paper_com_id" id="" class="form-control">
                                <?php
                                $paper_bil_show = "SELECT * FROM paper_com";
                                $paper_bilshow_run = mysqli_query($conn, $paper_bil_show);
                                while ($paper_bilshow_data = mysqli_fetch_assoc($paper_bilshow_run)) {
                                ?>
                                    <option value="<?php echo $paper_bilshow_data['paper_com_id'] ?>">
                                        <?php echo $paper_bilshow_data['paper_com_name'] ?></option>

                                <?php
                                }
                                ?>

                            </select>


                        </div>
                        <!-- Bill Amount -->
                        <div class="form-group">
                            <label for="">Bill Amount</label>
                            <input type="text" name="paper_bil_amount" class="form-control" placeholder="Paper Bill Amount">
                        </div>


                        <!-- Bill image -->
                        <div class="form-group">
                            <label for="">Bill Image</label>
                            <input type="file" name="paper_img" class="form-control" placeholder="Upload Paper bill image" required>

                        </div>

                        <!-- Paid bill date -->
                        <div class="form-group">
                            <input type="hidden" name="paper_paid_bill_date" value="None">
                        </div>

                         <!-- checked bill ammount -->
                         <div class="form-group">
                            <input type="hidden" name="paper_chcecked_bill_amount" value="None">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="paper_bil_save" class="btn btn-primary">Save</button>
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
                    <h1 class="m-0">Paper Bills</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Paper Bill</li>
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
            <a href="#" data-toggle="modal" data-target="#addusermodal" class="btn btn-primary float-right">Add
                Bill</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                    <tr>

                        <th>Paper Bill Number</th>
                        <th>Paper Bill Issued Date</th>
                        <th>Paper Company Name</th>
                        <th>Paper Bill Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                //$showpaperbill = "SELECT * FROM paper_com JOIN paper_bill ON paper_com.paper_com_id=paper_bill.paper_com_id ORDER BY paper_com_name asc";

                $showpaperbill = "SELECT * FROM paper_bills_view ORDER BY paper_com_name asc";
                $showpaperbill_run = mysqli_query($conn, $showpaperbill);

                //$sumbills = "SELECT sum( bil_amount ) as bil_amount FROM `paper_bill`";



                //$i = 1;
                while ($showpaperbilldata = mysqli_fetch_assoc($showpaperbill_run)) {
                    $customdateformat = $showpaperbilldata['paper_bil_date'];
                ?>
                    <tbody>

                        <tr>
                            <td>
                                <a href="paper-single.php?paper_bil_id=<?php echo $showpaperbilldata["paper_bil_id"]; ?>">
                                    <?php echo $showpaperbilldata['paper_bil_num']; ?>
                                </a>
                            </td>
                            <td><?php echo date('M d,Y', strtotime($customdateformat)) ?></td>
                            <td><?php echo $showpaperbilldata['paper_com_name']; ?></td>
                            <?php $formated_bill_amount = $showpaperbilldata['paper_bil_amount']; ?>
                            <td>

                                <?php
                                $formated_bill_amount = number_format($formated_bill_amount);
                                echo $formated_bill_amount ?>
                            </td>

                            <td>
                                <a href="papercomadd-edit.php?paper_bil_id=<?php echo $showpaperbilldata['paper_bil_id']; ?>" class="btn btn-primary">Edit</a>
 <!-- /.card-header 
                                <a href="paperbilldel.php?paper_bil_id=<?php echo $showpaperbilldata['paper_bil_id'] ?>"><input type="submit" class="btn btn-danger" value="Delete" onclick="return confirmdel()"></a>
                                -->
                            </td>
                        </tr>



                    </tbody>
                <?php
                }
                ?>
                
                
                <!--

                <tfoot>
                    <tr>
                        <th colspan="3">Total paper :</th>

                        <?php
                        $paperbillsum = "SELECT sum(paper_bil_amount) FROM paper_bill" or die(mysqli_error());
                        $paperresults = mysqli_query($conn, $paperbillsum);
                        while ($rows = mysqli_fetch_array($paperresults)) { ?>
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
                -->

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>


<!-- Your existing HTML and PHP code -->

<!-- Add the DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();

                // Calculate total sales for the displayed rows (filtered data if available, otherwise all data)
                var totalSales = api
                    .column(3, { search: 'applied' })
                    .data()
                    .reduce(function(acc, val) {
                        return acc + parseFloat(val.replace('$', '').replace(',', ''));
                    }, 0);

                // Format the total sales value
                var formattedTotalSales = '$' + totalSales.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

                // Update the "Total Sales" footer cell with the total sales value
                $('#example1 tfoot th').eq(3).text('Total Sales: ' + formattedTotalSales);
            }
        });

        // Initialize the total sales footer on page load
        table.columns(3).search('').draw();
    });

    // Function to update the total sales and company-specific total when searching
    function updateTotalSales(api) {
        var totalSales = 0;
        var companyName = '';

        api.rows({ search: 'applied' }).every(function() {
            var data = this.data();
            var amount = parseFloat(data[3].replace(',', '').replace('$', ''));
            totalSales += isNaN(amount) ? 0 : amount;

            // Check if the company name matches the search filter
            if (data[2].toLowerCase().includes(api.search().toLowerCase())) {
                companyName = data[2];
            }
        });

        // Format the total sales value
        var formattedTotalSales = '$' + totalSales.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

        // Update the total sales display div
        $('#totalSalesDisplay').text('Total Sales for ' + companyName + ': ' + formattedTotalSales);
    }

    // Event listener for the search input
    $('#example1_filter input').on('keyup', function() {
        var api = $('#example1').DataTable().api();
        updateTotalSales(api);
    });
</script>


<?php include('inlclude/script.php'); ?>





<script>
    function confirmdel() {
        return confirm("Are you sure you want to Delete this Bill Number?");
    }
</script>
<?php include('inlclude/footer.php'); ?>