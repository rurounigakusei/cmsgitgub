<?php
echo  "lesson 34<hr>";
if (isset($_POST['kirim'])) {

    echo "done";
} // isset = if statement

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="34checkingformsubmission.php" method="post"> <!--action is a command to pass response to specific files-->

        <input type="text" placeholder="Enter Name"><br>
        <input type="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="kirim"> <!--name is a name of submit action would wrap to be catch on global variable $_POST-->
    </form>
    <?php


    ?>
</body>

</html>