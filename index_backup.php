<!--Header-->
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<?php session_start(); ?>

<!-- Page Content -->
<div class="container">
    <?php
    // somehow session cant be read in first page
    if (!isset($_SESSION['username'])) {
        echo "youre not login yet";
    }
    ?>

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            $query = "SELECT * FROM posts WHERE post_status = 'Published'";
            $show_all_post_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($show_all_post_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 300);
                $post_status = $row['post_status'];
                //fungsi while akan bekerja berulang, maka letak perintah jika query berhasil disini
                //lesson 138 - filter post based on status and post
                if ($post_status !== 'Published') {
                    echo "<h1 class= text-centre>Sorry, There Is No Post Yet</h1>";
                } else {
            ?>

                    <!-- //kolom html dibawah akan menampilkan hasil query sesuai perintah -->
                    <h1 class="page-header">
                        Page Heading
                        <small>Primary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?> "><?php echo $post_id . ' - ' .  $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?> ">
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?> ">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>




                    <!-- } dibawah menjadi kunci akhir loop ketika query berhasil -->
            <?php }
            } ?><!-- } tambahan curly brackets untuk membuat aksi tetap dalam kondisi dari lessn 138 -->

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