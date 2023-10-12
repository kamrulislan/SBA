<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <!--User Modal -->
    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <span class="email_error text-danger ml-2"></span>
                            <input type="email" name="email" class="form-control email_id" placeholder="Email"
                                id="email">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        id="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmpass">Confirm Password</label>
                                    <input type="password" name="confirmpasspassword" class="form-control"
                                        placeholder="Confirm Password" id="confirmpass">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="adduser" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Delete Modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="delete_id" class="delete_user_id">
                        <p>Are you sure? you want to delete the data?</p>
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
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registered Users</li>
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


<?php
include('config/dbcon.php');

// SQL query to get the sum of expenses based on month and category
$sql = "SELECT DATE_FORMAT(exp_date,'%M %Y') as month_year, cat_name, SUM(exp_amount) as total_expenses FROM exp_all GROUP BY DATE_FORMAT(exp_date,'%M %Y'), cat_name ORDER BY cat_name ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Month-wise Expenses Summary</title>

</head>
<body>
	<h2>Month-wise Expenses Summary</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Month-Year</th>
			<th>Expense Category</th>
			<th>Total Expenses</th>
		</tr>
		<?php
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>" . $row["month_year"] . "</td><td>" . $row["cat_name"] . "</td><td>" . number_format($row["total_expenses"]) . "</td></tr>";
		    }
		} else {
		    echo "<tr><td colspan='3'>No expenses found</td></tr>";
		}
		$conn->close();
		?>
	</table>
</body>
</html>



<?php include('inlclude/script.php'); ?>

<script>
$(document).ready(function() {
    $('.email_id').keyup(function(e) {
        var email = $('.email_id').val();
        //console.log(email);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                'check_emailbtn': 1,
                'email': email,
            },
            success: function(response) {
                //console.log(response);
                $('.email_error').text(response);
            }
        });


    });
});
</script>

<script>
function confirmdel() {
    return confirm("Are you sure you want to Delete this user?");
}
</script>
<?php include('inlclude/footer.php'); ?>