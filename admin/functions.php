<?php

function secure($stings)
{
    global $connection;
    return mysqli_real_escape_string($connection, trim($stings));
}

function users_online()
{
    // if (isset($_GET['usersonline'])) {
    global $connection;
    // if (!$connection) {
    //     session_start();
    //     include("../includes/dibi/db.php");
    // this not working

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 30;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session ='$session'";
    $send_query = mysqli_query($connection, $query);
    $count_online = mysqli_num_rows($send_query);

    if ($count_online == NULL) {
        $query_online = "INSERT INTO users_online(session, time) ";
        $query_online .= "VALUES('$session','$time')";
        mysqli_query($connection, $query_online);
    } else {
        $update_online = "UPDATE users_online SET time ='$time' WHERE session ='$session'";
        mysqli_query($connection, $update_online);
    }

    $query = "SELECT * FROM users_online WHERE time > $time_out";
    $user_online_query = mysqli_query($connection, $query);
    return $count_users_online = mysqli_num_rows($user_online_query);
    //get back to return, instead of echo
}
//} //get request isset()
// not working}


function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


function create_categories()
{
    global $connection; //is required to bring extern variable inside function
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "you cannot create blank categories";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE ('{$cat_title}')";

            $add_categories = mysqli_query($connection, $query);
        }
    }
}

function FindAllCategories()
{
    global $connection;
    //SELECT ALL DATA
    $query = "SELECT * FROM categories";
    $show_all_categories = mysqli_query($connection, $query);

    //PERFORM ACTION SHOWING DATA WHILE CONDITION REMAIN TRUE
    while ($row = mysqli_fetch_assoc($show_all_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Update</a></td>";
        echo "</tr>";
    }
}

function DeleteCategories()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $del_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id} ";
        $del_categories = mysqli_query($connection, $query);
        header("Location: categories.php"); //this command get you redirected to target loc
    }
}

function redirect($location)
{
    header("Location:" . $location);
    exit;
}


function recordCount($table)
{
    global $connection;

    $query = "SELECT * FROM " . $table;
    $totalposts = mysqli_query($connection, $query);
    $result = mysqli_num_rows($totalposts);
    confirm($result);

    return $result;
}

//lesson 272, create more structurized admin access prevention using functions and session
/**watch below code, because $username is a var that parsed through an array from global variable
 * called $_SESSION, $username should be written $username='parsed value' 
 */
function is_admin($username = '')
{
    global $connection;
    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if ($row['user_role'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function username_exist($username)
{
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function user_email_exist($email)
{
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

//from lesson 290 forgot password
function email_exists($email)
{

    global $connection;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirm($result);

    if (mysqli_num_rows($result) > 0) {

        return true;
    } else {

        return false;
    }
}

//lesson 288 forgot password
function ifItIsMethod($method = null)
{
    if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
        return true;
    }
    return false;
}

function isLoggedIn()
{
    if (isset($_SESSION['user_role'])) {
        return true;
    }
    return false;
}

function checkIfUserIsLoggedInAndRedirect($redirectLocation = null)
{
    // use function insied function
    if (isLoggedIn()) {

        redirect($redirectLocation);
    }
}

function login_user($username, $password)
{

    global $connection;

    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {

        die("QUERY FAILED" . mysqli_error($connection));
    }


    while ($row = mysqli_fetch_array($select_user_query)) {

        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

        if (password_verify($password, $db_user_password)) {

            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;

            redirect('index.php');
        } else {
            return false;
        }
    }

    return true;
}
