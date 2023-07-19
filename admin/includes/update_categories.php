<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Update Categories</label>
        <?php

        //SELECT ALL DATA
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $show_selected_categories = mysqli_query($connection, $query);

            //PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
            while ($row = mysqli_fetch_assoc($show_selected_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="cat_title">


        <?php }
        } ?>

        <?php
        if (isset($_POST['update_category'])) {
            $cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id ={$cat_id} ";
            $update_categories = mysqli_query($connection, $query);
            if (!$update_categories) {
                die("Could not update categories" . mysqli_error($connection));
            }
        }

        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-success" type="Submit" name="update_category" value="OK">
    </div>
</form>