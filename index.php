<?php

include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');
include('config/dbcon.php');
include('urldefine.php');
include('due_bill_all.php');


if (isset($_SESSION['loginuser'])) {
    echo ("<script>location.href='login.php';</script>");
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="col-md-12">
                <?php include('message.php'); ?>
            </div>


            <div class="row">
                <div class="col-lg-12 col-sm-12	">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Balance</h3>

                            <h3><?php echo number_format($balance_total) ?></h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>

                <!-- ./col -->
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center font-weight-bold">DUE Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

             <?php
               
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Query to get the summary data
                $sql = "SELECT com_name, SUM(bil_amount) AS due_amount FROM sale_statements WHERE paid_bill_date IS NULL GROUP BY com_name";
                
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // Table header
                    echo "<table class='table table-striped'><tr><th>Company Name</th><th>Due amount</th></tr>";
                    
                    $total_due_amount = 0;
                    
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $com_name = $row["com_name"];
                        $due_amount = $row["due_amount"];
                        $total_due_amount += $due_amount;
                    
                        // Table row
                        echo "<tr><td>".$com_name."</td><td><a href='due_bill.php?com_name=".$com_name."'>".number_format($due_amount)."</a></td></tr>";

                    }
                    
                    // Table footer with total due amount
                    echo "<tr><td><strong>Total DUE (Accounts Receivable)</strong></td><td><strong>".number_format($total_due_amount)."</strong></td></tr></table>";
                    
                } else {
                    echo "0 results";
                }
                
                $conn->close();
                ?>






                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

                <!-- ./col -->
                <div class="col-lg-6 col-sm-12">
                    <!-- /.card -->

                    <div class="card">
                    
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                     
                            
                                        
            
     


                            <?php

                            include('config/dbcon.php');
                            //query to get the monthly total bil_amount
                            $sql = "SELECT DATE_FORMAT(bil_date, '%M-%Y') AS month, SUM(bil_amount) AS total_amount FROM sale_statements GROUP BY month ORDER BY bil_date";

                            //execute the query
                            $result = $conn->query($sql);

                            //display the results in an HTML table
                            if ($result->num_rows > 0) {



                                echo "<table class='table table-striped'>
                                
                                            <tr>
                                                <th colspan='2' class='text-center'>Sale Statement</th>
                                            </tr>
                                
                                            <tr>
												<th>Month</th>
												<th>Amount</th>
											</tr>";
											
											$total_sale = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $filterdata = $row['total_amount'];
                                    echo "<tr>
                                            <td>" . $row["month"] . "</td>
                                            
                                            <td>" . number_format($row["total_amount"]) . "</td>
                                            
                                        </tr>";
                                        $total_sale = $row["total_amount"] + $total_sale;
                                
                                        
                        
                                        
                                }
                               
                                
                            echo "<tr>
                                    <td><b>Total Sale</b></td>
                                    <td><b>".number_format($total_sale)."</b></td>
                                </tr>";
                                
                                
                                
                                echo "</table>";
                            } else {
                                echo "No results found.";
                            }

                            //close the database connection
                            $conn->close();


                            ?>

                        </div>












                        <div class="card-body p-0">









                        </div>












                        <!-- /.card-body -->
                    </div>

                </div>

                <!-- ./col -->
                <div class="col-lg-6 col-sm-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center font-weight-bold">Lamination Bills</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">





                    <?php
                
                    include('config/dbcon.php');
                
                    // Query to get the summary data
                    $sql_lam = "SELECT 	lam_com_name, SUM(lam_bil_amount) AS lam_due_amount FROM lamination_bills_view WHERE lam_paid_bill_date	 IS NULL GROUP BY lam_com_name"; 
                    
                    $result_lam = mysqli_query($conn, $sql_lam);
                    
                    if (mysqli_num_rows($result_lam) > 0) {
                        // Table header
                        echo "<table class='table table-striped'><tr><th>Company Name</th><th>Due amount</th></tr>";
                        
                        $total_lam_due_amount = 0;
                        
                        // Output data of each row
                        while($lam_row = $result_lam->fetch_assoc()) {
                            $lam_com_name = $lam_row["lam_com_name"];
                            $lam_due_amount	 = $lam_row["lam_due_amount"];
                            $total_lam_due_amount += $lam_due_amount;
                        
                            // Table row
                            echo "<tr><td>".$lam_com_name."</td><td><a href='due_lam_bill.php?lam_com_name=".$lam_com_name."'>".number_format($lam_due_amount)."</a></td></tr>";

                        }
                        
                        // Table footer with total due amount
                        echo "<tr><td><strong>Total DUE (Accounts Receivable)</strong></td><td><strong>".number_format($total_lam_due_amount)."</strong></td></tr></table>";
                        
                    } else {
                        echo "0 results";
                    }
                    
                    $conn->close();
                    ?>
                
                
        

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->


                <div class="col-lg-6 col-sm-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center font-weight-bold">PAPER DUE</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">





                    <?php
                
                    include('config/dbcon.php');
                
                    // Query to get the summary data
                    $sql_paper = "SELECT paper_com_name, SUM(paper_bil_amount) AS paper_due_amount FROM paper_bills_view WHERE paper_paid_bill_date	 IS NULL GROUP BY paper_com_name"; 
                    
                    $result_paper = mysqli_query($conn, $sql_paper);
                    
                    if (mysqli_num_rows($result_paper) > 0) {
                        // Table header
                        echo "<table class='table table-striped'><tr><th>Company Name</th><th>Due amount</th></tr>";
                        
                        $total_paper_due_amount = 0;
                        
                        // Output data of each row
                        while($paper_row = $result_paper->fetch_assoc()) {
                            $paper_com_name = $paper_row["paper_com_name"];
                            $paper_due_amount	 = $paper_row["paper_due_amount"];
                            $total_paper_due_amount += $paper_due_amount;
                        
                            // Table row
                            echo "<tr><td>".$paper_com_name."</td><td><a href='paper_due_bill.php?paper_com_name=".$paper_com_name."'>".number_format($paper_due_amount)."</a></td></tr>";

                        }
                        
                        // Table footer with total due amount
                        echo "<tr><td><strong>Total DUE (Accounts Payable)</strong></td><td><strong>".number_format($total_paper_due_amount)."</strong></td></tr></table>";
                        
                    } else {
                        echo "0 results";
                    }
                    
                    $conn->close();
                    ?>
                
                
        

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- ./col -->



                <div class="col-lg-6 col-sm-12">
                    <!-- /.card -->

                    
                </div>






                <!-- ./col -->
            </div>
            
            
            
            
            
            
            

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php include('inlclude/script.php'); ?>
<?php include('inlclude/footer.php'); ?>