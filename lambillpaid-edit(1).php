<?php
																																																																																																																																							
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');

?>

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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lamination Bill Statement</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Write Laminatin Paid Bill Date</h2>
            <a href="lambillpaid.php" class="btn btn-danger float-right">Back</a>
        </div>
        <!-- /.card-header -->

        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <form action="code.php" method="POST">

                        <?php
                        if (isset($_GET['lam_bil_id'])) {
                            $lam_bil_id = $_GET['lam_bil_id'];
                            $lam_query = "SELECT * FROM lamination_bills_view WHERE lam_bil_id='$lam_bil_id' LIMIT 1";
                            $lam_query_run = mysqli_query($conn, $lam_query);

                            if (mysqli_num_rows($lam_query_run) > 0) {
                                foreach ($lam_query_run as $row) {
                        ?>
                        <!-- Bill ID -->
                        <input type="hidden" name="lam_bil_id" value="<?php echo $row['lam_bil_id'] ?> ">

                        <!-- Bill Number -->
                        <div class="form-group">
                            <label for="">Lamination Bill Number</label>
                            <input type="text" disabled id="" name="lam_bil_num"
                                value="<?php echo $row['lam_bil_num'] ?>" class="form-control"
                                placeholder="Bill Number">
                        </div>


                        <!-- Date -->
                        <div class="form-group">
                            <label>Lamination Bill Issue Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control datetimepicker-input" disabled
                                    data-target="#reservationdate" name="bil_date"
                                    value="<?php echo $row['lam_bil_date'] ?>" />




                            </div>
                        </div>


                        <!-- Company Name -->
                        <div class="form-group">

                            <label for="">Lamination Company Name</label>

                            <select name="lam_com_id" id="" disabled class="form-control">
                                <?php
                                            $bil_show = "SELECT * FROM lamination_bills_view";
                                            $bilshow_run = mysqli_query($conn, $bil_show);
                                            while ($bilshow_data = mysqli_fetch_assoc($bilshow_run)) {
                                            ?>
                                <option value="<?php echo $bilshow_data['lam_com_id'] ?>">
                                    <?php echo $bilshow_data['lam_com_name'] ?></option>

                                <?php
                                            }
                                            ?>

                            </select>


                        </div>

                        <!-- Bill Amount -->
                        <div class="form-group">
                            <label for="">Lamination Bill Amount</label>
                            <input type="text" disabled name="lam_bil_amount" class="form-control"
                                placeholder="Bill Amount" value="<?php echo $row['lam_bil_amount'] ?>">
                        </div>

                        <!-- Paid bill Date -->
                        <div class="form-group">
                            <label>Lamination Bill Paid Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" name="lam_paid_bill_date" class="form-control" />

                            </div>
                        </div>
                        -->
                        
                        
                        <div class="form-group">
    <label>Partial Bill Payments</label>
    <div id="payment_entries">
        <!-- Payment Entry Template -->
        <div class="payment-entry">
            <div class="input-group date" data-target-input="nearest">
                <input type="date" name="paid_dates[]" class="form-control" />
            </div>
            <input type="number" name="paid_amounts[]" class="form-control" placeholder="Paid Amount" />
            <button type="button" class="btn btn-danger btn-sm btn-remove-payment">Remove</button>
        </div>
    </div>
    <button type="button" id="btn-add-payment" class="btn btn-success btn-sm mt-2">Add Payment Entry</button>
</div>

                        
                        
                        
                        
                        
                        


                        <?php
                                }
                            } else {
                                echo "<h4>No Record Found!</h4>";
                            }
                        }
                        ?>


                        <div class="modal-body">


                        </div>
                        <div class="modal-footer">

                            <button type="submit" name="updatepaidlambilnumber"
                                class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btnAddPayment = document.getElementById("btn-add-payment");
        const paymentEntries = document.getElementById("payment_entries");

        btnAddPayment.addEventListener("click", function () {
            const paymentEntryTemplate = `
            <div class="payment-entry">
                <div class="input-group date" data-target-input="nearest">
                    <input type="date" name="paid_dates[]" class="form-control" />
                </div>
                <input type="number" name="paid_amounts[]" class="form-control" placeholder="Paid Amount" />
                <button type="button" class="btn btn-danger btn-sm btn-remove-payment">Remove</button>
            </div>
            `;
            paymentEntries.insertAdjacentHTML("beforeend", paymentEntryTemplate);

            const removeButtons = document.querySelectorAll(".btn-remove-payment");
            removeButtons.forEach((removeButton) => {
                removeButton.addEventListener("click", function () {
                    this.closest(".payment-entry").remove();
                });
            });
        });
    });
</script>


<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>