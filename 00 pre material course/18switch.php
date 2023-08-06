<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /* switch is simple if else, a condition between if and while,
this function allow you to test 1 condition to other response untill it meet the result
*/

    $number = 10;
    $total = 40;

    switch ($number) {

        case $total - 1 * $number:
            echo "it is";
            break; // this will break operation not to continue to next condition

        case $total - 2 * $number:
            echo "it is";
            break;

        case $total - 3 * $number:
            echo "it is";
            break; /* if this logical is commented/ deleted, then default condition will showing result
                because there are no operation result(case) that satisfy with switch condition        
                */
        case $total - 4 * $number:
            echo "it is";
            break;

        default:
            echo "no it is not";
    }
    ?>

</body>

</html>