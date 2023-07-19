<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Set Admin</th>
            <th>Set Member</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $show_users = mysqli_query($connection, $query);

        //PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
        while ($row = mysqli_fetch_assoc($show_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

            echo "<tr>";
            echo "<td>$user_id </td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";

            // $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
            // $comment_post_id = mysqli_query($connection, $query);
            // while ($row = mysqli_fetch_assoc($comment_post_id)) {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];

            //     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

            echo "<td>$user_role</td>";
            echo "<td>$user_image</td>";
            echo "<td><a href ='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
            echo "<td><a href ='users.php?admin={$user_id}'>Admin</a></td>";
            echo "<td><a href ='users.php?member={$user_id}'>Member</a></td>";
            echo "<td><a href ='users.php?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
    </tbody>
</table>

<?php
if (isset($_GET['admin'])) {
    $admin_id = $_GET['admin'];

    $admin_query = "UPDATE users SET user_role = 'admin' WHERE user_id =$admin_id";
    $admin_query = mysqli_query($connection, $admin_query);

    if (isset($admin_query)) {
        header("Location: users.php");
    } else {
        confirm($admin_query);
    }
}

if (isset($_GET['member'])) {
    $member_id = $_GET['member'];

    $member_query = "UPDATE users SET user_role = 'member' WHERE user_id =$member_id";
    $member_query = mysqli_query($connection, $member_query);

    if (isset($member_query)) {
        header("Location: users.php");
    } else {
        confirm($member_query);
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    //lesson 242, adding more security, url . sql injection
    if (isset($_SESSION['user_role'])) {

        if ($_SESSION['user_role'] == 'admin') {

            $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
            //additional sql injection prevention

            $query = "DELETE FROM users WHERE user_id = {$delete_id}";
            $delete_query = mysqli_query($connection, $query);

            if (isset($delete_query)) {
                header("Location: users.php");
            } else {
                confirm($delete_query);
            }
        } else {
            header("location : ../index.php");
        }
    }
}

?>