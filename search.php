<!--Header-->
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php
            if (isset($_POST['submit'])) {
                $searchresult = $_POST['search'];
            }

            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$searchresult%'";
            $search_query = mysqli_query($connection, $query);
            if (!$search_query) {
                die("Query Failed" . mysqli_error($connection));
            }
            $countresult = mysqli_num_rows($search_query);
            if ($countresult == 0) {
                echo "<h5>NO CONTENTS MATCHED WITH KEYWORDS</h5>";
            } else {
                while ($row = mysqli_fetch_assoc($search_query)) {
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
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>

                    <!-- } dibawah menjadi kunci akhir loop ketika query berhasil -->
            <?php }
            } ?>



            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Prev</a>
                </li>
                <li class="next">
                    <a href="#">Next &rarr;</a>
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