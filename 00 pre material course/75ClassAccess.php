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
        //type of properties of a class
        public $wheels = 4; // enable to be inherit freely
        protected $doors = 4; // can't be used outside class
        protected $velg = 8;
        private $engine = 1;
        var $hoods = 1;

        function Movewheels()
        {
            $this->wheels = 10 . "<br>";
        }

        function showProperty()
        {
            echo $this->doors;
        }

        function showPrivate()
        {
            echo $this->engine;
        }
    }

    //PUBLIC EXAMPLE
    $sedan = new Car();
    echo $sedan->wheels;
    // echo $sedan->doors; //doors cant be used directly when outside the class

    echo "<br>";

    $sedan->showProperty(); //doors finally can be used when wrapped on a function

    echo "<hr>";

    //PROTECTED EXAMPLE
    class SUV extends Car
    {
        function showProperties()
        {
            echo $this->velg;
        }
    }

    $suv = new SUV();
    echo $suv->showProperties();

    echo "<hr>";
    //PRIVATE EXAMPLE
    class TRUCK extends Car
    {
        function showPropertize()
        {
            echo $this->engine;
        }
    }

    $hino = new TRUCK();
    //this query below , resulting error
    //because engine were privatize in class CAR, cannot be inherit/ extends
    //echo $hino->showPropertize();

    //while below resulting success because we using functions inside class CAR
    echo $hino->showPrivate();


    ?>
</body>

</html>