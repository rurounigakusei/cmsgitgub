<!--Header-->
<!-- Navigation -->
<!-- get support from lectures : support@edwindiaz.com : email -->
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
            $per_page = 5;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }
            if ($page == "" || $page == 1) {
                $page_down = 0;
            } else {
                $page_down = ($page * $per_page) - $per_page;
            }
            ?>


            <?php
            $total_posted_count_query = "SELECT * FROM posts WHERE post_status='Published'";
            $total_posted_count_query = mysqli_query($connection, $total_posted_count_query);
            $total_post_count = mysqli_num_rows($total_posted_count_query);
            // echo $total_post_count;

            $total_page = ceil($total_post_count / $per_page); //ceiling function to roundup

            $query = "SELECT * FROM posts WHERE post_status = 'Published' LIMIT $page_down,$per_page ";
            // limit logic, LIMIT (start from, show maximum xx items)
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
                        <a href="post.php?p_id=<?php echo $post_id; ?> "><?php echo $post_id . ' - ' . $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_post.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <a href="post.php?p_id=<?php echo $post_id; ?> ">
                        <img class="img-responsive" width="50%" height="50%" src="images/<?php echo $post_image; ?>" alt="">
                    </a>
                    <br>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?> ">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    <!-- } dibawah menjadi kunci akhir loop ketika query berhasil -->
            <?php }
            } ?><!-- } tambahan curly brackets untuk membuat aksi tetap dalam kondisi dari lessn 138 -->

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <?php
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 0;
                    }
                    ?>
                    <?php
                    $prev_page = $page - 1;
                    $next_page = $page + 1;
                    ?>

                    <?php
                    if ($page > 1 || $page = null) {
                        echo "<a href='index.php?page=1'> First Page</a>";
                        echo "<a href='index.php?page=$prev_page'>&larr; Previous</a>";
                    }
                    ?>

                </li>
                <?php
                //start logic function
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $page) {
                        echo "<li><a class='active_link' href='index.php?page={$i}'>$i</a></li>";
                    } else {
                        echo "<li><a href='index.php?page={$i}'>$i</a></li>";
                    }
                }
                ?>
                <li class="next">
                    <?php
                    if ($page < $total_page || $page = null) {
                        echo "<a href='index.php?page=$next_page'>&rarr; Next</a>";
                        echo "<a href='index.php?page=$total_page'>Last Page</a>";
                    }
                    ?>


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