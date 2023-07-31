<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php


    ?>

    <!-- testing connection -->
    <?php
    /** if ($connection) { echo "conn success";}  */
    ?>

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading/ body -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome :
                        <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php
                                        // $query = "SELECT * FROM posts";
                                        // $totalposts = mysqli_query($connection, $query);
                                        // refactored to functions, remove uncessary repetitive sql code
                                        $count_posts = recordCount('posts');
                                        echo $count_posts;
                                        ?>

                                    </div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php
                                        $total_comments = mysqli_query($connection, "SELECT * FROM comments");
                                        echo $count_comments = mysqli_num_rows($total_comments);
                                        ?>

                                    </div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php
                                        $total_users = mysqli_query($connection, "SELECT * FROM users");
                                        echo $count_users = mysqli_num_rows($total_users);
                                        ?>
                                    </div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'>
                                        <?php
                                        $total_categories = mysqli_query($connection, "SELECT * FROM categories");
                                        echo $count_categories = mysqli_num_rows($total_categories);
                                        ?>
                                    </div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <?php
            $total_published_posts = mysqli_query($connection, "SELECT * FROM posts WHERE post_status = 'Published'");
            $count_published_posts = mysqli_num_rows($total_published_posts);

            $total_draft_posts = mysqli_query($connection, "SELECT * FROM posts WHERE post_status = 'Draft'");
            $count_draft_posts = mysqli_num_rows($total_draft_posts);

            $total_pending_comments = mysqli_query($connection, "SELECT * FROM comments WHERE comment_status = 'hold'");
            $count_pending_comments = mysqli_num_rows($total_pending_comments);

            $total_subscribers = mysqli_query($connection, "SELECT * FROM users WHERE user_role = 'member'");
            $count_subscribers = mysqli_num_rows($total_subscribers);

            ?>
            <div class="row">
                <!-- from google.chart -->
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php
                            $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users',  'Subscribers', 'Categories'];
                            $element_count = [$count_posts, $count_published_posts, $count_draft_posts, $count_comments, $count_pending_comments, $count_users, $count_subscribers, $count_categories];
                            // above were 8 items

                            // buat loop dengan logic : kalau i = 0, lakukan untuk 5 kolom terkait, i +1
                            for ($i = 0; $i < 8; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            } // $x is just another variable, but to shortened, you are allowed to pict just one alplabets
                            ?>
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </body>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"; ?>