<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /** defining variable */
    $number = 10;
    $number = 20;
    /**this global variable are depends on row, the one that will be read as true,
     * is the one on the below position */
    echo $number . "<br/>"; // this will result 20

    /**defining constants */
    define("NAME", "Edwin");
    /**("NAME" is the constants name while "Edwin" the constants values/ parameters); */
    echo NAME;

    // testing global var, after echo_ing above
    echo "<hr>";

    $number = 50;
    echo $number; // this will result 50
    ?>
</body>

</html>