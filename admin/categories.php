<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading/ body -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin Page
                        <small>Author</small>
                    </h1>
                </div>
                <div class="col-lg-6">
                    <!-- check functions.php files to understand below function -->
                    <?php create_categories(); ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Add Categories</label>
                            <input type="text" class="form-control" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit">
                        </div>
                    </form>

                    <?php
                    //EXAMPLE OF Query Using Include
                    if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];
                        include "includes/update_categories.php";
                    }

                    ?>
                </div>

                <div class="col-lg-6">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- check functions.php files to understand below function -->
                            <?php FindAllCategories(); ?>
                            <!-- check functions.php files to understand below function as result of refactoring code -->
                            <?php DeleteCategories(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"; ?>