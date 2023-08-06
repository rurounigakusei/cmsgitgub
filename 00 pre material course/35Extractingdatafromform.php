<?php
echo  "lesson 35<hr>";

if (isset($_POST['kirim'])) {
    $username = $_POST['user']; // based on input name on origin form is 'user'
    $password = $_POST['pass']; // based on input name on origin form is 'pass'

    echo "Hello" . $username . "Your password is " . $password;
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

    <form action="35Extractingdatafromform.php" method="post">
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