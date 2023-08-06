<?php


echo $_POST['submit'];
echo "<br>";
echo $_POST['namelist'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="62superpost.php" method="post">
        <input type="text" placeholder="type anything here" name="namelist"></input>
        <input type="submit" name="submit"></input>
    </form>
    <?php

    ?>
</body>

</html>