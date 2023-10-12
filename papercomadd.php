<?php
session_start();
include('config/dbcon.php');
include('inlclude/header.php');
include('inlclude/topbar.php');
include('inlclude/sidebar.php');



?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!--Company name adding Modal -->
    <div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Paper Company name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Company Name</label>
                            <input type="text" name="paper_com_name" class="form-control" placeholder="Paper Company Name">
                        </div>

                        <div class="form-group">
                            <label for="">Company Contact</label>
                            <input type="text" name="paper_com_contact" class="form-control" placeholder="Paper Company Contact Info">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="paperaddcom" class="btn btn-primary">Save</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete company name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="code.php" method="POST">
                    <div class="modal-body">
                        <input type="text" name="delete_id" class="delete_user_id">
                        <p>Are you sure? you want to delete company name?</p>
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
                    <h1 class="m-0">Paper Bill</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Company Names</li>
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
            <h2 class="card-title">Paper Category</h2>
            <a href="#" data-toggle="modal" data-target="#addusermodal" class="btn btn-primary float-right">Add
                Paper Company name</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Company Name</th>
                        <th>Company Contact Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM paper_com";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {

                        foreach ($query_run as $row) {
                            //
                    ?>
                            <tr>

                                <td> <?php echo $row['paper_com_name']; ?></td>
                                <td> <?php echo $row['paper_com_contact']; ?></td>

                                <td>
                                    <!--
                                    <a href="lamcom-edit.php?com_id=<?php echo $row['lam_com_id']; ?>" class="btn btn-primary">Edit</a>
                                    
                            <a href="deleteuser.php?com_id=<?php echo $row['lam_com_id'] ?>"><input type="submit"
                                    class="btn btn-danger" value="Delete" onclick="return confirmdel()"></a>
                            -->
                                </td>
                            </tr>

                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td>No record found</td>
                        </tr>
                    <?php
                    }
                    ?>



                </tbody>
                <tfoot>
                    <tr>


                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>

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
        return confirm("Are you sure you want to Delete this Company name?");
    }
</script>
<?php include('inlclude/footer.php'); ?>