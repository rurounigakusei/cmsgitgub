<?php include "db.php"; ?>
<?php session_start(); ?>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // echo $username;
    // echo "<br>";
    // echo $password;

    //clean up sql injection - standard
    $username = mysqli_escape_string($connection, $username);
    $password = mysqli_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $check_username = mysqli_query($connection, $query);
    if (!$check_username) {
        die("QUERY ERROR" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($check_username)) {
        $exist_username = $row['username'];
        $exist_user_password = $row['user_password'];
        $exist_user_firstname = $row['user_firstname'];
        $exist_user_lastname = $row['user_lastname'];
        $exist_user_role = $row['user_role'];
    }

    if (password_verify($password, $exist_user_password)) {
        $_SESSION['username'] = $exist_username;
        $_SESSION['firstname'] = $exist_user_firstname;
        $_SESSION['lastname'] = $exist_user_lastname;
        $_SESSION['user_role'] = $exist_user_role;

        header("Location: ../index.php");
    } else {
        header("Location: ../index.php");
    }
}



?>