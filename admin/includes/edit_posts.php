<?php
if (isset($_GET['p_id'])) {
    $edit_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
$editing_posts = mysqli_query($connection, $query);

//PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
while ($row = mysqli_fetch_assoc($editing_posts)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
}

if (isset($_POST['update_post'])) {
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
        $edit_postImage = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($edit_postImage)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id}";

    $update_post = mysqli_query($connection, $query);
    confirm($update_post);
    echo "<p class='alert alert-success' 'bg-primary'>Post has been updated . <a href='../post.php?p_id={$edit_post_id}'>View Post</a></p>";
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="title">Post Category Id</label><br>

        <select name="post_category" id="post_category">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            confirm($select_categories);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>

        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="title">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control">
        <select name="post_status" id="">
            <option value='<?php echo $post_status; ?>'>Select Status :</option>
            <option value='Draft'>Draft</option>
            <option value='Published'>Published</option>

        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Image</label><br>
        <img width="150" src="../images/<?php echo $post_image; ?>">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="summernote" cols="30" rows="10">
        <?php echo $post_content; ?>
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-warning" type="submit" name="update_post" Value="Update Post">
    </div>

</form>