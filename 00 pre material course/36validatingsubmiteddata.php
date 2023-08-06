<?php
echo  "lesson 36<hr>";

if (isset($_POST['kirim'])) {

    $validusername = array("sajed", "maria", "majid", "ronin");
    $minchar = 5;
    $maxchar = 10;

    $username = $_POST['user']; // based on input name on origin form is 'user'
    $password = $_POST['pass']; // based on input name on origin form is 'pass'

    if (strlen($username) < $minchar) {
        echo "username has to be more than 5 char";
    }
    if (strlen($username) > $maxchar) {
        echo "username should not more than 10 char";
    }
    if (!in_array($username, $validusername)) { // if $username were not found (!remember this sign) inside array $validusername, then do xxx 

        echo "sorry you are not allowed to enter";
    } else {
        echo "Hello " . $username . " Your password is " . $password;
    }


    //     echo "Hello " . $username . "Your password is " . $password;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="37externaldatasubmission.php" method="post">
        <!--action is a command to pass response to specific files
            method is a method on sending data-->

        <input type="text" placeholder="Enter Name" name="user"><br>
        <input type="password" placeholder="Enter Password" name="pass">
        <br>
        <input type="submit" name="kirim"> <!--name is a name of submit action would wrap to be catch on global variable $_POST-->
    </form>
    <?php

    ?>
</body>

</html>