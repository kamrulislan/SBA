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
                        <li class="breadcrumb-item active">Bill Statement</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Write Paid Bill Date</h2>
            <a href="salebillpaid.php" class="btn btn-danger float-right">Back</a>
        </div>
        <!-- /.card-header -->

        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <form action="code.php" method="POST">

                        <?php
                        if (isset($_GET['bil_id'])) {
                            $bil_id = $_GET['bil_id'];
                            $query = "SELECT * FROM sales_bill WHERE bil_id='$bil_id' LIMIT 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                        <!-- Bill ID -->
                        <input type="hidden" name="bil_id" value="<?php echo $row['bil_id'] ?> ">

                        <!-- Bill Number -->
                        <div class="form-group">
                            <label for="">Bill Number</label>
                            <input type="text" disabled id="" name="bil_num" value="<?php echo $row['bil_num'] ?>"
                                class="form-control" placeholder="Bill Number">
                        </div>


                        <!-- Date -->
                        <div class="form-group">
                            <label>Bill Issue Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control datetimepicker-input" disabled
                                    data-target="#reservationdate" name="bil_date"
                                    value="<?php echo $row['bil_date'] ?>" />




                            </div>
                        </div>


                        <!-- Company Name -->
                        <div class="form-group">

                            <label for="">Company Name</label>

                            <select name="com_id" id="" disabled class="form-control">
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
                            <input type="text" disabled name="bil_amount" class="form-control" placeholder="Bill Amount"
                                value="<?php echo $row['bil_amount'] ?>">
                        </div>

                        <!-- Paid bill Date -->
                        <div class="form-group">
                            <label>Bill Paid Date</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" name="paid_bill_date" class="form-control" />

                            </div>
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

                            <button type="submit" name="updatepaidbilnumber"
                                class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>