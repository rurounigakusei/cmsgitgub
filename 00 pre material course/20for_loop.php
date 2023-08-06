<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //similiar function to while loop, but variables are written inside, check lesson 19

    for ($counter = 0; $counter < 10; $counter++) {
        echo $counter + 1;
        echo " Hello Students<br>";
    }

    echo "<hr>";

    //also can be written like this one :
    // space.space is to merge php language and sting/ html language;
    for ($counter = 0; $counter < 10; $counter++) {
        echo $counter + 1 . " Hello Students<br>";
    }

    ?>
</body>

</html>