<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    //membuat class, bisa saja class isinya kosong
    class Car
    {
        //adds properties of class
        var $wheels = 4;
        var $doors = 4;
        var $engine = 4;
        var $hoods = 4;
        function MoveWheels()
        {
            echo "your car wheels are moved <br>";
        }
    }

    $bmw = new Car();

    echo $bmw->wheels;
    echo "<hr>";

    //direct change the value of var(properti) of a class
    $bmw->wheels = 8;
    echo $bmw->wheels;

    echo "<hr>";
    //we can assigning properties inside method
    class Motor
    {
        //adds properties of class
        var $wheels = 2;
        var $lamp = 1;
        var $engine = 1;
        function MoveWheels()
        {
            $this->wheels = 4;
            //inside class, Motor changed to $this
        }
    }

    $scoopy = new Motor();
    echo $scoopy->wheels;
    echo "<br>";
    $scoopy->MoveWheels(); // to change properti wheels, from 2 to 4
    echo $scoopy->wheels;




    ?>
</body>

</html>