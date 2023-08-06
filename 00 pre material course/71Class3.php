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
        function MoveWheels()
        {
            echo "your car wheels are moved <br>";
        }
    }

    // to wrap class in a variable
    $bmw = new Car();

    // to run the functions in
    $bmw->MoveWheels(); //run well

    $honda = new Car();
    $honda->MoveWheels(); //run well

    //below class wont run because havent being instantiate
    $mercedes_benz->moveWheels(); //not run well





    ?>
</body>

</html>