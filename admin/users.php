<?php include "includes/admin_header.php"; ?>

<?php
//watch below code, is a combination of if and functions, and global variable $_SESSION
if (!is_admin($_SESSION['username'])) {
    //read : if function is_admin returning false, then do command header below
    header("Location:index.php");
}

?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading/ body -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                        <small>User List</small>
                    </h1>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_user';
                            include "includes/add_user.php";
                            break;

                        case 'edit_user';
                            include "includes/edit_user.php";
                            break;

                        default;
                            include "includes/view_all_users.php";
                            break;
                    }

                    ?>
                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"; ?>