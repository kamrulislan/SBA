<?php
session_start();
include("config/dbcon.php");





//check if email pre exist
if (isset($_POST['check_emailbtn'])) {
    $email = $_POST['email'];
    $checkemail = "SELECT email from users WHERE email = '$email'";
    $checkemail_run = mysqli_query($conn, $checkemail);
    if (mysqli_num_rows($checkemail_run) > 0) {
        echo "Email id already taken";
    } else {
        echo "It's available";
    }
}


//add new user
if (isset($_POST['adduser'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpasspassword = $_POST['confirmpasspassword'];

    if ($password == $confirmpasspassword) {
        $checkemail = "SELECT email from users WHERE email = '$email'";
        $checkemail_run = mysqli_query($conn, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
            $_SESSION['status'] = "Email is already taken";
            header("location: registered.php");
            exit;
        } else {

            $user_query = "INSERT INTO users (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
            $user_query_run = mysqli_query($conn, $user_query);

            if ($user_query_run) {
                $_SESSION['status'] = "User added successfully";
                header("location: registered.php");
            } else {
                $_SESSION['status'] = "User registered fail";
                header("location: registered.php");
            }
        }
    } else {
        $_SESSION['status'] = "Password & Confirm password doesn't matach";
        header("location: registered.php");
    }
}


//update user info

if (isset($_POST['updateuser'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $updatequery = "UPDATE users SET name='$name',phone='$phone', email='$email', password='$password' WHERE id='$user_id' ";
    $updatequery_run = mysqli_query($conn, $updatequery);

    if ($updatequery_run) {
        $_SESSION['status'] = "User updated successfully";
        header("location: registered.php");
    } else {
        $_SESSION['status'] = "User updating failed";
        header("location: registered.php");
    }
}


//add new Expense category
if (isset($_POST['addexpcat'])) {
    $cat_name = $_POST['cat_name'];



    $checkcatname = "SELECT cat_name from exp_cat WHERE cat_name = '$cat_name'";
    $checkcatname_run = mysqli_query($conn, $checkcatname);
    if (mysqli_num_rows($checkcatname_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Category name is already taken</p>";
        header("location: expenseadd.php");
        exit;
    } else {

        $expcat_query = "INSERT INTO exp_cat (cat_name) VALUES ('$cat_name')";
        $expcat_query_run = mysqli_query($conn, $expcat_query);

        if ($expcat_query_run) {
            $_SESSION['status'] = "Category added successfully";
            header("location: expenseadd.php");
        } else {
            $_SESSION['status'] = "Category registered fail";
            header("location: expenseadd.php");
        }
    }
}

//update expense category info

if (isset($_POST['updatexpcat'])) {
    $user_id = $_POST['user_id'];
    $cat_name = $_POST['cat_name'];


    $updatcatnameequery = "UPDATE exp_cat SET cat_name='$cat_name' WHERE id='$user_id' ";
    $updatcatnameequery_run = mysqli_query($conn, $updatcatnameequery);

    if ($updatcatnameequery_run) {
        $_SESSION['status'] = "Expense category updated successfully";
        header("location: expenseadd.php");
    } else {
        $_SESSION['status'] = "Expense category  updating failed";
        header("location: expenseadd.php");
    }
}



//update expense sub category info

if (isset($_POST['updatexpsubcat'])) {
    $subcat_id = $_POST['subcat_id'];
    $subcat_name = $_POST['subcat_name'];


    $updatsubcatnameequery = "UPDATE exp_subcat SET subcat_name='$subcat_name' WHERE subcat_id='$subcat_id' ";
    $updatsubcatnameequery_run = mysqli_query($conn, $updatsubcatnameequery);

    if ($updatsubcatnameequery_run) {
        $_SESSION['status'] = "Expense Sub-category updated successfully";
        header("location: expensesubcat.php");
    } else {
        $_SESSION['status'] = "Expense Sub-category  updating failed";
        header("location: expensesubcat.php");
    }
}


//add New Expense Sub-category
if (isset($_POST['addexpsubcat'])) {
    $id = $_POST['id'];
    $subcat_name = $_POST['subcat_name'];

    /*
//need to add category check first
    $checksubcatname = "SELECT subcat_name FROM exp_subcat WHERE subcat_name = '$subcat_name'";
    $checkcsubatname_run = mysqli_query($conn, $checksubcatname);
    if (mysqli_num_rows($checkcsubatname_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Sub-category name is already created</p>";
        header("location: expensesubcat.php");
        exit;
    } else {

        $expsubcat_query = "INSERT INTO exp_subcat (id,subcat_name) VALUES ('$id','$subcat_name')";
        $expsubcat_query_run = mysqli_query($conn, $expsubcat_query);

        if ($expsubcat_query_run) {
            $_SESSION['status'] = "Sub-category created successfully";
            header("location: expensesubcat.php");
        } else {
            $_SESSION['status'] = "Sub-category creation failed";
            header("location: expensesubcat.php");
        }
    }
    */
    $expsubcat_query = "INSERT INTO exp_subcat (id,subcat_name) VALUES ('$id','$subcat_name')";
    $expsubcat_query_run = mysqli_query($conn, $expsubcat_query);

    if ($expsubcat_query_run) {
        $_SESSION['status'] = "Sub-category created successfully";
        header("location: expensesubcat.php");
    } else {
        $_SESSION['status'] = "Sub-category creation failed";
        header("location: expensesubcat.php");
    }
}



//add Expense
if (isset($_POST['expense_save'])) {
    $exp_id = $_POST['exp_id'];
    $exp_date = $_POST['exp_date'];
    $exp_cat_id = $_POST['exp_cat_id'];
    $exp_subcat_id = $_POST['exp_subcat_id'];
    $exp_amount = $_POST['exp_amount'];



    $checkbilnum = "SELECT bil_num FROM sales_bill WHERE bil_num = '$bil_num'";
    $checkbilnum_run = mysqli_query($conn, $checkbilnum);
    if (mysqli_num_rows($checkbilnum_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Bill number is already added</p>";
        header("location: salebilladd.php");
        exit;
    } else {

        $expenseadd_query = "INSERT INTO expense (exp_date ,exp_cat_id ,exp_subcat_id ,exp_amount) VALUES ('$exp_date','$exp_cat_id','$exp_subcat_id','$exp_amount')";
        $expenseadd_query_run = mysqli_query($conn, $expenseadd_query);

        if ($expenseadd_query_run) {
            $_SESSION['status'] = "Expense created successfully";
            header("location: expensemainadd.php");
        } else {
            $_SESSION['status'] = "Expense creation failed";
            header("location: expensemainadd.php");
        }
    }
}





//add new Company name
if (isset($_POST['addcom'])) {
    $com_name = $_POST['com_name'];
    $com_type = $_POST['com_type'];



    $checkcomtname = "SELECT com_name from sales WHERE com_name = '$com_name'";
    $checkcomtname_run = mysqli_query($conn, $checkcomtname);
    if (mysqli_num_rows($checkcomtname_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Company name is already caeated</p>";
        header("location: salecomadd.php");
        exit;
    } else {

        $comadd_query = "INSERT INTO sales (com_name,com_type) VALUES ('$com_name','$com_type')";
        $comadd_query_run = mysqli_query($conn, $comadd_query);

        if ($comadd_query_run) {
            $_SESSION['status'] = "Company Name added successfully";
            header("location: salecomadd.php");
        } else {
            $_SESSION['status'] = "Company Name creation failed";
            header("location: salecomadd.php");
        }
    }
}


//update expense category info

if (isset($_POST['updatecomname'])) {
    $com_id = $_POST['com_id'];
    $com_name = $_POST['com_name'];


    $updatcomnameequery = "UPDATE sales SET com_name='$com_name' WHERE com_id='$com_id' ";
    $updatcomnameequery_run = mysqli_query($conn, $updatcomnameequery);

    if ($updatcomnameequery_run) {
        $_SESSION['status'] = "Company name updated successfully";
        header("location: salecomadd.php");
    } else {
        $_SESSION['status'] = "Company name  updating failed";
        header("location: salecomadd.php");
    }
}



//add New Bill number
if (isset($_POST['bil_save'])) {
    $com_id = $_POST['com_id'];
    $bil_num = $_POST['bil_num'];
    $bil_date = $_POST['bil_date'];
    $bil_com = $_POST['bil_com'];
    $bil_amount = $_POST['bil_amount'];
    $paid_bill_date = $_POST['paid_bill_date'];




    $checkbilnum = "SELECT bil_num FROM sales_bill WHERE bil_num = '$bil_num'";
    $checkbilnum_run = mysqli_query($conn, $checkbilnum);
    if (mysqli_num_rows($checkbilnum_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Bill number is already added</p>";
        header("location: salebilladd.php");
        exit;
    } else {

        //$salesbiladd_query = "INSERT INTO sales_bill (bil_num,bil_date,com_id,bil_amount,paid_bill_date) VALUES ('$bil_num','$bil_date','$com_id','$bil_amount','$paid_bill_date')";
        $salesbiladd_query = "INSERT INTO sales_bill (bil_num,bil_date,com_id,bil_amount) VALUES ('$bil_num','$bil_date','$com_id','$bil_amount')";
        $salesbiladd_query_run = mysqli_query($conn, $salesbiladd_query);

        if ($salesbiladd_query_run) {
            $_SESSION['status'] = "Bill number created successfully";
            header("location: salebilladd.php");
        } else {
            $_SESSION['status'] = "Bill number creation failed";
            header("location: salebilladd.php");
        }
    }
}



//update Bill number info

if (isset($_POST['updatebilnumber'])) {
    $bil_id = $_POST['bil_id'];
    $bil_num = $_POST['bil_num'];
    $bil_date = $_POST['bil_date'];
    $com_id = $_POST['com_id'];
    $bil_amount = $_POST['bil_amount'];




    $updatebillnumber = "UPDATE sales_bill SET bil_num='$bil_num',bil_date='$bil_date', com_id='$com_id', bil_amount='$bil_amount' WHERE bil_id='$bil_id' ";
    $updatebillnumber_run = mysqli_query($conn, $updatebillnumber);

    if ($updatebillnumber_run) {
        $_SESSION['status'] = "Bill statement updated successfully";
        header("location: salebilladd.php");
    } else {
        $_SESSION['status'] = "Bill statement  updating failed";
        header("location: salebilladd.php");
    }
}


//update Paid Bill number info


if (isset($_POST['updatepaidbilnumber'])) {
    $bil_id = $_POST['bil_id'];
    //$bil_num = $_POST['bil_num'];
    //$bil_date = $_POST['bil_date'];
    //$com_id = $_POST['com_id'];
    //$bil_amount = $_POST['bil_amount'];
    $paid_bill_date = $_POST['paid_bill_date'];


    $updatebillnumber = "UPDATE sales_bill SET paid_bill_date='$paid_bill_date' WHERE bil_id='$bil_id' ";
    $updatebillnumber_run = mysqli_query($conn, $updatebillnumber);

    if ($updatebillnumber_run) {
        $_SESSION['status'] = "Paid bill updated successfully";
        header("location: salebillpaid.php");
    } else {
        $_SESSION['status'] = "Paid bill updating failed";
        header("location: salebillpaid.php");
    }
}



//add new Lamination Company name
if (isset($_POST['lamaddcom'])) {
    $lam_com_name = $_POST['lam_com_name'];



    $checklamcomname = "SELECT lam_com_name from lamination_com WHERE lam_com_name = '$lam_com_name'";
    $checklamcomname_run = mysqli_query($conn, $checklamcomname);
    if (mysqli_num_rows($checklamcomname_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Company name is already caeated</p>";
        header("location: lamcomadd.php");
        exit;
    } else {

        $lamcomadd_query = "INSERT INTO lamination_com (lam_com_name) VALUES ('$lam_com_name')";
        $lamcomadd_query_run = mysqli_query($conn, $lamcomadd_query);

        if ($lamlamcomadd_query_run) {
            $_SESSION['status'] = "Lamination Company Name added successfully";
            header("location: lamcomadd.php");
        } else {
            $_SESSION['status'] = "Lamination Company Name creation failed";
            header("location: lamcomadd.php");
        }
    }
}


//add New Laminatin Bill number
if (isset($_POST['lam_bil_save'])) {
    $lam_com_id = $_POST['lam_com_id'];
    $lam_bil_num = $_POST['lam_bil_num'];
    $lam_bil_date = $_POST['lam_bil_date'];
    $lam_bil_com = $_POST['lam_bil_com'];
    $lam_bil_amount = $_POST['lam_bil_amount'];
    $lam_chcecked_bill_amount =  $_POST['lam_chcecked_bill_amount'];
    $lam_paid_bill_date = $_POST['lam_paid_bill_date'];


    $t_name = $_FILES['lam_img']['tmp_name'];
    $file_name = $_FILES['lam_img']['name'];


    move_uploaded_file($t_name, "pic/$file_name");




    $lamcheckbilnum = "SELECT lam_bil_num FROM lamination_bill WHERE lam_bil_num = '$lam_bil_num'";
    $lamcheckbilnum_run = mysqli_query($conn, $lamcheckbilnum);
    if (mysqli_num_rows($lamcheckbilnum_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Lamination Bill number is already added</p>";
        header("location: lambilladd.php");
        exit;
    } else {

        //$salesbiladd_query = "INSERT INTO sales_bill (bil_num,bil_date,com_id,bil_amount,paid_bill_date) VALUES ('$bil_num','$bil_date','$com_id','$bil_amount','$paid_bill_date')";
        $lambiladd_query = "INSERT INTO lamination_bill (lam_bil_num,lam_bil_date,lam_com_id,lam_bil_amount,lam_img) VALUES ('$lam_bil_num','$lam_bil_date','$lam_com_id','$lam_bil_amount','$file_name')";
        $lambiladd_query_run = mysqli_query($conn, $lambiladd_query);

        if ($lambiladd_query_run) {
            $_SESSION['status'] = "Lamination Bill number created successfully";
            header("location: lambilladd.php");
        } else {
            $_SESSION['status'] = "Lamination Bill number creation failed";
            header("location: lambilladd.php");
        }
    }
}


//add New Paper Bill number
if (isset($_POST['paper_bil_save'])) {
    $paper_com_id = $_POST['paper_com_id'];
    $paper_bil_num = $_POST['paper_bil_num'];
    $paper_bil_date = $_POST['paper_bil_date'];
    $paper_bil_com = $_POST['paper_bil_com'];
    $paper_bil_amount = $_POST['paper_bil_amount'];
    $paper_chcecked_bill_amount =  $_POST['paper_chcecked_bill_amount'];
    $paper_paid_bill_date = $_POST['paper_paid_bill_date'];


    $t_name = $_FILES['paper_img']['tmp_name'];
    $file_name = $_FILES['paper_img']['name'];


    move_uploaded_file($t_name, "pic/$file_name");




    $papercheckbilnum = "SELECT paper_bil_num FROM paper_bill WHERE paper_bil_num = '$paper_bil_num'";
    $papercheckbilnum_run = mysqli_query($conn, $papercheckbilnum);
    if (mysqli_num_rows($papercheckbilnum_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Paper Bill number is already added</p>";
        header("location: paperbilladd.php");
        exit;
    } else {

        //$salesbiladd_query = "INSERT INTO sales_bill (bil_num,bil_date,com_id,bil_amount,paid_bill_date) VALUES ('$bil_num','$bil_date','$com_id','$bil_amount','$paid_bill_date')";
        $paperbiladd_query = "INSERT INTO paper_bill (paper_bil_num,paper_bil_date,paper_com_id,paper_bil_amount,paper_img) VALUES ('$paper_bil_num','$paper_bil_date','$paper_com_id','$paper_bil_amount','$file_name')";
        $paperbiladd_query_run = mysqli_query($conn, $paperbiladd_query);

        if ($paperbiladd_query_run) {
            $_SESSION['status'] = "Paper Bill number created successfully";
            header("location: paperbilladd.php");
        } else {
            $_SESSION['status'] = "Paper Bill number creation failed";
            header("location: paperbilladd.php");
        }
    }
}



//add new Paper Company name
if (isset($_POST['paperaddcom'])) {
    $paper_com_name = $_POST['paper_com_name'];
    $paper_com_contact = $_POST['paper_com_contact'];



    $checkpapercomname = "SELECT paper_com_name from paper_com WHERE paper_com_name = '$paper_com_name'";
    $checkpapercomname_run = mysqli_query($conn, $checkpapercomname);
    if (mysqli_num_rows($checkpapercomname_run) > 0) {
        $_SESSION['status'] = "<p class='text-danger'>Company name is already caeated</p>";
        header("location: papercomadd.php");
        exit;
    } else {

        $papercomadd_query = "INSERT INTO paper_com (paper_com_name, paper_com_contact) VALUES ('$paper_com_name','$paper_com_contact')";
        $papercomadd_query_run = mysqli_query($conn, $papercomadd_query);

        if ($papercomadd_query_run) {
            $_SESSION['status'] = "Paper Company Name added successfully";
            header("location: papercomadd.php");
        } else {
            $_SESSION['status'] = "Paper Company Name creation failed";
            header("location: papercomadd.php");
        }
    }
}

//update Lamination Bill number info

if (isset($_POST['updatelambilnumber'])) {
    $lam_bil_id = $_POST['lam_bil_id'];
    $lam_bil_num = $_POST['lam_bil_num'];
    $lam_bil_date = $_POST['lam_bil_date'];
    $lam_com_id = $_POST['lam_com_id'];
    $lam_bil_amount = $_POST['lam_bil_amount'];




    $updatelambillnumber = "UPDATE lamination_bill SET lam_bil_num='$lam_bil_num',lam_bil_date='$lam_bil_date', lam_com_id='$lam_com_id', lam_bil_amount='$lam_bil_amount' WHERE lam_bil_id='$lam_bil_id' ";
    $updatelambillnumber_run = mysqli_query($conn, $updatelambillnumber);

    if ($updatelambillnumber_run) {
        $_SESSION['status'] = "Lamination Bill statement updated successfully";
        header("location: lambilladd.php");
    } else {
        $_SESSION['status'] = "Lamination Bill statement  updating failed";
        header("location: lambilladd.php");
    }
}


//update Lamination Paid Bill number info


if (isset($_POST['updatepaidlambilnumber'])) {
    $lam_bil_id = $_POST['lam_bil_id'];
    //$bil_num = $_POST['bil_num'];
    //$bil_date = $_POST['bil_date'];
    //$com_id = $_POST['com_id'];
    //$bil_amount = $_POST['bil_amount'];
    $lam_paid_bill_date = $_POST['lam_paid_bill_date'];
    $lam_chcecked_bill_amount = $_POST['lam_chcecked_bill_amount'];


    $updatelambillnumber = "UPDATE lamination_bill SET lam_paid_bill_date='$lam_paid_bill_date', lam_chcecked_bill_amount='$lam_chcecked_bill_amount' WHERE lam_bil_id='$lam_bil_id' ";
    $updatelambillnumber_run = mysqli_query($conn, $updatelambillnumber);

    if ($updatelambillnumber_run) {
        $_SESSION['status'] = "Lamination Paid bill updated successfully";
        header("location: lambillpaid.php");
    } else {
        $_SESSION['status'] = "Lamination Paid bill updating failed";
        header("location: lambillpaid.php");
    }
}



//update Paper Bill number info

if (isset($_POST['updatepaperbilnumber'])) {
    $paper_bil_id = $_POST['paper_bil_id'];
    $paper_bil_num = $_POST['paper_bil_num'];
    $paper_bil_date = $_POST['paper_bil_date'];
    $paper_com_id = $_POST['paper_com_id'];
    $paper_bil_amount = $_POST['paper_bil_amount'];




    $updatepaperbillnumber = "UPDATE paper_bill SET paper_bil_num='$paper_bil_num',paper_bil_date='$paper_bil_date', paper_com_id='$paper_com_id', paper_bil_amount='$paper_bil_amount' WHERE paper_bil_id='$paper_bil_id' ";
    $updatepaperbillnumber_run = mysqli_query($conn, $updatepaperbillnumber);

    if ($updatepaperbillnumber_run) {
        $_SESSION['status'] = "Paper Bill statement updated successfully";
        header("location: paperbilladd.php");
    } else {
        $_SESSION['status'] = "Paper Bill statement  updating failed";
        header("location: paperbilladd.php");
    }
}


//update Lamination Paid Bill number info


if (isset($_POST['updatepaidpaperbilnumber'])) {
    $paper_bil_id = $_POST['paper_bil_id'];
    //$bil_num = $_POST['bil_num'];
    //$bil_date = $_POST['bil_date'];
    //$com_id = $_POST['com_id'];
    //$bil_amount = $_POST['bil_amount'];
    $paper_paid_bill_date = $_POST['paper_paid_bill_date'];
    $paper_chcecked_bill_amount = $_POST['paper_chcecked_bill_amount'];


    $updatepaperbillnumber = "UPDATE paper_bill SET paper_paid_bill_date='$paper_paid_bill_date', paper_chcecked_bill_amount='$paper_chcecked_bill_amount' WHERE paper_bil_id='$paper_bil_id' ";
    $updatepaperbillnumber_run = mysqli_query($conn, $updatepaperbillnumber);

    if ($updatepaperbillnumber_run) {
        $_SESSION['status'] = "Paper Paid bill updated successfully";
        header("location: paperbillpaid.php");
    } else {
        $_SESSION['status'] = "Paper Paid bill updating failed";
        header("location: paperbillpaid.php");
    }
}


//add new product
// Check if the form has been submitted

// Check if the form has been submitted
if (isset($_POST['add_product'])) {
    // Database connection (Ensure you already have this connection established)
    // $conn = mysqli_connect("your_database_servername", "your_database_username", "your_database_password", "your_database_name");

    // File upload handling for product_design_file and product_approved_copy
    $product_design_file = '';
    $product_approved_copy = '';

    if (isset($_FILES["product_design_file"]) && $_FILES["product_design_file"]["error"] === UPLOAD_ERR_OK) {
        $product_design_file = $_FILES["product_design_file"]["name"];
        move_uploaded_file($_FILES["product_design_file"]["tmp_name"], "design_files/$product_design_file");
    }

    if (isset($_FILES["product_approved_copy"]) && $_FILES["product_approved_copy"]["error"] === UPLOAD_ERR_OK) {
        $product_approved_copy = $_FILES["product_approved_copy"]["name"];
        move_uploaded_file($_FILES["product_approved_copy"]["tmp_name"], "approved_files/$product_approved_copy");
    }


    // Prepare and bind the SQL statement to insert data into the table
    $stmt = $conn->prepare("INSERT INTO product_data (product_sl, com_name, product_type, product_code, product_name, 
    product_size_length, product_size_width, product_size_height, per_sheet, product_specification, lock_type, product_color, 
    lamination_type, product_design_file, product_approved_copy) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the form data to the statement
    $stmt->bind_param(
        "sssssssssssssss",
        $_POST["product_sl"],
        $_POST["com_name"],
        $_POST["product_type"],
        $_POST["product_code"],
        $_POST["product_name"],
        $_POST["product_size_length"],
        $_POST["product_size_width"],
        $_POST["product_size_height"],
        $_POST["per_sheet"],
        $_POST["product_specification"],
        $_POST["lock_type"],
        $_POST["product_color"],
        $_POST["lamination_type"],
        $product_design_file,
        $product_approved_copy
    );

    // Execute the SQL statement
    if ($stmt->execute()) {
        // Data successfully inserted
        echo "Product details added successfully.";
        $_SESSION['status'] = "Product created successfully";
        header("location: productadd.php");
    } else {
        // Error in inserting data
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
