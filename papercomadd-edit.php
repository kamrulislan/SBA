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
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Paper bill edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Edit Paper Bill</h2>
            <a href="paperbilladd.php" class="btn btn-danger float-right">Back</a>
        </div>
        <!-- /.card-header -->

        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">

                    <form action="code.php" method="POST">

                        <?php
                        if (isset($_GET['paper_bil_id'])) {
                            $paper_bil_id = $_GET['paper_bil_id'];
                            $query = "SELECT * FROM paper_bill WHERE paper_bil_id='$paper_bil_id' LIMIT 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                        ?>
                                    <!-- Bill ID -->
                                    <input type="hidden" name="paper_bil_id" value="<?php echo $row['paper_bil_id'] ?>">

                                    <!-- Bill Number -->
                                    <div class="form-group">
                                        <label for="">Bill Number</label>
                                        <input type="text" name="paper_bil_num" value="<?php echo $row['paper_bil_num'] ?>" class="form-control" placeholder="Bill Number">
                                    </div>


                                    <!-- Date -->
                                    <div class="form-group">
                                        <label>Bill Issue Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="paper_bil_date" value="<?php echo $row['paper_bil_date'] ?>" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
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
                                        <label for="">Paper Bill Amount</label>
                                        <input type="text" name="paper_bil_amount" class="form-control" placeholder="Paper Bill Amount" value="<?php echo $row['paper_bil_amount'] ?>">
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

                            <button type="submit" name="updatepaperbilnumber" class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>




<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>