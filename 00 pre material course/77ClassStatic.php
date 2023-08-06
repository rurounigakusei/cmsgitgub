<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    class Car
    {
        //change the var to static
        static $wheels = 4;
        var $hoods = 1;

        function Movewheels()
        {
            $this->wheels = 10 . "<br>";
        }

        //or we can assign static properties to a function using this syntax
        static function moveThewheels()
        {
            Car::$wheels = 20;
        }
    }


    $sedan = new Car();
    //below will result error because we need use static syntax to call out static properties
    // echo $sedan->wheels;

    //while below will resulting $wheel value
    //static make properties attached to class(Car) instead of instances ($sedan)
    echo Car::$wheels;

    echo "<hr>";

    Car::moveThewheels();
    echo Car::$wheels;
    //second way is also run
    ?>
</body>

</html>