<?php
if (isset($_GET['u_id'])) {
    $edit_user_id = $_GET['u_id'];
}
$query = "SELECT * FROM users WHERE user_id = $edit_user_id";
$editing_users = mysqli_query($connection, $query);

confirm($editing_users);

//PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
while ($row = mysqli_fetch_assoc($editing_users)) {
    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
}

if (isset($_POST['update_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    //additional to set view encrypted digit password when editing
    $query = "SELECT randSalt from users";
    $select_randsalt_query = mysqli_query($connection, $query);
    if (!$select_randsalt_query) {
        die("RandSalt Failed" . mysqli_error($connection));
    }

    //removed while, directly to the first value
    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}' "; // watch last variable before WHERE query
    $query .= "WHERE user_id = {$edit_user_id}";

    $update_user = mysqli_query($connection, $query);
    confirm($update_user);
    header("location: users.php");
} ?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First Name</label>
        <input value=<?php echo $user_firstname; ?> type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="title">Last Name</label>
        <input value=<?php echo $user_lastname; ?> type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="title"><?php echo 'Select to Change Current Role : ' . $user_role; ?></label><br>
        <br>
        <select name="user_role" id="">
            <option value=<?php echo $user_role; ?>>Change To :</option>
            <option value='member'>Member</option>
            <option value='admin'>Admin</option>

        </select>
    </div>

    <div class="form-group">
        <label for="title">Username</label>
        <input value=<?php echo $username; ?> type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="title">Email</label>
        <input value=<?php echo $user_email; ?> type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="title">Password</label>
        <input value=<?php echo $user_password; ?> type="password" class="form-control" name="user_password">
    </div>

    <div class="form-group">
        <input class="btn btn-success" type="submit" name="update_user" Value="Update Data">
    </div>

</form>