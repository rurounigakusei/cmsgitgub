<?php
if (isset($_POST['checboxArray'])) {
    foreach ($_POST['checboxArray'] as $checkboxitem) {
        $bulk_action = $_POST['bulk_action'];

        //for multiple possibility, use switch, instead of too many else if
        switch ($bulk_action) {
            case 'Published';
                $query = "UPDATE posts SET post_status = '{$bulk_action}' WHERE post_id = {$checkboxitem} ";
                $query_update_post_status = mysqli_query($connection, $query);
                confirm($query_update_post_status);
                break;

            case 'Draft';
                $query = "UPDATE posts SET post_status = '{$bulk_action}' WHERE post_id = {$checkboxitem} ";
                $query_update_post_status = mysqli_query($connection, $query);
                confirm($query_update_post_status);
                break;

            case 'Delete';
                $query = "DELETE FROM posts WHERE post_id = {$checkboxitem} ";
                $query_delete_selected_post = mysqli_query($connection, $query);
                confirm($query_delete_selected_post);
                break;

            case 'Clone';
                // select and get all data related to selected post
                $query = "SELECT * FROM posts WHERE post_id = {$checkboxitem} ";
                $clone_posts = mysqli_query($connection, $query);

                //PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
                while ($row = mysqli_fetch_assoc($clone_posts)) {
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

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
                $query .= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";
                $clone_post = mysqli_query($connection, $query);
                break;
        }
    }
}

?>

<!-- this form action dont need to be filled cz this form dont have and dont need submit button function-->
<form action="" method="post">
    <table class="table table-striped table-hover table-bordered">

        <div class="col-xs-3" id="BulkOptionContainer">
            <select id="BulkOptionContainer" class="form-control" name="bulk_action">
                <option value="">Select Status</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
                <option value="Delete">Delete</option>
                <option value="Clone">Clone</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="" class="btn btn-primary" value="apply">
            <a href="posts.php?source=add_posts" class="btn btn-success">Add New Post</a>
        </div>
        <hr>
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAllBoxes"></input>
                </th>
                <th>Id</th>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Image</th>
                <th>Content</th>
                <th>Tags</th>
                <th>Views</th>
                <th>Comments</th>
                <th>Status</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM posts ORDER BY post_id DESC";
            $show_all_posts = mysqli_query($connection, $query);

            //PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
            while ($row = mysqli_fetch_assoc($show_all_posts)) {
                $post_id = $row['post_id'];
                $post_cat_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 100);
                $post_tags = $row['post_tags'];
                $post_views_count = $row['post_views_count']; // remember set database default value to either null, or as defined
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
                echo "<tr>";
            ?>
                <td><input class='checkbox' type='checkbox' name='checboxArray[]' value='<?php echo $post_id; ?>'></input></td>
            <?php
                echo "<td>$post_id</td>";

                //repairing missed on picking category_id while it must be easier using category title
                $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
                $show_selected_categories = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($show_selected_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<td>$post_cat_id-$cat_title </td>";
                }

                echo "<td>$post_title</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_date</td>";
                echo "<td><img width='100' src='../images/$post_image'</td>";
                //class='img-responsive' -> to set image resizing when browser widht adjusted
                echo "<td>$post_content</td>";
                echo "<td>$post_tags</td>";
                echo "<td><a onClick=\"javascript : return confirm ('Are you sure want to reset this post views ?'); \"href ='posts.php?reset={$post_id}'>$post_views_count</a></td>";

                $query = "SELECT * FROM comments WHERE comment_post_id= {$post_id} ";
                $query_comment_count = mysqli_query($connection, $query);
                $row = mysqli_fetch_array($query_comment_count);
                $comment_post_id = $row['comment_id'];
                $comments_count = mysqli_num_rows($query_comment_count);

                echo "<td><a href='post_comments.php?id={$post_id}'>$comments_count</a></td>";

                echo "<td>$post_status</td>";
                //instead, this form were using switch function later on target link, to switch what to do based on what parameter submitted, see edit and delete below
                echo "<td><a href ='../post.php?&p_id={$post_id}'>View</a></td>";
                echo "<td><a href ='posts.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a onClick=\"javascript : return confirm ('Are you sure want to delete this post ?'); \"href ='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</form>

<?php
if (isset($_GET['delete'])) {
    $delete_post = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$delete_post}";
    $delete_query = mysqli_query($connection, $query);

    if (isset($delete_query)) {
        header("Location: posts.php");
    } else {
        confirm($delete_query);
    }
}

if (isset($_GET['reset'])) {
    $post_views_count = $_GET['reset'];

    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$post_views_count}";
    // always make sure where clause were put in the end of query
    $reset_query = mysqli_query($connection, $query);

    if (isset($reset_query)) {
        header("Location: posts.php");
    } else {
        confirm($reset_query);
    }
}

?>