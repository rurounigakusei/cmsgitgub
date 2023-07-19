<!-- Blog Sidebar Widget Columns -->

<div class="col-md-4">
    <!-- login form -->

    <div class="well">
        <?php
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['firstname'];
            echo "<h4>Welcome {$username}</h4>";
            echo "<a href='admin/includes/logout.php'><i class='fa fa-fw fa-power-off'></i> Logout</a>";
        } else {
            echo
            "<h4>Login</h4>
            <form action='includes/login.php' method='post'>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Enter Username' name='username'>
            </div>
            <div class='input-group'>
                <input type='password' class='form-control' placeholder='Enter Password' name='password'>
                <span class='input-group-btn'>
                    <button class='btn btn-primary' type='submit' name='login'>Login</button>
                </span>
            </div>
        </form>";
        }
        ?>
    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control"> <!--input name define value-->
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit"> <!--button name define triggers-->
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Categories List -->
    <div class="well">

        <?php

        // $query = "SELECT * FROM categories LIMIT 3"; to limit result on 3 result
        $query = "SELECT * FROM categories";
        $show_all_categories_sidebar = mysqli_query($connection, $query);
        //cut while and put above line that we want to loop using query above
        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php while ($row = mysqli_fetch_assoc($show_all_categories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    } ?>
                    <!-- <li><a href="#">Category Name</a></li> -->
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well/ moved to partial files -->
    <?php include "widget.php"; ?>

</div>