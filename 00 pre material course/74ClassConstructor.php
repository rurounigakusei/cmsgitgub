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
        var $engine = 1;
        var $hoods = 1;

        function __construct()
        {
            echo $this->wheels = 10 . "<br>";
        }
    }

    $sedan = new Car();
    $suv = new Car();
    $hatchback = new Car();



    ?>
</body>

</html>