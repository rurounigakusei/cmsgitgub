<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // foreach loop is the most powerfull loop in php

    // define an array
    $numbers = array(123, 345, 456, 567, 678, 789, 890);

    //break content of array to individuals data inside loop
    foreach ($numbers as $number) {
        echo $number . "<br>";
    }

    echo "<hr>";

    ?>
</body>

</html>