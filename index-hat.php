<?php

include('inlclude/header.php');
include('inlclude/topbar.php');
include('config/dbcon.php');
include('urldefine.php');


if (isset($_SESSION['loginuser'])) {
    echo ("<script>location.href='login.php';</script>");
}


?>


<?php

$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";


// Connection

$conn = mysqli_connect($host, $username, $password, $database);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Query to get the summary of the exp_amount column based on the cat_name column
$sql = "SELECT cat_name, SUM(exp_amount) as total FROM exp_all GROUP BY cat_name";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
  // Output an HTML table with the summary of the exp_amount column based on the cat_name column
  echo "<table>";
  echo "<tr><th>Category Name</th><th>Total Expenses</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["cat_name"] . "</td>";
    echo "<td>" . $row["total"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

// Close the database connection
mysqli_close($conn);

?>


</table>


<?php
// Replace database credentials with your own
$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";


// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the sum of expenses based on month and category
$sql = "SELECT DATE_FORMAT(exp_date,'%M %Y') as month_year, cat_name, SUM(exp_amount) as total_expenses FROM exp_all GROUP BY DATE_FORMAT(exp_date,'%M %Y'), cat_name ORDER BY exp_date DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Month-wise Expenses Summary</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>
<body>
	<h2>Month-wise Expenses Summary</h2>
	<table>
		<tr>
			<th>Month-Year</th>
			<th>Expense Category</th>
			<th>Total Expenses</th>
		</tr>
		<?php
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>" . $row["month_year"] . "</td><td>" . $row["cat_name"] . "</td><td>" . $row["total_expenses"] . "</td></tr>";
		    }
		} else {
		    echo "<tr><td colspan='3'>No expenses found</td></tr>";
		}
		$conn->close();
		?>
	</table>
	
	
	<?php
//connect to the database
$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";

$conn = new mysqli($host, $username, $password, $database);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//query to get the monthly total bil_amount
$sql = "SELECT DATE_FORMAT(bil_date, '%M-%Y') AS month, SUM(bil_amount) AS total_amount FROM sale_statements GROUP BY month";

//execute the query
$result = $conn->query($sql);

//display the results in an HTML table
if ($result->num_rows > 0) {
    echo "<table><tr><th>Month</th><th>Total Amount</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["month"]."</td><td>".$row["total_amount"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

//close the database connection
$conn->close();
?>

<?php
//connect to the database
$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";

$conn = new mysqli($host, $username, $password, $database);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//query to get the monthly total bil_amount by com_name
$sql = "SELECT DATE_FORMAT(bil_date, '%M-%Y') AS month, com_name, SUM(bil_amount) AS total_amount FROM sale_statements GROUP BY month, com_name";

//execute the query
$result = $conn->query($sql);

//display the results in an HTML table
if ($result->num_rows > 0) {
    echo "<table><tr><th>Month</th><th>Company Name</th><th>Total Amount</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["month"]."</td><td>".$row["com_name"]."</td><td>".$row["total_amount"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

//close the database connection
$conn->close();
?>




<?php
// Connect to database
$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to calculate sum of bil_amount by com_name=BEACON with only NULL paid_bill_date
$sql = "SELECT com_name, SUM(bil_amount) AS total_amount
        FROM sale_statements
        WHERE com_name='BEACON' AND paid_bill_date IS NULL";

$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data in an HTML table
    echo "<table>";
    echo "<tr><th>Company Name</th><th>Total Bill Amount</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["com_name"] . "</td>";
        echo "<td>" . $row["total_amount"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// Close database connection
mysqli_close($conn);
?>


<?php
// Connect to database
$host = "localhost";
$username = "u974388227_agenceywork";
$password = "Agenceywork@20223";
$database = "u974388227_pos";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to calculate sum of bil_amount by com_name=BEACON with only NULL paid_bill_date
$sql = "SELECT com_name, SUM(bil_amount) AS total_amount
        FROM sale_statements
        WHERE com_name='ACI PHARMA' AND paid_bill_date IS NULL";

$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Output data in an HTML table
    echo "<table>";
    echo "<tr><th>Company Name</th><th>Total Bill Amount</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["com_name"] . "</td>";
        echo "<td>" . number_format($row["total_amount"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}









// Execute MySQL query to calculate sum of bil_amount by com_name=BEACON
$beacon_sales = "SELECT SUM(bil_amount) AS total_amountt FROM sale_statements WHERE com_name='BEACON'";

$beacon_sales_run = mysqli_query($conn, $beacon_sales);

// Fetch the result as an associative array
$beacon_sales_run_data = mysqli_fetch_assoc($beacon_sales_run);

// Print the total amount
echo "Total amount for BEACON: " . $beacon_sales_total_amount = $beacon_sales_run_data["total_amountt"];



// Execute MySQL query to calculate sum of bil_amount by com_name=BEACON and paid_bill_date=NULL
$beacon_null = "SELECT SUM(bil_amount) AS total_amount FROM sale_statements WHERE com_name='BEACON' AND paid_bill_date IS NULL";

$beacon_null_run = mysqli_query($conn, $beacon_null);

// Fetch the result as an associative array
$beacon_null_run_row = mysqli_fetch_assoc($beacon_null_run);

// Print the total amount
echo "Total amount for BEACON with NULL paid_bill_date: " . $beacon_due_total_amount = $beacon_null_run_row["total_amount"];

echo "<br>".$beacon_due_amount = $beacon_sales_total_amount -$beacon_due_total_amount;




// Close database connection
mysqli_close($conn);
?>












</body>
</html>
