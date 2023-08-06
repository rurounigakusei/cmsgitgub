<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    /* let a blank value of function that will be available to be operated
    anytime it is being called with particullar parameter to be executed*/

    function greeting($greet)
    {
        echo $greet;
    }

    //call the functions injected with particullar parameter
    greeting("hellow bro"); // if "hello bro" was deleted, function will execute zero parameter which resulting error

    echo "<hr>";

    function sumarize($number1, $number2)
    {

        //create a variable / logic
        $sum = $number1 + $number2;
        echo $sum;
    }

    sumarize(20, 45);

    ?>
</body>

</html>