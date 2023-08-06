<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $x = "outside"; // this is an example of global variable:

    function convert()
    {
        $x = "inside"; // this is local variable
    }

    echo $x . "<br>"; // calling global variable

    convert();

    echo $x . "<hr>"; // still calling global variable


    function convertwo()
    {
        global $x;
        $x = "inside";
    }

    echo $x . "<br>"; // still calling 

    convertwo(); // activate function

    echo $x; // finally perform converting global var to local var

    ?>
</body>

</html>