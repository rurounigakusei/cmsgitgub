<?php
if (isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    //bad new login method
    //$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
    // move_uploaded_file($post_image_temp, "../images/$post_image");
    $query = "SELECT randSalt from users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if (!$select_randsalt_query) {
        die("RandSalt Failed" . mysqli_error($connection));
    }

    //removed while, directly to the first value
    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";
    $query .= "VALUES ('{$username}', '{$hashed_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}')";

    $create_user = mysqli_query($connection, $query);

    confirm($create_user);
    echo "<h2>New User Successfully Created Named : " . $username . " " . "<a href='users.php'> Click to View</h2></a>";
    // header("location: users.php");
}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="title">Role</label><br>
        <select name="user_role" id="">
            <option value='member'>Member</option>
            <option value='admin'>Admin</option>

        </select>
    </div>

    <!-- <div class="form-group">
        <label for="title">Photo</label>
        <input type="file" name="image">
    </div> -->

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" Value="Add User">
    </div>

</form>