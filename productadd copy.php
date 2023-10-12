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
                    <h5 class="modal-title" id="exampleModalLabel">Add product Bill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <!-- Product ID -->
                        <div class="form-group">
                            <label for="">Product Serial Number</label>
                            <input type="text" name="product_sl" class="form-control" placeholder="Product ID">
                        </div>

                        <!-- Company Name -->
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input type="text" name="com_name" class="form-control" placeholder="Company Name">
                        </div>

                        <!-- Product Type -->
                        <div class="form-group">
                            <label for="">Product Type</label>
                            <input type="text" name="product_type" class="form-control" placeholder="Product Type">
                        </div>

                        <!-- Product Code -->
                        <div class="form-group">
                            <label for="">Product Code</label>
                            <input type="text" name="product_code" class="form-control" placeholder="Product Code">
                        </div>

                        <!-- Product Name -->
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                        </div>

                        <!-- Product Size Length -->
                        <div class="form-group">
                            <label for="">Product Size Length</label>
                            <input type="number" name="product_size_length" class="form-control" placeholder="Product Size Length">
                        </div>

                        <!-- Product Size Width -->
                        <div class="form-group">
                            <label for="">Product Size Width</label>
                            <input type="number" name="product_size_width" class="form-control" placeholder="Product Size Width">
                        </div>

                        <!-- Product Size Height -->
                        <div class="form-group">
                            <label for="">Product Size Height</label>
                            <input type="number" name="product_size_height" class="form-control" placeholder="Product Size Height">
                        </div>

                        <!-- Per Sheet -->
                        <div class="form-group">
                            <label for="">Per Sheet</label>
                            <input type="number" name="per_sheet" class="form-control" placeholder="Per Sheet">
                        </div>

                        <!-- Product Specification -->
                        <div class="form-group">
                            <label for="">Product Specification</label>
                            <input type="text" name="product_specification" class="form-control" placeholder="Product Specification">
                        </div>

                        <!-- Lock Type -->
                        <div class="form-group">
                            <label for="">Lock Type</label>
                            <input type="text" name="lock_type" class="form-control" placeholder="Lock Type">
                        </div>

                        <!-- Product Color -->
                        <div class="form-group">
                            <label for="">Product Color</label>
                            <input type="number" name="product_color" class="form-control" placeholder="Product Color">
                        </div>

                        <!-- Lamination Type -->
                        <div class="form-group">
                            <label for="">Lamination Type</label>
                            <input type="text" name="lamination_type" class="form-control" placeholder="Lamination Type">
                        </div>

                        <!-- Product Design File -->
                        <div class="form-group">
                            <label for="">Product Design File</label>
                            <input type="file" name="product_design_file" class="form-control" placeholder="Upload Product Design File">
                        </div>

                        <!-- Product Approved Copy -->
                        <div class="form-group">
                            <label for="">Product Approved Copy</label>
                            <input type="file" name="product_approved_copy" class="form-control" placeholder="Upload Approved Product File">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
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
                    <h1 class="m-0">product Bills</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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

                        <th>Product Sl</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php

                $showproductbill = "SELECT * FROM product_data ORDER BY product_sl asc";
                $showproductbill_run = mysqli_query($conn, $showproductbill);

                //$i = 1;
                while ($showproductbilldata = mysqli_fetch_assoc($showproductbill_run)) {
                    $customdateformat = $showproductbilldata['product_bil_date'];
                ?>
                    <tbody>

                        <tr>
                            <td>
                                <a href="product-single.php?product_id=<?php echo $showproductbilldata["product_id"]; ?>">
                                    <?php echo $showproductbilldata['product_id']; ?>
                                </a>
                            </td>
                            <td><?php echo $showproductbilldata['product_code']; ?></td>
                            <td><?php echo $showproductbilldata['product_name']; ?></td>
                            <td><?php echo $showproductbilldata['product_type']; ?></td>

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
                    .column(3, {
                        search: 'applied'
                    })
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

        api.rows({
            search: 'applied'
        }).every(function() {
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