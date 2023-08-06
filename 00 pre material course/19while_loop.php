<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //define a variable
    $counter = 0;

    //fungsi
    while ($counter < 10) {
        echo $counter + 1;
        echo " hello students<br>";
        //redifined variables into new definition inside of while operation
        $counter = $counter + 1;
    }

    echo "<br><hr>";

    // fungsi diatas bisa juga ditulis sebagai berikut untuk singkatan dengan hasil yang sama :
    $counter = 0;
    while ($counter < 10) {
        echo $counter + 1;
        echo " hello students<br>";
        //redifined variables into new definition inside of while operation
        $counter++;
    }

    ?>
</body>

</html>