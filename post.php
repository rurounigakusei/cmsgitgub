<!--Header-->
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<?php include "admin/functions.php"; ?>
<?php session_start(); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {
                $filter_post_id = $_GET['p_id'];
                //}removed to below while function, to create loop do some query everytime $_GET[p_id] works

                //perform function loop to increment $_GET['p_id] works
                $view_count_query = "UPDATE posts SET post_views_count = post_views_count +1 WHERE post_id=$filter_post_id";
                $view_count_query .= mysqli_query($connection, $view_count_query);
                if (!$view_count_query) {
                    die("query failed" . mysqli_error($connection));
                }


                $query = "SELECT * FROM posts WHERE post_id = $filter_post_id ";
                $show_all_post_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($show_all_post_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    //fungsi while akan bekerja berulang, maka letak perintah jika query berhasil disini
            ?>

                    <!-- //kolom html dibawah akan menampilkan hasil query sesuai perintah -->
                    <h1 class="page-header">
                        Page Heading
                        <small>Primary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href=""><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <?php
                    if (isset($_SESSION['user_role'])) {
                        $must_admin = $_SESSION['user_role'];
                        if ($must_admin = 'Admin') {
                            echo "<a class='btn btn-warning' href=Admin/posts.php?source=edit_posts&p_id={$filter_post_id}>Edit Post
                            </a>";
                        }
                    }
                    ?>
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <hr>
                    <!-- } dibawah menjadi kunci akhir loop ketika query berhasil -->
            <?php }
                // } which moved from above to create loop everytime $_GET['p_id] works
            } else {
                header("location: index.php");
            }
            ?>


            <!-- lesson 122 -->
            <!-- Blog Comments -->

            <?php
            if (isset($_POST['create_comment'])) {

                $comment_post_id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                    $query .= "VALUES ($comment_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Hold',now())";

                    $create_comment = mysqli_query($connection, $query);

                    confirm($create_comment);
                    //$query to plus 1 comment when ever comment made, and after section 27, is not used any longer
                    // $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    // $query .= "WHERE post_id = $filter_post_id";
                    // $update_comment_count = mysqli_query($connection, $query);

                    // try to use another count method using =SELECT COUNT(Column_Name) FROM Table_Name WHERE [Condition]; in view mode without using database
                } else {
                    echo "<script>
                    alert ('Comment fields cannot be empty') 
                    </script";
                }

                //redirect(location: "/cms/post.php?p_id=$comment_post_id");
            }

            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form"><!--leave form action blank to stay in same page-->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="comment_author"></input>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="comment_email"></input>
                    </div>
                    <div class="form-group">
                        <label>Comments</label>
                        <input id="" type="text" class="form-control" name="comment_content"></input>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->
            <?php
            $query = "SELECT * FROM comments WHERE comment_post_id= {$filter_post_id} ";
            $query .= "AND comment_status ='Approved' ";
            $query .= "ORDER BY comment_id DESC";
            $approved_comments = mysqli_query($connection, $query);

            confirm($approved_comments);

            while ($row = mysqli_fetch_array($approved_comments)) {
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_date = $row['comment_date'];
            ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

            <?php } ?>

            <!-- Comment -->



            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        include "includes/sidebar.php";
        ?>

    </div>
    <!-- /.row -->

    <hr>
    <!--Footer-->
    <?php
    include "includes/footer.php";
    ?>