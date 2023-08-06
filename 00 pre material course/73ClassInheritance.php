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

    $bmw->wheels = 8;
    echo $bmw->wheels;

    echo "<hr>";

    //inherit all properties and method in other class using command Extends
    class Plane extends Car
    {
        //if we want to overide parents properties just restate it in local scope of the class
        // for example we put below code to overide wheels number to 15 instead of inherited value which is 4
        var $wheels = 15;
    }

    $jet = new Plane();

    //automatically has default properties and values of CAR (wheel = 4)
    echo $jet->wheels;

    ?>
</body>

</html>