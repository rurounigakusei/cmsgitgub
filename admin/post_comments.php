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
                        Comments Related
                        <small>Author</small>
                    </h1>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response To</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Hold</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM comments WHERE comment_post_id=" . mysqli_real_escape_string($connection, $_GET['id']);
                            $comment_related = mysqli_query($connection, $query);
                            //PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
                            while ($row = mysqli_fetch_assoc($comment_related)) {
                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_content = substr($row['comment_content'], 0, 100);
                                $comment_email = $row['comment_email'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];

                                echo "<tr>";
                                echo "<td>$comment_id</td>";
                                echo "<td>$comment_author</td>";
                                echo "<td>$comment_content</td>";
                                echo "<td>$comment_email</td>";
                                echo "<td>$comment_status</td>";

                                //lesson 132. Relating Comments to posts
                                $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
                                $comment_post_id = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($comment_post_id)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];


                                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                }
                                echo $post_id;
                                echo "<td>$comment_date</td>";
                                echo "<td><a href ='comments.php?approve=$comment_id'>Approve</a></td>";
                                echo "<td><a href ='comments.php?hold=$comment_id'>Hold</a></td>";
                                echo "<td><a href ='post_comments.php?delete=$comment_id&id=" . $_GET['id'] . "'>Delete</a></td>";
                                echo "</tr>";
                            }

                            ?>
                        </tbody>
                    </table>

                    <?php
                    if (isset($_GET['approve'])) {
                        $approve_id = $_GET['approve'];

                        $approve_query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id =$approve_id";
                        $approve_query = mysqli_query($connection, $approve_query);

                        if (isset($approve_query)) {
                            header("Location: comments.php");
                        } else {
                            confirm($approve_query);
                        }
                    }

                    if (isset($_GET['hold'])) {
                        $hold_id = $_GET['hold'];

                        $hold_query = "UPDATE comments SET comment_status = 'Hold' WHERE comment_id =$hold_id";
                        $hold_query = mysqli_query($connection, $hold_query);

                        if (isset($hold_query)) {
                            header("Location: comments.php");
                        } else {
                            confirm($hold_query);
                        }
                    }

                    if (isset($_GET['delete'])) {
                        $delete_id = $_GET['delete'];

                        $query = "DELETE FROM comments WHERE comment_id = {$delete_id}";
                        $delete_query = mysqli_query($connection, $query);

                        if (isset($delete_query)) {
                            header("Location: post_comments.php?id=" . $_GET['id'] . "");
                        } else {
                            confirm($delete_query);
                        }
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