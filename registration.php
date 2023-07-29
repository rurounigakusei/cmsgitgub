<?php include "includes/dibi/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php
if (isset($_POST['submit'])) {

    $username = $_POST['username']; // refer to form name name="username"
    $email = $_POST['email']; // refer to form name name="email"
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        $username = mysqli_real_escape_string($connection, $username);
        $user_email = mysqli_real_escape_string($connection, $email);
        $user_password = mysqli_real_escape_string($connection, $password);
        // php security, find in php.crypt documentation

        //$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
        $query = "SELECT randSalt FROM users ";
        $select_randsalt_query = mysqli_query($connection, $query);

        if (!$select_randsalt_query) {
            die("Could not connect " . mysqli_error($connection));
        }
        //we can remove "while to get only the first value caught in database"
        //while(){} 
        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $user_password = crypt($password, $salt);

        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .= "VALUES ('{$username}', '{$user_email}', '{$user_password}', 'member' )";
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("Could not connect to DB" . mysqli_error($connection)); //. ' ' . mysqli_errno($connection)
        }
        $message = "your account has been registered";
    } else {
        $message = "fields cannot be empty";
    }
} else {
    $message = "";
}


?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <h4 class="text-center"><?php echo $message; ?><h4>
                                        <label for="username" class="sr-only">username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "includes/footer.php"; ?>