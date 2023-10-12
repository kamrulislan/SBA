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
$lam_bil_id = $_GET['lam_bil_id'];
$lamdetails = "select * from lamination_bills_view where lam_bil_id='$lam_bil_id'";

$lamdetails_data = mysqli_query($conn, $lamdetails);

$lamdetails_result = mysqli_fetch_assoc($lamdetails_data);



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://bestprintersltd.com/admin/">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $lamdetails_result["lam_bil_num"]; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <h2 class="card-title"><?php echo $lamdetails_result["lam_com_name"]. $lamdetails_result["lam_bil_num"]; ?></h2>
                <a href="https://bestprintersltd.com/admin/lambilladd.php" class="btn btn-danger float-right">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-12 col-sm-12">
                        
                
                        <table class="table table-striped">

                          <tbody>
                            <tr>
                              <td scope="row">Lamination Bill Date:</td>
                              <th><?php echo $lamdetails_result["lam_bil_date"]; ?></th>
                              
                            </tr>
                            <tr>
                              <td>Bill Number</td>
                              <th scope="row"><?php echo $lamdetails_result["lam_bil_num"]; ?></th>
                            </tr>
                            <tr>
                              <td>Lamination Bill Amount:</td>
                              <th scope="row"><?php echo number_format($lamdetails_result["lam_bil_amount"]); ?></th>
                              </tr>
                          </tbody>
                        </table>

                    </div>
                    
                    
                    <div class="row">
                
                        <div class="col-12 col-sm-12">
                            <img src="pic/<?php echo $lamdetails_result["lam_img"]; ?>" class="img-fluid" alt="">
                        </div>
            
                    </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('inlclude/footer.php'); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

</body>

</html>