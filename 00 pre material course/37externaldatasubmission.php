<?php
echo  "lesson 37<hr>";

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
        echo "Hello " . $username . " Your password is " . $password . "<hr>";
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

    <button name="back" href="36validatingsubmiteddata" onclick="">
        "Back to Lesson 36"
    </button>
    <?php

    ?>
</body>

</html>