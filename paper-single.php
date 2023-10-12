<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');

$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";

/*
$host = "localhost";
$username = "root";
$password = "mysql";
$database = "u974388227_agenceywork";
*/

// Connection

$conn = mysqli_connect($host, $username, $password, $database);
$paper_bil_id = $_GET['paper_bil_id'];
$paperdetails = "select * from paper_bills_view where paper_bil_id='$paper_bil_id'";

$paperdetails_data = mysqli_query($conn, $paperdetails);

$paperdetails_result = mysqli_fetch_assoc($paperdetails_data);



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Paper Bills</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://bestprintersltd.com/admin/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="https://bestprintersltd.com/admin/paperbilladd.php">Add Paper Bill </a></li>
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
    
    <div class="card-header">
        <h2 class="card-title"><?php echo $paperdetails_result["paper_com_name"]. $paperdetails_result["paper_bil_num"]; ?></h2>
        <a href="https://bestprintersltd.com/admin/paperbilladd.php" class="btn btn-danger float-right">Back</a>
    </div>
    <div class="card-body">
                <div class="row">
                    
                    <div class="col-12 col-sm-12">
                        
                
                        <table class="table table-striped">

                          <tbody>
                            <tr>
                              <td scope="row">Paper Bill Date:</td>
                              <th><?php echo $paperdetails_result["paper_bil_date"]; ?></th>
                              
                            </tr>
                            <tr>
                              <td>Bill Number</td>
                              <th scope="row"><?php echo $paperdetails_result["paper_bil_num"]; ?></th>
                            </tr>
                            <tr>
                              <td>Paper Bill Amount:</td>
                              <th scope="row"><?php echo number_format($paperdetails_result["paper_bil_amount"]); ?></th>
                              </tr>
                          </tbody>
                        </table>

                    </div>
                    
                    
                    <div class="row">
                
                        <div class="col-12 col-sm-12">
                            <img src="pic/<?php echo $paperdetails_result["paper_img"]; ?>" class="img-fluid" alt="">
                        </div>
            
                    </div>

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