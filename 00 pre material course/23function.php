<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*
function allow you to perform any logic or command (real operation) multiple times without writing code over and over
*/

    function calculate()
    {
        echo 123 + 1000;
    }

    function say_Something()
    {
        echo "testing function";
    }

    function init()
    {
        say_Something();
        echo "<br>";
        calculate();
    }

    // calling function to perform above operation and command,
    //notes : function doesn't rely on strutural line, it can be write above down without affecting result
    init();
    ?>
</body>

</html>